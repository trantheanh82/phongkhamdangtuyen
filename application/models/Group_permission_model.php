<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Group_permission_model extends MY_Model
{

	public $table = "group_permissions";
    public function __construct()
    {
        parent::__construct();
        $this->has_one['group'] = array('group_model','id','group_id');
    }

}