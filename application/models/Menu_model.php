<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends MY_Model
{
	//protected $timestamps;
	public $table = "menus";

    public function __construct()
    {
        parent::__construct();
        $this->timestamps = false;
    }

    public function getMenus($side = 'admin',$groups = "", $active = '1'){

	    $menu = $this->order_by('sort','ASC')->get_all(array('menu_side = '.$side.' AND active = '.$active.' AND groups LIKE %{'.$groups.'}%'));

	    return $menu;
    }

     public function getTreeMenus($side = 'admin',$groups = "", $tree = "false", $active = '1'){

	    //$menu = $this->order_by('sort','ASC')->get_all('menu_side = '.$side.' AND active = '.$active.' AND groups LIKE %{'.$groups.'}%');
		$menu = $this->order_by('sort','ASC')->get_all(array('menu_side'=>$side,'active'=>$active,'groups LIKE'=> '%'.$groups.'%'));

	    if($tree){

		   $menu =  $this->__getTree($menu,0);
	    }

	    return $menu;
    }

    private function __getTree($array2D,$parent_id = 0){

		    $tree = array();
		    foreach($array2D as $k => $v){
			    if($v->parent_id == $parent_id){
				    $tree[$k] = $v;
				    unset($array2D->$k);
				    $tree[$k]->children = $this->__getTree($array2D,$tree[$k]->id);

			    }
		    }

		    return array_values($tree);

    }
}
