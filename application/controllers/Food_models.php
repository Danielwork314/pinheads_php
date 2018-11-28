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

    function add($food_id) {

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


    function edit($food_model_id) {

        $where = array(
            'food_model_id' => $food_model_id
        );

        $food_model = $this->Food_model_model->get_where($where);

        $this->show_404_if_empty($food_model);

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

    function delete($food_model_id) {

        $where = array(
            'food_model_id' => $food_model_id
        );

        $data = array(
            "deleted" => 1
        );

        $food_model = $this->Food_model_model->get_where($where);

        $food_id = $food_model[0]['food_id'];

        $this->Food_model_model->update_where($where, $data);

        redirect('food/details/' . $food_id, 'refresh');
    }

}
