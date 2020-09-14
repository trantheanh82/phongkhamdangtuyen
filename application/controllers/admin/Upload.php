<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends Public_Controller {
	
	var $options;
	         
	function __construct(){
		parent::__construct();
		//init options 
		$this->options = array(
	        'script_url'=>'/billfee/vn/admin/upload/delete/product',
        	'mkdir_mode'=> 0777,
    		'user_dirs'=>false,
    		'image_versions'=> array(
	    		'medium' => array(
		    		'max_width'=> 1000,
		    		'max_height' => 1000
	    		),
	    		'thumbnail_500' => array(
		        	'max_width'=> 500,
		        	'max_height'=>500
		        	
	    		),
	    		'thumbnail' =>  array(
		        	'max_width'=> 80,
		        	'max_height'=>80,
		        	'crop'=>true
	    		)
    		)
        );

	}
	
	function index(){
		
		error_reporting(E_ALL | E_STRICT);
		
		$type_file = $this->input->post('type_file');
		
		switch($type_file){
			case 'file':
				$folder = 'file/';
				break;
			case 'images':
				$folder = 'img/';
				break;
			case 'video':
				$folder = 'video/';
				break;
			case 'product':
				$folder = 'product/';
				break;
			default:
				$folder = 'img/';
		}
		
        $this->options['upload_dir'] = getcwd().$this->config->item('upload_dir').$folder;
        $this->options['upload_url'] =	$this->config->base_url().$this->config->item('upload_dir').$folder;
        
		$this->load->library("UploadHandler",$this->options);
        
	}
	
	/*function delete(){
		
		$params = $this->input->get();
		if(!empty($params)){
			//$this->load->model('image_model');
			
			if(unlink(FCPATH.'assets/upload/product/'.$params['filename'])&& unlink(FCPATH.'assets/upload/product/thumbnail/'.$params['filename']) && unlink(FCPATH.'assets/upload/product/medium/'.$params['filename'])){
				echo 'done';
			}else{
				echo 'failed';
			}
		}
	}*/
	
	function delete($type_file){	
		switch($type_file){
			case 'file':
				$folder = 'file/';
				break;
			case 'images':
				$folder = 'img/';
				break;
			case 'video':
				$folder = 'video/';
				break;
			case 'product':
				$folder = 'product/';
				break;
			default:
				$folder = 'img/';
		}
		
        $this->options['upload_dir'] = getcwd().$this->config->item('upload_dir').$folder;
        $this->options['upload_url'] =	$this->config->base_url().$this->config->item('upload_dir').$folder;
		
		$this->load->library("UploadHandler",$this->options);
	}
	
		//watermark_image('image_name.jpg','watermark.png', 'new_image_name.jpg');
	
}