<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends Admin_Controller {
  
  public $page_name = 'patients';
  public $model = 'patient_model';
  
  function __construct(){
    parent::__construct();
    
    $this->load->model('patient_model');
    $this->data['page_name']  = $this->page_name;
  }
  
  function index(){
    $this->data['items'] = $this->patient_model->get_items();
    pr($this->data['items']);
    $this->render('/admin/patients/listing_result_view');
  }
  
  function create(){
    
    $this->render('/admin/patients/create_edit_view');
  }
  
  function edit($id){
    
  }
  
  function delete(){
  
  }  
  
  function __submit($data,$model){
  
  }
}