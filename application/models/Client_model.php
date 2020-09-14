<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends MY_Model
{
	public $table = "clients";
	public $name = 'client';
	public $timestamps = FALSE;

	function __construct(){

    parent::__construct();
  }


	function get_items(){
		return $this->set_cache('get_items')->get_all();
	}

	function get_item($id){
		return $this->get($id);
	}

	function get_home_items(){
		return $this->where(array('active'=>'Y'))->order_by('sort','ASC')->get_all();
	}
}
