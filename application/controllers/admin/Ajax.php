<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Admin_Controller {
	
	
	function __construct(){
		
		parent::__construct();
		
		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

	}
	
	function create(){
		header('Content-Type: application/json');
		if(!empty($this->input->post())){
			$data = $this->input->post();
			if(isset($data['model'])){
				$model = $data['model'];
				$this->load->model($model);
				
				if($id = $this->$model->insert($data)){
					$data['id'] = $id;
					
					echo json_encode($data);

				}else{
					echo "failed";
				}
			}
		}	
	}

}