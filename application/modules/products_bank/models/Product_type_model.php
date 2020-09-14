<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type_model extends MY_Model
{
	public $table = 'product_types';
	
	function __construct(){
		
		$this->timestamps = FALSE;
		
		$this->has_many['product'] = array(
					'foreign_model'=>'product_model',
					'foreign_table'=>'products',
					'foreign_key'=>'product_type_id',
					'local_key'=>'id'
					
		);
		$this->has_many_pivot['brand_type'] = array(
					'foreign_model' => 'brand_model',
					'pivot_table'=>'brands_types',
					'local_key'=>'id',
					'pivot_local_key'=>'product_type_id',
					'pivot_foreign_key'=>'brand_id',
					'foreign_key'=>'id');
		
		parent::__construct();
	}
}
