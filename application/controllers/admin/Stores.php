<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends Admin_Controller {
	
	private $rules = array(
		array('field'=>'name','label'=>'Name','rules'=>'required|is_unique[stores.name]'),
		
		array('field'=>'phone','label'=>'Phone','rules'=>'required|min_length[9]')
	);
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
	}
	
	
	
	function index(){
		
	}
	
	function create(){
		
		$this->form_validation->set_rules($this->rules);
		
		if ($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('error','Error has been occured');
		}else{
			
			$this->submit($this->input->post());

		}
			
		$this->data['page_name'] = __('Create a store',$this);
		$this->render('admin/store/store_create_edit_view');

	}
	
	function edit(){
		
	}
	
	function submit($data){
		if(parent::__submit($data,'store')){
			$this->session->set_flashdata('message','Store has been inserted');
			
		}else{
			$this->session->set_flashdata('error','Error has been occured');
		}
		
			
		redirect('/admin/stores/create',true);
	}
	
}