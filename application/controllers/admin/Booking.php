<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Admin_Controller {


	function __construct(){

		parent::__construct();

		$this->load->model('booking_model');
		$this->load->library('ion_auth');
		$this->data['page_name'] = 'booking';
	}
  
  function index(){
    $this->data['items'] = $this->booking_model->get_all();
		$this->render('admin/booking/listing_view');
  }
  
  function read($id){

    $this->data['item'] = $this->booking_model->get($id);
    if($this->booking_model->update(array('view'=>'Y'),$id)){

    }
    $this->render('admin/booking/read_view');
  }
  
}