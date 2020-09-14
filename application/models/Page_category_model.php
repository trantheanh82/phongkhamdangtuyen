<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_category_model extends MY_Model
{
	public $table = 'pages_categories';
	
	function __construct(){
		
		$this->timestamps = FALSE;
		
		parent::__construct();
	}
}
