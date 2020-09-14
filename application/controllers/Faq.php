<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Public_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->language('faq_lang');
    $this->load->model('faq_model');

    $this->load->model('page_model');
    $this->load->model('slug_model');


    $page_id = $this->slug_model
    ->fields('model_id')
    ->where(
      "slug='faq' and language='".$this->current_lang."' and model='page' or `slug`='faq' and language='".$this->current_lang."' and model='page'  ",'','',false,false,true)
    ->get();

    $this->data['item']= $this->page_model
                          ->with_translation('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->with_slug('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->where('id',$page_id->model_id)
                          ->get();

    $this->data['before_head'] .= "<style>.page-title{background-image: url(".base_url().$this->data['item']->image.")}</style>";
		$this->breadcrumbs->push("Faq","/");


	}

  function index(){
    $items = $this->faq_model->get_items($this->current_lang);
    if(empty($items)){
      redirect('/home/not_found','refresh');
    }
    foreach($items as $k =>$v){
      if(($k+1)%2 > 0){
        $this->data['items_l'][] = $v;

      }else{
        $this->data['items_r'][] = $v;
      }
    }
    $this->render('/faq/faq_index');
  }



}
