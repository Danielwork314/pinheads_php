<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Notification_model");
        $this->load->model("User_model");
    }

    public function index()
    {
        $this->page_data["notification"] = $this->Notification_model->get_all();
        // $this->debug($this->page_data["notification"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/notification/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'notification_title' => $input['notification_title'],
                'notification_description' => $input['notification_description'],
                'end_date' => $input['end_date'],
                'created_by' => $this->session->userdata('login_id'),
                'user_id' => $input['user_id'],
            );

            $this->Notification_model->insert($data);

            redirect("notification", "refresh");
        }

        $this->page_data['notification'] = $this->Notification_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/notification/add");
        $this->load->view("admin/footer");
    }

    function details($notification_id)
    {

        $where = array(
            "notification_id" => $notification_id
        );
        // $this->debug($notification_id);
        $notification = $this->Notification_model->get_where($where);

        $this->page_data["notification"] = $notification[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/notification/details");
        $this->load->view("admin/footer");
    }

    function edit($notification_id)
    {

        $where = array(
            'notification_id' => $notification_id
        );

        $notification_id = $this->Notification_model->get_where($where);
        
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

          
            $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

            $data = array(

                'notification_title' => $input['notification_title'],
                'notification_description' => $input['notification_description'],
                'end_date' => $input['end_date'],
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id'),
                'user_id' => $input['user_id'],
            
            );

            $this->Notification_model->update_where($where, $data);

            redirect("notification", "refresh");
        }

        $this->page_data['user'] = $this->User_model->get_all();

        $this->page_data['notification'] = $notification[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/notification/edit");
        $this->load->view("admin/footer");
    }

    function delete($notification_id){

        $this->Notification_model->soft_delete($notification_id);
        redirect("notification", "refresh");
    }

}
