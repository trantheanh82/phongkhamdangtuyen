<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends MY_Model
{

		public $table = "pages";
		public $name = 'page';

    public function __construct()
    {
    	//$this->has_many['translations'] = array('Page_translation_model','page_id','id');
			$this->has_many['page_category'] = array('Page_category_model','page_id','id');

			$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
			$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

			$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
			$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

        parent::__construct();
    }

    public function get_menu_about(){

	    return $this->where(array('on_menu'=>'Y','active'=>'Y'))->fields(array('name','slug'))->order_by('sort','ASC')->get_all();
    }

		public function get_menu($lang){
			$conditions = "where:`model`='".$this->name."' and `language`='".$lang."'";

			return $this->with_translation($conditions)
									->with_slug($conditions)
									->where(array('on_menu'=>'Y','active'=>'Y'))
									->order_by('sort','ASC')
									->get_all();
		}

    public function get_page($page_slug,$lang){

			$slug = $this->slug_model->where(array('slug'=>$page_slug,'language'=>$lang,'model'=>'page'))->set_cache($page_slug.'_'.$lang)->get();

			if(empty($slug)){
				return false;
			}

			$condition = "where:`model`='page' and `language`= '".$lang."'";

			$item = $this
							->with_translation($condition)
							->with_slug($condition)
							->where(array('id'=>$slug->model_id,'active'=>'Y'))
							->set_cache($slug->slug.'_'.$lang)
							->get();
			if(empty($item)) return false;

			return $item;
		}

		function get_other_page($language){

			$condition = "where:`model`='page' and `language`= '".$language."'";
			$item = $this
							->with_translation("fields: content",$condition)
							->with_slug("fields:slug",$condition)
							->with_page_category('where:`category_id`= 59')
							->where(array('active'=>'Y'))
							->order_by('sort','ASC')
							->set_cache('other_pages_'.$language)
							->get_all();
			 return $item;
		}

}
