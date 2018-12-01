<?php

class Store_image_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "store_image";
    }

}
