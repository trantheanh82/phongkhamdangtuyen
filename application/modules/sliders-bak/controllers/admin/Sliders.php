<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		
		$this->load->library('ion_auth','session');
		$this->data['page_name'] = 'Sliders';
		
	}
	
	function index(){
		$this->data['items'] = $this->slider_model->get_all();
		$this->render('admin/listing_sliders');
	}
	
	function create(){
		
	}
	
	function edit($id){
		$this->data['item'] = $this->slider_model->get($id);
		$this->render('admin/sliders_create_edit');
	}
	
	function delete($id = 0){
		if($id == 0){
			$this->session->set_flashdata('error','Please provide a slider to delete.');
			redirect('admin/sliders');	
		}
		
		$this->sliders->delete($id);
		
		$this->session->set_flashdata('error','A Slider id#'.$id.' has been deleted.');

		redirect('admin/sliders');	
	}
	
	function submit(){
		$data = $this->input->post();
		$data_id = 0;
		
		if(isset($data['id'])){
			$data_id = $data['id'];
		}
		
		if(!empty($data_id)){
			if($this->slider_model->update($data,$data_id)){
				$this->session->set_flashdata('message','services has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{
			
			if($id = $this->slider_model->insert($data)){
				
				$this->session->set_flashdata('message','services has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}
		
		redirect('admin/sliders','refresh');


	}
}