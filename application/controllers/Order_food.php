<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order_food extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Order_food_model");
        $this->load->model("User_model");
        $this->load->model("Food_model");
        $this->load->model("User_order_model");
    }

    function add()
    {

        $this->page_data['order_food'] = $this->Order_food_model->get_all();
        $this->page_data['user_order'] = $this->User_order_model->get_all();
        $this->page_data['food'] = $this->Food_model->get_all();
        $this->page_data['input_field'] = $this->Order_food_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'user_order_id' => $input['user_order_id'],
                    'food_id' => $input['food_id'],
                    'end_date' => $input['end_date'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Order_food_model->insert($data);

                redirect("Order_food_model", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
            
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/order_food/add");
        $this->load->view("admin/footer");
    }

    function details($order_food_id)
    {

        $where = array(
            "order_food_id" => $order_food_id
        );
        // $this->debug($order_food_id);
        $order_food = $this->Order_food_model->get_where($where);
        $this->page_data["order_food"] = $order_food[0];

        $food = $this->Food_model->get_where($where);
        $this->page_data["food"] = $food;

        $user_order = $this->User_order_model->get_where($where);
        $this->page_data["user_order"] = $user_order;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/order_food/details");
        $this->load->view("admin/footer");
    }


    function delete($order_food_id){

        $this->Order_food_model->soft_delete($order_food_id);
        redirect("order_food", "refresh");
    }

}