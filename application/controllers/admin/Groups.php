<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends Admin_Controller {


	function __construct(){
		parent::__construct();
		$this->data['page_name'] = 'Groups';
		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
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

		  $this->data['groups'] = $this->ion_auth->groups()->result();
		  $this->render('admin/groups/list_groups_view');
	}

	public function create(){
		$this->data['page_title'] = 'Create group';
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('group_name','Group name','trim|required|is_unique[groups.name]');
		  $this->form_validation->set_rules('group_description','Group description','trim|required');

		  if($this->form_validation->run()===FALSE)
		  {
		    $this->load->helper('form');
		    $this->render('admin/groups/create_group_view');
		  }
		  else
		  {
		    $group_name = $this->input->post('group_name');
		    $group_description = $this->input->post('group_description');
		    $this->ion_auth->create_group($group_name, $group_description);
		    $this->session->set_flashdata('message',$this->ion_auth->messages());
		    redirect('admin/groups','refresh');
		  }
	}

	public function edit($group_id = NULL){
		$group_id = $this->input->post('group_id') ? $this->input->post('group_id') : $group_id;
		$this->data['page_title'] = 'Edit group';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('group_name','Group name','trim|required');
		$this->form_validation->set_rules('group_description','Group description','trim|required');
		$this->form_validation->set_rules('group_id','Group id','trim|integer|required');

		if($this->form_validation->run() === FALSE)
		{
		  if($group = $this->ion_auth->group((int) $group_id)->row())
		  {
		  	$this->data['group'] = $group;
		  }
		  else
		  {
		    $this->session->set_flashdata('message', 'The group doesn\'t exist.');
		    redirect('admin/groups', 'refresh');
		  }
		    $this->load->helper('form');
		    $this->render('admin/groups/edit_group_view');
		}
		else
		{
			$group_name = $this->input->post('group_name');
		    $group_description = $this->input->post('group_description');
		    $group_id = $this->input->post('group_id');

		    if(!$this->ion_auth->update_group($group_id, $group_name, $group_description))
		    $this->session->set_flashdata('message',$this->ion_auth->messages());

		    redirect('admin/groups','refresh');
		}
	}

	public function permissions($group_id){
		$this->load->model('group_model');
		$this->load->model('group_permission_model');

		if(!empty($this->input->post())){
			$data = $this->input->post();
			//pr($data);exit();
			$this->group_permission_model->where('group_id',$data['group_id'])->delete();
			foreach($data['Permissions'] as $controller=>$methods){
				foreach($methods as $method=>$value){
					$insert_data = array('group_id'=>$data['group_id'],'controller'=>$controller,'action'=>$method);
					//pr($insert_data);exit();
					$this->group_permission_model->insert($insert_data);
				}
			}
		}


		$this->data['group'] = $this->group_model->with_group_permission_model()->where('id',$group_id)->get();
		$this->data['group_permissions'] = $this->group_permission_model->where('group_id',$group_id)->get_all();

		$this->load->library('controllerlist');
		$controllers = $this->controllerlist->getControllers();

		foreach($controllers as $controller=>$methods){
			foreach($methods as $k=>$method)
			if (strpos($method, '_') !== false) {

			    unset($controllers[$controller][$k]);
			}
		}

		$this->data['controllers'] = $controllers;

		$this->data['page_name'] = __('Permissions for '.$this->data['group']->name,$this);
		$this->data['before_body'] = $this->__script_on_page();

		$this->render('admin/groups/permission_view');
	}

	public function delete($group_id){
		if(is_null($group_id))
		{
			$this->session->set_flashdata('message','There\'s no group to delete');
		}
		else
		{
			$this->ion_auth->delete_group($group_id);
			$this->session->set_flashdata('message',$this->ion_auth->messages());
		}
		redirect('admin/groups','refresh');
	}

	function __script_on_page(){
		return "
			<script>
				$(document).ready(function(){
					$('input[type=\"checkbox\"').on('ifUnchecked',function(event){
						name = $(this).attr('id');
						$('.'+name+'').iCheck('uncheck');
					});

					$('input[type=\"checkbox\"').on('ifChecked',function(event){
						name = $(this).attr('id');
						$('.'+name+'').iCheck('check');
					});

				});
			</script>
		";
	}
}
