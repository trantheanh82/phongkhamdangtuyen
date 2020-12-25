<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Healthcare_model extends MY_Model
{

		public $table = "healthcares";
		public $name = "healthcare";
    public function __construct()
    {
    	//$this->has_many['translations'] = array('Page_translation_model','page_id','id');
			$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
			$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

			$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
			$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

			$this->has_one['category'] = array('foreign_model'=>'Category_model','foreign_table'=>'categories','local_key'=>'category_id','foreign_key'=>'id');
        parent::__construct();
    }

    public function get_healthcares(){
	    return $this->where(array('active'=>'Y'))->fields(array('name','slug','image','description'))->order_by('sort','asc')->get_all();
    }

		public function get_dropdown_healthcares($lang){
			$items = $this->with_translation('fields:content|where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
										->where('active','Y')
										->fields('id')
										->set_cache($lang.'_get_dropdown_services')
										->get_all();

			if(!empty($items)){
				$services = array();
				foreach($items as $k =>$v){
					$services[$v->translation->content->name] = $v->translation->content->name;
				}
				asort($services);
			}
			return $services;
    }

		public function get_healthcare_by_category($category_id,$lang){
			return $this->with_translation('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
									->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
									->where(array('active'=>'Y','category_id'=>$category_id))
									->order_by('sort','asc')
									->set_cache($category_id.'_'.$lang)
									->get_all();
		}


		public function get_menu($current_lang){
			$conditions = "where:`model`='".$this->name."' and `language`='".$current_lang."'";

			return $this->with_translation($conditions)
									->with_slug($conditions)
									->where(array('on_menu'=>'Y','active'=>'Y'))
									->order_by('sort','ASC')
									->set_cache($current_lang)
									->get_all();


			//return $items;
		}

		public function get_items($language){
			return $this
	                            ->with_translation('where:`translations`.`model`= "'.$this->name.'" and `language`="'.$language.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->where(array('active'=>'Y'))
	                            ->order_by('sort','ASC')
	                            ->get_all();
		}

		public function get_home_items($language){
			$items = $this
	                            ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->where(array('active'=>'Y'))
															//->set_cache($language.'_get_home_items')
															->order_by('sort','ASC')
	                            ->get_all();
		 return $items;
		}

		public function get_item($slug,$lang){
			$model = $this->slug_model->where(array('slug'=>$slug,'model'=>$this->name))->get();

			return $this->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$lang.'"')
										->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
										->where(array('active'=>'Y','id'=>$model->model_id))
										->order_by('sort','ASC')
										->set_cache($slug.'_'.$lang)
										->get();
		}

		public function get_others($conditions,$lang){
			$conditions = array_merge(array('active'=>'Y'),$conditions);
			$items =  $this->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$lang.'"')
										->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
										->where($conditions)
										->order_by('sort','ASC')
										->get_all();
		return $items;
		}
}
