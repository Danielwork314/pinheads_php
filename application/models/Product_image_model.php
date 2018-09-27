<?php

class Product_image_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "product_image";
    }
    
    
}