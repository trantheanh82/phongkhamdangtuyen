<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacture_product_type_model extends MY_Model
{
	public $table = 'manufactures_product_types';
	
	function __construct(){

		$this->timestamps = FALSE;
		parent::__construct();

	}

}