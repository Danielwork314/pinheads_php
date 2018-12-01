<?php

class API extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_model");
        $this->load->model("Food_category_model");
        $this->load->model("Gourmet_type_model");
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

                die(json_encode(array(
                    'status' => true,
                )));

            } else {
                die(json_encode(array(
                    'status' => false,
                    "error_message" => $error_message,
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
                    "error_message" => "invalid ID or Password",
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
