<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Store_model");
        $this->load->model("Performance_model");
        $this->load->model("Order_food_model");
        $this->load->model("Sales_model");

    }

    public function index()
    {
        $where = array(
            "feature_id" => 1,
        );

        // $stores = $this->Store_model->get_where($where);
        // die(var_dump($stores));
        //get total sales
        // if($this->session->userdata('login_data')['role_id'] < 3){

        //     $total_sales = $this->Performance_model->get_all_total_sales();
            
        // } else {

        //     $where = array(
        //         "vendor_id" => $this->session->userdata('login_id'),
        //     );

        //     $store = $this->Store_model->get_where($where);

        //     $where = array(
        //         "store_id" => $store[0]['store_id']
        //     );

        //     $total_sales = $this->Performance_model->get_total_sales($where);
        // }

        // $jan_sales = 0;
        // $feb_sales = 0;
        // $mar_sales = 0;
        // $apr_sales = 0;
        // $may_sales = 0;
        // $jun_sales = 0;
        // $jul_sales = 0;
        // $aug_sales = 0;
        // $sep_sales = 0;
        // $oct_sales = 0;
        // $nov_sales = 0;
        // $dec_sales = 0;

        // if (!empty($total_sales)) {
        //     foreach ($total_sales as $row) {

        //         $month = date("M", strtotime($row["created_date"]));

        //         switch ($month) :
        //             case "Jan":

        //             $jan_sales = $jan_sales + round($row["total"], 2);

        //             break;
        //         case "Feb":

        //             $feb_sales = $feb_sales + round($row["total"], 2);

        //             break;
        //         case "Mar":

        //             $mar_sales = $mar_sales + round($row["total"], 2);

        //             break;
        //         case "Apr":

        //             $apr_sales = $apr_sales + round($row["total"], 2);

        //             break;
        //         case "May":
        //             $may_sales = $may_sales + round($row["total"], 2);

        //             break;
        //         case "Jun":

        //             $jun_sales = $jun_sales + round($row["total"], 2);

        //             break;
        //         case "Jul":

        //             $jul_sales = $jul_sales + round($row["total"], 2);

        //             break;
        //         case "Aug":

        //             $aug_sales = $aug_sales + round($row["total"], 2);

        //             break;
        //         case "Sep":

        //             $sep_sales = $sep_sales + round($row["total"], 2);

        //             break;
        //         case "Oct":

        //             $oct_sales = $oct_sales + round($row["total"], 2);

        //             break;
        //         case "Nov":

        //             $nov_sales = $nov_sales + round($row["total"], 2);

        //             break;
        //         case "Dec":

        //             $dec_sales = $dec_sales + round($row["total"], 2);

        //             break;
        //         default:

        //             die("error");

        //             break;

        //         endswitch;
        //     }
        // }

        // $this->page_data["total_sales_year"] = date("Y");

        // $total_sales_report = array(
        //     "jan" => $jan_sales,
        //     "feb" => $feb_sales,
        //     "mar" => $mar_sales,
        //     "apr" => $apr_sales,
        //     "may" => $may_sales,
        //     "jun" => $jun_sales,
        //     "jul" => $jul_sales,
        //     "aug" => $aug_sales,
        //     "sep" => $sep_sales,
        //     "oct" => $oct_sales,
        //     "nov" => $nov_sales,
        //     "dec" => $dec_sales,
        // );

        // $this->page_data["total_sales_report"] = $total_sales_report;

        // if(count($store) > 1){
            
        //     $this->page_data["multiple"] = 1;
        // } else {

        //     $this->page_data["multiple"] = 0;
        // }

        //get vendor sales

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

        // $this->load->view("admin/header", $this->page_data);
        // $this->load->view("admin/dashboard/dashboard");
        $this->load->view("admin/footer");
    }

    // public function temp() {
    //     $uncompletedReports = array();
    //     $projects = array();
    //     $outstanding_reports = array();
    //     $total_pending_reports = 0;
     
    //     if ($this->session->userdata("login_data")['role'] == "User"){
    //         $projects = $this->Project_model->get_supervisor_projects_where($this->session->userdata("login_data")['user_id']);

    //         // get outstanding reports
    //         for($j = 0; $j < count($projects); $j++){
    //             $pending_reports = $this->Project_model->get_project_pending_report_by_supervisor($projects[$j]['project_id'],$this->session->userdata("login_data")['user_id']);
    //             $projects[$j]['pending_reports'] = $pending_reports['reports'];
    //             $projects[$j]['total_pending_reports'] = $pending_reports['total'];
    //             $total_pending_reports += $pending_reports['total'];
    //         }
            
    //         $this->page_data["ongoing_projects"] = $projects;
    //     }else{
    //         $this->page_data["ongoing_projects"] = $this->Project_model->get_ongoing_projects();
    //     }
        
    //     $this->page_data['total_pending_reports'] = $total_pending_reports;
        
    //     $this->load->view("admin/header", $this->page_data);
    //     $this->load->view("user/Dashboard/main");
    //     $this->load->view("admin/footer");
    // }


}
