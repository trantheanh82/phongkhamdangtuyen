<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('service_model');
		$this->load->model('category_model');
		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->data['page_name'] = 'Service';
		$this->model = 'service';

		//$this->data['script_for_layout'] .= assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');
		//$this->data['before_head']	.=	assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.css');

		//$this->data['before_head'] .= '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">';
		//$this->data['before_head'] .= assets('dangtuyen/css/font-awesome.min.css',false);
		//$this->data['before_body'] .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>';

		$this->data['before_body'] .= '<script>$.fn.selectpicker.Constructor.DEFAULTS.iconBase="fa";</script>';

	}

  function index(){
		$this->data['page_name'] = lang('Services listing');
		$this->data['items'] = $this->service_model
		->with_category(array('fields'=>'id','with'=>array('relation'=>'translation','fields'=>'content','where'=>array('`language`'=>"'".$this->current_lang."'"))))
		->with_translation('where:`model`=\''.$this->model.'\' AND `language`=\''.$this->current_lang.'\'')
		->with_slug('where:`model`=\''.$this->model.'\' AND `language`=\''.$this->current_lang.'\'')
		->as_object()
		->set_cache('admin_'.$this->current_lang)
		->order_by('created_at','ASC')
		->get_all();
		$this->render('admin/services/services_index_view');
  }

  function create(){
		//$this->data['icons'] = $this->fetch_icon();

		$this->data['list_cats'] = $this->category_model->get_dropdown('service',$this->current_lang);
    $this->render('/admin/services/service_create_edit_view');
  }

  function edit($id){
		//$this->data['icons'] = $this->fetch_icon();
		$this->data['page_name'] = lang('Service')."::".lang('edit');
		if(!empty($id)){
			$this->data['list_cats'] = $this->category_model->get_dropdown('service',$this->current_lang);

			$this->data['item'] = $this->service_model
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
			$this->render('admin/services/service_create_edit_view');

		}else{

			$this->session->set_flashdata('error','There is no page id to edited');
			redirect('admin/services',true);
		}
  }

  function delete($id){
		if(parent::__delete($id,'service',true,true)){
			$this->session->set_flashdata('message','services has been deleted.');
		}else{
			$this->session->set_flashdata('error','Error occures, please try again');
		}
  }

  function submit(){
		$data = $this->input->post();

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
				$this->session->set_flashdata('message','services has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){

				$this->session->set_flashdata('message','services has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/services','refresh');
  }

	function fetch_icon(){
		$file = FCPATH.'assets/'.$this->template.'/css/font-awesome.min.css';

		$icon_file = fopen($file,'r') or die("Unable to open file!");
		$file_content = fread($icon_file,filesize($file));

		preg_match_all('/\.(.*?):\b/i', $file_content,$matchs);
		array_splice($matchs[1],0,43);
		return $matchs[1];
	}
}
