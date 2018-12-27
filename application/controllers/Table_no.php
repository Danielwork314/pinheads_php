<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Table_no extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Table_no_model");
       
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "table_no.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $table_no_id = $this->Table_no_model->get_where($where);
            $this->page_data["table_no"] = $table_no_id;

        }else{
            
            $this->page_data["table_no"] = $this->Table_no_model->get_all();
        }

        // $this->debug($this->page_data["table"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_no/all");
        $this->load->view("admin/footer");
    }

    function add($store_id)
    {

        $this->page_data['table_no'] = $this->Table_no_model->get_all();
        $this->page_data['input_field'] = $this->Table_no_model->generate_input();
        $this->page_data['store_id'] = $store_id;

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'table_no' => $input['table_no'],
                    'store_id' => $store_id,
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Table_no_model->insert($data);

                redirect("store/details/" . $store_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
           
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_no/add");
        $this->load->view("admin/footer");
    }

    function details($table_no_id)
    {

        $where = array(
            "table_no_id" => $table_no_id
        );
        // $this->debug($table_no_id);
        $table_no = $this->Table_no_model->get_where($where);

        $this->page_data["table_no"] = $table_no[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_no/details");
        $this->load->view("admin/footer");
    }

    function edit($table_no_id)
    {

        $where = array(
            'table_no_id' => $table_no_id
        );

        $table_no = $this->Table_no_model->get_where($where);

        $this->page_data["table_no"] = $table_no[0];

        $this->page_data['input_field'] = $this->Table_no_model->generate_edit_input($table_no_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
                
                $data = array(

                    'table_no' => $input['table_no'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Table_no_model->update_where($where, $data);

                redirect("table_no", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/table_no/edit");
        $this->load->view("admin/footer");
    }

    function delete($table_no_id){

        $where = array(
            'table_no_id' => $table_no_id
        );

        $store = $this->Table_no_model->get_where($where)[0];

        $this->Table_no_model->hard_delete($table_no_id);
        redirect("store/details/". $store['store_id'], "refresh");
    }

}
