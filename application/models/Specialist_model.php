<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Specialist_model extends MY_Model
{

		public $table = "specialists";
		public $name = 'specialist';

    public function __construct(){
      $this->has_many_pivot['doctor_specialist'] = array(
		    'foreign_model'=>'doctor_model',
		    'pivot_table'=>'doctors_specialists',
		    'local_key'=>'id',
		    'pivot_local_key'=>'specialist_id', /* this is the related key in the pivot table to the local key
		        this is an optional key, but if your column name inside the pivot table
		        doesn't respect the format of "singularlocaltable_primarykey", then you must set it. In the next title
		        you will see how a pivot table should be set, if you want to  skip these keys */
		    'pivot_foreign_key'=>'doctor_id', /* this is also optional, the same as above, but for foreign table's keys */
		    'foreign_key'=>'id'
		    );

				$this->has_one['slug'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');
	      $this->has_many['slugs'] = array('foreign_model'=>'Slug_model','foreign_table'=>'slugs','foreign_key'=>'model_id','local_key'=>'id');

	      $this->has_one['translation'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');
	      $this->has_many['translations'] = array('foreign_model'=>'Translation_model','foreign_table'=>'translations','local_key'=>'id','foreign_key'=>'model_id');

				parent::__construct();
    }

		function get_items($lang){
      $conditions = "where:`model`='".$this->name."' AND `language`='".$lang."'";
      $items = $this->with_translation($conditions)->get_all();
      return $items;
    }

    function get_item($id,$lang){
			$conditions = "where:`model`='".$this->name."' AND `model_id`='".$id."'";
			$item = $this->with_translations($conditions)->with_slugs($conditions)->with_doctor_specialist()->get($id);

			foreach($item->translations as $k=>$value){
				$item->content[$value->language] = $value->content;
				$item->content[$value->language]->id = $value->id;
			}

			foreach($item->slugs as $k=>$value){
				$item->slug[$value->language] = new \stdClass();
				$item->slug[$value->language]->slug = $value->slug;
				$item->slug[$value->language]->id = $value->id;
			}

			unset($item->slugs);
			unset($item->translations);
			return $item;

		}

		public function get_home_items($lang){
			return $this->specialist_model
	                            ->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$lang.'"')
	                            ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
	                            ->where(array('active'=>'Y'))
															//->set_cache($language.'_get_home_items')
															->order_by('sort','ASC')
															->limit(10)
	                            ->get_all();

		}

		public function get_all_items($lang){
			return $this->with_translation('where:`translations`.`model`="'.$this->name.'" and `language`="'.$lang.'"')
                  ->with_slug('where:`model`="'.$this->name.'" and `language`="'.$lang.'"')
                  ->where(array('active'=>'Y'))
									//->set_cache($language.'_get_home_items')
									->order_by('sort','ASC')
                  ->get_all();
		}

		/**
		 * [get_item_detail description]
		 * @param  [int]  $id                 [description]
		 * @param  [string]  $lang               [description]
		 * @param  boolean $doctor_information [description]
		 * @return [specialists]                      [description]
		 */
		public function get_item_detail($id,$lang,$doctor_information=false){
			$conditions = "where:`model`='".$this->name."' AND `model_id`='".$id."'";
			$item = $this->with_translation($conditions)->with_slug($conditions)->with_doctor_specialist()->where(array('active'=>'Y'))->get($id);
			if($doctor_information){
				foreach($item->doctor_specialist as $k=>$value){
					$doctor = $this->doctor_model->get_item_detail($value->id,$lang);
					$item->doctor_specialist->$k = $doctor;
				}
			}

			return $item;
		}


		function get_dropdown($model,$lang="vi"){
			//$lists = $this->get_all();
			//$lists = $this->with_translation('where: `model`=\''.$this->name.'\' AND `language`=\''.$lang.'\'')->where(array('model'=>$model,'active'=>'Y'))->order_by('sort','asc')->set_cache($model.'_'.$lang)->get_all();
			$lists = $this->with_translation('where: `model`=\''.$this->name.'\' AND `language`=\''.$lang.'\'')->where(array('active'=>'Y'))->order_by('sort','asc')->set_cache($model.'_'.$lang)->get_all();

			$dropdown = array();
			foreach($lists as $k=>$value){
				$dropdown[$value->id] = $value->translation->content->name;
			}

			return $dropdown;

		}

		public function get_menu($lang){
			$conditions = "where:`model`='".$this->name."' and `language`='".$lang."'";

			return $this->with_translation($conditions)
						->with_slug($conditions)
						->where(array('active'=>'Y'))
						->order_by('sort','ASC')
						->get_all();
		}
		
		public function get_other($specialist_id,$lang){
			$conditions = "where:`model`='".$this->name."' and `language`='".$lang."'";
			
			return $this->with_translation($conditions)
						->with_slug($conditions)
						->where(array('active'=>'Y','id <>'=>$specialist_id))
						->order_by('sort','ASC')
						->get_all();

		}
		
		public function delete($id=null){
			$this->load->model('translation_model');
			$this->load->model('slug_model');
			$this->load->model('doctor_specialist_model');
			
			$this->translation_model->delete(array('model_id'=>$id,'model'=>'specialist'));
			$this->slug_model->delete(array('model_id'=>$id,'model'=>'specialist'));
			$this->doctor_specialist_model->delete(array('specialist_id'=>$id));
			
			if(parent::delete($id)>0){
				return true;
			}
		}

}
