<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coupon extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Coupon_model");
        $this->load->model("Coupon_type_model");
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
                'description' => $input['description'],
                'valid_date' => $input['valid_date'],
                'created_by' => $this->session->userdata('login_id'),
                'store_id' => $input['store_id'],
                // 'user_id' => $input['user_id'],
                'user_id' => 1,
            );

            $this->Coupon_model->insert($data);

            redirect("coupon", "refresh");
        }

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['coupon_type'] = $this->Coupon_type_model->get_all();
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

        $this->page_data["coupon"] = $coupon[0];

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
                'description' => $input['description'],
                'valid_date' => $input['valid_date'],
                // 'partner_coupon' => $input['partner_coupon'],
                // 'used' => $input['used'],
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id'),
                'store_id' => $input['store_id'],
                'user_id' => $input['user_id'],
            
            );

            $this->Coupon_model->update_where($where, $data);

            // redirect("coupon", "refresh");
        }

        

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['coupon_type'] = $this->Coupon_type_model->get_all();
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

}
