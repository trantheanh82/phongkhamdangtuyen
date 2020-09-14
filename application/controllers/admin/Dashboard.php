<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	function __construct(){
		parent::__construct();
		
		if(!$this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('message','You are not allowed to visit the Pages page');
            redirect('admin/auth/login','refresh');
        }
        
        $this->data['page_name'] = 'Dash Board';
		
		$this->data['script_for_page'] .= assets('plugins/iCheck/icheck.min.js');
		
		$this->data['script_for_page'] .= assets('chart.js/Chart.js');
		$this->data['script_for_page'] .= assets('js/dashboard.js');
		
		$this->data['script_for_page'] .= assets('datatables.net/js/jquery.dataTables.min.js');
		$this->data['script_for_page'] .= assets('select2/dist/js/select2.full.min.js');
		$this->data['script_for_page'] .= assets('plugins/iCheck/icheck.min.js');
		$this->data['script_for_page'] .= assets('plugins/input-mask/jquery.inputmask.js');
		$this->data['script_for_page'] .= assets('plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->data['script_for_page'] .= assets('plugins/input-mask/jquery.inputmask.extensions.js');
		$this->data['script_for_page'] .= assets('fastclick/lib/fastclick.js');
		
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->model('widget_model');
		$this->load->helper('widget_helper');
		
		//pr($this);
		
		$this->data['widgets'] = $this->widget_model->getAll($this->ion_auth->get_user_id());
		
		//Load Widgets Language
		if(!empty($widgets)){
			foreach($this->data['widgets'] as $k=>$v){
				$this->lang->load(strtolower($v->name).'_widget',strtolower($this->data['current_lang']['name']));
			}
		}
		
		$this->render('admin/dashboard/dashboard_view');
	}
	
	public function settings(){
		
	}
	
	public function widget_statistic($course_id = ""){
		$this->load->model('course_model');
		
		if($course_id == ""){
			$this->db->select_max("course_id");
			$this->db->from('courses');
			$query = $this->db->get('');
			
			$course = $query->result();
		}
		
		
	}
}
