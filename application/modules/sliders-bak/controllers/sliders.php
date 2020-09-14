<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Public_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		
	}
	
	function sliders(){
		$this->data['sliders'] = $this->slider_model->get_all();
		$this->render('sliders/sliders','module');
	}
}
?>