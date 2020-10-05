<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends MY_Model
{
	public $table = "booking";
	public $name = 'booking';
  
  function __construct(){
    parent::__construct();
    
  }
  
}