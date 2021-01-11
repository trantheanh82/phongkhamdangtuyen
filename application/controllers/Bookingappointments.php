<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingappointments extends Public_Controller {

	function __construct(){
    parent::__construct();
		$this->load->model('specialist_model');
		$this->load->model('doctor_model');
		$this->load->model('booking_model');

		$this->load->library('email');
  }

  public function index(){
		$this->data['specialists'] = $this->specialist_model->get_dropdown('specialist',$this->current_lang);
		$this->data['doctors']	=	$this->doctor_model->get_dropdown('doctors',$this->current_lang);
    $this->render('/bookingappointments/bookingappointments');
	}


	public function booking(){

		if($this->input->is_ajax_request()){
			$data = $this->input->post();
			$data['ip'] = $this->input->ip_address();
			$data['created_by'] = '1';
			if($this->booking_model->insert($data)){
				$this->email->initialize(parent::getEmailConfig());

				$this->email->from('thongbao@phongkhamdangtuyen.com','Thông Báo');

				$this->email->to($this->data['Settings']['send_to']);

				$this->email->subject('Có Khách Đặt Lịch '.strtoupper(lang($data['type'])));

				$msg = "Có đặt lịch ".strtoupper(lang($data['type']))." khách hàng từ website<br />";
				$msg .= "Thông tin khách hàng: <br />";
				$msg .= "====================================<br /><br />";
				$msg .= "- Tên khách hàng: ".$data['name'] ."<br />";
				$msg .= "- Số điện thoại: ".$data['phone'];

				$this->email->message($msg);

				if($this->email->send()){
					echo 'success';
				}else{
					echo "failed";
				}

			}
		}
		exit();
	}

	public function submit(){

	}
}
