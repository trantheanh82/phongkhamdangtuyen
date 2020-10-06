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
    $this->load->model('service_model');

    $this->page =  $this->page_model->get_page('chuyen-khoa',$this->current_lang);
    $this->data['before_head'] .= "<style>#breadcrumb{background-image: url(".base_url().$this->page ->image.")}</style>";
    $this->breadcrumbs->push($this->page ->translation->content->name,"/".$this->page->slug->slug);

  }

  public function index($slug = ""){
    if(empty($slug)){
      $this->data['specialists'] = $this->specialist_model->get_all_items($this->current_lang);
  		$this->data['doctors']	=	$this->doctor_model->get_dropdown('doctors',$this->current_lang);
      $this->data['page'] = $this->page;

      /*SEO*/
      $this->data['page_title'] = $this->page->translation->content->meta_title;
      $this->data['meta_description'] = $this->page->translation->content->meta_description;
      $this->data['meta_image'] = $this->page->image;

      $this->render('/specialists/index_view');

    }else{

      $this->get_detail($slug);
    }

  }

  public function get_detail($slug){
    $slug = $this->slug_model->where(array('slug'=>$slug,'model'=>'specialist'))->get();
    $this->data['specialist'] = $this->specialist_model->get_item_detail($slug->model_id,$this->current_lang,true);
    $this->data['page'] = $this->page;
    $this->data['subpage_name'] = $this->data['specialist']->translation->content->name;
    $this->data['doctors'] = $this->doctor_model->get_items($this->current_lang);
    
    /*Side Bar*/
    $this->data['other_specialists'] = $this->specialist_model->get_other($this->data['specialist']->id,$this->current_lang);
    $this->data['services'] = $this->service_model->get_items($this->current_lang);
    $this->data['lastest_posts']  = $this->article_model->get_lastest_article($this->current_lang,5);


    /*SEO*/
    $this->data['page_title'] = $this->data['specialist']->translation->content->meta_title;
    $this->data['meta_description'] = $this->data['specialist']->translation->content->meta_description;
    $this->data['meta_image'] = $this->data['specialist']->image;


    $this->breadcrumbs->push($this->data['specialist']->translation->content->name,"/");
    $this->render('/specialists/detail_view');
  }

	public function submit(){

	}

}
