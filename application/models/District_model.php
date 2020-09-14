<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class District_model extends MY_Model
{
  
  public $table = 'district';
  
  public function __construct()
  {
    parent::__construct();
    $this->timestamps = false;
  }
  
  
}
