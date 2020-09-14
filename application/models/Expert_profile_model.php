<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expert_profile_model extends MY_Model
{

		public $table = "expert_profiles";
		public $name = 'expert_profile';

    public function __construct()
    {
      $this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
      $this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

      $this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
      $this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

      parent::__construct();
    }

		function get_items($language){
			$conditions = "where:`model`='expert_profile' AND `language`='".$language."'";
			$items = $this->with_translation($conditions)->set_cache($language)->get_all();

			return $items;
		}

		function get_item($id,$language){
			$conditions = "where:`model`='expert_profile' AND `model_id`='".$id."'";
			$item = $this->with_translations($conditions)->get($id);
			$item->social = json_decode($item->social);
			foreach($item->translations as $k=>$value){
				$item->content[$value->language] = $value->content;
				$item->content[$value->language]->id = $value->id;
			}

			unset($item->translations);


			return $item;

		}

		function get_home_items($language){
			$items =  $this->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$language.'"')
	                            ->where(array('active'=>'Y'))
															->order_by('sort','ASC')
															->set_cache($language.'_get_home_items')
	                            ->get_all();
			foreach($items as $k => $v){
				$items->$k->social = json_decode($v->social);
			}

			return $items;
		}

}
