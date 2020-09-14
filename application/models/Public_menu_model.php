<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Public_menu_model extends MY_Model
{

	public $table = "public_menu";

	function __construct()
	{

		//$this->before_create[] = 'del_cache';
		//$this->before_update[] = 'del_cache';

		$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
		$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

		$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
		$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

		$this->timestamps = FALSE;
		parent::__construct();

	}

	public function getTreeMenu($current_lang){
		$conditions = 'where:`model`=\'public_menu\' AND `language`=\''.$current_lang.'\'';
		$items = $this
		->with_translation($conditions)
		->with_slug($conditions)
		->where('active','Y')
		->order_by(array('parent_id'=>'ASC','sort'=>'ASC'))
		->set_cache($current_lang.'_home_public_menu')
		->get_all();

		$menus = $this->__menu(0,$items);
		return $menus;
	}

	public function del_cache(){
		$this->cache_delete('public_menu');
	}

	private function __menu($parent_id,$children){
		if(!empty($children)){
			$parents = $children;
			$items = array();
			foreach($children as $k => $v){
				if($children->$k->parent_id == $parent_id){
					unset($parents->$k);
					$items[$k] = $v;
					$items[$k]->children = $this->__menu($v->id,$parents);
				}
			}
			return $items;
		}else{
			return;
		}
	}
}
