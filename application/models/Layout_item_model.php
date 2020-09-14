<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layout_item_model extends MY_Model
{
  public $table = "layout_items";
  protected $timestamps = false;
  public $protected = array('id');
  public function __construct()
  {
    $this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
    $this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

    parent::__construct();
  }

  public function admin_get_all_item($layout_id){
    $items =  $this->where(array('layout_id'=>$layout_id))->get_all();
    $this->load->model('translation_model');
    foreach($items as $k=>$v){
      $items->{$k}->translations = $this->translation_model->where(array('model_id'=>$v->id,'model'=>'layout_item'))->get_all();
      if(!empty($items->{$k}->translations)){
        foreach($items->{$k}->translations as $a=>$trans){
          $items->{$k}->translations->{$trans->language} = $trans;
          $items->{$k}->translations->{$trans->language}->html = $trans->content->html;
          //unset($items->{$k}->translations->{$a});
        }
      }

    }
    //pr($items);
    //exit();
    return $items;
  }

  function get_home_layout($layout_id,$language){
    $this->load->model('translation_model');
    $items = $this->where(array('layout_id'=>$layout_id,'active'=>'Y'))->order_by('sort','ASC')->set_cache($language.'_home_layout_item')->get_all();
    if(!empty($items)){
      foreach($items as $k=>$v){
      //  if($v->model == "" && $v->function == ""){
          $items->$k->translation = $this->translation_model->where(array('model'=>'layout_item','model_id'=>$v->id,'language'=>$language))->get();
        //}
      }
    }
    return $items;
  }

  public function submit($data,$language){
    $this->load->model('translation_model');
    foreach($data['layoutitems'] as $k=>$v){
      $id = $v['id'];
      unset($v['id']);
      if(isset($v['translation'])){
        $translation = $v['translation'];
        unset($v['translation']);
      }

      if($this->where('id',$id)->update($v) >= 0){
          if(isset($translation)){
            //pr($data['layoutitems'][$k]);
              foreach($translation as $lang_slug=>$content){
                $content['language'] = $lang_slug;
                $content['model_id'] = $id;
                $content['model'] = 'layout_item';
                $content['content'] = json_encode(array('html'=>$content['html']));
                unset($content['html']);
                if(!isset($content['id'])){
                  $this->translation_model->insert($content);
                }else{
                  $trans_id  = $content['id'];unset($content['id']);
                  $this->translation_model->where('id',$trans_id)->update($content);
                }
              }

          }
          unset($translation);
      }else{
        return false;
      }

    }
  }

}
