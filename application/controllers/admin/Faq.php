<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('faq_model');

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->data['page_name'] = 'FAQ';
		$this->model = 'faq';
	}

  function index(){
		$this->data['page_name'] = lang('FAQ listing');
		$this->data['items'] = $this->faq_model
		->with_translation('where:`model`=\'faq\' AND `language`=\''.$this->current_lang.'\'')
		->with_slug('where:`model`=\'faq\' AND `language`=\''.$this->current_lang.'\'')
		->as_object()
		->order_by('created_at','ASC')
		->get_all();

		$this->render('admin/faq/faq_index_view');
  }

  function create(){

    $this->render('/admin/faq/faq_create_edit_view');
  }

  function edit($id){
		$this->data['page_name'] = lang('FAQ')."::".lang('edit');
		if(!empty($id)){


			$this->data['item'] = $this->faq_model
			->with_translations('where:`model`="'.$this->model.'" and `model_id`="'.$id.'"')
			->with_slugs('where:`model`="'.$this->model.'" AND `model_id`=\''.$id.'\'')
			->get($id);

			foreach($this->data['item']->translations as $k=>$value){
				$this->data['item']->content[$value->language] = $value->content;
				$this->data['item']->content[$value->language]->id = $value->id;
			}

			foreach($this->data['item']->slugs as $k=>$value){
				$this->data['item']->slug[$value->language] = new \stdClass();
				$this->data['item']->slug[$value->language]->slug = $value->slug;
				$this->data['item']->slug[$value->language]->id = $value->id;
			}

			unset($this->data['item']->translations);
			unset($this->data['item']->slugs);

			$this->data['model'] = $this->model;
			//pr($this->data['item']);exit();
		/*	if($this->data['item']->slug == 'gioi-thieu'){

				$this->data['before_head'] .= assets('css/style.css',false);
			}*/
			$this->render('admin/faq/faq_create_edit_view');

		}else{

			$this->session->set_flashdata('error','There is no page id to edited');
			redirect('admin/faq',true);
		}
  }

  function delete(){

  }

  function submit(){
		$data = $this->input->post();

		foreach($data['relation']['translation'] as $k=>$value){
			if($data['relation']['translation'][$k]['content']['meta_title'] == ""){
				$data['relation']['translation'][$k]['content']['meta_title'] = $value['content']['question'];
			}

			if($data['relation']['translation'][$k]['content']['meta_description'] == ""){
				$data['relation']['translation'][$k]['content']['meta_description'] = strip_tags($value['content']['answer']);
			}
		}

		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){
				$this->session->set_flashdata('message','pages has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){

				$this->session->set_flashdata('message','pages has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/faq','refresh');
  }
}
