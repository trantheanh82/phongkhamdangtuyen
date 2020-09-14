<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacture_model extends MY_Model
{
	public $table = 'manufactures';
	
	function __construct(){
		
		$this->timestamps = FALSE;
		
		$this->has_many['products'] = array(
					'foreign_model'=>'product_model',
					'foreign_table'=>'products',
					'foreign_key'=>'manufacture_id',
					'local_key'=>'id'
					
		);
		
		$this->has_one['product'] = array(
					'foreign_model'=>'product_model',
					'foreign_table'=>'products',
					'foreign_key'=>'manufacture_id',
					'local_key'=>'id'
		);
		
		$this->has_many_pivot['product_types'] = array(
					'foreign_model' => 'product_type_model',
					'pivot_table'=>'manufactures_product_types',
					'local_key'=>'id',
					'pivot_local_key'=>'manufacture_id',
					'pivot_foreign_key'=>'product_type_id',
					'foreign_key'=>'id');
		
		parent::__construct();
	}
	
	public function get_home_menu(){
		return $this->where(array('active'=>'Y'))->order_by('name','ASC')->get_all();
	}
	
	public function get_products($manufacture){
		$items;
		$conditions = array('active'=>'Y');
		if(is_numeric($manufacture)){
			$conditions = array_merge(array('id'=>$manufacture),$conditions);
		}else{
			$conditions = array_merge(array('slug'=>$manufacture),$conditions);
		}
		
		$item = $this->where($conditions)->with_products(array('fields'=>'id,name,slug,description','with'=>array('relation'=>'images')))->get();
		foreach($item->products as $k=>$v){
			if(isset($v->images)){
			$item->products[$k]->images = unserialize($v->images->image)[0];
			}	
		}
		
		return $item;
	}
}
