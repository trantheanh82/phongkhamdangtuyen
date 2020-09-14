<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layout_model extends MY_Model
{
  public $table = "layouts";
  protected $timestamps = 'false';

  public function __construct()
  {
    $this->has_many['layout_items'] = array(
      'foreign_model'=>'Layout_item_model','foreign_key'=>'layout_id','local_key'=>'id');
    parent::__construct();
  }

}
