<?php

class Billing_address_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "billing_address";
    }
    
    
}