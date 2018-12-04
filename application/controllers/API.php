<?php

class API extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_model");
        $this->load->model("Food_category_model");
        $this->load->model("Gourmet_type_model");
        $this->load->model("Store_model");
        $this->load->model("Store_feature_model");
        $this->load->model("Store_image_model");
        $this->load->model("Food_model");
        $this->load->model("Banner_model");
        $this->load->model("Sales_model");
        $this->load->model("Order_food_model");
    }

    public function test()
    {
        if ($_POST) {
            die("post");
        } else {
            die("didnt post");
        }
    }

    public function register()
    {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if ($input['password'] != $input['password2']) {
                $error = true;
                $error_message = "Passwords do not match";
            }

            //check email
            $where = array(
                'email' => $input['email'],
            );
            $email_exists = $this->User_model->get_where($where);

            if ($email_exists) {
                $error = true;
                $error_message = "Email already exists.";
            }

            //check phone
            $where = array(
                'contact' => $input['contact'],
            );
            $phone_exists = $this->User_model->get_where($where);

            if ($phone_exists) {
                $error = true;
                $error_message = "Phone already exists.";
            }

            if (!$error) {
                $hash = $this->hash($input['password']);

                $data = array(
                    "username" => $input['email'],
                    "name" => $input['email'],
                    "email" => $input['email'],
                    "contact" => $input['contact'],
                    "password" => $hash['password'],
                    "salt" => $hash['salt'],
                    "role_id" => 3,
                );

                $user_id = $this->User_model->insert($data);

                $data = array(
                    "login_time" => date("Y-m-d h:i:s"),
                    "token" => md5($user_id . date("Y-m-d h:i:s")),
                );

                $where = array(
                    "user_id" => $user_id,
                );

                $this->User_model->update_where($where, $data);

                $user = $this->User_model->get_where($where)[0];

                $this->session->set_userdata("user", $user);

                die(json_encode(array(
                    'status' => true,
                    "data" => array(
                        "user" => $user,
                    ),
                )));

            } else {
                die(json_encode(array(
                    'status' => false,
                    "message" => $error_message,
                )));
            }
        }
    }

    public function login()
    {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $user = $this->User_model->user_login($input);

            if (!empty($user)) {
                $user = $user[0];

                $data = array(
                    "login_time" => date("Y-m-d h:i:s"),
                    "token" => md5($user['user_id'] . date("Y-m-d h:i:s")),
                );

                $where = array(
                    "user_id" => $user['user_id'],
                );

                $this->User_model->update_where($where, $data);

                $user["login_time"] = $data['login_time'];
                $user["token"] = $data['token'];

                $this->session->set_userdata("user", $user);

                die(json_encode(array(
                    "status" => true,
                    "data" => array(
                        "user" => $user,
                    ),
                )));

            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => "invalid ID or Password",
                )));
            }
        }
    }

    public function login_with_token()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "token" => $input['user_token'],
            );

            $user = $this->User_model->get_where($where);

            if (!empty($user)) {
                $user = $user[0];

                $data = array(
                    "login_time" => date("Y-m-d h:i:s"),
                    "token" => md5($user['user_id'] . date("Y-m-d h:i:s")),
                );

                $where = array(
                    "user_id" => $user['user_id'],
                );

                $this->User_model->update_where($where, $data);

                $user["login_time"] = $data['login_time'];
                $user["token"] = $data['token'];

                $this->session->set_userdata("user", $user);

                die(json_encode(array(
                    "status" => true,
                    "data" => array(
                        "user" => $user,
                    ),
                )));

            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => "invalid ID or Password",
                )));
            }
        }
    }

    public function logout()
    {
        if ($_POST) {

            $this->session->unset_userdata("user");

            die(json_encode(array(
                "status" => true,
                "message" => "Logout success.",
            )));
        }
    }

    public function foodCategories()
    {
        $food_category = $this->Food_category_model->get_all();

        die(json_encode(array(
            "status" => true,
            "data" => array(
                "food_category" => $food_category,
            ),
        )));
    }

    public function gourmetTypes()
    {
        $gourmet_types = $this->Gourmet_type_model->get_all();

        die(json_encode(array(
            "status" => true,
            "data" => array(
                "gourmet_types" => $gourmet_types,
            ),
        )));
    }

    public function stores()
    {
        if ($_POST) {
            $input = $this->input->post();

            if (!empty($input['gourmet_type_id'])) {
                $where = array(
                    "store.gourmet_type_id" => $input['gourmet_type_id'],
                );
            } else if (!empty($input['recommended'])) {
                $where = array(
                    "favourite" => 1,
                );
            }

            $stores = $this->Store_model->get_where($where);
        } else {
            $stores = $this->Store_model->get_all();
        }

        $store_data = array();
        foreach ($stores as $row) {
            $data = array(
                "store_id" => $row['store_id'],
                "gourmet_type_id" => $row['gourmet_type_id'],
                "gourmet_type" => $row['gourmet_type'],
                "pricing_id" => $row['pricing_id'],
                "pricing" => $row['pricing'],
                "pricing_id" => $row['pricing_id'],
                "pricing" => $row['pricing'],
                "vendor_id" => $row['vendor_id'],
                "vendor" => $row['vendor'],
                "thumbnail" => base_url() . $row['thumbnail'],
                "store" => $row['store'],
                "address" => $row['address'],
                "phone" => $row['phone'],
                "latitude" => $row['latitude'],
                "longitude" => $row['longitude'],
                "business_hour" => $row['business_hour'],
                "favourite" => ($row['favourite'] == 1) ? "YES" : "NO",
                "description" => $row['description'],
            );

            array_push($store_data, $data);
        }

        die(json_encode(array(
            "status" => true,
            "data" => array(
                "stores" => $store_data,
            ),
        )));
    }

    public function store()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "store_id" => $input['store_id'],
            );

            $store = $this->Store_model->get_where($where)[0];
            $store_feature = $this->Store_feature_model->get_where($where);
            $store_image = $this->Store_image_model->get_where($where);

            $store_feature_data = array();
            foreach ($store_feature as $row) {
                $data = array(
                    "store_feature_id" => $row['store_feature_id'],
                    "store_id" => $row['store_id'],
                    "feature_id" => $row['feature_id'],
                    "feature" => $row['feature'],
                );

                array_push($store_feature_data, $data);
            }

            $store_image_data = array();
            foreach ($store_image as $row) {
                $data = array(
                    "store_image_id" => $row['store_image_id'],
                    "store_id" => $row['store_id'],
                    "image" => base_url() . $row['image'],
                );

                array_push($store_image_data, $data);
            }

            $data = array(
                "store_id" => $store['store_id'],
                "gourmet_type_id" => $store['gourmet_type_id'],
                "gourmet_type" => $store['gourmet_type'],
                "pricing_id" => $store['pricing_id'],
                "pricing" => $store['pricing'],
                "pricing_id" => $store['pricing_id'],
                "pricing" => $store['pricing'],
                "vendor_id" => $store['vendor_id'],
                "vendor" => $store['vendor'],
                "thumbnail" => base_url() . $store['thumbnail'],
                "store" => $store['store'],
                "address" => $store['address'],
                "phone" => $store['phone'],
                "latitude" => $store['latitude'],
                "longitude" => $store['longitude'],
                "business_hour" => $store['business_hour'],
                "favourite" => ($store['favourite'] == 1) ? "YES" : "NO",
                "description" => $store['description'],
                "features" => $store_feature_data,
                "images" => $store_image_data,
            );

            die(json_encode(array(
                "status" => true,
                "data" => array(
                    "store" => $data,
                ),
            )));
        }
    }

    public function menu()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "food.store_id" => $input['store_id'],
            );

            $foods = $this->Food_model->get_where($where);

            $food_data = array();
            foreach ($foods as $row) {
                $data = array(
                    "food_id" => $row['food_id'],
                    "food" => $row['food'],
                    "store_id" => $row['store_id'],
                    "store" => $row['store'],
                    "food_category_id" => $row['food_category_id'],
                    "food_category" => $row['food_category'],
                    "description" => $row['description'],
                    "price" => $row['price'],
                    "discounted_price" => $row['discounted_price'],
                    "discount" => $row['discount'],
                    "image" => base_url() . $row['image'],
                );

                array_push($food_data, $data);
            }

            die(json_encode(array(
                "status" => true,
                "data" => array(
                    "menu" => $food_data,
                ),
            )));
        }
    }

    public function banners()
    {
        $banners = $this->Banner_model->get_all();

        $banner_data = array();
        foreach ($banners as $row) {
            $data = array(
                "banner_id" => $row['banner_id'],
                "image" => base_url() . $row['image'],
            );

            array_push($banner_data, $data);
        }

        die(json_encode(array(
            "status" => true,
            "data" => array(
                "banners" => $banner_data,
            ),
        )));
    }

    public function add_to_cart()
    {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $input['order'] = json_decode($input['order'], true);

            $where = array(
                "token" => $input['user_token'],
            );

            $user = $this->User_model->get_where($where);

            if (empty($user)) {
                $error = true;
                $error_message = "Please login to proceed.";
            }

            if (!$error) {
                $user = $user[0];

                $sub_total = 0;
                $store_ids = array();
                foreach ($input['order'] as $row) {
                    $sub_total += $row['price'] * $row['quantity'];
                    array_push($store_ids, $row['store_id']);
                }

                $data = array(
                    "user_id" => $user['user_id'],
                    "status" => 1,
                    "order_status_id" => 1,
                    'store_id' => $store_ids[0],
                    "sub_total" => $sub_total,
                    "service_change" => $sub_total * 0.1,
                    "total" => $sub_total * 1.1,
                );

                $sales_id = $this->Sales_model->insert($data);

                foreach ($input['order'] as $row) {
                    $data = array(
                        "sales_id" => $sales_id,
                        "food_id" => $row["food_id"],
                        "quantity" => $row["quantity"],
                    );

                    $this->Order_food_model->insert($data);
                }

                die(json_encode(array(
                    "status" => true,
                )));

            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message,
                )));
            }

        }
    }

    public function order_history()
    {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $where = array(
                "token" => $input['user_token'],
            );

            $user = $this->User_model->get_where($where);

            if (empty($user)) {
                $error = true;
                $error_message = "Please login to proceed.";
            }

            if (!$error) {
                $user = $user[0];

                $where = array(
                    "user_id" => $user['user_id'],
                );

                $sales = $this->Sales_model->get_order_history($where);

                $sales_data = array();
                foreach ($sales as $row) {
                    // $this->debug($row);

                    $where = array(
                        "sales_id" => $row['sales_id'],
                    );

                    $order_food = $this->Order_food_model->get_where($where);

                    $i = 0;
                    foreach ($order_food as $food_row) {
                        $order_food[$i]['image'] = base_url() . $food_row['image'];
                        $i++;
                    }

                    $data = array(
                        "sales_id" => $row['sales_id'],
                        "user_id" => $row['user_id'],
                        "store_id" => $row['store_id'],
                        "order_status_id" => $row['order_status_id'],
                        "take_away" => ($row['take_away'] == 1) ? "YES" : "NO",
                        "subtotal" => $row['sub_total'],
                        "service_charge" => $row['service_change'],
                        "total" => $row['total'],
                        "status" => ($row['status'] == 1) ? "PAID" : "NOT PAID",
                        "order_status" => $row['order_status'],
                        "created_date" => $row['created_date'],
                        "display_date" => date("d.m.Y g:i A"),
                        "store" => "store",
                        "image" => base_url() . $row['thumbnail'],
                        "food" => $order_food,
                    );

                    array_push($sales_data, $data);
                }

                die(json_encode(array(
                    "status" => true,
                    "data" => array(
                        "order_history" => $sales_data,
                    ),
                )));

            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $error_message,
                )));
            }
        }
    }

    // public function searchStore()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $result = $this->Store_model->search_store($input['keyword']);

    //         die(json_encode(array(
    //             "result" => $result,
    //         )));

    //     }
    // }

    // public function searchLocation()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $result = $this->Store_model->search_location($input['keyword']);

    //         die(json_encode(array(
    //             "result" => $result,
    //         )));

    //     }
    // }

    // public function storeTakeAway()
    // {
    //     $where = array(
    //         'take_away' => 1,
    //     );

    //     $result = $this->Store_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeDelivery()
    // {
    //     $where = array(
    //         'delivery' => 1,
    //     );

    //     $result = $this->Store_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeHalal()
    // {
    //     $where = array(
    //         'halal' => 1,
    //     );

    //     $result = $this->Store_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeVegetarian()
    // {
    //     $where = array(
    //         'vegetarian' => 1,
    //     );

    //     $result = $this->Store_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // // public function storeRecommended()
    // // {
    // //     $where = array(
    // //         'recommended' => 1
    // //     );

    // //     $result = $this->Store_model->get_where($where);

    // //     die(json_encode(array(
    // //         "result" => $result,
    // //     )));
    // // }

    // public function storeFavorite()
    // {

    //     $where = array(
    //         'favourite' => 1,
    //     );

    //     $result = $this->Store_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeNew()
    // {
    //     $result = $this->Store_model->search_new();

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeCuisine()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'gourmet_type_id' => $input['gourmet_type_id'],
    //         );

    //         $result = $this->Store_model->search_location($where);

    //         die(json_encode(array(
    //             "result" => $result,
    //         )));

    //     }
    // }

    // public function storeAll()
    // {
    //     $result = $this->Store_model->get_all();

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // //not yet confirm
    // public function notificationAll()
    // {
    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->Notification_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function notificationWhere()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'notification_id' => $input['notification_id'],
    //         );

    //         $result = $this->Notification_model->get_where($where);

    //         die(json_encode(array(
    //             "result" => $result[0],
    //         )));
    //     }
    // }

    // public function orderAll()
    // {
    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->Order_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function orderWhere()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'order_id' => $input['order_id'],
    //         );

    //         $result = $this->Order_model->get_where($where);

    //         die(json_encode(array(
    //             "result" => $result[0],
    //         )));
    //     }
    // }

    // public function userProfile()
    // {

    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->User_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result[0],
    //     )));
    // }

    // public function editProfile()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'user_id' => $this->session->userdata('user_id'),
    //         );

    //         $data = array(
    //             'name' => $input['name'],
    //             'gender' => $input['gender'],
    //             'birthday' => $input['birthday'],
    //             'email' => $input['email'],
    //             'phone' => $input['phone'],
    //         );

    //         if (isset($input['password'])) {

    //             $data['password'] = $input['password'];
    //         }

    //         $result = $this->User_model->update_where($where, $data);

    //         die(json_encode(array(
    //             "status" => 1,
    //             "message" => "update success.",
    //         )));
    //     }
    // }

    // public function addCard()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $data = array(
    //             'bank' => $input['bank'],
    //             'card_type' => $input['card_type'],
    //             'cvv' => $input['cvv'],
    //             'first_name' => $input['first_name'],
    //             'last_name' => $input['last_name'],
    //             'address' => $input['address'],
    //             'region' => $input['region'],
    //             'phone' => $input['phone'],
    //             'email' => $input['email'],
    //         );

    //         $result = $this->Payment_model->insert($data);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "add success.",
    //             )));
    //         }
    //     }
    // }

    // public function removeCard()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $result = $this->Payment_model->soft_delete($input['payment_id']);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "remove success.",
    //             )));
    //         }
    //     }
    // }

    // public function removeBillingAddress()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $result = $this->Billing_address_model->soft_delete($input['billing_address_id']);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "remove success.",
    //             )));
    //         }
    //     }
    // }

    // public function addBillingAddress()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $data = array(
    //             'user_id' => $this->session->userdata('user_id'),
    //             'address1' => $input['address1'],
    //             'address2' => $input['address2'],
    //             'state' => $input['state'],
    //             'postcode' => $input['postcode'],
    //             'country' => $input['country'],
    //         );

    //         $result = $this->Payment_model->insert($data);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "add success.",
    //             )));
    //         }
    //     }
    // }

    // public function cardAll()
    // {

    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->Payment_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function billingAddressAll()
    // {

    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->Billing_address_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function couponAll()
    // {

    //     $where = array(
    //         'user_id' => $this->session->userdata('user_id'),
    //     );

    //     $result = $this->Coupon_model->get_where($where);

    //     die(json_encode(array(
    //         "result" => $result,
    //     )));
    // }

    // public function storeWhere()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'store_id' => $input['store_id'],
    //         );

    //         $result = $this->Store_model->get_where($where);

    //         die(json_encode(array(
    //             "result" => $result[0],
    //         )));
    //     }
    // }

    // public function menuWhere()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'food_id' => $input['food_id'],
    //         );

    //         $result = $this->Food_model->get_where($where);

    //         die(json_encode(array(
    //             "result" => $result[0],
    //         )));
    //     }
    // }

    // public function storeMenu()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             'store_id' => $input['store_id'],
    //         );

    //         $result = $this->Food_model->get_where($where);

    //         die(json_encode(array(
    //             "result" => $result,
    //         )));
    //     }
    // }

    // public function removeCart()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $result = $this->Order_model->soft_delete($input['user_order_id']);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "remove success.",
    //             )));
    //         }
    //     }
    // }

    // public function addCart()
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         if (isset($input['user_order_id'])) {

    //             $user_order_id = $input['user_order_id'];
    //         } else {

    //             $data = array(
    //                 'user_id' => $this->session->userdata('user_id'),
    //                 'store_id' => $input['store_id'],
    //             );

    //             $user_order_id = $this->Order_model->insert($data);
    //         }

    //         $data = array(
    //             'user_order_id' => $user_order_id,
    //             'food_id' => $input['food_id'],
    //         );

    //         $result = $this->Order_food_model->insert($data);

    //         if ($result) {

    //             die(json_encode(array(
    //                 "status" => 1,
    //                 "message" => "add success.",
    //             )));
    //         }
    //     }
    // }
}
