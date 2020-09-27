<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slug_model extends MY_Model
{

	public $table = "slugs";
	public $name = "slug";
	
  public function __construct()
  {
    parent::__construct();
  }



}
