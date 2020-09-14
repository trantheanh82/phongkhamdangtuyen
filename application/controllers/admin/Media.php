<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Admin_Controller
{	
	function __construct(){
		parent::__construct();
		//$this->config->load('responsive_filemanager');
	}
	
	
	function filemanager(){
		$this->data['page_name'] = "Media";
		$this->render('admin/media/filemanager_view');
	}
}