<?php

class Food_ingredient_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_ingredient";
    }
    
    
}