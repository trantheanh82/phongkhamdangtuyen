<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends MY_Model
{
	public $table = "articles";
	public $name = 'article';

    public function __construct()
    {
	    $this->has_many_pivot['categories'] = array(
	    	'foreign_model'=>'Category_model',
	    	'pivot_table'=>'articles_categories',
	    	'local_key'=>'id',
	    	'pivot_local_key'=>'article_id',
	    	'pivot_foreign_key'=>'category_id',
	    	'foreign_key'=>'id');

			$this->has_one['category'] = array(
				'foreign_model'=>'article_category_model','foreign_key'=>'article_id','local_key'=>'id');

	    $this->has_one['user'] = array('foreign_model'=>'User_model','foreign_key'=>'id','local_key'=>'created_by');
	    
			$this->has_many['articles_categories'] = array(
	    	'foreign_model'=>'Article_category_model',
	    	'foreign_table'=>'articles_categories',
	    	'foreign_key'=>'article_id',
	    	'local_key'=>'id');
			

			$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
			$this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

			$this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
			$this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

			parent::__construct();

			$this->pagination_delimiters = array('<li class="page-item">','</li>');
			$this->pagination_arrows = array('&lt;','&gt;');
    }

    function get_articles($id,$current_lang){
			return $this->with_translation("where:`model`='article' and `language`='".$current_lang."'")
											->with_slug("where:`model`='article' and `language`='".$current_lang."'")
											->set_cache($id.'_'.$current_lang)
											->get($id);
		}

		function get_an_article($slug,$current_lang){
			$model_id = $this->slug_model->where(array('model'=>'article','language'=>$current_lang,'slug'=>$slug))->get();

			$item =  $this->with_translation("where:`model`='article' and `language`='".$current_lang."'")
									->with_slug("where:`model`='article' and `language`='".$current_lang."' and `slug`='".$slug."'")
									->set_cache($slug.'_'.$current_lang)
									->get($model_id->model_id);
								return $item;
		}

		public function get_home_items($language){
			$items =  $this->article_model
              ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
              ->with_slug('fields:slug|where:`model`="'.$this->name.'" and `language`="'.$language.'"')
							->with_category()
							->where(array('active'=>'Y'))
							->order_by('created_at','DESC')
							->limit(3)
							->set_cache($language.'_get_home_items_'.$this->name)
              ->get_all();
		  foreach($items as $k=>$v){
				$category = $this->category_model
													->with_slug('fields:slug|where:`model`="category" and `language`="'.$language.'"')
													->where(array('id'=>$v->category->category_id))
													->fields('model')
													->set_cache($v->category->category_id.'_get_home_items_'.$language.'_'.$k)
													->get();
				$items->$k->category = $category;
			}

		  return $items;
		}

		public function get_articles_by_category($category_id,$lang,$page_number){
			$conditions = 'where:`model`="article" and `language`="'.$lang.'"';
			$items =  $this
									->with_translation($conditions)
									->with_slug($conditions	)
									->with_articles_categories("where:`category_id`='".$category_id."'")
									->set_cache('get_articles_by_category_'.$category_id.'_'.$lang.'_'.$page_number)
									->paginate(2,null,$page_number);
			return $items;
		}

		public function get_lastest_article($language,$numbers){
			$items =  $this->article_model
              ->with_translation('fields:model,content|where:`translations`.`model`="'.$this->name.'" and `language`="'.$language.'"')
              ->with_slug('fields:slug|where:`model`="'.$this->name.'" and `language`="'.$language.'"')
							->with_category()
							->where(array('active'=>'Y'))
							->order_by('created_at','DESC')
							->fields(array('image','created_at'))
							->set_cache('get_latest_news_'.$language.'_'.$numbers)
							->limit($numbers)
              ->get_all();

			foreach($items as $k=>$v){
				$category = $this->category_model
												->with_slug('fields:slug|where:`model`="category" and `language`="'.$language.'"')
												->fields('model')
												->where(array('id'=>$v->category->category_id,'model'=>'article'))->set_cache('category_'.$v->category->category_id)->get();

				$items->$k->category = $category;
			}

			return $items;
		}

		public function get_articles_paginate($category_id,$lang,$row_per_page,$page_number){
			$conditions = "where:`model`='".$this->name."' and `language`='".$lang."'";
			$total_rows = $this->with_slug($conditions)
										->with_translation($conditions)
										->with_articles_categories('where:`category_id`='.$category_id)
										->where(array('active'=>'Y'))
										->limit(500)
										->get_all();
			$items = $this->with_slug($conditions)
										->with_translation($conditions)
										->with_articles_categories('where:`category_id`='.$category_id)
										->order_by('created_at','DESC')
										->where(array('active'=>'Y'))
										->paginate($row_per_page,count((array)$total_rows),$page_number);
			return $items;
		}
		
		public function get_feature_post($lang){
			$conditions = "where:`model`='".$this->name."' and `language`='".$lang."'";
			$item = $this->with_slug($conditions)
										->with_translation($conditions)
										->with_category()
										->order_by('updated_at','DESC')
										->where(array('active'=>'Y','feature'=>'Y'))
										->get();
			$category = $this->category_model->with_slug("where:`model`='category' and `language`='".$lang."'")->where(array('active'=>'Y','id'=>$item->category->category_id))->get();
			$item->parent_category = $category;
			return $item;
		}

}
