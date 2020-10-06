<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Public_Controller {

	protected $page_id;
	protected $page;
	public function __construct(){

		parent::__construct();

    $this->load->model('service_model');
		$this->load->model('category_model');

    $this->load->model('page_model');
    $this->load->model('slug_model');


    $this->page_id = $this->slug_model
    ->where(
      "slug='service' and language='".$this->current_lang."' and model='page' or `slug`='dich-vu' and language='".$this->current_lang."' and model='page'  ",'','',false,false,true)
    ->get();

    $this->page = $this->page_model
                          ->with_translation('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->with_slug('where:`model`="page" and `language`="'.$this->current_lang.'"')
                          ->where('id',$this->page_id->model_id)
                          ->get();


    $this->data['before_head'] .= "<style>#breadcrumb{background-image: url(".base_url().$this->page->image.")}</style>";
		$this->breadcrumbs->push($this->page->translation->content->name,"/".$this->page_id->slug);

	}

  function index($slug=""){
		if(empty($slug)){
		  $this->data['page_name'] = $this->page->translation->content->name;
			$this->data['items'] = $this->service_model->get_items($this->current_lang);
			
			/*SEO*/
      $this->data['page_title'] = $this->page->translation->content->meta_title;
      $this->data['meta_description'] = $this->page->translation->content->meta_description;
      $this->data['meta_image'] = $this->page->image;
			
			$this->render('/services/index_view');
		}else{
			$this->detail($slug);
		}
  }

	function detail($slug){
			$this->data['item'] = $this->service_model->get_item($slug,$this->current_lang);

			$this->breadcrumbs->push($this->data['item']->translation->content->name,"/");
			$this->data['page_name'] = $this->data['item']->translation->content->name;
			
			$this->data['other_services'] = $this->service_model->get_items($this->current_lang);
			$this->data['specialists'] = $this->specialist_model->get_all_items($this->current_lang);
			$this->data['lastest_posts']  = $this->article_model->get_lastest_article($this->current_lang,5);

			foreach($this->data['other_services'] as $k=>$v){
				if($v->id == $this->data['item']->id)
					unset($this->data['other_services']->$k);
			}

			/*SEO*/
      $this->data['page_title'] = $this->data['item']->translation->content->meta_title;
      $this->data['meta_description'] = $this->data['item']->translation->content->meta_description;
      $this->data['meta_image'] = $this->data['item']->image;

			$this->render('/services/detail_view');
	}

}
