<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Richfilemanager extends Admin_Controller {
    public function __construct(){
		parent::__construct();		
		$this->load->library('RichFilemanagerLib','richfilemanagerlib');
    }
    
	public function index()
	{     
		$this->data['before_head'] .= assets('admin/richfilemanager/src/css/libs-main.css',false);
		$this->data['before_head'] .= assets('admin/richfilemanager/src/css/filemanager.min.css',false);
		$this->data['before_head'] .= $this->__script_for_page();
		
        $this->render('/admin/richfilemanager');
    }
    
    public function modal(){
	    $this->render('/admin/richfilemanager','editor_master');
    }
    
    public function localAPI()
	{               
		$this->data['before_head'] .= assets('admin/richfilemanager/src/css/libs-main.css',false);
		$this->data['before_head'] .= assets('admin/richfilemanager/src/css/filemanager.min.css',false);
		$this->data['before_head'] .= $this->__script_for_page();
      $this->richfilemanagerlib->local()->run(); 
      $this->load->view('/admin/richfilemanager');
    }
    
    public function s3API()
	{
        $this->richfilemanagerlib->s3()->run();        
    }
    
    function __script_for_page(){
	    return '<style type="text/css">
					.fm-container .fm-loading-wrap {
						position: fixed;
						height: 100%;
						width: 100%;
						overflow: hidden;
						top: 0;
						left: 0;
						display: block;
						background: white url(/billfee/assets/admin/richfilemanager/images/spinner.gif) no-repeat center center;
						z-index: 999;
					}
				</style>';
    }
}