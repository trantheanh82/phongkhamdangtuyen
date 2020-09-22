<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_specialist_model extends MY_Model
{

	public $table = "doctors_specialists";
	public $timestamps = FALSE;

  public function __construct()
  {
      parent::__construct();
  }

}
