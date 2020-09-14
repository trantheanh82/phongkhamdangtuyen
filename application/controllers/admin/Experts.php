<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experts extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('expert_profile_model');

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->data['page_name'] = 'Experts';
		$this->model = 'expert_profile';
	}

  function index(){

		$this->data['items'] = $this->expert_profile_model->get_items($this->current_lang);
    $this->render('admin/experts/listing_experts');
  }

	function create(){

		$this->render('admin/experts/create_edit_expert');
	}

	function edit($id){
		$this->data['item'] = $this->expert_profile_model->get_item($id,$this->current_lang);

		$this->render('admin/experts/create_edit_expert');
	}

	function delete($id){

	}

	function submit(){
		$data = $this->input->post();
		if(!empty($data['social'])){
			$data['social'] = json_encode($data['social']);
		}
		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){
				$this->session->set_flashdata('message','expert has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{

			if($id = parent::__submit($data,$this->model)){

				$this->session->set_flashdata('message','expert has been updated.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}



		redirect('admin/experts','refresh');
	}
}
