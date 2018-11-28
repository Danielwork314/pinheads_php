<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Card extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Card_model");
        $this->load->model("Card_type_model");
        $this->load->model("User_model");
    }

    function add($user_id)
    {

        $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['card_type'] = $this->Card_type_model->get_all();
        $this->page_data['input_field'] = $this->Card_model->generate_input();

        $where = array(
            'user_id' => $user_id
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];
        $this->page_data['user_id'] = $user_id;

        if ($_POST) {    

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'card'          => $input['card'],
                    'bank'          => $input['bank'],
                    'card_type_id'  => $input['card_type_id'],
                    'cvv'           => $input['cvv'],
                    'month'         => $input['month'],
                    'year'          => $input['year'],
                    'firstname'     => $input['firstname'],
                    'lastname'      => $input['lastname'],
                    'address'       => $input['address'],
                    'region'        => $input['region'],
                    'phone'         => $input['phone'],
                    'email'         => $input['email'],
                    'created_by'    => $this->session->userdata('login_id'),
                    'user_id'       => $user_id,
                );

                $card_id = $this->Card_model->insert($data);

                redirect("user/details/" . $user_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/card/add");
        $this->load->view("admin/footer");
    }

    function details($card_id)
    {

        $where = array(
            "card_id" => $card_id
        );
        
        $card = $this->Card_model->get_where($where);

        $this->page_data["card"] = $card[0];
        $where = array(
            'user_id' => $card[0]['user_id']
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];
        $this->page_data['user_id'] = $card[0]['user_id'];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/card/details");
        $this->load->view("admin/footer");
    }

    function edit($card_id)
    {

        $this->page_data['input_field'] = $this->Card_model->generate_edit_input($card_id);

        $where = array(
            'card_id' => $card_id
        );

        $card = $this->Card_model->get_where($where);

        $this->page_data['card'] = $card[0];

        $where = array(
            'user_id' => $card[0]['user_id']
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];
        $this->page_data['user_id'] = $card[0]['user_id'];
        
        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(
                    'card'              => $input['card'],
                    'bank'              => $input['bank'],
                    'card_type_id'      => $input['card_type_id'],
                    'cvv'               => $input['cvv'],
                    'month'             => $input['month'],
                    'year'              => $input['year'],
                    'firstname'         => $input['firstname'],
                    'lastname'          => $input['lastname'],
                    'address'           => $input['address'],
                    'region'            => $input['region'],
                    'phone'             => $input['phone'],
                    'email'             => $input['email'],
                    'modified_date'     => $date->format("Y-m-d h:i:s"),
                    'modified_by'       => $this->session->userdata('login_id')
                );

                $user_id = $this->Card_model->get_where($where)[0];

                $this->Card_model->update_where($where, $data);

                redirect("user/details/" . $card[0]['user_id'], "refresh");
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/card/edit");
        $this->load->view("admin/footer");
    }

    function delete($card_id){

        $where = array(
            "card_id" => $card_id
        );

        $user_id = $this->Card_model->get_where($where)[0];


        $this->Card_model->soft_delete($card_id);
        redirect("user/details/" . $user_id['user_id'], "refresh");
    }

}
