<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestcalls extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('request_call_model');

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->data['page_name'] = 'Request call';
		$this->model = 'request_call_model';
	}

  function index(){
    $this->data['items'] = $this->request_call_model->order_by('view','ASC')->order_by('created_at','DESC')->set_cache($this->current_lang)->get_all();

    $this->render('admin/request_calls/listing_request_call_view');
  }

  function view($id){
    $this->data['item'] = $this->request_call_model->get($id);
    $this->render('admin/request_calls/view_request_call');

    //updated view
    if($this->data['item']->view == 'N'){
      $this->request_call_model->update(array('view'=>'Y'),$id);
    }
  }

}
