<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialists extends Public_Controller {

  public $page;
	public function __construct(){
    parent::__construct();
		$this->load->model('specialist_model');
		$this->load->model('doctor_model');
    $this->load->model('page_model');
    $this->load->model('slug_model');

    $this->page =  $this->page_model->get_page('chuyen-khoa',$this->current_lang);
    $this->data['before_head'] .= "<style>#breadcrumb{background-image: url(".base_url().$this->page ->image.")}</style>";
    $this->breadcrumbs->push($this->page ->translation->content->name,"/".$this->page->slug->slug);

  }

  public function index($slug = ""){
    if(empty($slug)){
      $this->data['specialists'] = $this->specialist_model->get_all_items($this->current_lang);
  		$this->data['doctors']	=	$this->doctor_model->get_dropdown('doctors',$this->current_lang);
      $this->data['page'] = $this->page;
      $this->render('/specialists/index_view');

    }else{

      $this->get_detail($slug);
    }

  }

  public function get_detail($slug){
    $slug = $this->slug_model->where(array('slug'=>$slug,'model'=>'specialist'))->get();
    $this->data['specialist'] = $this->specialist_model->get_item_detail($slug->model_id,$this->current_lang,true);
    
    $this->data['subpage_name'] = $this->data['specialist']->translation->content->name;

    $this->breadcrumbs->push($this->data['specialist']->translation->content->name,"/");
    $this->render('/specialists/detail_view');
  }

	public function submit(){

	}
}
