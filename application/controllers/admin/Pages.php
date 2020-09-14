<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller {


	function __construct(){

		parent::__construct();

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
		$this->load->model('page_model');
		$this->data['page_name'] = 'Pages';
		$this->model = 'page';

	}

	function index(){

		$this->data['page_name'] = lang('Pages listing');
		$this->data['items'] = $this->page_model
		->with_translation('where:`model`=\'page\' AND `language`=\''.$this->current_lang.'\'')
		->with_slug('where:`model`=\'page\' AND `language`=\''.$this->current_lang.'\'')
		->as_object()
		->order_by('created_at','ASC')
		->get_all();

		$this->render('admin/pages/page_index');
	}

	function create(){

		$this->load->model('category_model');
		$this->data['list_cats'] = $this->category_model->get_dropdown('page',$this->current_lang);

		$this->render('admin/pages/page_create_edit_view');
	}

	function edit($id){
		$this->data['page_name'] = lang('Page')."::".lang('edit');
		if(!empty($id)){

			$this->load->model('category_model');
			$this->data['list_cats'] = $this->category_model->get_dropdown('page');

			$this->data['item'] = $this->page_model
			->with_translations('where:`model`="page" and `model_id`="'.$id.'"')
			->with_slugs('where:`model`="page" AND `model_id`=\''.$id.'\'')
			->with_page_category()
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

			$this->data['model'] = 'page';
			//pr($this->data['item']);exit();
		/*	if($this->data['item']->slug == 'gioi-thieu'){

				$this->data['before_head'] .= assets('css/style.css',false);
			}*/

			if($this->data['item']->id  == 9){
				$this->render('admin/pages/page_about_create_edit_view');

			}else{	$this->render('admin/pages/page_create_edit_view');}

		}else{

			$this->session->set_flashdata('error','There is no page id to edited');
			redirect('admin/pages',true);
		}
	}

	function delete($id){
		if(!empty($id)){
			if($this->page_model->delete($id)){
				$this->session->set_flashdata('messege','The item has been deleted.');
				redirect('admin/pages','refresh');
			}else{
				$this->session->set_flashdata('messege','Error, please try again.');
			}
		}else{
			$this->session->set_flashdata('messege','There is no page id to delete.');
		}

		redirect('admin/pages','refresh');

	}

	function submit($type ='create'){
		$data = $this->input->post();

		$cat_ids = $data['category_ids'];
		unset($data['category_ids']);

		$this->load->model('page_category_model');

		foreach($data['relation']['translation'] as $k=>$value){
			if($data['relation']['translation'][$k]['content']['meta_title'] == ""){
				$data['relation']['translation'][$k]['content']['meta_title'] = $value['content']['name'];
			}

			if($data['relation']['translation'][$k]['content']['meta_description'] == ""){
				$data['relation']['translation'][$k]['content']['meta_description'] = strip_tags($value['content']['description']);
			}
		}

		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){

				$this->page_category_model->delete(array('page_id'=>$data['id']));
				foreach($cat_ids as $k => $v){
					$acat['page_id'] = $data['id'];
					$acat['category_id'] = $k;
					//$acat['model'] = 'page';
					$this->page_category_model->insert($acat);
				}
				$this->session->set_flashdata('message','pages has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){
				foreach($cat_ids as $k => $v){
					$acat['page_id'] = $id;
					$acat['category_id'] = $k;
					//$acat['model'] = 'page';
					$this->page_category_model->insert($acat);
				}
				$this->session->set_flashdata('message','pages has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/pages','refresh');
	}

}
