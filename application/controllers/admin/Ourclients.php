<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ourclients extends Admin_Controller {


	function __construct(){

		parent::__construct();
		$this->load->model('client_model');

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}

    $this->data['page_name'] = "Clients";

  }

  function index(){
		$this->data['items'] = $this->client_model->get_items();
    $this->render('admin/clients/listing_clients');
  }

  function create(){

		$this->render('admin/clients/create_edit_clients');
  }

  function edit($id){
		if(!empty($id)){
			$this->data['item'] = $this->client_model->get_item($id);
		}
		$this->render('admin/clients/create_edit_clients');
  }

  function delete($id){

  }

  function submit(){
		if(!empty($this->input->post())){
			$data = $this->input->post();

			if(isset($data['id'])){
				$id = $data['id'];unset($data['id']);
				if($this->client_model->update($data,$id) >= 0){
					$this->session->set_flashdata('message','Clients has been updated.');
				}else{
					$this->session->set_flashdata('error','Error occured, please try again.');
				}
			}else{
				if($this->client_model->insert($data)){
					$this->session->set_flashdata('message','Clients has been inserted.');
				}else{
					$this->session->set_flashdata('error','Error occured, please try again.');
				}
			}

			redirect('/admin/ourclients/','refresh');
		}

		redirect('/admin/ourclients');
  }
}
