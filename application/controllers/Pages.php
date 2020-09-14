<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller {

	public function __construct(){

	parent::__construct();
		$this->load->language('pages_lang');
		$this->load->model('page_model');
		$this->data['before_body'] .= parent::insert_assets('jquery.magnific-popup.min.js',$this->template,'js',false);

	}

  public function index($slug){

		if(!empty($slug) && $this->data['item'] = $this->page_model->get_page($slug,$this->current_lang)){

			$this->data['items'] = $this->page_model->get_other_page($this->current_lang);

			$this->data['page_title'] .= $this->data['item']->translation->content->name;
			$this->data['meta_description'] .= $this->data['item']->translation->content->description;
			$this->data['meta_image'] .= $this->data['item']->image;

			$this->data['before_head'] .= "<style>.page-title{background-image: url(".base_url().$this->data['item']->image.")}</style>";

			$this->breadcrumbs->push($this->data['item']->translation->content->name,'/');

			if($this->data['item']->id == 9 ||
					$this->data['item']->slug->slug == 'about-us' ||
					$this->data['item']->slug->slug == 'gioi-thieu'){
						$this->load->model('expert_profile_model');
						$this->load->model('client_model');

						$this->data['experts'] = $this->expert_profile_model->get_home_items($this->current_lang);
						$this->data['clients'] = $this->client_model->get_home_items();


						$this->render('/pages/about_us_view');

			}else{
				$this->render('/pages/page_view');
			}


		}else{ redirect('/home/not_found');}
	}

  public function contact(){

		$model = 'page';
    $this->load->model('page_model');
    $this->load->model('slug_model');

		if($this->input->is_ajax_request()){
			$this->load->model('contact_model');
			$data = $this->input->post();
			$data['created_at'] = date('Y-m-d H:i:s');
			if($this->contact_model->insert($data)){
				echo "success";
			}else{
				echo lang("Something wrong, please try again.");
			}

			return;
		}

    $page_id = $this->slug_model
		->fields('model_id')
		->where(
			"slug='contact' and language='".$this->current_lang."' and model='page' or `slug`='lien-he' and language='".$this->current_lang."' and model='page'  ",'','',false,false,true)
		->get();
		$this->data['item']= $this->page_model
													->with_translation('fields:content','where:`model`="'.$model.'" and `language`="'.$this->current_lang.'"')
													->where('id',$page_id->model_id)
													->get();


	  $this->data['before_head'] .= '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-7QS3g8eFOy8ieWMQ7_r6ROWsjIfVtMU"></script>';
		$this->data['before_head'] .= "<style>.page-title{background: url(".base_url().$this->data['item']->image.")}</style>";
		/*for meta tag*/
		$this->data['page_title'] .= $this->data['item']->translation->content->meta_title;
		$this->data['meta_description'] .= $this->data['item']->translation->content->meta_description;
		$this->data['meta_image'] .= $this->data['item']->image;

		$this->data['script_for_layout'] = '
		<script type="text/javascript">
		/*-------------------------------------
     Google Map
     -------------------------------------*/
    if ($("#googleMap").length) {

        //Map initialize
        var initialize = function() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng('.$this->data['Settings']["company_latitude"].','.$this->data['Settings']['company_longitude'].'),
                styles: [{
                    stylers: [{
                        saturation: -100
                    }]
                }]
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),
                mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: "/assets/'.$this->template.'/img/map-marker.png",
                map: map
            });
        }

        // Add the map initialize function to the window load function
        google.maps.event.addDomListener(window, "load", initialize);
    }
    </script>';

		$this->breadcrumbs->push($this->data['item']->translation->content->name,'/');
		$this->render('/pages/contact_us_view');
  }

	public function request_call(){
		if($this->input->is_ajax_request()){
			$this->load->model('request_call_model');
			$data = $this->input->post();
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['view'] = 'N';
			if($this->request_call_model->insert($data)){
				echo "success";
			}else{
				echo lang("Something wrong, please try again.");
			}

			return;
		}
	}

}
