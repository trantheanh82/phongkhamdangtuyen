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
  }

  function index(){
    
  }

}
