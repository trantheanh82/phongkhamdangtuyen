<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccinations extends Public_Controller {

	protected $page_id;
	protected $page;

	public function __construct(){
		parent::__construct();

    $this->load->model('vaccination_model');
		$this->load->model('category_model');

    $this->load->model('page_model');
    $this->load->model('slug_model');

		$this->page = $this->page_model->get_page('tiem-chung',$this->current_lang);

		$this->data['page_name'] = lang('Vaccinations');
		$this->breadcrumbs->push(lang('Vaccinations'),"/");

  }

  public function index($slug=""){
		if(!empty($slug)){

			$this->_detail($slug);
		}else{

			$this->data['page'] = $this->page;

			$items = $this->vaccination_model->get_all();

			$this->data['items'] = $items;
			$this->data['page_name'] = lang('Vaccinations');

			$this->render('/vaccinations/index_view');
		}
  }

	function _detail($slug){
		$item = $this->vaccination_model->get_item($slug,$this->current_lang);

		$this->data['page_name'] = $item->translation->content->name;
		$this->breadcrumbs->push( $item->translation->content->name,"/".$item->slug->slug);
		$this->data['item'] = $item;
		$this->render('/vaccinations/detail_view');
	}

}
