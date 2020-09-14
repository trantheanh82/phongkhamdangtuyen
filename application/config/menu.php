<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['public']['main_menu'] = array(
	'Home' => array(
		'name'=>'Home',
		'link'=>'home',
	),	
	'About us'=> array(
		'name'=>'About us',
		'sub_menu'=>array(),
	),
	'Services'=> array(
		'link'=>'services',
	),
	'News'=>array(
		'link'=>'news',
	)
	
)

?>