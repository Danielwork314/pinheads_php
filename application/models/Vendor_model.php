<?php

class Vendor_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "vendor";
    }
    
    
}