<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if (!function_exists('load_controller'))
{
    function statistics($course_id)
    {
    	$CI = & get_instance();
		
		$CI->load->model('course_model');
		$CI->load->model('student_model');
		$CI->load->model('receipt_model');
		
		$data['course'] = $CI->course_model->where('id',$course_id)->get();
		
		
		/*Total Student*/
		$data['total_student'] = $CI->student_model->count_rows(array('course_id'=>$course_id));
		
		
		/*Get total student in course sum*/
		$CI->db->select_sum('pay_amount');
		$CI->db->from('receipts');
		$CI->db->where('course_id',$course_id);
		$query = $CI->db->get();
		
		$data['pay_amount'] = $query->result()[0]->pay_amount;
		
		/*Get Course Dept*/
		
		$CI->db->select_sum('d.dept');	
		$CI->db->join('students','students.id = d.student_id');
		$CI->db->where('students.course_id',$course_id);
		
		$query = $CI->db->get('depts as d')->result();
		
		$data['dept'] = $query[0]->dept;
		
		return $data;
    }
}