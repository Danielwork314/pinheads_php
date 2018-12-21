<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coupon extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Coupon_model");
        $this->load->model("User_coupon_model");
        $this->load->model("Store_model");
        $this->load->model("User_model");
    }

    public function index()
    {
        $this->page_data["coupon"] = $this->Coupon_model->get_all();
        
        // $this->debug($this->page_data["food"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/coupon/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'coupon' => $input['coupon'],
                'discount_rate' => $input['discount_rate'],
                'valid_date' => date('Y-m-d', strtotime($input['valid_date'])),
                'created_by' => $this->session->userdata('login_id'),
                'store_id' => $input['store_id'],
                // 'user_id' => $input['user_id'],
            );

            $this->Coupon_model->insert($data);

            redirect("coupon", "refresh");
        }

        $this->page_data['store'] = $this->Store_model->get_all();
        // $this->page_data['coupon_type'] = $this->Coupon_type_model->get_all();
        $this->page_data['input_field'] = $this->Coupon_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/coupon/add");
        $this->load->view("admin/footer");
    }

    function details($coupon_id)
    {

        $where = array(
            "coupon_id" => $coupon_id
        );
        // $this->debug($coupon_id);
        $coupon = $this->Coupon_model->get_where($where);

        $where = array(
            "user_coupon.coupon_id" => $coupon_id
        );

        $user_coupon = $this->User_coupon_model->get_where($where);

        $number = 0;

        foreach($user_coupon as $row){
            $number++;
        }

        $this->page_data["user_coupon"] = $user_coupon;

        $this->page_data["coupon"] = $coupon[0];
        $this->page_data["number"] = $number;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/coupon/details");
        $this->load->view("admin/footer");
    }

    function edit($coupon_id)
    {

        $where = array(
            'coupon_id' => $coupon_id
        );

        $coupon = $this->Coupon_model->get_where($where);
        
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

          
            $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

            $data = array(

                'coupon' => $input['coupon'],
                'discount_rate' => $input['discount_rate'],
                'valid_date' => date('Y-m-d', strtotime($input['valid_date'])),
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id'),
                'store_id' => $input['store_id'],
            
            );

            $this->Coupon_model->update_where($where, $data);

            redirect("coupon", "refresh");
        }

        

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['input_field'] = $this->Coupon_model->generate_edit_input($coupon_id);

        $this->page_data['coupon'] = $coupon[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/coupon/edit");
        $this->load->view("admin/footer");
    }

    public function partner_valid_yes($coupon_id)
    {
        $where = array(
            "coupon_id" => $coupon_id,
        );

        $data = array(
            "partner_coupon" => 0,
        );

        $this->Coupon_model->update_where($where, $data);

        redirect("coupon", "refresh");
    }

    public function partner_valid_no($coupon_id)
    {
        $where = array(
            "coupon_id" => $coupon_id,
        );

        $data = array(
            "partner_coupon" => 1,
        );

        $this->Coupon_model->update_where($where, $data);

        redirect("coupon", "refresh");
    }

    public function used_yes($coupon_id)
    {
        $where = array(
            "coupon_id" => $coupon_id,
        );

        $data = array(
            "used" => 0,
        );

        $this->Coupon_model->update_where($where, $data);

        redirect("coupon", "refresh");
    }

    public function used_no($coupon_id)
    {
        $where = array(
            "coupon_id" => $coupon_id,
        );

        $data = array(
            "used" => 1,
        );

        $this->Coupon_model->update_where($where, $data);

        redirect("coupon", "refresh");
    }


    function delete($coupon_id){

        $this->Coupon_model->soft_delete($coupon_id);
        redirect("coupon", "refresh");
    }

    function add_user_coupon($coupon_id){


        if($_POST){

            // die(var_dump($_POST));

            foreach($_POST['user_array'] as $row){

                $data = array(
                    'user_id' => $row['user_id'],
                    'coupon_id' => $coupon_id
                );

                $this->User_coupon_model->insert($data);
            }

            redirect("coupon/details/" . $coupon_id, "refresh");    

        }

        $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['coupon_id'] = $coupon_id;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/coupon/add_user_coupon");
        $this->load->view("admin/footer");
    }

    function delete_user_coupon($user_coupon_id){

        $where = array(
            'user_coupon_id' => $user_coupon_id
        );

        $user_coupon = $this->User_coupon_model->get_where($where)[0];

        $this->User_coupon_model->soft_delete($user_coupon_id);
        redirect("coupon/details/" . $user_coupon['coupon_id'], "refresh");
    }

}
