<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request_call_model extends MY_Model
{
  public $table = "request_calls";
  public $name = "request_call";
  public $timestamps = FALSE;

  function __construct(){
    parent::__construct();
  }

}
