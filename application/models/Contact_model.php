<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_Model
{

  	public $table = 'contacts';

	public function __construct(){
	    parent::__construct();
	    $this->timestamps = false;
	}



}
