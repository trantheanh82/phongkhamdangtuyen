<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends Admin_Controller {


	function __construct(){

		parent::__construct();

		$this->load->model('contact_model');
		$this->load->library('ion_auth');
		$this->data['page_name'] = 'contacts';
	}

	function index(){
		$this->data['items'] = $this->contact_model->get_all();
		$this->render('admin/contacts/listing_view');
	}

	function read($id){

		$this->data['item'] = $this->contact_model->get($id);
		if($this->contact_model->update(array('view'=>'Y'),$id)){

		}
		$this->render('admin/contacts/read_view');
	}

}
