<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Table extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Table_model");
       
    }

    public function index()
    {
        $this->page_data["table"] = $this->Table_model->get_all();
        // $this->debug($this->page_data["table"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['table'] = $this->Table_model->get_all();

        $this->page_data['input_field'] = $this->Table_model->generate_input();

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'table_no' => $input['table_no'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Table_model->insert($data);

                redirect("table", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
           
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table/add");
        $this->load->view("admin/footer");
    }

    function details($table_id)
    {

        $where = array(
            "table_id" => $table_id
        );
        // $this->debug($table_id);
        $table = $this->Table_model->get_where($where);

        $this->page_data["table"] = $table[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table/details");
        $this->load->view("admin/footer");
    }

    function edit($table_id)
    {

        $where = array(
            'table_id' => $table_id
        );

        $table = $this->Table_model->get_where($where);

        $this->page_data['table'] = $table[0];

        $this->page_data['input_field'] = $this->Table_model->generate_edit_input($table_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
                
                $data = array(

                    'table_no' => $input['table_no'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d h:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Table_model->update_where($where, $data);

                redirect("table", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table/edit");
        $this->load->view("admin/footer");
    }

    function delete($table_id){

        $this->Table_model->soft_delete($table_id);
        redirect("table", "refresh");
    }

}
