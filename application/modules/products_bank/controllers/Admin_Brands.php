<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Manufactures extends Admin_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('manufacture_model');
		
		$this->load->library('ion_auth');
		$this->data['page_name'] = 'Brands';
				
		$this->data['script_for_layout'] .= "<script>
			$(document).ready(function(){
				$('.currency').simpleMoneyFormat();
			
			});
				
		</script>";
	}
	
	function index(){
		
		$this->data['items']  = $this->brand_model->order_by('sort','ASC')->get_all();
		
		$this->render('admin/manufactures/listing_view');
	}
	
}