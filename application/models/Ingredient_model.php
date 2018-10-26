<?php

class Ingredient_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "ingredient";
    }

}
