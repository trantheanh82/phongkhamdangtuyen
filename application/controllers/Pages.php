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


		$this->data['before_head'] .= "<style>.page-title{background: url(".base_url().$this->data['item']->image.")}</style>";
		/*for meta tag*/
		$this->data['page_title'] .= $this->data['item']->translation->content->meta_title;
		$this->data['meta_description'] .= $this->data['item']->translation->content->meta_description;
		$this->data['meta_image'] .= $this->data['item']->image;

		$this->data['script_for_layout'] .= '
		<!-- Google Map -->
	<script>
			function initMap() {
			var myLatLng = {lat: '.$this->settings['company_latitude'].', lng: '.$this->settings['company_longitude'].'};
				var map = new google.maps.Map(document.getElementById(\'gmap\'), {
						center: myLatLng,
						zoom: 17,
						styles: [

							{ "elementType": "geometry", "stylers": [ { "color": "#ebe3cd" } ] }, 
							{ "elementType": "labels.text.fill", "stylers": [ { "color": "#523735" } ] }, 
							{ "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f1e6" } ] }, 
							{ 
								"featureType": "administrative",
								"elementType": "geometry.stroke", 
								"stylers": [ { "color": "#c9b2a6" } ]
							}, 
							{ 
								"featureType": "administrative.land_parcel", 
								"elementType": "geometry.stroke", 
								"stylers": [ { "color": "#dcd2be" } ] 
							}, 
							{ 
								"featureType": "administrative.land_parcel", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#ae9e90" } ] 
							}, 
							{ 
								"featureType": "landscape.natural", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#dfd2ae" } ] 
							}, 
							{ 
								"featureType": "poi", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#dfd2ae" } ] 
							}, 
							{ 
								"featureType": "poi", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#93817c" } ] 
							}, 
							{ 
								"featureType": "poi.park", 
								"elementType": "geometry.fill", 
								"stylers": [ { "color": "#a5b076" } ] 
							}, 
							{ 
								"featureType": "poi.park", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#447530" } ] 
							}, 
							{ 
								"featureType": "road", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#f5f1e6" } ] 
							}, 
							{ 
								"featureType": "road.arterial", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#fdfcf8" } ] 
							}, 
							{ 
								"featureType": "road.highway", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#f8c967" } ] 
							}, 
							{ 
								"featureType": "road.highway", 
								"elementType": "geometry.stroke", 
								"stylers": [ { "color": "#e9bc62" } ] 
							}, 
							{ 
								"featureType": "road.highway.controlled_access", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#e98d58" } ] 
							}, 
							{ 
								"featureType": "road.highway.controlled_access", 
								"elementType": "geometry.stroke", 
								"stylers": [ { "color": "#db8555" } ] 
							}, 
							{ 
								"featureType": "road.local", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#806b63" } ] 
							}, 
							{ 
								"featureType": "transit.line", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#dfd2ae" } ] 
							}, 
							{ 
								"featureType": "transit.line", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#8f7d77" } ] 
							}, 
							{ 
								"featureType": "transit.line", 
								"elementType": "labels.text.stroke", 
								"stylers": [ { "color": "#ebe3cd" } ] 
							}, 
							{ 
								"featureType": "transit.station", 
								"elementType": "geometry", 
								"stylers": [ { "color": "#dfd2ae" } ] 
							}, 
							{ 
								"featureType": "water", 
								"elementType": "geometry.fill", 
								"stylers": [ { "color": "#b9d3c2" } ] 
							}, 
							{ 
								"featureType": "water", 
								"elementType": "labels.text.fill", 
								"stylers": [ { "color": "#92998d" } ] 
							}	
					]
				});
		var image = "'.base_url().'assets/'.$this->template.'/images/place-marker.png'.'";
			var beachMarker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				icon: image,
				title: \''.$this->settings['company_name'].'!\'
			});
		marker.setMap(map);
			}
		</script>
		<!-- To use this code on your website, get a free API key from Google. Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp -->
		<script src="https://maps.googleapis.com/maps/api/js?key='.$this->settings['google_api_key'].'&callback=initMap" async defer></script>
		';

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
