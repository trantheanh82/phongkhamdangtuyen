<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicmenu extends Admin_Controller {

	function __construct(){
    parent::__construct();
		$this->data['model'] = "public_menu";
    $this->data['page_name'] = "Public menu";
    $this->load->model("public_menu_model");

    if(!$this->ion_auth->in_group('admin')){
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}

  }

  function index(){
		redirect('admin/publicmenu/listing','location');
  }

	function listing(){
		$this->data['items'] = $this->public_menu_model->get_allitems($this->current_lang);
		$this->render('admin/publicmenu/publicmenu_view');
	}

	function create(){
		$this->data['page_name'] = 'Menu::create';
		$this->data['menu_type'] = array('simple'=>lang('Simple'),'mega_menu'=>lang('Mega menu'));
		$this->render('admin/publicmenu/publicmenu_create_edit_view');
	}

	function edit($id){
		$this->data['page_name'] = 'Menu::edit';

		$this->data['item'] = $this->public_menu_model
		->with_translations('where:`model`="public_menu" and `model_id`="'.$id.'"')
		->with_slugs('where:`model`=\'public_menu\' AND `model_id`=\''.$id.'\'')
		->as_object()
		->get($id);

		foreach($this->data['item']->translations as $k=>$value){
			$this->data['item']->content[$value->language] = new \stdClass();
			$this->data['item']->content[$value->language] = $value->content;
			$this->data['item']->content[$value->language]->id = $value->id;
		}

		foreach($this->data['item']->slugs as $k=>$value){
			$this->data['item']->slug[$value->language] = new \stdClass();
			$this->data['item']->slug[$value->language]->slug = $value->slug;
			$this->data['item']->slug[$value->language]->id = $value->id;
		}

		$this->data['menu_type'] = array('nav_simple'=>lang('Simple'),'nav_2_columns'=>lang('2 Columns'),'nav_4_colums'=>lang('4 Columns'),'nav_megamenu'=>lang('Mega menu'));

		$this->render('/admin/publicmenu/publicmenu_create_edit_view');
	}

	function submit(){
		$data = $this->input->post();
		$data['model'] = $this->data['model'];

		if(!empty($data['id'])){
			if(parent::__submit($data,$this->data['model'])){
				$this->session->set_flashdata('message','pages has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{
			if($id = parent::__submit($data,$this->data['model'])){
				$this->session->set_flashdata('message','pages has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}

		redirect('admin/publicmenu','refresh');
	}
}
