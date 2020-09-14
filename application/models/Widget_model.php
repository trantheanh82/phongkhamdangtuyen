<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends MY_Model
{
	
	public $table = "widgets";
    public function __construct()
    {
	    
        parent::__construct();
        $this->load->library('Ion_auth');
    }
    
    
    public function getAll($user_id){
	    
	    $user_groups = $this->ion_auth->get_users_groups($user_id)->result();
	    
	    $group_id;
	    foreach($user_groups as $k => $v){
		    $group_id[] = $v->id;
	    }
	    
	    $this->where('permissions',$group_id);
	    $this->where('active','Y');
	    $this->order_by('sort','ASC');
	    
	    return $this->get_all();
    }
}