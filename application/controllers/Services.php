<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Public_Controller {

	protected $page_id;
	public function __construct(){

		parent::__construct();

    $this->load->model('service_model');
		$this->load->model('category_model');
		$this->load->language('services_lang');

    $this->load->model('page_model');
    $this->load->model('slug_model');


    $this->page_id = $this->slug_model
    ->where(
      "slug='service' and language='".$this->current_lang."' and model='page' or `slug`='dich-vu' and language='".$this->current_lang."' and model='page'  ",'','',false,false,true)
    ->get();

    $this->data['item']= $this->page_model
                          ->with_translation('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->with_slug('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->where('id',$this->page_id->model_id)
                          ->get();

    $this->data['before_head'] .= "<style>.page-title{background-image: url(".base_url().$this->data['item']->image.")}</style>";
		$this->breadcrumbs->push($this->data['item']->translation->content->name,"/".$this->page_id->slug);

	}

  function index($category_slug="",$service_slug=""){
		$this->data['items'] = $this->category_model->get_categories_by_model('service',$this->current_lang);

    if($category_slug == ""){

      $this->render('/services/service_view');
    }else{
			$this->load->model('article_model');
			foreach($this->data['items'] as $k =>$v){

        if($category_slug == $v->slug->slug){
          $this->data['service'] = $this->data['items']->$k;
					$this->breadcrumbs->push($this->data['service']->translation->content->name,$this->page_id->slug.'/'.$this->data['service']->slug->slug);
        }
      }

      if(!empty($this->data['service'])){
        $this->data['item_slug'] = $category_slug;

				$this->data['services'] = $this->service_model->get_services_by_category($this->data['service']->id,$this->current_lang);

        /*For meta tag*/
        $this->data['page_title'] .= $this->data['service']->translation->content->name;
        $this->data['meta_description'] .= $this->data['service']->translation->content->description;
        $this->data['meta_image'] .= $this->data['service']->image;

      }else{
        redirect('/home/not_found');
      }

			$this->data['latest_news'] = $this->article_model->get_latest_article($this->current_lang,5);

			if($service_slug != ""){
				$this->data['service_detail'] = $this->service_model->get_item($service_slug,$this->current_lang);

				foreach($this->data['services'] as $k=>$v){
					if($v->id == $this->data['service_detail']->id){
						unset($this->data['services']->$k);
					}
				}

				if(!empty($this->data['service_detail']->translation->tags)){
					$this->data['service_detail']->translation->tags = explode(',',$this->data['service_detail']->translation->tags);
				}

				$this->data['page_title'] = $this->data['service_detail']->translation->content->name;
        $this->data['meta_description'] = $this->data['service_detail']->translation->content->description;
        $this->data['meta_image'] = $this->data['service_detail']->image;

				$this->breadcrumbs->push($this->data['service_detail']->translation->content->name,'/');

				$this->render('/services/detail_service');
				return;
			}

			$this->render('/services/listing_services');

    }

  }
}
