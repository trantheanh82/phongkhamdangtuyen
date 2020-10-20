<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends MY_Model
{
	public $table = "patient_results";
	public $name = 'patient_result';

  function __construct(){
    parent::__construct();

  }

  function get_items(){
      return $this->get_all();
  }

  function get_item($id){
    return $this->get($id);
  }

  function create(){

  }

  function edit(){

  }

  function delete($where=NULL){

  }

}
