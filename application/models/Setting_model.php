<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model
{
	public $table = "settings";
	
	protected $before_update = array();
	protected $after_update = array();
	
    public function __construct()
    {
	    $this->timestamps = false;
        $this->soft_deletes = FALSE;
        $this->protected = array('updated_by','created_by','deleted_by');

        parent::__construct();
        
    }
    
}