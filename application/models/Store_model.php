<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends MY_Model
{
	
	private $validated = TRUE;
	public $table = "stores";
  function __construct()
  {
    parent::__construct();
  }
  
  public $rules = array(
		'insert' => array(
			'name'=> array(
				'field'=> 'name',
				'label'=> 'name',
				'rules'=> 'trim|required|valid_email',
				'errors' => array ('required' => 'Error Name rule "required" for field ')
			)
		)	
	);
}
