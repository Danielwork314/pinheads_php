<?php

class Feedback_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "feedback";
    }
    
    
}