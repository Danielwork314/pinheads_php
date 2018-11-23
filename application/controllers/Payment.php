<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Payment_model");
        $this->load->model("User_model");
    }

    function add($user_id)
    {

        $this->page_data['user'] = $this->User_model->get_all();

        $this->page_data['input_fields'] = $this->Payment_model->generate_input();

        $this->page_data['user_id'] = $user_id;

        if ($_POST) {    

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'card_no'       => $input['card_no'],
                    'bank'          => $input['bank'],
                    'card_type'     => $input['card_type'],
                    'cvv'           => $input['cvv'],
                    'month'         => $input['month'],
                    'year'          => $input['year'],
                    'firstname'     => $input['firstname'],
                    'lastname'      => $input['lastname'],
                    'address'       => $input['address'],
                    'region'        => $input['region'],
                    'phone'         => $input['phone'],
                    'email'         => $input['email'],
                    'created_by'    => $this->session->userdata('login_id'),
                    'user_id'       => $user_id,
                );

                $payment_id = $this->Payment_model->insert($data);

                redirect("user/details/" . $user_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/payment/add");
        $this->load->view("admin/footer");
    }

    function details($payment_id)
    {

        $where = array(
            "payment_id" => $payment_id
        );
        
        $payment = $this->Payment_model->get_where($where);

        $this->page_data["payment"] = $payment[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/payment/details");
        $this->load->view("admin/footer");
    }

    function edit($payment_id)
    {

        $this->page_data['input_field'] = $this->Payment_model->generate_edit_input($payment_id);

        $where = array(
            'payment_id' => $payment_id
        );

        $payment = $this->Payment_model->get_where($where);

        $this->page_data['payment'] = $payment[0];

        $this->page_data['user'] = $this->User_model->get_all();
        
        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(
                    'card_no'           => $input['card_no'],
                    'bank'              => $input['bank'],
                    'card_type'         => $input['card_type'],
                    'cvv'               => $input['cvv'],
                    'month'             => $input['month'],
                    'year'              => $input['year'],
                    'firstname'         => $input['firstname'],
                    'lastname'          => $input['lastname'],
                    'address'           => $input['address'],
                    'region'            => $input['region'],
                    'phone'             => $input['phone'],
                    'email'             => $input['email'],
                    'modified_date'     => $date->format("Y-m-d h:i:s"),
                    'modified_by'       => $this->session->userdata('login_id')
                );

                $user_id = $this->Payment_model->get_where($where)[0];

                $this->Payment_model->update_where($where, $data);

                redirect("user/details/" . $user_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
            
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/payment/edit");
        $this->load->view("admin/footer");
    }

    function delete($payment_id){

        $where = array(
            "payment_id" => $payment_id
        );

        $user_id = $this->Payment_model->get_where($where)[0];


        $this->Payment_model->soft_delete($payment_id);
        redirect("user/details/" . $user_id['user_id'], "refresh");
    }

}
