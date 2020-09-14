<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends MY_Model
{

  public $table = "links";
	public $delete_cache_on_save = TRUE;

  public function __construct()
  {

	//$this->has_many['translations'] = array('Banner_translation_model','banner_id','id');
		$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
		$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

		$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
		$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

    parent::__construct();

  }

}
