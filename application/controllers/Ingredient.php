<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ingredient extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Ingredient_model");
       
    }

    public function index()
    {
        $this->page_data["ingredient"] = $this->Ingredient_model->get_all();
        // $this->debug($this->page_data["ingredient"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/ingredient/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'ingredient_title' => $input['ingredient_title'],
                'created_by' => $this->session->userdata('login_id'),
            );

            $this->Ingredient_model->insert($data);

            redirect("ingredient", "refresh");
        }

        $this->page_data['ingredient'] = $this->Ingredient_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/ingredient/add");
        $this->load->view("admin/footer");
    }

    function details($ingredient_id)
    {

        $where = array(
            "ingredient_id" => $ingredient_id
        );
        // $this->debug($pricing_id);
        $ingredient = $this->Ingredient_model->get_where($where);

        $this->page_data["ingredient"] = $ingredient[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/ingredient/details");
        $this->load->view("admin/footer");
    }

    function edit($ingredient_id)
    {

        $where = array(
            'ingredient_id' => $ingredient_id
        );

        $ingredient = $this->Ingredient_model->get_where($where);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
            $data = array(
                'ingredient_title' => $input['ingredient_title'],
                'created_by' => $this->session->userdata('login_id'),
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id')
            );

            $this->Ingredient_model->update_where($where, $data);

            redirect("ingredient", "refresh");
        }

        $this->page_data['ingredient'] = $ingredient[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/ingredient/edit");
        $this->load->view("admin/footer");
    }

    function delete($ingredient_id){

        $this->Ingredient_model->soft_delete($ingredient_id);
        redirect("ingredient", "refresh");
    }

}
