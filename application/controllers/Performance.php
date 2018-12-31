<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Performance extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Sales_model");
        $this->load->model("Store_model");
        $this->load->model("Food_model");
        $this->load->model("Order_food_model");

        $this->page_data = array();
    }

    public function store_sales()
    {
        $store = $this->Store_model->get_all();
        $month = ($_GET and $_GET['month']) ? $_GET['month'] : date("m");
        $year = ($_GET and $_GET['year']) ? $_GET['year'] : date("Y");
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = array(
                "value" => $i,
                "month" => DateTime::createFromFormat('!m', $i)->format('F'),
            );

            array_push($months, $data);
        }
        $year_range = $this->Sales_model->get_years()[0];
        $years = array();
        for ($i = $year_range['min_year']; $i <= $year_range['max_year']; $i++) {
            $data = array(
                "value" => $i,
                "year" => $i,
            );

            array_push($years, $data);
        }

        $i = 0;
        foreach ($store as $row) {
            $where = array(
                "status" => 2,
                "sales.store_id" => $row['store_id'],
            );

            if ($month != " " and $month != 0) {
                $where['MONTH(sales.created_date)'] = $month;
            }
            if ($year != " " and $year != 0) {
                $where['YEAR(sales.created_date)'] = $year;
            }

            $sales = $this->Sales_model->get_where($where);

            $total_sales = 0;
            foreach ($sales as $sales_row) {
                $total_sales += $sales_row['total'];
            }

            $store[$i]['total_sales'] = number_format($total_sales, 2);
            $i++;
        }

        $this->page_data['store'] = $store;
        $this->page_data['month'] = $month;
        $this->page_data['year'] = $year;
        $this->page_data['months'] = $months;
        $this->page_data['years'] = $years;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/performance/store_sales");
        $this->load->view("admin/footer");
    }

    public function store_sales_details($store_id)
    {
        $sales_months = array();
        for ($i = 1; $i <= 12; $i++) {
            $sales_months[DateTime::createFromFormat('!m', $i)->format('F')] = 0;
        }
        $month = ($_GET and $_GET['month']) ? $_GET['month'] : date("m");
        $year = ($_GET and $_GET['year']) ? $_GET['year'] : date("Y");
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = array(
                "value" => $i,
                "month" => DateTime::createFromFormat('!m', $i)->format('F'),
            );

            array_push($months, $data);
        }
        $year_range = $this->Sales_model->get_years()[0];
        $years = array();
        for ($i = $year_range['min_year']; $i <= $year_range['max_year']; $i++) {
            $data = array(
                "value" => $i,
                "year" => $i,
            );

            array_push($years, $data);
        }

        $where = array(
            "store.store_id" => $store_id,
        );

        $store = $this->Store_model->get_where($where)[0];

        $food = $this->Food_model->get_where($where);

        $where = array(
            "store.store_id" => $store_id,
            "status" => 2,
        );

        if ($month != " " and $month != 0) {
            $where['MONTH(sales.created_date)'] = $month;
        }
        if ($year != " " and $year != 0) {
            $where['YEAR(sales.created_date)'] = $year;
        }

        $sales = $this->Sales_model->get_where($where);

        $i = 0;
        foreach ($food as $row) {
            $where = array(
                "order_food.food_id" => $row['food_id'],
                "order_food.order_status_id" => 2,
            );

            if ($month != " " and $month != 0) {
                $where['MONTH(order_food.created_date)'] = $month;
            }
            if ($year != " " and $year != 0) {
                $where['YEAR(order_food.created_date)'] = $year;
            }

            $order_food = $this->Order_food_model->get_where($where);
            $total_sales = 0;
            foreach ($order_food as $order_food_row) {
                // $this->debug($order_food_row);
                if ($order_food_row['discounted_price'] != 0 and $order_food_row['discounted_price'] != $order_food_row['price']) {
                    $total_sales += $order_food_row['discounted_price'] * $order_food_row['quantity'];
                } else {
                    $total_sales += $order_food_row['price'] * $order_food_row['quantity'];
                }
            }

            $food[$i]['total_sales'] = number_format($total_sales, 2);
            $food[$i]['color_code'] = "rgb(" . rand(0, 256) . "," . rand(0, 256) . "," . rand(0, 256) . ")";
            $i++;
        }

        $food_chart = $food;
        $i = 0;
        foreach ($food_chart as $row) {
            if ($row['total_sales'] == 0) {
                unset($food_chart[$i]);
            }
            $i++;
        }

        foreach ($sales as $row) {
            // $this->debug($row);
            $sales_months[date("F", strtotime($row['created_date']))] += $row['total'];
        }

        foreach ($sales_months as $key => $row) {
            $sales_months[$key] = number_format($row, 2);
        }

        // $this->debug($sales_months);

        $this->page_data['store'] = $store;
        $this->page_data['food'] = $food;
        $this->page_data['food_chart'] = $food_chart;
        $this->page_data['sales'] = $sales;
        $this->page_data['sales_chart'] = $sales_months;
        $this->page_data['month'] = $month;
        $this->page_data['year'] = $year;
        $this->page_data['months'] = $months;
        $this->page_data['years'] = $years;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/performance/store_sales_details");
        $this->load->view("admin/footer");
    }

    public function food_sales()
    {
        $month = ($_GET and $_GET['month']) ? $_GET['month'] : date("m");
        $year = ($_GET and $_GET['year']) ? $_GET['year'] : date("Y");
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = array(
                "value" => $i,
                "month" => DateTime::createFromFormat('!m', $i)->format('F'),
            );

            array_push($months, $data);
        }
        $year_range = $this->Sales_model->get_years()[0];
        $years = array();
        for ($i = $year_range['min_year']; $i <= $year_range['max_year']; $i++) {
            $data = array(
                "value" => $i,
                "year" => $i,
            );

            array_push($years, $data);
        }

        $food = $this->Food_model->get_all();

        $i = 0;
        foreach ($food as $row) {
            $where = array(
                "order_food.food_id" => $row['food_id'],
                "order_food.order_status_id" => 2,
            );

            if ($month != " " and $month != 0) {
                $where['MONTH(order_food.created_date)'] = $month;
            }
            if ($year != " " and $year != 0) {
                $where['YEAR(order_food.created_date)'] = $year;
            }

            $order_food = $this->Order_food_model->get_where($where);

            $total_sales = 0;
            foreach ($order_food as $order_food_row) {
                if ($order_food_row['discounted_price'] != 0 and $order_food_row['discounted_price'] != $order_food_row['price']) {
                    $total_sales += $order_food_row['discounted_price'] * $order_food_row['quantity'];
                } else {
                    $total_sales += $order_food_row['price'] * $order_food_row['quantity'];
                }
            }

            $food[$i]['total_sales'] = number_format($total_sales, 2);
            $i++;
        }

        $this->page_data['food'] = $food;
        $this->page_data['month'] = $month;
        $this->page_data['year'] = $year;
        $this->page_data['months'] = $months;
        $this->page_data['years'] = $years;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/performance/food_sales");
        $this->load->view("admin/footer");
    }

    public function food_sales_details($food_id)
    {
        $sales_months = array();
        for ($i = 1; $i <= 12; $i++) {
            $sales_months[DateTime::createFromFormat('!m', $i)->format('F')] = 0;
        }
        $month = ($_GET and $_GET['month']) ? $_GET['month'] : date("m");
        $year = ($_GET and $_GET['year']) ? $_GET['year'] : date("Y");
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $data = array(
                "value" => $i,
                "month" => DateTime::createFromFormat('!m', $i)->format('F'),
            );

            array_push($months, $data);
        }
        $year_range = $this->Sales_model->get_years()[0];
        $years = array();
        for ($i = $year_range['min_year']; $i <= $year_range['max_year']; $i++) {
            $data = array(
                "value" => $i,
                "year" => $i,
            );

            array_push($years, $data);
        }

        $where = array(
            "food_id" => $food_id,
        );

        $food = $this->Food_model->get_where($where)[0];

        $where = array(
            "order_food.food_id" => $food_id,
            "order_food.order_status_id" => 2,
        );

        if ($month != " " and $month != 0) {
            $where['MONTH(order_food.created_date)'] = $month;
        }
        if ($year != " " and $year != 0) {
            $where['YEAR(order_food.created_date)'] = $year;
        }

        $order_food = $this->Order_food_model->get_where($where);

        $i = 0;
        foreach ($order_food as $row) {
            // $this->debug($order_food);
            if ($row['discounted_price'] != 0 and $row['discounted_price'] != $row['price']) {
                $total_sales = ($row['discounted_price'] * $row['quantity']);
            } else {
                $total_sales = ($row['price'] * $row['quantity']);
            }
            $sales_months[date("F", strtotime($row['created_date']))] += $total_sales;
            $order_food[$i]['total_sales'] = number_format($total_sales, 2);
            $i++;
        }

        foreach ($sales_months as $key => $row) {
            $sales_months[$key] = number_format($row, 2);
        }

        $this->page_data['food'] = $food;
        $this->page_data['sales'] = $order_food;
        $this->page_data['sales_chart'] = $sales_months;
        $this->page_data['month'] = $month;
        $this->page_data['year'] = $year;
        $this->page_data['months'] = $months;
        $this->page_data['years'] = $years;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/performance/food_sales_details");
        $this->load->view("admin/footer");

    }
}
