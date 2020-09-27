<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends MY_Model
{

		public $table = "doctors";
		public $name = 'doctor';
    public $fillable = array('image','active','sort');

    public function __construct(){
      $this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
      $this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

      $this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
      $this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

      parent::__construct();
    }

		function get_dropdown($model,$lang="vi"){
			//$lists = $this->get_all();
			//$lists = $this->with_translation('where: `model`=\''.$this->name.'\' AND `language`=\''.$lang.'\'')->where(array('model'=>$model,'active'=>'Y'))->order_by('sort','asc')->set_cache($model.'_'.$lang)->get_all();
			$lists = $this->with_translation('where: `model`=\''.$this->name.'\' AND `language`=\''.$lang.'\'')->where(array('active'=>'Y'))->order_by('sort','asc')->set_cache($model.'_'.$lang)->get_all();

			$dropdown = array();
			foreach($lists as $k=>$value){
				$dropdown[$value->id] = $value->translation->content->name;
			}

			return $dropdown;

		}

    function get_items($lang){
      $conditions = "where:`model`='".$this->name."' AND `language`='".$lang."'";
      $items = $this->with_translation($conditions)->get_all();
      return $items;
    }

    function get_item($id,$lang){
			$conditions = "where:`model`='".$this->name."' AND `model_id`='".$id."'";
			$item = $this->with_translations($conditions)->get($id);
			foreach($item->translations as $k=>$value){
				$item->content[$value->language] = $value->content;
				$item->content[$value->language]->id = $value->id;
			}

			unset($item->translations);
			return $item;

		}

		function get_item_detail($id,$lang){
			$conditions = "where:`model`='".$this->name."' AND `model_id`='".$id."' AND `language`='".$lang."'";
			return $this->with_translation($conditions)->get($id);

		}

		function get_home_items($lang){
			return $this->{$this->name.'_model'}
                    ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$lang.'"')
                    ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
                    ->where(array('active'=>'Y'))
										//->set_cache($language.'_get_home_items')
										->order_by('sort','ASC')
										->limit(4)
                    ->get_all();

		}
}
