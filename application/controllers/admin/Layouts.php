<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layouts extends Admin_Controller {


	function __construct(){

		parent::__construct();

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
		$this->load->model('page_model');
		$this->data['page_name'] = 'Layouts';
		$this->model = 'layout';

    $this->load->model('layout_model');

	}

  function index(){

    $this->data['items'] = $this->layout_model->get_all();
    $this->render('/admin/layouts/listing_view');
  }

  function layoutitems($layout_id){
    $this->load->model('layout_item_model');

    if(empty($layout_id)){
    }
    $this->data['items'] = $this->layout_item_model->admin_get_all_item($layout_id);

    $this->render('/admin/layouts/layoutitems_edit');
  }

  function submit(){
    $data = $this->input->post();
		$this->load->model('layout_item_model');
		if($this->layout_item_model->submit($data,$this->current_lang)){
			$this->session->set_flashdata('message','Layout hass been updated.');
		}else{
			$this->session->set_flashdata('error','Error occured, try again late.');
		}

		redirect('admin/layouts/layoutitems/1','refresh');
  }
}
