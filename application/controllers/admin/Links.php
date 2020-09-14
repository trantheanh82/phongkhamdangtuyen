<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends Admin_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('link_model');

		$this->load->library('ion_auth');
		$this->data['page_name'] = lang('links');
		$this->model = 'link';
	}

	function index(){
		$this->data['items'] = $this->link_model
		->with_translation('where:`model`=\''.$this->model.'\' AND `language`=\''.$this->current_lang.'\'')
		->as_object()
		->order_by('created_at','ASC')
		->get_all();

		$this->render('admin/links/listing_view');
	}

	function create(){
		$this->render('admin/links/create_edit_view');
	}

	function edit($id){
		if(!empty($id)){
			$this->data['item'] = $this->link_model
			->with_translations('where:`model`="link" and `model_id`="'.$id.'"')
			->get($id);

			foreach($this->data['item']->translations as $k=>$value){
				$this->data['item']->content[$value->language] = $value->content;
				$this->data['item']->content[$value->language]->id = $value->id;
			}

			$this->render('admin/links/create_edit_view');

		}else{
			$this->session->set_flashdata('error','There is no page id to edited');
			redirect('admin/pages',true);
		}
		$this->data['item'] = $this->link_model->get($id);

		$this->render('admin/links/create_edit_view');
	}

	function delete($id){
		if(parent::__delete($id,'link',true,true)){
			$this->session->set_flashdata('message','a link has been deleted.');
		}else{
				$this->session->set_flashdata('error','Error occures, please try again');
		}
		redirect($this->agent->referrer(),'refresh');
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

		redirect('admin/links','refresh');
	}
}
