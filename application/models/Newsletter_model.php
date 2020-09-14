<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends MY_Model
{

	public $table = "newsletters";
    public function __construct()
    {
        parent::__construct();
    }
}
