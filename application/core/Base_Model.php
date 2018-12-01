<?php

class Base_Model extends CI_Model
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $table_name;
    /**
     * This model's default primary key or unique identifier.
     * Used by the get(), update() and () functions.
     */
    protected $primary_key;
    /**
     * This model's default user updated ID. Default is zero
     */
    protected $user_id = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('inflector');
        $this->_fetch_table();
        $this->_fetch_table_primary_key();
    }

    /**
     * Guess the table name by the model name
     */
    private function _fetch_table()
    {
        if ($this->table_name == null) {
            $this->table_name = preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this)));
        }
    }

    /**
     * Guess the table name by the model name + '_id'
     */
    private function _fetch_table_primary_key()
    {
        if ($this->primary_key == null) {
            $this->primary_key = preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this))) . '_id';
        }
    }

    public function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }

    public function get_all()
    {
        $fields = $this->db->list_fields($this->table_name);

        $deleted = false;
        foreach ($fields as $row) {
            if ($row == "deleted") {
                $deleted = true;
            }
        }

        $this->db->select("*");
        $this->db->from($this->table_name);
        if ($deleted) {
            $this->db->where($this->table_name . ".deleted", 0);
        }

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_with_role()
    {
        $this->db->select("*, role.role AS role");
        $this->db->from($this->table_name);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where($this->table_name . ".deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where_with_role($where)
    {
        $this->db->select("*, role.role AS role");
        $this->db->from($this->table_name);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where($this->table_name . ".deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where_and_primary_is_not($where, $primary_key)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key . "!=" . $primary_key);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);

        return $this->db->insert_id();
    }

    public function update_where($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table_name, $data);

        return $this->db->insert_id();
    }

    public function soft_delete($primary_key)
    {
        $data = array(
            "deleted" => 1,
        );

        $this->db->where($this->primary_key, $primary_key);
        $this->db->update($this->table_name, $data);
    }

    public function hard_delete($primary_key)
    {
        $this->db->where($this->primary_key, $primary_key);
        $this->db->delete($this->table_name);
    }

    public function soft_delete_where($where)
    {
        $this->db->where($where);
        $this->db->update($this->table_name, $data);
    }

    public function hard_delete_where($where)
    {
        $this->db->where($where);
        $this->db->delete($this->table_name);
    }

    public function login($username, $password)
    {

        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("username = ", $username);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function generate_input()
    {
        $fields = $this->db->field_data($this->table_name);

        $input_fields = array();
        foreach ($fields as $row) {
            $label = ucwords(str_replace("_", " ", $row->name));

            $html = '<div class="form-group">';
            if (($row->type == "int" or $row->type == "decimal") and substr($row->name, -3) != "_id") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="number" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required step="any">';
            } else if ($row->type == "longtext" or $row->type == "text" or $row->type == "longblob") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<textarea class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required rows="5"></textarea>';
            } else if ($row->name == "thumbnail" or $row->name == "image" or $row->name == "banner" or $row->name == "banner_xs") {
                $html .= '<div id="preview_' . $row->name . '" class="upload_preview"></div>';
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="file" class="form-control image_input" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->name == "password") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="password" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->name == "email") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="email" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->type == "date") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="text" class="form-control datepicker" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if (substr($row->name, -3) == "_id" and substr($row->name, 0, -3) != $this->table_name) {
                if (($this->db->table_exists(substr($row->name, 0, -3))) or ((substr($row->name, 0, -3) == "parent"))) {

                    if (substr($row->name, 0, -3) == "parent") {
                        $fields = $this->db->list_fields($this->table_name);
                    } else {
                        $fields = $this->db->list_fields(substr($row->name, 0, -3));
                    }

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;
                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if (substr($row->name, 0, -3) == "parent") {
                            $field_exists = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_label = true;
                        } else if ($field_row == "role") {
                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    if ($field_exists) {
                        $this->db->select('*');
                        if (substr($row->name, 0, -3) == "parent") {
                            $this->db->from($this->table_name);
                            $this->db->where($this->table_name . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->db->where($this->table_name . ".duplicate_of", 0);
                            }
                        } else {
                            $this->db->from(substr($row->name, 0, -3));
                            $this->db->where(substr($row->name, 0, -3) . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->db->where(substr($row->name, 0, -3) . ".duplicate_of", 0);
                            }
                        }
                        if (substr($row->name, 0, -3) == "role") {
                            $this->db->where('type', strtoupper($this->table_name));
                        }

                        $query = $this->db->get();

                        $result = $query->result_array();

                        $temp_label_name = ucwords(str_replace("_", " ", $row->name));
                        // $this->debug(ucwords(substr($row->name, 0, -3)));

                        if (substr($row->name, 0, -3) == "parent") {
                            $html .= '<label for="form_' . $row->name . '">Parent</label>';
                        } else {
                            $html .= '<label for="form_' . $row->name . '">' . ucwords(substr($temp_label_name, 0, -3)) . '</label>';
                        }
                        $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                        foreach ($result as $result_row) {
                            if ($use_name) {
                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_label) {
                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['label'] . '</option>';
                            } else if ($use_role) {
                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['role'] . '</option>';
                            } else {
                                if (substr($row->name, 0, -3) == "parent") {
                                    $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row[$this->table_name] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                }

                            }
                        }
                        $html .= '</select>';
                    } else {
                        $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                        $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
                    }
                } else if (substr($row->name, 0, -3) == "parent") {
                    $fields = $this->db->list_fields($this->table_name);

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;
                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_role = true;
                        } else if ($field_row == "role") {
                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    $html .= '<label for="form_' . $row->name . '">Parent</label>';
                    $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                    $html .= '<option value="0">None</option>';
                    foreach ($self_data as $self_data_row) {
                        $html .= '<option value="' . $self_data_row[$this->table_name . '_id'] . '">' . $self_data_row[($this->table_name)] . '</option>';
                    }
                    $html .= '</select>';
                }
            } else {
                if ($row->name == "contact") {
                    $html .= '<label for="form_' . $row->name . '">Contact Number</label>';
                } else {
                    $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                }
                $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            }
            $html .= '<div class="help-block with-errors"></div>';
            $html .= '</div>';

            $input_fields[$row->name] = $html;
            if ($row->name == "password") {
                $html = '<div class="form-group">';
                $html .= '<label for="form_password2">Confirm Password</label>';
                $html .= '<input type="password" class="form-control" id="form_password2" placeholder="Confirm Password" name="password2" required>';
                $html .= '<div class="help-block with-errors"></div>';
                $html .= '</div>';
                $input_fields['password2'] = $html;
            }
        }

        return $input_fields;
    }

    public function generate_edit_input($primary_key)
    {
        $data = $this->get_where(array(
            $this->table_name . "." . $this->primary_key => $primary_key,
        ))[0];

        $fields = $this->db->field_data($this->table_name);

        $input_fields = array();
        foreach ($fields as $row) {
            $label = ucwords(str_replace("_", " ", $row->name));

            $html = '<div class="form-group">';
            if (($row->type == "int" or $row->type == "decimal") and substr($row->name, -3) != "_id") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="number" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '" step="any">';
            } else if ($row->type == "longtext" or $row->type == "text" or $row->type == "longblob") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<textarea class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required rows="5">' . $data[$row->name] . '</textarea>';
            } else if ($row->name == "thumbnail" or $row->name == "image" or $row->name == "banner" or $row->name == "banner_xs") {
                $html .= '<div id="preview_' . $row->name . '" class="upload_preview"></div>';
                $html .= '<label for="form_' . $row->name . '">' . $label . ' <small>*leave blank to keep previous image</small></label>';
                $html .= '<input type="file" class="form-control image_input" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '">';
            } else if ($row->name == "password") {
                $html .= '<label for="form_' . $row->name . '">Password <small>*leave blank to keep old password</small></label>';
                $html .= '<input type="password" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" >';
            } else if ($row->name == "email") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="email" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
            } else if ($row->type == "date") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="text" class="form-control datepicker" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . date("d-m-Y", strtotime($data[$row->name])) . '">';
            } else if (substr($row->name, -3) == "_id" and substr($row->name, 0, -3) != $this->table_name) {
                if (($this->db->table_exists(substr($row->name, 0, -3))) or ((substr($row->name, 0, -3) == "parent"))) {

                    if (substr($row->name, 0, -3) == "parent") {
                        $fields = $this->db->list_fields($this->table_name);
                    } else {
                        $fields = $this->db->list_fields(substr($row->name, 0, -3));
                    }

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;
                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if (substr($row->name, 0, -3) == "parent") {
                            $field_exists = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_label = true;
                        } else if ($field_row == "role") {
                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    // $this->debug($use_role);

                    if ($field_exists) {
                        $this->db->select('*');
                        if (substr($row->name, 0, -3) == "parent") {
                            $this->db->from($this->table_name);
                            $this->db->where($this->table_name . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->db->where($this->table_name . ".duplicate_of", 0);
                            }
                        } else {
                            $this->db->from(substr($row->name, 0, -3));
                            $this->db->where(substr($row->name, 0, -3) . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->db->where(substr($row->name, 0, -3) . ".duplicate_of", 0);
                            }
                        }
                        if (substr($row->name, 0, -3) == "role") {
                            $this->db->where('type', strtoupper($this->table_name));
                        }

                        $query = $this->db->get();

                        $result = $query->result_array();

                        $temp_label_name = ucwords(str_replace("_", " ", $row->name));
                        // $this->debug(ucwords(substr($row->name, 0, -3)));

                        $html .= '<label for="form_' . $row->name . '">' . ucwords(substr($temp_label_name, 0, -3)) . '</label>';
                        $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                        if (substr($row->name, 0, -3) == "parent") {
                            $html .= '<option value="0">None</option>';
                        }
                        foreach ($result as $result_row) {
                            if ($use_name) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['name'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['name'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_label) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['label'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['label'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_role) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['role'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['role'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    if (substr($row->name, 0, -3) == "parent") {
                                        $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row[$this->table_name] . '</option>';
                                    } else {
                                        $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                    }
                                } else {
                                    if (substr($row->name, 0, -3) == "parent") {
                                        $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row[$this->table_name] . '</option>';
                                    } else {
                                        $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                    }

                                }
                            }
                        }
                        $html .= '</select>';
                    } else {
                        $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                        $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
                    }

                } else if (substr($row->name, 0, -3) == "parent") {
                    $self_data = $this->get_where($where = array(
                        $this->table_name . "_id != " => $primary_key,
                    ));

                    $html .= '<label for="form_' . $row->name . '">Parent</label>';
                    $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                    $html .= '<option value="0">None</option>';
                    foreach ($self_data as $self_data_row) {
                        if ($self_data_row[$this->table_name . '_id'] == $data[$row->name]) {
                            $html .= '<option value="' . $self_data_row[$this->table_name . '_id'] . '" selected>' . $self_data_row[($this->table_name)] . '</option>';
                        } else {
                            $html .= '<option value="' . $self_data_row[$this->table_name . '_id'] . '">' . $self_data_row[($this->table_name)] . '</option>';
                        }
                    }
                    $html .= '</select>';
                }
            } else {
                if ($row->name == "contact") {
                    $html .= '<label for="form_' . $row->name . '">Contact Number</label>';
                } else {
                    $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                }
                $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
            }
            $html .= '<div class="help-block with-errors"></div>';
            $html .= '</div>';

            $input_fields[$row->name] = $html;
            if ($row->name == "password") {
                $html = '<div class="form-group">';
                $html .= '<label for="form_password2">Confirm Password <small>*leave blank to keep old password</small></label>';
                $html .= '<input type="password" class="form-control" id="form_password2" placeholder="Confirm Password" name="password2">';
                $html .= '<div class="help-block with-errors"></div>';
                $html .= '</div>';
                $input_fields['password2'] = $html;
            }
        }

        return $input_fields;
    }
}
