<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('slider_model');

		if(!$this->ion_auth->in_group('admin')){
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}

    $this->data['page_name'] = 'Sliders';
    $this->model = 'slider';

  }

  function index(){

    $this->data['items'] = $this->slider_model
		->with_translation('where:`model`="slider" AND `language`=\''.$this->current_lang.'\'')
    ->as_object()
    ->order_by('created_at','ASC')
    ->get_all();
		
    $this->render('admin/sliders/sliders_listing_view');
  }

  function create(){
    $this->data['page_name'] .= " create";
    $this->render('admin/sliders/slider_create_edit_view');

  }

  function edit($id){
    $this->data['page_name'] = lang('Slider')."::".lang('edit');
    if(!empty($id)){


      $this->data['item'] = $this->slider_model
      ->with_translations('where:`model`="'.$this->model.'" and `model_id`="'.$id.'"')
      ->get($id);

      foreach($this->data['item']->translations as $k=>$value){
        $this->data['item']->content[$value->language] = $value->content;
        $this->data['item']->content[$value->language]->id = $value->id;
      }

      unset($this->data['item']->translations);
    }

    $this->render('admin/sliders/slider_create_edit_view');
  }

  function delete($id){

  }

  function submit(){
    $data = $this->input->post();

		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){
				$this->session->set_flashdata('message','slider has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){

				$this->session->set_flashdata('message','slider has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/sliders','refresh');
  }

}
