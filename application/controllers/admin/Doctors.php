<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends Admin_Controller {

  function __construct(){

		parent::__construct();

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
		$this->load->model('doctor_model');
		$this->data['page_name'] = 'Doctors';
		$this->model = 'doctor';

	}

  function index(){
    $this->data['items'] = $this->doctor_model->get_items($this->current_lang);
    $this->render('admin/doctors/listing_view');
  }

  function create(){
    $this->render('admin/doctors/create_edit_doctor');
  }

  function edit($id){
    $this->data['item'] = $this->{$this->model."_model"}->get_item($id,$this->current_lang);

    $this->render('admin/doctors/create_edit_doctor');
  }

  function delete($id){

  }

  function submit(){
    $data = $this->input->post();
		$data_id = 0;

		if(isset($data['id'])){
			$data_id = $data['id'];
		}

		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){
				$this->session->set_flashdata('message','a link has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{
			if($id = parent::__submit($data,$this->model)){
				$this->session->set_flashdata('message','a link has been created.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

    redirect('admin/doctors','refresh');
  }
}
