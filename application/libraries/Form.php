<?php

class Form
{

    public function generate_input($options)
    {
        /*----------  User Guide / Spec Notes ------------

        21/12/2018 - emmwee

        $options['name'] = "username"; <--- Sets form name, form label, form id (required)
        $options['label'] = "Username"; <--- Sets form label if its needed to be different from the name
        $options['type'] = "text"; <--- Sets form type, available
        types:
        1. text
        2. number
        3. textarea
        4. password
        5. file
        6. email
        7. date
        default. text
        $options['value'] = "emmwee"; <--- Sets value to form
        $options['required'] = true; <--- Sets required to form, default: false
        $options['multiple'] = true; <--- Sets multiple to form, default: false
        $options['min'] = "1" <--- Sets min value to form
        $options['max'] = "10" <--- Sets max value to form
        $options['max'] = "10" <--- Sets max value to form
        $options['class'] = "class_name" <--- Sets custom class to form
        $options['id'] = "id_name" <--- Sets custom id to form

        return samples:

        <div class="form-group">
        <label for="form_username">Username</label>
        <input type="text" class="form-control" id="form_username" placeholder="Username" name="username" required="">
        <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
        <div id="preview_thumbnail" class="upload_preview"></div>
        <label for="form_thumbnail">Thumbnail</label>
        <input type="file" class="form-control image_input" id="form_thumbnail" placeholder="Thumbnail" name="thumbnail" required="">
        <div class="help-block with-errors"></div>
        </div>

        <div class="form_group">
        <label for="form_product_images">Product Images</label>
        <input type="file" class="form-control image_input_multiple" id="form_product_images" name="product_images[]" multiple="" placeholder="Product Images">
        <div class="help-block with-errors"></div>
        <div class="row" id="preview_product_images">
        </div>
        </div>

        ---------------------------------------------------*/

        // echo "<pre>";
        // var_dump($options);
        // echo "</pre>";
        // die();

        $form_label = (!empty($options['label'])) ? $options['label'] : ucwords(str_replace("_", " ", $options['name']));
        $form_class = (!empty($options['class'])) ? " " . $options['class'] : "";
        $form_id = (!empty($options['id'])) ? " " . $options['id'] : "";
        $form_type = "text";
        $form_type_options = array(
            "text",
            "number",
            "textarea",
            "password",
            "file",
            "email",
            "date",
        );

        if (!empty($options['type']) and in_array($options['type'], $form_type_options)) {
            $form_type = $options['type'];
        }

        $form_html = "";
        $form_header_html = "<div class='form-group'>";
        $form_error_html = "<div class='help-block with-errors'></div>";
        $form_footer_html = "</div>";
        $form_label_html = "<label for='form_" . $options['name'] . "'>" . $form_label . "</label>";
        $form_before_label_html = "";
        $form_after_error_html = "";

        $form_input_html = "";
        switch ($form_type) {
            case "text":
                $form_input_html = "<input type='text' class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
            case "number":
                $form_input_html = "<input type='number' class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
            case "textarea":
                $form_input_html = "<textarea class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "' rows='5'";
                break;
            case "password":
                $form_input_html = "<input type='password' class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
            case "file":
                $image_name_addon = (!empty($options['multiple']) and $options['multiple']) ? "[]" : "";
                $image_class = (!empty($options['multiple']) and $options['multiple']) ? "image_input_multiple" : "image_input";
                $form_input_html = "<input type='file' class='form-control " . $image_class . "" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . $image_name_addon . "'";
                break;
            case "email":
                $form_input_html = "<input type='email' class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
            case "date":
                $form_input_html = "<input type='text' class='form-control datepicker" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
            default:
                $form_input_html = "<input type='text' class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' placeholder='" . $form_label . "' name='" . $options['name'] . "'";
                break;
        }

        if (!empty($options['required']) and $options['required']) {
            $form_input_html .= " required";
        }
        if (!empty($options['multiple']) and $options['multiple']) {
            $form_input_html .= " multiple";
            $form_after_error_html = "<div class='row' id='preview_" . $options['name'] . "'>";
        } else {
            $form_before_label_html .= "<div id='preview_" . $options['name'] . "' class='upload_preview'></div>";
        }
        if (!empty($options['min'])) {
            $form_input_html .= " min='" . $options['min'] . "'";
        }
        if (!empty($options['max'])) {
            $form_input_html .= " max='" . $options['max'] . "'";
        }
        if (!empty($options['value'])) {
            $form_input_html .= " value='" . $options['value'] . "'";
        }

        switch ($form_type) {
            case "text":
                $form_input_html .= ">";
                break;
            case "number":
                $form_input_html .= ">";
                break;
            case "textarea":
                $form_input_html .= "></textarea>";
                break;
            case "password":
                $form_input_html .= ">";
                break;
            case "file":
                $form_input_html .= ">";
                break;
            case "email":
                $form_input_html .= ">";
                break;
            case "date":
                $form_input_html .= ">";
                break;
            default:
                $form_input_html .= ">";
                break;
        }

        $html = $form_header_html . $form_before_label_html . $form_label_html . $form_input_html . $form_error_html . $form_after_error_html . $form_footer_html;

        return $html;

    }

    public function generate_select($options, $data = array())
    {
        /*----------  User Guide / Spec Notes ------------

        21/12/2018 - emmwee

        $options['name'] = "username"; <--- Sets form name, form label, form id (required)
        $options['label'] = "Username"; <--- Sets form label if its needed to be different from the name
        $options['selected'] = 1; <--- Sets selected value
        $options['required'] = true; <--- Sets required to form, default: false
        $options['class'] = "class_name" <--- Sets custom class to form
        $options['id'] = "id_name" <--- Sets custom id to form

        $data['options'] = array(); <--- Sets select options
        $data['value'] = "value_id"; <--- Key name of data to be used as option value
        $data['text'] = "name"; <--- Key name of data to be used as option text

        return samples:

        ---------------------------------------------------*/

        // echo "<pre>";
        // var_dump($options);
        // echo "</pre>";
        // die();

        $form_label = (!empty($options['label'])) ? $options['label'] : ucwords(str_replace("_", " ", $options['name']));
        $form_class = (!empty($options['class'])) ? " " . $options['class'] : "";
        $form_id = (!empty($options['id'])) ? " " . $options['id'] : "";

        $form_html = "";
        $form_header_html = "<div class='form-group'>";
        $form_error_html = "<div class='help-block with-errors'></div>";
        $form_footer_html = "</div>";
        $form_label_html = "<label for='form_" . $options['name'] . "'>" . $form_label . "</label>";

        $form_input_html = "<select class='form-control" . $form_class . "' id='form_" . $options['name'] . "" . $form_id . "' name='" . $options['name'] . "' required>";
        $form_input_html .= "<option disabled value selected>Select " . preg_replace('/(^| )a ([aeiouAEIOU])/', '$1an $2', "a " . $form_label) . "</option>";
        if (empty($options['required']) or !$options['required']) {
            $form_input_html .= "<option value='0'>None</option>";
        }
        if (!empty($data)) {
            foreach ($data['options'] as $row) {
                $form_input_html .= "<option value='" . $row[$data['value']] . "'>" . $row[$data['text']] . "</option>";
            }
        }

        $form_input_html .= "</select>";

        $html = $form_header_html . $form_label_html . $form_input_html . $form_error_html . $form_footer_html;

        return $html;
    }
}
