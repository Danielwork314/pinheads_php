<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Admin_model");
        $this->load->model("Food_model");
        $this->load->model("Billing_address_model");
        $this->load->model("Card_model");
        $this->load->model("User_model");
        $this->load->model("Dressing_model");
        $this->load->model("Customize_model");
        // $this->load->model("Project_report_model");
        // $this->load->model("Project_report_item_model");
        // $this->load->model("Project_report_image_model");
        $this->load->model("Role_access_model");
    
    }

    // function getLocations()
    // {
    //     $search = $this->input->post("search");

    //     $sql = "SELECT * FROM outlet WHERE outlet LIKE ? OR address_2 LIKE ? OR customer_name LIKE ? or customer_code LIKE ?";
    //     $result = $this->db->query($sql, array(
    //         "%" . $search . "%",
    //         "%" . $search . "%",
    //         "%" . $search . "%",
    //         "%" . $search . "%"
    //     ))->result_array();

    //     die(json_encode(array(
    //         "status" => true,
    //         "data" => $result
    //     )));
    // }


    // function getProducts()
    // {

    //     $search = $this->input->post("search");
    //     $sql = "SELECT * FROM item LEFT JOIN item_category ON item.item_category_id = item_category.item_category_id WHERE UPPER(item.item) LIKE UPPER(?) or UPPER(item_category.name) LIKE UPPER(?) ";
    //     $result = $this->db->query($sql, array(
    //         "%" . $search . "%",
    //         "%" . $search . "%"
    //     ))->result_array();

    //     die(json_encode(array(
    //         "status" => true,
    //         "data" => $result,
    //     )));
    // }

    // function loadProjectReportContent()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             "project_report_id" => $input["project_report_id"]
    //         );

    //         $project_report = $this->Project_report_model->get_where($where);

    //         $this->page_data["project_report"] = $project_report[0];
    //         $this->page_data["project_report_item"] = $this->Project_report_item_model->get_where_with_item($where);
    //         $this->page_data["project_report_image"] = $this->Project_report_image_model->get_where($where);

    //         $this->load->view("admin/ajax/project_report_modal", $this->page_data);
    //     }
    // }

    // function editRoleAccessContent()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             "role_access_id" => $input["role_access_id"]
    //         );

    //         $this->page_data["role_access"] = $this->Role_access_model->get_where($where)[0];

    //         $this->load->view("admin/ajax/edit_role_access_content", $this->page_data);
    //     }
    // }

    // function deleteProjectReportImages()
    // {
    //     if ($_POST) {
    //         $input = $this->input->post();

    //         foreach($input["project_report_image_id"] as $row){
    //             $this->Project_report_image_model->hard_delete($row);
    //         }
    //     }
    // }

    function getStoreMenu(){

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'food.store_id' => $input['store_id']
            );

            $this->page_data['food'] = $this->Food_model->get_where($where);

            $this->load->view("admin/ajax/change_selection_food", $this->page_data);

        }
    }

    function getBillingAddress(){

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'billing_address.user_id' => $input['user_id']
            );

            $this->page_data['billing_address'] = $this->Billing_address_model->get_where($where);

            $this->load->view("admin/ajax/change_billing_address", $this->page_data);

        }
    }

    function getCard(){

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'user_id' => $input['user_id']
            );

            $this->page_data['card'] = $this->Card_model->get_where($where);

            $this->load->view("admin/ajax/change_card", $this->page_data);

        }
    }

    function addOrderFood(){
        
        if ($_POST) {

            $input = $this->input->post();

            $where = array(
                'food_id' => $input['food_id']
            );
            
            $food = $this->Food_model->get_where($where)[0];

            die(json_encode(array(
                "status"  => true,
                "message" => "Submit Successful",
                "data" => $food,               
            )));
        }
    }

    function addDressing(){
        
        if ($_POST) {

            $input = $this->input->post();

            $where = array(
                'dressing_id' => $input['dressing_id']
            );
            
            $dressing = $this->Dressing_model->get_where($where)[0];

            die(json_encode(array(
                "status"  => true,
                "message" => "Submit Successful",
                "data" => $dressing,               
            )));
        }
    }

    function addCustomize(){
        
        if ($_POST) {

            $input = $this->input->post();

            $where = array(
                'customize_id' => $input['customize_id']
            );
            
            $customize = $this->Customize_model->get_where($where)[0];

            die(json_encode(array(
                "status"  => true,
                "message" => "Submit Successful",
                "data" => $customize,               
            )));
        }
    }

    function addUser(){
        
        if ($_POST) {

            $input = $this->input->post();

            $where = array(
                'user_id' => $input['user_id']
            );
            
            $user = $this->User_model->get_where($where)[0];

            die(json_encode(array(
                "status"  => true,
                "message" => "Submit Successful",
                "data" => $user,               
            )));
        }
    }
}
