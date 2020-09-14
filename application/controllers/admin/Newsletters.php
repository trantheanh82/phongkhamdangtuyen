<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('newsletter_model');

		if(!$this->ion_auth->in_group('admin')){
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}

    $this->data['page_name'] = 'Newletters';
    $this->model = 'newsletter';
  }

  function index(){
    $this->render('admin/newsletters/newsletter_index_view');
  }

  function export(){
    
  }
}
