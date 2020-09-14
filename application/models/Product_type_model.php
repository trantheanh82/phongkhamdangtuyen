<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_model extends MY_Model
{
	public $table = 'product_types';
	
	function __construct(){
		
		$this->timestamps = FALSE;
		
		parent::__construct();
	}
}
