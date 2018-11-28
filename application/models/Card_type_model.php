<?php

class Card_type_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "card_type";
    }
}