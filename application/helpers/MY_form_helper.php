<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('active')){
	function active($active,$form_name,$attributes = null){
		$checked = "";
		if($active=='Y' || $active==1){
			$checked = ' checked';
		}
		
		$attr = "";	
		
		if(isset($attributes)){
			if(is_array($attributes)){
				foreach($attributes as $k => $v){
					$attr .= "$k='$v' ";
				}
			}else{
				$attr = $attributes;
			}
		}
		
		return '<div class="form-group">
		                <label>
		                  <input type="checkbox" value="'.$active.'" name="'.$form_name.'" '.$checked.' '.$attr.'>
		                </label>
	                </div>';
	}
}

if(! function_exists('value')){
	
	function value($value =""){
		if(!empty($value)){
			return $value;
		}else{
			return "";
		}
	}	
}

if(! function_exists('render_editor')){
	function render_editor(){
		
	}
}