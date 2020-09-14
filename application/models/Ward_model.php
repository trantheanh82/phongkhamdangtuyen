<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ward_model extends MY_Model
{
	
  public $table = 'ward';
  public function __construct()
  {
    parent::__construct();
    $this->timestamps = false;
  }
}
