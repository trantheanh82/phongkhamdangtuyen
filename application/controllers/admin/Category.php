<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

	function __construct(){

		parent::__construct();

		$this->data['page_name'] = 'Cateogry';

		$this->load->model('category_model');

		if(!$this->ion_auth->in_group('admin')){
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}

		$this->load->library('user_agent');
	}

	function index(){
		redirect('admin/category/listing','location');

	}

	function listing($model){
		$this->data['page_name'] = 'Category listing';

		$this->data['items'] = $this->category_model
		->with_translation('where:`model`=\'category\' AND `language`=\''.$this->current_lang.'\'')
		->with_slug('where:`model`=\'category\' AND `language`=\''.$this->current_lang.'\'')
		->where('model',$model)
		->as_object()
		->get_all();


		$this->data['model'] = $model;
		$this->render('admin/categories/category_view');
	}

	function create($model = ""){
		parent::__loadScriptUpload();
		$this->data['page_name'] = 'Cateogry::create';
		$this->data['model'] = $model;
		$this->render('admin/categories/category_create_edit_view');
	}

	function edit($id){
		parent::__loadScriptUpload();
		$this->data['page_name'] = 'Cateogry::create';

		$this->data['item'] = $this->category_model
		->with_translations('where:`model`="category" and `model_id`="'.$id.'"')
		->with_slugs('where:`model`=\'category\' AND `model_id`=\''.$id.'\'')
		->where('id',$id)
		->get();

		//pr($this->db->last_query());exit();

		$this->data['model'] = $this->data['item']->model;

		foreach($this->data['item']->translations as $k=>$value){
			$this->data['item']->content[$value->language] = $value->content;
			$this->data['item']->content[$value->language]->id = $value->id;

		}

		foreach($this->data['item']->slugs as $k=>$value){
			$this->data['item']->slug[$value->language] = new \stdClass();
			$this->data['item']->slug[$value->language]->slug = $value->slug;
			$this->data['item']->slug[$value->language]->id = $value->id;
		}

		$this->render('admin/categories/category_create_edit_view');
	}

	function submit($type = 'create'){
		switch($type){
			case 'create':
				if(parent::__submit($this->input->post(),'category')){
					$this->session->set_flashdata('message','New Category has been inserted.');

				}else{
					$this->session->set_flashdata('error','Error occurs. Try again late.');
					redirect($this->agent->referrer(),'refresh');
				}
				break;
			case 'edit':
				$id = $this->input->post('id');
				$data = $this->input->post();
			/*	if($this->category_model->update($this->input->post(),$id)){*/
			if(parent::__submit($this->input->post(),'category')){
					$this->session->set_flashdata('message','New Category has been updated.');
				}else{
					$this->session->set_flashdata('error','Error occurs. Try again late.');

					redirect($this->agent->referrer(),'refresh');
				}
				break;
		}

		redirect('/admin/category/listing/'.$this->input->post('model'),'refresh');
	}

	function delete($id){
		if(!empty($id)){
			if(parent::__delete($id,'category',true,true)){
				$this->session->set_flashdata('message','Category has been deleted.');
			}
		}

		redirect($this->agent->referrer(),'refresh');
	}

}
