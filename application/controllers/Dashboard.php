<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();
    }

    public function index()
    {

        if ($this->session->userdata("login_data")["type"] == "USER") {
            $this->page_data["ongoing_projects"] = $this->Project_outlet_model->get_reports_behind($this->session->userdata("login_id"));
            // $this->debug($this->page_data["ongoing_projects"]["ongoing_projects"][0]["project_outlets"]);
            $this->page_data["undated_projects"] = $this->Project_outlet_model->get_undated($this->session->userdata("login_id"));
            $this->page_data["unpublished_reports"] = $this->Project_outlet_model->get_unpublished_reports($this->session->userdata("login_id"));
            // $this->debug($this->page_data["unpublished_reports"]);
        }

        $this->load->view("admin/header", $this->page_data);
        if ($this->session->userdata("login_data")["type"] == "USER") {
            $this->load->view("admin/dashboard/user");
        }
        $this->load->view("admin/footer");
    }

    public function temp() {
        $uncompletedReports = array();
        $projects = array();
        $outstanding_reports = array();
        $total_pending_reports = 0;
     
        if ($this->session->userdata("login_data")['role'] == "User"){
            $projects = $this->Project_model->get_supervisor_projects_where($this->session->userdata("login_data")['user_id']);

            // get outstanding reports
            for($j = 0; $j < count($projects); $j++){
                $pending_reports = $this->Project_model->get_project_pending_report_by_supervisor($projects[$j]['project_id'],$this->session->userdata("login_data")['user_id']);
                $projects[$j]['pending_reports'] = $pending_reports['reports'];
                $projects[$j]['total_pending_reports'] = $pending_reports['total'];
                $total_pending_reports += $pending_reports['total'];
            }
            
            $this->page_data["ongoing_projects"] = $projects;
        }else{
            $this->page_data["ongoing_projects"] = $this->Project_model->get_ongoing_projects();
        }
        
        $this->page_data['total_pending_reports'] = $total_pending_reports;
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("user/Dashboard/main");
        $this->load->view("admin/footer");
    }


}
