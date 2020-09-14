<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Processing extends Admin_Controller
{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		
	}
	
	function create($model){
		
		$model = $model.'_model';
		
		$this->load->model($model);
		
		$data = $this->input->post();
		
		$data['created_by'] = $this->data['current_user']->id;
		
		
		if($this->$model->insert($data)){
			 
			$this->session->set_flashdata('message', __("Insert Done",$this));
		}else{
			
			$this->session->set_flashdata('error', __("Something wrongs",$this));
		}
		
		redirect($_SERVER['HTTP_REFERER']);
		exit();
	}
	
	function ajax_updateField($model,$field,$id,$value){
		
		$model = $model.'_model';
		
		$this->load->model($model);
		
		$update_data = array('active'=>$value);
		
		if($this->$model->where('id',$id)->update($update_data)){
			$this->data['updated'] = 'done';
		}else{
			$this->data['updated'] = 'failed';
		}
		
		$this->render('admin/processing/ajax_update','admin_ajax');
	}
	
	function ajax($command,$model,$id=null,$data=null){
		$model = $model.'_model';
		$this->load->model($model);
		$data = $this->input->post();
		
		switch($command){
			case 'insert':
				if($this->$model->insert($data)){
					echo __("Thông tin của Quý Khách đã được cậpt nhật. Nhân Viên THẢO TÂY LAND sẽ liên hệ với bạn trong thời gian sớm nhất",$this);
				}
			break;
		}
		exit();
	}
	
}