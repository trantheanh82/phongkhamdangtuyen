<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends MY_Model
{

	public $table = "sliders";
    public function __construct()
    {
    	//$this->has_many['translations'] = array('Page_translation_model','page_id','id');
			$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
			$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

			$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
			$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

        parent::__construct();
    }

		public function get_home_sliders($language){
			$items = $this->with_translation("fields:content","where:`model`='slider' and language='".$language."'")
			->set_cache($language.'_home_sliders')
			->where('active','Y')
			->set_cache($language)
			->get_all();

			return $items;

		}
}
