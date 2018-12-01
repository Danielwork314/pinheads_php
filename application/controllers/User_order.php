<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_order extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("User_order_model");
        $this->load->model("User_model");
    }


    function add($user_id)
    {

        $this->page_data['user_id'] = $user_id;

        $this->page_data['user'] = $this->User_model->get_all();

        $this->page_data['input_fields'] = $this->User_order_model->generate_input();


        if ($_POST) {    

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'take_away' => $input['take_away'],
                    'sub_total' => $input['sub_total'],
                    'service_change' => $input['service_change'],
                    'total' => $input['total'],
                    'status' => $input['status'],
                    'created_by' => $this->session->userdata('login_id'),
                    'user_id' => $user_id,
                );

                $user_order_id = $this->User_order_model->insert($data);

                redirect("user/details/" . $user_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user_order/add");
        $this->load->view("admin/footer");
    }

    function details($user_order_id)
    {

        $where = array(
            "user_order_id" => $user_order_id
        );
        
        $user_order = $this->User_order_model->get_where($where);

        $this->page_data["user_order"] = $user_order[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user_order/details");
        $this->load->view("admin/footer");
    }

    // function edit($user_order_id)
    // {

    //     $where = array(
    //         'user_order_id' => $user_order_id
    //     );

    //     $user_order = $this->User_order_model->get_where($where);
        
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $error = false;

    //         $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

    //         $data = array(
    //             'take_away' => $input['takeaway'],
    //             'sub_total' => $input['sub_total'],
    //             'service_change' => $input['service_change'],
    //             'total' => $input['total'],
    //             'status' => 0,
    //             'modified_date' => $date->format("Y-m-d h:i:s"),
    //             'modified_by' => $this->session->userdata('login_id')
    //         );

    //         $user_id = $this->User_order_model->get_where($where)[0];

    //         $this->User_order_model->update_where($where, $data);

    //         redirect("user/details/" . $user_id, "refresh");
    //     }

        

    //     $this->page_data['user'] = $this->User_model->get_all();
    //     $this->page_data['user_order'] = $user_order[0];

    //     $this->load->view("admin/header", $this->page_data);
    //     $this->load->view("admin/user_order/edit");
    //     $this->load->view("admin/footer");
    // }

    function delete($user_order_id){

        $where = array(
            "user_order_id" => $user_order_id
        );

        $user_id = $this->User_order_model->get_where($where)[0];

        $this->User_order_model->soft_delete($user_order_id);

        redirect("user/details/" . $user_id['user_id'], "refresh");
    }

    function deliver($user_order_id)
    {
        $where = array(
            "user_order_id" => $user_order_id,
        );

        $data = array(
            "status" => 1,
        );
        
        $user_id = $this->User_order_model->get_where($where)[0];

        $this->User_order_model->update_where($where, $data);

        redirect("user/details/" . $user_id['user_id'], "refresh");
    }

    function processing($user_order_id)
    {
        $where = array(
            "user_order_id" => $user_order_id,
        );

        $data = array(
            "status" => 0,
        );

        $user_id = $this->User_order_model->get_where($where)[0];

        $this->User_order_model->update_where($where, $data);

        redirect("user/details/" . $user_id['user_id'], "refresh");
    }

}
