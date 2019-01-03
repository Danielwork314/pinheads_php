<?php

class CRON extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Store_model");
        $this->load->model("Staff_model");
    }

    public function updateStoreStatus()
    {
        $store = $this->Store_model->get_all();

        foreach ($store as $row) {
            $active = 0;

            $where = array(
                "store_id" => $row['store_id'],
                "DATE_ADD(login_time, INTERVAL 30 MINUTE) >=" => "NOW()",
            );

            $staff = $this->Staff_model->get_last_active_staff($where);

            if (!empty($staff)) {
                $active = 1;
            }

            $where = array(
                "store_id" => $row['store_id'],
            );

            $data = array(
                "active" => $active,
            );

            $this->Store_model->update_where($where, $data);
        }
    }
}
