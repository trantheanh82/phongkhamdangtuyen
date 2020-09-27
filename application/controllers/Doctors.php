<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends Public_Controller {

	protected $page_id;
	protected $page;
	public function __construct(){
    $this->load->model('doctor_model');
		$this->load->model('category_model');

    $this->load->model('page_model');
    $this->load->model('slug_model');
    
		parent::__construct();
    
    $this->page_id = $this->slug_model
    ->where(
      "slug='doctor' and language='".$this->current_lang."' and model='page' or `slug`='bac-si' and language='".$this->current_lang."' and model='page'  ",'','',false,false,true)
    ->get();
    $this->page = $this->page_model
                          ->with_translation('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->with_slug('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->where('id',$this->page_id->model_id)
                          ->get();

    $this->data['before_head'] .= "<style>#breadcrumb{background-image: url(".base_url().$this->page->image.")}</style>";
		$this->breadcrumbs->push($this->page->translation->content->name,"/".$this->page_id->slug);
  }
  
  public function index($slug=""){
    if(empty($slug)){
		  $this->data['page_name'] = $this->page->translation->content->name;
			$this->data['items'] = $this->doctor_model->get_items($this->current_lang);
			$this->render('/doctors/index_view');
		}
  }
}
