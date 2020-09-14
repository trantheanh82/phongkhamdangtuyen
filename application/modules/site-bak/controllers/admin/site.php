<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends Admin_Controller {

	
	function __construct(){
		parent::__construct();
			}
	
	function index(){
		
		$this->render('admin/index_view');
	}
	
	function create(){
		$this->__loadScriptUpload();
		
		$this->load->model('province_model');
		$this->load->model('district_model');
		$this->load->model('ward_model');
		
		$this->data['list_province'] = $this->province_model->as_dropdown('_name')->where(array('id'=>1))->get_all();
		$this->data['list_district'] = $this->district_model->as_dropdown('_name')->where(array('_province_id'=>1))->get_all();
		$this->data['list_ward'] = $this->ward_model->as_dropdown('_name')->where(array('_district_id'=>4))->get_all();
		
		$this->render('admin/products/product_create_view');
	}
	
	function edit($id){
		$this->__loadScriptUpload();
		
		$this->load->model('province_model');
		$this->load->model('district_model');
		$this->load->model('ward_model');
		
		$this->data['list_province'] = $this->province_model->as_dropdown('_name')->where(array('id'=>1))->get_all();
		$this->data['list_district'] = $this->district_model->as_dropdown('_name')->where(array('_province_id'=>1))->get_all();
		$this->data['list_ward'] = $this->ward_model->as_dropdown('_name')->where(array('_district_id'=>4))->get_all();
		
		$this->data['for_sells'] = $this->config->item('for_sell');;
		
		$this->data['item'] = $this->product_model->get($id);
		
		$this->render('admin/products/product_edit_view');
	}
	
	function delete($id){
		if(!empty($id)){
			if($this->product_model->delete($id)){
				$this->session->set_flashdata('message','Product has been deleted');
			}else{
				$this->session->set_flashdata('error','Error occures. Please try again');
			}
			redirect('admin/products','refresh');
		}
		$this->session->set_flashdata('error','Error occures. Please try again');
		redirect('admin/products','refresh');
	}
	
	function submit(){
		if(!empty($this->input->post())){
			$data = $this->input->post();
			
			$data_id = 0;
			if(isset($data['id'])){
				$data_id = $data['id'];
			}
			
			$slug = $this->product_model->where(array('slug'=>$data['slug'],'id <> ' => $data_id))->get();
			
			if(!empty($slug)){
				$data['slug'] .= "-".date('Ymdhis');		
			}
			
			if(isset($data['has_many'])){
				$images = $data['product_image'];	
				unset($data['product_image']);
			}
			
			if(!empty($data['id'])){
				if($this->product_model->update($data,$data['id'])){
					$this->session->set_flashdata('message','Product has been updated');
				}else{
					$this->session->set_flashdata('error','Error occures. Please try again');
				}
				
			}else{
				if(!isset($data['page_title'])){
					$data['page_title'] = $data['name'];
				}
				
				
								
				if($this->product_model->insert($data)){
					$this->session->set_flashdata('message','Product has been created');
				}else{
					$this->session->set_flashdata('error','Error occures. Please try again');
				}
			}
			
			redirect('admin/products','refresh');
		}
	}

}