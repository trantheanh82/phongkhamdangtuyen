<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingappointments extends Public_Controller {

	public function __construct(){
    parent::__construct();
		$this->load->model('specialist_model');
		$this->load->model('doctor_model');
  }

  public function index(){
		$this->data['specialists'] = $this->specialist_model->get_dropdown('specialist',$this->current_lang);
		$this->data['doctors']	=	$this->doctor_model->get_dropdown('doctors',$this->current_lang);
    $this->render('/bookingappointments/bookingappointments');
  }

	public function submit(){

	}
}
