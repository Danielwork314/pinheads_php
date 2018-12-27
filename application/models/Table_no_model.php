<?php

class Table_no_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "table_no";
    }

}
