<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('article_model');

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->data['script_for_layout'] .= assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');
		$this->data['before_head']	.=	assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.css');

		$this->data['page_name'] = 'Articles';
		$this->model = 'article';
	}

	function index(){
		$this->data['items'] = $this->article_model->order_by('created_at','ASC')->get_all();
		$this->data['items'] = $this->article_model
		->with_translation('where:`model`=\''.$this->model.'\' AND `language`=\''.$this->current_lang.'\'')
		->with_slug('where:`model`=\''.$this->model.'\' AND `language`=\''.$this->current_lang.'\'')
		->with_articles_categories()
		->order_by('created_at','ASC')
		->get_all();

		$this->render('admin/articles/index_article_view');
	}

	function create(){
		$this->load->model('category_model');
		$this->data['list_cats'] = $this->category_model->get_dropdown('article',$this->current_lang);

		$this->__loadScriptUpload();
		$this->render('admin/articles/article_create_edit_view');
	}

	function edit($id){
		if(!empty($id)){
			$this->load->model('category_model');

			$this->data['list_cats'] = $this->category_model->get_dropdown('article',$this->current_lang);

			$this->data['item'] = $this->article_model
			->with_translations('where:`model`=\''.$this->model.'\'')
			->with_slugs('where:`model`=\''.$this->model.'\'')
			->with_articles_categories()
			->where('id',$id)
			->get();

			foreach($this->data['item']->translations as $k=>$value){
				$this->data['item']->content[$value->language] = $value->content;
				$this->data['item']->content[$value->language]->id = $value->id;
				$this->data['item']->tags[$value->language] = $value->tags;
			}

			foreach($this->data['item']->slugs as $k=>$value){
				$this->data['item']->slug[$value->language] = new \stdClass();
				$this->data['item']->slug[$value->language]->slug = $value->slug;
				$this->data['item']->slug[$value->language]->id = $value->id;
			}

		}

		$this->__loadScriptUpload();
		$this->render('admin/articles/article_create_edit_view');
	}

	function delete($id){
		if(!empty($id)){
			if($this->article_model->delete($id)){
				$this->load->model('article_category_model');
				if($this->article_category_model->delete(array('article_id'=>$id))){
					$this->session->set_flashdata('message','Article has been deleted.');
				}else{
					$this->session->set_flashdata('error','Error occures, please try again');
				}
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
			}
		}else{
			$this->session->set_flashdata('error','Error occures, please try again');
		}

		redirect('admin/articles','refresh');
	}

	function submit(){
		$this->load->library('user_agent');

		$this->load->model('article_category_model');

		$data = $this->input->post();

		$cat_ids = $data['category_ids'];
		unset($data['category_ids']);

		$conditions = "";
		if(!empty($data['id'])){
			$conditions = array('id <>'=>$data['id']);
		}

		$exist_slug = $this->article_model->where($conditions)->get();

		unset($data['files']);
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

				$this->article_category_model->delete(array('article_id'=>$data['id']));
				foreach($cat_ids as $k => $v){
					$acat['article_id'] = $data['id'];
					$acat['category_id'] = $k;
					$acat['model'] = 'article';
					$this->article_category_model->insert($acat);
				}
				$this->session->set_flashdata('message','article has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){
				foreach($cat_ids as $k => $v){
					$acat['article_id'] = $id;
					$acat['category_id'] = $k;
					$acat['model'] = 'article';
					$this->article_category_model->insert($acat);
				}
				$this->session->set_flashdata('message','article has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/articles','refresh');
	}

}
