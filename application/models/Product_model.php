<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
	public $table = "products";
	
	var $before_create;
	var $after_create;
	
	var $before_update;
	var $after_update;
	
	var $before_delete;
	var $after_delete;
	
	var $manufacture_deff = false;
	var $manufacture_deff_id;
	var $product_type_deff = false;
	var $product_type_deff_id;
	
	
	var $returndata = array();
	
    public function __construct()
    {
	    
		$this->has_one['images'] = array('foreign_model'=>'Image_model','foreign_table'=>'images','foreign_key'=>'model_id','local_key'=>'id'); 
		
		$this->has_one['manufacture'] = array('Manufacture_model','id','manufacture_id');
		$this->has_one['product_type'] = array('Product_type_model','id','product_type_id');
		
		$this->has_one['solution'] = array('Solution_model','id','solution_id');
		
		$this->before_create = array('creating');
		$this->after_create = array('created');
		$this->after_update = array('updated');
		$this->after_create = array('updated');
		$this->before_update = array('updating');
		$this->before_delete = array('deleting');
		$this->after_delete = array('deleted');
		
		parent::__construct();
    }
    
    /*Call back functions*/
    
    function creating($data){
	    return $data;
    }
    
    function updating($data){
	    $this->returndata['manufacture_id'] = $data['manufacture_id'];
	    $this->returndata['product_type_id'] = $data['product_type_id'];
	    
	    $previous_item = $this->fields(array('manufacture_id','product_type_id'))->where(array('id'=>$data['id']))->get();
	    
	    if($data['manufacture_id'] <> $previous_item->manufacture_id){
		    $this->manufacture_deff = true;
		    $this->manufacture_deff_id =  $previous_item->manufacture_id;
	    }
	    
	    if($data['product_type_id'] <> $previous_item->product_type_id){
		    $this->product_type_deff = true;
		    $this->product_type_deff_id = $previous_item->product_type_id;
	    }
	    
	    return $data;
    }
    
    function deleting($data){
	    $this->returndata = $this->fields(array('manufacture_id','product_type_id'))->where(array('id'=>$data['id']))->as_array()->get();
	    
	    return $data;
    }
    
    function deleted($data){
	    $this->__count_manufacture_product_type($this->returndata);
	    return $data;
    }
    
    function updated($data){
	    if($data){
		    //Update Manufacture_product_type_id 
		    $this->__count_manufacture_product_type($this->returndata); 
		    $this->__count_manufactures($this->returndata['manufacture_id']); 
		    $this->__count_product_types($this->returndata['product_type_id']);
		    
		    if($this->manufacture_deff){
			    $this->__count_manufactures($this->manufacture_deff_id);
			    $this->__count_manufacture_product_type(array('manufacture_id'=>$this->manufacture_deff_id,'product_type_id'=>$this->returndata['product_type_id']));
		    }
		    
		    if($this->product_type_deff){
			    $this->__count_product_types($this->product_type_deff_id);
			    $this->__count_manufacture_product_type(array('manufacture_id'=>$this->returndata['manufacture_id'],'product_type_id'=>$this->product_type_deff_id));
		    }
		    
	    }
	    
	    return $data;
    }
    
    /*End call back function*/
    
    public function get_products_images($conditions=array(),$order="",$fields=array()){
	    
	    if(empty($conditions)){
		   $conditions = array('active'=>'Y'); 
	    }
	    
	    if(empty($fields)){
		    $fields = array('id','name','slug');
	    }
	    
	    $items =  $this->with_images('fields:image')->fields('id,name,slug,code,description')->where($conditions)->limit(20,0)->order_by('created_at','desc')->get_all();
	    
	    foreach($items as $k=>$v){
		    if(!empty($v->images)){
		    	$items[$k]->images = unserialize($v->images->image)[0];
		    }
	    }
	    
	    return $items;
    }
    
    public function get_product($id,$conditions=array()){
	    $item = $this->with_images('fields:id,image,model','where:`model`=\'product\'')->where(array('id'=>$id))->get();
	    if(!empty($item->images->image)){
	    	$item->images->image = unserialize($item->images->image);
	    }
	    
	    return $item;
    }
    
    public function get_product_detail($slug){
	    $item = $this->with_images('fields:id,image')->with_manufacture('fields:id,name,slug')->with_solution('fields:id,name,slug')->with_product_type('fields:name,id')->where(array('active'=>'Y','slug'=>$slug))->get();
	    if(!empty($item->images->image)){
		    $item->images = unserialize($item->images->image);
	    }else{
		    $item->images = "";
	    }
	    
	    return $item;
    }
    
    public function get_product_related($product,$limit = 5){
	    $items = $this->with_images('fields:id,image')->where(array('active'=>'Y','product_type_id'=>$product->product_type_id,'id <>'=>$product->id))->fields(array('id','name','slug','description'))->limit($limit)->get_all();
	    
	    foreach($items as $k=>$v){
		    if(!empty($v->images))
		    	$items[$k]->images = unserialize($v->images->image)[0];
	    }
	    
	    return $items;
    }
    
    private function get_images_array($serialized_object){
    }
    
    /*Count manufacture and product type*/
    private function __count_manufacture_product_type($data){
	    $this->load->model('manufacture_product_type_model');
	    $data['products_count'] = $this->where(array(
		    													'manufacture_id'=>$data['manufacture_id'],
		    													'product_type_id'=>$data['product_type_id']))
		    											->as_array()->count_rows();
		    
	    if(!$mp = $this->manufacture_product_type_model->where(array('manufacture_id'=>$data['manufacture_id'],'product_type_id'=>$data['product_type_id']))->get()){
		    $this->manufacture_product_type_model->insert($data);
	    }else{
		    $this->manufacture_product_type_model->update($data,$mp->id);
	    }
    }
    
    /*Count Manufactures*/
    private function __count_manufactures($manufacture_id){
	    $this->load->model('manufacture_model');
	    $data['products_count'] = $this->where(array(
		    										'manufacture_id'=>$manufacture_id))
		    										->as_array()->count_rows();
		$this->manufacture_model->update($data,$manufacture_id);
	    
    }
    
    /*Count Product type*/
    private function __count_product_types($product_type_id){
	    $this->load->model('product_type_model');
	    $data['products_count'] = $this->where(array(
		    										'product_type_id'=>$product_type_id))
		    										->as_array()->count_rows();
		$this->product_type_model->update($data,$product_type_id);
    }

}