<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Food_models extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Food_model");
        $this->load->model("Food_model_model");
    }

    public function add($food_id)
    {

        $this->page_data['food_id'] = $food_id;

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                for ($i = 0; $i < count($input['food_model']); $i++) {
                    if (trim($input['food_model'][$i]) != "") {
                        $data = array(
                            "food_id" => $food_id,
                            "food_model" => $input['food_model'][$i],
                            "SKU" => $input['sku'][$i],
                        );

                        $this->Food_model_model->insert($data);
                    }
                }

                redirect("food/details/" . $food_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_models/add");
        $this->load->view("admin/footer");
    }

    public function details($food_id)
    {

        $where = array(
            "food_id" => $food_id,
        );

        $this->show_404_if_empty($food);

        $this->page_data["food"] = $food[0];
        $this->page_data["food_model"] = $this->Food_model_model->get_where($where);
        

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/details");
        $this->load->view("admin/footer");
    }

    // public function edit($food_model_id)
    // {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $error = false;

    //         if (!$error) {
    //             $where = array(
    //                 'food_model_id' => $food_model_id,
    //             );

    //             $data = array(
                    
    //                 "food_model" => $input['food_model'],
    //                 "SKU" => $input['sku']
    //             );

    //             $this->Food_model_model->update_where($where, $data);

    //             redirect('food/details/' . $food_id, "refresh");
    //         } else {
    //             $this->page_data["input"] = $input;
    //         }
    //     }

    //     $where = array(
    //         "food_model_id" => $food_model_id,
    //     );

    //     $food_model = $this->Food_model_model->get_where($where);
        

    //     $this->show_404_if_empty($food_model);

    //     $this->page_data["food_model"] = $food_model[0];
    //     $this->page_data['input_field'] = $this->Food_model->generate_edit_input($food_model_id);

    //     $this->load->view("admin/header", $this->page_data);
    //     $this->load->view("admin/food_models/edit");
    //     $this->load->view("admin/footer");
    // }

    function edit($food_model_id) {

        $where = array(
            'food_model_id' => $food_model_id
        );

        $food_model = $this->Food_model_model->get_where($where);

        $this->page_data['food_model'] = $food_model[0];

        $food_id = $food_model[0]['food_id'];
        $this->page_data['food_id'] = $food_id;
        $this->page_data['food_model_id'] = $food_model_id;

        if ($_POST) {
            $input = $this->input->post();

            $where = array(
                'food_model_id' => $food_model_id
            );

            $data = array(
                "food_model" => $input['food_model'],
                "SKU" => $input['SKU']
            );

            $this->Food_model_model->update_where($where, $data);

            redirect('food/details/' . $food_id, 'refresh');
        }

        $this->load->view('admin/header', $this->page_data);
        $this->load->view('admin/food_models/edit');
        $this->load->view('admin/footer');
    }

    function delete_model($food_model_id) {

        $where = array(
            'food_model_id' => $food_model_id
        );

        $data = array(
            "deleted" => 1
        );

        $food_model = $this->Food_model->get_where($where);

        $food_id = $food_model[0]['food_id'];

        $this->Food_model_model->update_where($where, $data);

        redirect('food/detail/' . $food_id, 'refresh');
    }

    // function add_stock($food_model_id) {

    //     if ($_POST) {
    //         $input = $this->input->post();

    //         $where = array(
    //             "food_model_id" => $food_model_id
    //         );

    //         $food_model = $this->Product_model->get_where($where);

    //         $data = array(
    //             "quantity" => $food_model[0]["quantity"] + $input["quantity"]
    //         );

    //         $this->Product_model->update_model_where($where, $data);

    //         die(json_encode(array(
    //             "status" => true
    //         )));
    //     }

    //     $this->page_data["food_model_id"] = $food_model_id;
    //     $where = array(
    //         "food_model_id" => $food_model_id
    //     );

    //     $food_model = $this->Food_model->get_where($where);
    //     $this->page_data["food_id"] = $food_model[0]["food_id"];

    //     $this->load->view('admin/header', $this->page_data);
    //     $this->load->view('admin/food_model/add_stock');
    //     $this->load->view('admin/footer');
    // }

}
