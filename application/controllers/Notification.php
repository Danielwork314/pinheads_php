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
        $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['notification'] = $this->Notification_model->get_all();
        $this->page_data['input_field'] = $this->Notification_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            // die(var_dump($input));

            $error = false;

            if(!$error){

                $data = array(
                    'notification' => $input['notification'],
                    'description' => $input['description'],
                    'end_date' => date('Y-m-d', strtotime($input['end_date'])),
                    'end_time' => date('H:m:s', strtotime($input['end_time'])),
                    'created_by' => $this->session->userdata('login_id'),
                );

                if($input['user_id'] == 0){

                    $user = $this->User_model->get_all();

                    foreach($user as $row){

                        $data['user_id'] = $row['user_id'];

                        $this->Notification_model->insert($data);
                    }

                } else {

                    $data['user_id'] = $input['user_id'];

                    $this->Notification_model->insert($data);
                }

                redirect("notification", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

            
        }

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

        $notification = $this->Notification_model->get_where($where);

        $this->page_data['notification'] = $notification[0];

        $this->page_data['user'] = $this->User_model->get_all();

        $this->page_data['input_field'] = $this->Notification_model->generate_edit_input($notification_id);
        
        if ($_POST) {

            $input = $this->input->post();

            // die(var_dump($input));

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(

                    'notification' => $input['notification'],
                    'description' => $input['description'],
                    'end_date' => date('Y-m-d', strtotime($input['end_date'])),
                    'end_time' => date('H:m:s', strtotime($input['end_time'])),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id'),
                    'user_id' => $input['user_id'],
                
                );

                $this->Notification_model->update_where($where, $data);

                redirect("notification", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/notification/edit");
        $this->load->view("admin/footer");
    }

    function delete($notification_id){

        $this->Notification_model->soft_delete($notification_id);
        redirect("notification", "refresh");
    }

}
