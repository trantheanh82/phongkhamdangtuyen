<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends MY_Model
{
	
  public $table = "images";
  
  public function __construct()
  {
	//$this->has_many['translations'] = array('Banner_translation_model','banner_id','id');

    parent::__construct();
    
  }
  
}
