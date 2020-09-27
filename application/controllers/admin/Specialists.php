<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialists extends Admin_Controller {

  function __construct(){

		parent::__construct();

		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}


		$this->load->model('specialist_model');
    $this->load->model('doctor_model');
		$this->data['page_name'] = 'Specialists';
		$this->model = 'specialist';

    //
    $this->data['before_head'] .= assets('dangtuyen/css/flaticon.css',false);

	}

  function index(){
    $this->data['items'] = $this->{$this->model."_model"}->get_items($this->current_lang);
    
    $this->render('admin/specialists/listing_view');
  }

  function create(){
    $this->data['icons'] = $this->fetch_icon();
    $this->data['list_doctors'] = $this->doctor_model->get_dropdown('doctor',$this->current_lang);

    $this->render('admin/specialists/create_edit_view');
  }

  function edit($id){
    $this->data['icons'] = $this->fetch_icon();
    $this->data['item'] = $this->{$this->model."_model"}->get_item($id,$this->current_lang);

    $this->data['list_doctors'] = $this->doctor_model->get_dropdown('doctor',$this->current_lang);

    $this->render('admin/specialists/create_edit_view');
  }

  function delete($id){

  }

  function submit(){
    $this->load->model('doctor_specialist_model');

    $data = $this->input->post();
		$data_id = 0;
		if(isset($data['id'])){
			$data_id = $data['id'];
		}

    $docs_list = $data['doctor_ids'];
    unset($data['doctor_ids']);

		if(!empty($data['id'])){

			if(parent::__submit($data,$this->model)){
        $this->doctor_specialist_model->delete(array('specialist_id'=>$data['id']));
        foreach($docs_list as $k => $v){
					$docs['specialist_id'] = $data['id'];
					$docs['doctor_id'] = $v;
					//$acat['model'] = 'page';
					$this->doctor_specialist_model->insert($docs);
				}

				$this->session->set_flashdata('message','a Specialist has been updated.');

			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');
			}
		}else{
			if($id = parent::__submit($data,$this->model)){
        foreach($docs_list as $k => $v){
					$docs['specialist_id'] = $id;
					$docs['doctor_id'] = $v;
					//$acat['model'] = 'page';
					$this->doctor_specialist_model->insert($docs);
				}
				$this->session->set_flashdata('message','Specialist has been created.');
			}else{
				$this->session->set_flashdata('error','Error occures, please try again');
				redirect($this->agent->referrer(),'refresh');

			}
		}

    redirect('admin/specialists','refresh');
  }

  function fetch_icon(){
    $file = FCPATH.'assets/'.$this->template.'/css/flaticon.css';

    $icon_file = fopen($file,'r') or die("Unable to open file!");
    $file_content = fread($icon_file,filesize($file));
    preg_match_all('/\.(.*?):\b/i', $file_content,$matchs);
    //array_splice($matchs[1],0,43);
    return $matchs[1];
  }
}
