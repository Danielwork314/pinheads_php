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
        $this->load->model("Project_report_model");
        $this->load->model("Project_report_item_model");
        $this->load->model("Project_report_image_model");
        $this->load->model("Role_access_model");
    }

    function getLocations()
    {
        $search = $this->input->post("search");

        $sql = "SELECT * FROM outlet WHERE outlet LIKE ? OR address_2 LIKE ? OR customer_name LIKE ? or customer_code LIKE ?";
        $result = $this->db->query($sql, array(
            "%" . $search . "%",
            "%" . $search . "%",
            "%" . $search . "%",
            "%" . $search . "%"
        ))->result_array();

        die(json_encode(array(
            "status" => true,
            "data" => $result
        )));
    }


    function getProducts()
    {

        $search = $this->input->post("search");
        $sql = "SELECT * FROM item LEFT JOIN item_category ON item.item_category_id = item_category.item_category_id WHERE UPPER(item.item) LIKE UPPER(?) or UPPER(item_category.name) LIKE UPPER(?) ";
        $result = $this->db->query($sql, array(
            "%" . $search . "%",
            "%" . $search . "%"
        ))->result_array();

        die(json_encode(array(
            "status" => true,
            "data" => $result,
        )));
    }

    function loadProjectReportContent()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "project_report_id" => $input["project_report_id"]
            );

            $project_report = $this->Project_report_model->get_where($where);

            $this->page_data["project_report"] = $project_report[0];
            $this->page_data["project_report_item"] = $this->Project_report_item_model->get_where_with_item($where);
            $this->page_data["project_report_image"] = $this->Project_report_image_model->get_where($where);

            $this->load->view("admin/ajax/project_report_modal", $this->page_data);
        }
    }

    function editRoleAccessContent()
    {
        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                "role_access_id" => $input["role_access_id"]
            );

            $this->page_data["role_access"] = $this->Role_access_model->get_where($where)[0];

            $this->load->view("admin/ajax/edit_role_access_content", $this->page_data);
        }
    }

    function deleteProjectReportImages()
    {
        if ($_POST) {
            $input = $this->input->post();

            foreach($input["project_report_image_id"] as $row){
                $this->Project_report_image_model->hard_delete($row);
            }
        }
    }
}
