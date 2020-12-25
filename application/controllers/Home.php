<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->language('home_lang');

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
		$this->load->model('slider_model');
		$this->load->model('layout_item_model');

		// Sliders Main Banner
		$this->data['sliders'] = $this->slider_model->get_home_sliders($this->current_lang);
		$data = $this->layout_item_model->get_home_layout(1,$this->current_lang);
		//pr($data);
		$content = "";
		if(!empty($data)){
			foreach($data as $k=>$v){
				if(!empty($v->model) && !empty($v->function)){

					$model = $v->model.'_model';
					$this->load->model($model);
					//$items = $this->{$model}->get_home_items($this->current_lang);
					$items = call_user_func_array(array($this->{$model},$v->function),array($this->current_lang));
					$content .= $this->load->view($this->template.'/modules/'.$v->view,array('items'=>$items,'content'=>isset($v->translation->content->html)?$v->translation->content->html:""),TRUE);

				}else{
					if(!empty($v->view)){
						$content .= $this->load->view($this->template.'/modules/'.$v->view,array('content'=>$v->translation->content->html),TRUE);

					}else{
						$content .= $v->translation->content->html;
					}
				}
			}
		}

		$this->data['layout_content'] = $content;

		$this->render('/home/index_view');

	}

	function not_found(){
		$this->render('/home/not_found_404');
	}

	function language($slug = null){
		$this->load->library('user_agent');

		redirect($this->agent->referrer());
		if($this->agent->is_referral()){

		}

	}

	public function clearcache(){
		$this->output->delete_cache('/');

		$this->load->library('user_agent');
		if(!empty($this->agent->referrer())){
			redirect($this->agent->referrer(), 'location');
		}else{
			redirect('/','location');
		}

	}
}
