<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->helper('form');
if ( ! function_exists('editor'))
{
	
    function editor($elements = array())
    {
	    $elements = "echo";
	    
        return $elements;
    }   
}