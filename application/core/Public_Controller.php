<?php

class Public_Controller extends MY_Controller{

	protected $template;
	protected $settings;
	function __construct(){

		parent:: __construct();
		$this->load->library('breadcrumbs');

		$this->data['lang'] = $this->lang->load('global',strtolower($this->data['current_lang']['name']));

		parent::load_languages(false);

		$this->data['Settings'] = $this->settings = $this->__getGlobalSettings();

		$this->template = 'dangtuyen';
		$this->data['template'] = $this->template;

		$this->data['langs'] = $this->__getLanguages();
		$this->data['css_for_elements'] .= "";
		$this->data['before_head'] .= parent::insert_assets(array(
			'bootstrap.min.css',
			'all.css',
			'flaticon.css',
			'menu.css',
			'dropdown-effects/fade-down.css',
			'magnific-popup.css',
			'owl.carousel.min.css',
			'owl.theme.default.min.css',
			'animate.css',
			'jquery.datetimepicker.min.css',
			'style.css',
			'responsive.css'
		),$this->template,'css',false);

		//$this->data['before_head'] .= parent::insert_assets('modernizr-2.8.3.min.js',$this->template,'js',false);

		$this->data['before_body'] .= parent::insert_assets(array('jquery-3.3.1.min.js','wow.js'),$this->template,'js',false,"");
		$this->data['before_body'] .= parent::insert_assets(array(
			'bootstrap.min.js',
			'modernizr.custom.js',
			'jquery.easing.js',
			'jquery.appear.js',
			'jquery.stellar.min.js',
			'menu.js',
			'sticky.js',
			'jquery.scrollto.js',
			'materialize.js',
			'owl.carousel.min.js',
			'jquery.magnific-popup.min.js',
			'imagesloaded.pkgd.min.js',
			'isotope.pkgd.min.js',
			'hero-form.js',
			'contact-form.js',
			'comment-form.js',
			'appointment-form.js',
			'jquery.datetimepicker.full.js',
			'jquery.validate.min.js',
			'jquery.ajaxchimp.min.js',
			'custom.js'
		),$this->template,'js',false,'defer');

		if(!empty($this->data['Settings']['header_javascript'])){
			$this->data['before_head'] .= $this->data['Settings']['header_javascript'];
		}

		if(!empty($this->data['Settings']['footer_javascript'])){
			$this->data['before_body'] .= $this->data['Settings']['footer_javascript'];
		}
		$this->data['main_menu'] = $this->__getPublicMenu();
		$this->data['footer_links'] = $this->__getFooterLinks();

		$this->data['page_title'] = $this->data['Settings']['company_name']." ";
		$this->data['meta_description'] = $this->data['Settings']['company_description'];
		$this->data['meta_image'] = "assets/dangtuyen/images/default-avatar.jpg";


		$this->breadcrumbs->push('<i class="fa fa-home" aria-hidden="true"></i> '.lang('Home'), '/home');
		$this->breadcrumbs->crumb_open = "<li class='breadcrumb-item'>";
		$this->breadcrumbs->crumb_close = "</li>";
		$this->breadcrumbs->crumb_last_open = "<li class='breadcrumb-item active' aria-current='page'>";
		$this->breadcrumbs->divider = "::";
	}

	/**
	* Get Global Menu
	*
	**/
	function __getPublicMenu(){
			$this->load->model('public_menu_model');

			//$this->db->cache_on();
			$public_menu = $this->public_menu_model->getTreeMenu($this->current_lang);

			foreach($public_menu as $k => $v){
				if(!empty($v->user_function)){
					$model = $v->class_name.'_model';
					$this->load->model($model);

					$items = $this->{$model}->get_menu($this->current_lang,'article');
					if(!empty($items))
					$public_menu[$k]->children = $items;

				}
				/*switch($v->name){
					case 'About us':
						$this->load->model('page_model');
						$public_menu[$k]->children = $this->page_model->get_menu_about();

					break;
					case 'Services':
						$this->load->model('service_model');
						$public_menu[$k]->children = $this->service_model->get_menu_services();
					break;
					case 'Manufactures':
						$this->load->model('manufacture_model');
						$public_menu[$k]->children = $this->manufacture_model->get_home_menu();
					break;
					case 'News':
						$this->load->model('category_model');
						$public_menu[$k]->children = $this->category_model->get_menu_category();
					break;
					case 'Products & Solutions':
						$this->load->model('solution_model');
						$public_menu[$k]->children = $this->solution_model->get_menu_solutions();
					break;
				}*/
			}
		return $public_menu;

	}

	/**
	*
	*
	*
	**/
	function matedata($item){

	}

	function __getFooterLinks(){
		$this->load->model('link_model');

		$links = $this->link_model
		->with_translation("fields:content","where:`model`='link' and language='".$this->current_lang."'")
		->where(array('active'=>'Y'))
		->order_by('sort','asc')
		//->set_cache($this->current_lang.'_footer_menu',8400)
		->get_all();

		return $links;
	}

	function __getLanguages(){

		if(! $langs = $this->cache->get('languages')){
			$this->load->model('language_model');

			$langs = $this->language_model->get_all(array('active'=>1));

			$this->cache->save('languages',$langs);
		}

		return $langs;
	}

	protected function render($the_view = null, $template = "master" ){
		parent::render($this->template.$the_view, $template);
	}

}
