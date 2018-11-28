<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Sales_model");
        $this->load->model("Order_food_model");
        $this->load->model("Sales_model");
        $this->load->model("Food_model");
        $this->load->model("Store_model");

    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $order_array = [];

            $where = array(
                'vendor_id' => $this->session->userdata('login_id')
            );

            $owned_store = $this->Store_model->get_where($where);

            if($owned_store){

                foreach($owned_store as $row){

                    $where = array(
                        'sales.store_id' => $row['store_id']
                    );

                    $orders = $this->Sales_model->get_where($where);

                    foreach($orders as $order){

                        array_push($order_array, $order);
                    }
                }
            }

            $this->page_data["order"] = $order_array;

        } else {
            
            $this->page_data["order"] = $this->Sales_model->get_all();
        }
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/sales/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['food'] = $this->Food_model->get_all();
        $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['store'] = $this->Store_model->get_all();
        // $this->page_data['input_field'] = $this->Order_model->generate_input();

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                if($input['take_away'] != 0){

                    $take_away = 1;

                } else {

                    $take_away = 0;
                }

                $data = array(
                    'user_id' => $input['user_id'],
                    'store_id' => $input['store_id'],
                    'billing_address_id' => $input['billing_address_id'],
                    'card_id' => $input['card_id'],
                    'take_away' => $take_away,
                    'total' => $input['total_price'],
                );

                $sales_id = $this->Sales_model->insert($data);

                if($sales_id){

                    foreach($input['food_array'] as $row){

                        $data = array(
                            'sales_id' => $sales_id,
                            'food_id' => $row['food_id'],
                        );

                        $this->Order_food_model->insert($data);
                    }
                }

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/sales/add");
        $this->load->view("admin/footer");
    }

    function details($sales_id)
    {

        $where = array(
            "sales_id" => $sales_id
        );

        $order = $this->Sales_model->get_where($where);

        $this->page_data["order"] = $order[0];
        $this->page_data['food'] = $this->Order_food_model->get_where($where);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/sales/details");
        $this->load->view("admin/footer");
    }


    function delete($sales_id){

        $this->Sales_model->soft_delete($sales_id);
        redirect("sales", "refresh");
    }

}
