<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends MY_Model
{
	public $table = "faqs";
	private $name = 'faq';

    public function __construct(){

      $this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
			$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

			$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
			$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

      parent::__construct();
    }

		public function get_home_items($language){
			return $this->faq_model
	                            ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->where(array('active'=>'Y'))
															->set_cache($language.'_get_home_items')
															->order_by('sort','ASC')
	                            ->get_all();

		}

		public function get_items($language){
			return $this->faq_model
	                            ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->where(array('active'=>'Y'))
															->set_cache($language.'_get_home_items')
															->order_by('sort','ASC')
	                            ->get_all();
		}
}
