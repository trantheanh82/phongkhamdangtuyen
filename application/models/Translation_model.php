<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Translation_model extends MY_Model
{
    public $table = "translations";
    //protected $before_get = array('get_function');
    protected $after_get = array('json_to_array');
    public function __construct()
    {
    	//$this->has_many['translations'] = array('Page_translation_model','page_id','id');
        $this->timestamps = FALSE;
        parent::__construct();
    }

    function json_to_array($data){
      $data;

      foreach($data as $k=>$v){
        if(is_array($v)){
          $data[$k]['content'] = json_decode($v['content']);
        }elseif($k == 'content'){
          $data[$k] = json_decode($v);
          //$data[$k]['content'] = json_decode($v);
        }
      }
      return $data;
    }

    function get_function(){

    }

}
