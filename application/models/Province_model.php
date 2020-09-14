<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends MY_Model
{
	
  public $table = "province";	

  public function __construct()
  {
    parent::__construct();
    $this->timestamps = false;
  }
  
  
}
