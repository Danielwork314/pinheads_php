<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Table_position extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Table_position_model");
       
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "table_position.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $table_position_id = $this->Table_position_model->get_where($where);
            $this->page_data["table_position"] = $table_position_id;

        }else{
            
            $this->page_data["table_position"] = $this->Table_position_model->get_all();
        }

        // $this->debug($this->page_data["table"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_position/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['table_position'] = $this->Table_position_model->get_all();

        $this->page_data['input_field'] = $this->Table_position_model->generate_input();

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'table_position' => $input['table_position'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Table_position_model->insert($data);

                redirect("table_position", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
           
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_position/add");
        $this->load->view("admin/footer");
    }

    function details($table_position_id)
    {

        $where = array(
            "table_position_id" => $table_position_id
        );
        // $this->debug($table_position_id);
        $table_position = $this->Table_position_model->get_where($where);

        $this->page_data["table_position"] = $table_position[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_position/details");
        $this->load->view("admin/footer");
    }

    function edit($table_position_id)
    {

        $where = array(
            'table_position_id' => $table_position_id
        );

        $table_position = $this->Table_position_model->get_where($where);

        $this->page_data["table_position"] = $table_position[0];

        $this->page_data['input_field'] = $this->Table_position_model->generate_edit_input($table_position_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
                
                $data = array(

                    'table_position' => $input['table_position'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Table_position_model->update_where($where, $data);

                redirect("table_position", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_position/edit");
        $this->load->view("admin/footer");
    }

    function delete($table_position_id){

        $this->Table_position_model->soft_delete($table_position_id);
        redirect("table_position", "refresh");
    }

}
