<?php

class Base_Controller extends CI_Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();

        $this->load->model("Admin_model");
        $this->load->model("User_model");
        $this->load->model("Teacher_model");
        $this->load->model("Parents_model");
        $this->load->model("Student_model");
        $this->load->model("Role_access_model");

        $this->load->library("Form");

        if (!$this->session->has_userdata("login_data") and (strtolower($this->uri->segment(1)) != "access" and strtolower($this->uri->segment(1)) != "api" and strtolower($this->uri->segment(1)) != "cron")) {
            redirect("access/login", "refresh");
        }

        $role_access = $this->Role_access_model->get_role_access($this->session->userdata("login_data")["role_id"]);
        $this->session->set_userdata("role_access", $role_access);

        //view control checking. if cannot view entire module is restricted
        if (strtolower($this->uri->segment(1)) != "" and !empty($this->session->userdata("role_access")[strtolower($this->uri->segment(1))]) and $this->session->userdata("role_access")[strtolower($this->uri->segment(1))]["read_control"] == 0) {
            show_404();
            //if module is not restricted, check for add, update, delete controls
        } else {
            $key = "";
            switch (strtolower($this->uri->segment(2))) {
                case "add":
                    $key = "create_control";
                    break;
                case "edit":
                    $key = "update_control";
                    break;
                case "delete":
                    $key = "delete_control";
                    break;
                default:
                    $key = "";
                    break;
            }

            if ($key != "" and $this->session->userdata("role_access")[strtolower($this->uri->segment(1))][$key] == 0) {
                show_404();
            }
        }

        // $this->debug($this->session->userdata("role_access"));

        //$this->generate_modules();
    }

    public function hash($password)
    {
        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

    public function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }

    public function check_exists($username, $exclude_id = "")
    {

        $where = array(
            "username" => $username,
        );

        if ($exclude_id == "") {

            $admin = $this->Admin_model->get_where($where);
            $user = $this->User_model->get_where($where);
            $teacher = $this->Teacher_model->get_where($where);
            $parents = $this->Parents_model->get_where($where);
            $student = $this->Student_model->get_where($where);

            if (empty($admin) and empty($user) and empty($teacher) and empty($parents) and empty($student)) {
                return false;
            } else {
                return true;
            }
        } else if ($exclude_id != "") {
            $admin = $this->Admin_model->get_where_and_primary_is_not($where, $exclude_id);
            $user = $this->User_model->get_where_and_primary_is_not($where, $exclude_id);
            $teacher = $this->Teacher_model->get_where_and_primary_is_not($where, $exclude_id);
            $parents = $this->Parents_model->get_where_and_primary_is_not($where, $exclude_id);
            $student = $this->Student_model->get_where_and_primary_is_not($where, $exclude_id);

            if (empty($admin) and empty($user) and empty($teacher) and empty($parents) and empty($student)) {
                return false;
            } else {
                return true;
            }
        }

    }

    public function show_404_if_empty($array)
    {
        if (empty($array)) {
            show_404();
        }

    }

    public function multi_image_upload($files, $field_name, $path, $single = 0)
    {
        $this->load->library('image_lib');

        if ($single == 0) {

            $files_count = count($files[$field_name]['name']);

            $urls = array();
            $thumbnails = array();

            $error = false;
            $error_message = "";
            for ($i = 0; $i < $files_count; $i++) {

                if ($error) {
                    die($error_message);
                }

                // $_FILES["image"]['name'] = $files[$field_name]['name'][$i];
                $_FILES["image"]['name'] = strtolower($path) . "_" . date("YmdHis") . "." . pathinfo($files[$field_name]['name'][$i], PATHINFO_EXTENSION);
                $_FILES["image"]['type'] = $files[$field_name]['type'][$i];
                $_FILES["image"]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
                $_FILES["image"]['error'] = $files[$field_name]['error'][$i];
                $_FILES["image"]['size'] = $files[$field_name]['size'][$i];

                // $this->debug($_FILES);

                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path" => "./images/" . $path . "/",
                    "path" => "/images/" . $path . "/",
                );

                $this->load->library("upload");
                $this->upload->initialize($config);

                if ($this->upload->do_upload("image")) {
                    $url = $config['path'] . $this->upload->data()['file_name'];

                    array_push($urls, $url);

                    $image_data = $this->upload->data();

                    // $this->debug($image_data);

                    $thumbnail = $image_data['raw_name'] . "_thumb" . $image_data['file_ext'];

                    $resize_config = array(
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'new_image' => $image_data['file_path'] . $thumbnail,
                        'maintain_ratio' => true,
                        'created_thumb' => true,
                        'width' => 500,
                        'height' => 500,
                    );

                    $this->image_lib->clear();
                    $this->image_lib->initialize($resize_config);
                    $this->image_lib->resize();

                    array_push($thumbnails, $image_data['file_path'] . $thumbnail);
                } else {
                    $error = true;
                    $error_message = $this->upload->display_errors();
                }
            }

            $data = array(
                "urls" => $urls,
                "thumbnails" => $thumbnails,
                "error" => $error,
                "error_message" => $error_message,
            );
        } else if ($single == 1) {
            $url = "";
            $thumbnail_url = "";
            $error = false;
            $error_message = "";
            if (!empty($files[$field_name]['name'])) {

                $_FILES["image"]['name'] = strtolower($path) . "_" . date("YmdHis") . "." . pathinfo($files[$field_name]['name'], PATHINFO_EXTENSION);
                $_FILES["image"]['type'] = $files[$field_name]['type'];
                $_FILES["image"]['tmp_name'] = $files[$field_name]['tmp_name'];
                $_FILES["image"]['error'] = $files[$field_name]['error'];
                $_FILES["image"]['size'] = $files[$field_name]['size'];

                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path" => "./images/" . $path . "/",
                    "path" => "/images/" . $path . "/",
                );

                $this->load->library("upload");
                $this->upload->initialize($config);

                if ($this->upload->do_upload("image")) {
                    $url = $config['path'] . $this->upload->data()['file_name'];

                    $image_data = $this->upload->data();

                    // $this->debug($image_data);

                    $thumbnail = $image_data['raw_name'] . "_thumb" . $image_data['file_ext'];

                    $resize_config = array(
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'new_image' => $image_data['file_path'] . $thumbnail,
                        'maintain_ratio' => true,
                        'created_thumb' => true,
                        'width' => 500,
                        'height' => 500,
                    );

                    $this->image_lib->clear();
                    $this->image_lib->initialize($resize_config);
                    $this->image_lib->resize();

                    $thumbnail_url = "/images/" . $path . "/" . $thumbnail;
                } else {
                    $error = true;
                    $error_message = $this->upload->display_errors();
                }
            } else {
                $error = true;
                $error_message = "Please upload an image";
            }

            $data = array(
                "urls" => $url,
                "thumbanils" => $thumbnail_url,
                "error" => $error,
                "error_message" => $error_message,
            );
        }

        $config = array();

        return $data;
    }

    public function get_thumb($array, $key)
    {
        if (!empty($array)) {
            $i = 0;
            foreach ($array as $row) {
                $extension_pos = strrpos($row[$key], '.'); // find position of the last dot, so where the extension starts
                // temporary commenting off
                $thumb = substr($row[$key], 0, $extension_pos) . '_thumb' . substr($row[$key], $extension_pos);
                //   $thumb = substr($row[$key], 0, $extension_pos) . '' . substr($row[$key], $extension_pos);
                $array[$i]["thumb"] = $thumb;
                // $array[$i]["thumbnail"] = $thumb;
                $i++;
            }
            return $array;
        }

    }
}
