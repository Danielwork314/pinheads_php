<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Announcement_model");
        $this->load->model("Notification_model");

    }

    public function index()
    {

        $this->page_data['announcement'] = $this->Announcement_model->get_all();
        $this->page_data['notification'] = $this->Notification_model->get_all();

        // die(var_dump($this->page_data['announcement']));

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/dashboard/dashboard");
        $this->load->view("admin/footer");
    }

    public function add_announcement(){

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                $data = array(
                    'announcement' => $input['announcement'],
                    'description' => $input['description'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Announcement_model->insert($data);

                redirect("dashboard", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data['input_field'] = $this->Announcement_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/dashboard/add_announcement");
        $this->load->view("admin/footer");
    }

    public function add_notification(){

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                $data = array(
                    'notification' => $input['notification'],
                    'description' => $input['description'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Notification_model->insert($data);

                redirect("dashboard", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data['input_field'] = $this->Notification_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/dashboard/add_notification");
        $this->load->view("admin/footer");
    }

}
