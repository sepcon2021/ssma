<?php


class SuccessMessage{
  
    public $success_id ;
    public $success_message;

    function __construct($success_id,$success_message){
        $this->success_id=$success_id;
        $this->success_message=$success_message;
    }
}