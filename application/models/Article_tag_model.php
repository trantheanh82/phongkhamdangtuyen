<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_tag_model extends MY_Model
{
	public $table = 'articles_tags';

	function __construct(){

		$this->timestamps = FALSE;

		$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'article_id');
		$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'article_id');

		$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'article_id','foreign_key'=>'model_id');
		$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'article_id','foreign_key'=>'model_id');
		parent::__construct();
	}


}
