<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccinations extends Admin_Controller {

  function __construct(){

    parent::__construct();
    $this->load->model('vaccination_model');

    if(!$this->ion_auth->in_group('admin'))
    {
      $this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('admin','refresh');
    }


    $this->data['script_for_layout'] .= assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');
    $this->data['before_head']	.=	assets('bootstrap-tagsinput/dist/bootstrap-tagsinput.css');

    $this->data['page_name'] = 'Vaccinations';
    $this->model = 'vaccination';
  }

  function index(){

    $items = $this->vaccination_model->get_items($this->current_lang);
    $this->data['items'] = $items;
    $this->render('admin/vaccination/index_view');

  }

  function create(){

    $this->__loadScriptUpload();
    $this->render('admin/vaccination/vaccination_create_edit_view');
  }

  function edit($id){

    $item = $this->vaccination_model
    ->with_translations('where:`model`=\''.$this->model.'\'')
    ->with_slugs('where:`model`=\''.$this->model.'\'')
    ->with_articles_categories()
    ->where('id',$id)
    ->get();
    pr($this->db->last_query());
    pr($item);exit();
    foreach($item ->translations as $k=>$value){
      $item ->content[$value->language] = $value->content;
      $item ->content[$value->language]->id = $value->id;
    }

    foreach($item ->slugs as $k=>$value){
      $item ->slug[$value->language]->slug = $value->slug;
      $item ->slug[$value->language]->id = $value->id;
    }

    unset($item->translations);
    unset($item->slugs);
    $this->data['item'] = $item;
    $this->render('admin/vaccination/vaccination_create_edit_view');
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
				$this->session->set_flashdata('message','Vaccination has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){

				$this->session->set_flashdata('message','Vaccination has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

		redirect('admin/vaccinations','refresh');
  }

}
?>
