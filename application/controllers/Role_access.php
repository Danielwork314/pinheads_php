<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_access extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Role_access_model");
        $this->load->model("Module_model");
        $this->load->model("Role_model");

        $this->page_data = array();
    }

    public function index()
    {
        $this->page_data["role_access"] = $this->Role_access_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/role_access/all");
        $this->load->view("admin/footer");
    }

    public function edit($role_access_id)
    {
        $redirect = false;

        $where = array(
            "role_access_id" => $role_access_id,
        );

        $role_access = $this->Role_access_model->get_where($where)[0];

        $this->show_404_if_empty($role_access);

        if ($role_access["module"] == "Role Access") {
            $redirect = true;
        }

        $input = $this->input->post();

        $data = $input;

        if (empty($input["read_control"])) {
            $data["read_control"] = 0;
        }
        if (empty($input["create_control"])) {
            $data["create_control"] = 0;
        }
        if (empty($input["delete_control"])) {
            $data["delete_control"] = 0;
        }
        if (empty($input["update_control"])) {
            $data["update_control"] = 0;
        }

        $this->Role_access_model->update_where($where, $data);

        die(json_encode(array(
            "status" => true,
            "redirect" => $redirect,
        )));
    }

    public function generate_role_access()
    {

        $modules = $this->Module_model->get_all();
        $roles = $this->Role_model->get_all();
        $allControlRoleId = min($roles);

        $module_urls = array();
        if (!empty($modules)) {
            foreach ($modules as $row) {
                array_push($module_urls, $row["url"]);
            }
        }

        // $this->debug($module_urls);

        $controllers = array();
        $this->load->helper('file');

        // Scan files in the /application/controllers directory
        // Set the second param to TRUE or remove it if you
        // don't have controllers in sub directories
        $files = get_dir_file_info(APPPATH . 'controllers', false);

        // Loop through file names removing .php extension
        foreach (array_keys($files) as $file) {
            $controllers[] = str_replace('.php', '', $file);
        }

        $exclude = array(
            "access",
            "dashboard",
            "ajax",
            "welcome",
            "index.html",
        );

        $i = 0;

        foreach ($controllers as $row) {
            if (in_array(strtolower($row), $exclude)) {
                unset($controllers[$i]);
            }
            $i++;
        }

        $controllers = array_values($controllers);

        foreach ($controllers as $row) {
            if (!in_array(strtolower($row), $module_urls)) {
                $data = array(
                    "module" => ucwords(str_replace("_", " ", $row)),
                    "url" => strtolower($row),
                );

                $module_id = $this->Module_model->insert($data);

                foreach ($roles as $role_row) {
                    if ($role_row["role_id"] == $allControlRoleId["role_id"]) {
                        $data = array(
                            "role_id" => $role_row['role_id'],
                            "module_id" => $module_id,
                            "create_control" => 1,
                            "read_control" => 1,
                            "update_control" => 1,
                            "delete_control" => 1,
                        );
                    } else {
                        $data = array(
                            "role_id" => $role_row['role_id'],
                            "module_id" => $module_id,
                            "create_control" => 0,
                            "read_control" => 1,
                            "update_control" => 0,
                            "delete_control" => 0,
                        );
                    }
                    $this->Role_access_model->insert($data);
                }
            }
        }
        die("role access generated");
    }
}
