<?php

class Admin_Controller extends MY_Controller{
	var $main_menu;

	function __construct(){

		parent:: __construct();

		$this->data['lang'] = $this->lang->load('admin/global',strtolower($this->data['current_lang']['name']));
		parent::load_languages(true);

		$this->load->library('Ion_auth');


		//$this->__checkpermissions();
		$this->data['page_tite'] = "Admin";
		/*Load Global Menu*/

		if(! $admin_menu = $this->cache->get('admin_menu')){

			$admin_menu = parent::__getMenus('admin');

			$this->cache->save('admin_menu',$admin_menu);
		}

		$this->data['admin_menu'] = $admin_menu;

		/* End load Menu */

		//var_dump(!preg_match('/login/',$this->uri->uri_string()));
		//var_dump(!$this->session->userdata('logged_in'));exit();
		if (!$this->ion_auth->logged_in()){
			//if (!preg_match('/login/',$this->uri->uri_string()) && !$this->session->userdata('logged_in')){
				//redirect them to the login page
				//redirect('admin/user/login', 'refresh');
			//}
			if(!preg_match('/login/',$this->uri->uri_string()) && !$this->session->userdata('logged_in')){
				redirect('admin/auth/login','refresh');
			}
		}

		//echo preg_match('/login/',$this->uri->uri_string());exit();
		$this->data['current_user'] = $this->ion_auth->user()->row();
		$this->data['current_user_menu'] = '';

		if($this->ion_auth->in_group('admin')){
			$this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
		}

		$this->data['Settings'] = parent::__getGlobalSettings();
		$this->data['action'] = $this->router->fetch_method();
		/*Insert Jquery Validate*/
		$this->data['before_head'] .=$this->__before_head_script();

		$log_threshold = $this->config->item('log_threshold');

		//clear cache if in debug or localhost
		if($log_threshold > 0){
			parent::__clearcache();
		}

		/*Css for Interface*/
		$this->data['css_for_elements'] .= assets("select2/dist/css/select2.min.css");
		$this->data['css_for_elements'] .= assets('datatables.net-bs/css/dataTables.bootstrap.min.css');
		$this->data['css_for_elements'] .= assets('plugins/iCheck/all.css');

		$this->data['css_for_elements'] .= assets('css/admin.css');


		/*Script for Interface*/
		$this->data['script_for_layout'] .= assets('datatables.net/js/jquery.dataTables.min.js');
		$this->data['script_for_layout'] .= assets('datatables.net-bs/js/dataTables.bootstrap.min.js');
		$this->data['script_for_layout'] .= assets('select2/dist/js/select2.full.min.js');
		$this->data['script_for_layout'] .= assets('plugins/iCheck/icheck.min.js');
		$this->data['script_for_layout'] .= assets('plugins/input-mask/jquery.inputmask.js');
		$this->data['script_for_layout'] .= assets('plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->data['script_for_layout'] .= assets('plugins/input-mask/jquery.inputmask.extensions.js');

		$this->data['script_for_layout'] .= assets('fastclick/lib/fastclick.js');
		$this->get_notifications();

		/**/

	}

	protected function render($the_view = null, $template = "admin_master"){
		if($this->input->is_ajax_request()){
			$template = "admin_ajax";
		}
		parent::render($the_view, $template);
	}

	function __loadScriptUpload(){

		if(!$this->config->item('uploadFileScript_loaded')){

			$this->data['css_for_elements'] .='
			<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
			'.assets("css/jquery-file-upload/jquery.fileupload.css").'
			'.assets("css/jquery-file-upload/jquery.fileupload-ui.css");


			$script = '
			    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
				'.assets("js/jquery-file-upload/vendor/jquery.ui.widget.js").'
				<!-- The Templates plugin is included to render the upload/download listings -->
				'.assets("js/jquery-file-upload/tmpl.min.js").'
				<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
				'.assets("js/jquery-file-upload/load-image.all.min.js").'
				<!-- The Canvas to Blob plugin is included for image resizing functionality -->
				'.assets("js/jquery-file-upload/canvas-to-blob.min.js").'
				<!-- blueimp Gallery script -->
				'.assets("js/jquery-file-upload/jquery.blueimp-gallery.min.js").'
				<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
				'.assets("js/jquery-file-upload/jquery.iframe-transport.js").'
				<!-- The basic File Upload plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload.js").'
				<!-- The File Upload processing plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-process.js").'
				<!-- The File Upload image preview & resize plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-image.js").'
				<!-- The File Upload audio preview plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-audio.js").'
				<!-- The File Upload video preview plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-video.js").'
				<!-- The File Upload validation plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-validate.js").'
				    <!-- The File Upload user interface plugin -->
				'.assets("js/jquery-file-upload/jquery.fileupload-ui.js");

			if($this->input->is_ajax_request()){
				$this->data['script_for_page'] .= "<!--- script for page --->". $script . "<!---./script for page -->";
			}else{
				$this->data['script_for_layout'] .= "<!--- script for layout --->".
				$script . "<!---./script for layout -->";;
			}
			$this->config->set_item('uploadFileScript_loaded',true);
		}
	}

	function __getDropdownList($object,$key,$value){
		if(is_array($object)){
			$val = array();
			foreach($object as $k => $v){

				$val[$v->$key] = $v->$value;
			}

			return $val;
		}
	}

	function get_notifications(){
		/*Notify Request call */
		$this->load->model('request_call_model');
		$this->data['notification_request_call'] = $this->request_call_model->where(array('view'=>'N'))->count_rows();

		/*Notify Contact*/
		$this->load->model('contact_model');
		$this->data['notification_contact'] = $this->contact_model->where(array('view'=>'N'))->count_rows();
		
		$this->load->model('booking_model');
		$this->data['notification_booking'] = $this->booking_model->where(array('view'=>'N'))->count_rows();

	}

	static public function __slugify($text)
	{
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, '-');

	  // remove duplicate -
	  $text = preg_replace('~-+~', '-', $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  return $text;
	}

	function __watermark_image($target, $wtrmrk_file, $newcopy) {
	    $watermark = imagecreatefrompng($wtrmrk_file);
	    imagealphablending($watermark, false);
	    imagesavealpha($watermark, true);
	    $img = imagecreatefromjpeg($target);
	    $img_w = imagesx($img);
	    $img_h = imagesy($img);
	    $wtrmrk_w = imagesx($watermark);
	    $wtrmrk_h = imagesy($watermark);
	    $dst_x = ($img_w / 2) - ($wtrmrk_w / 2); // For centering the watermark on any image
	    $dst_y = ($img_h / 2) - ($wtrmrk_h / 2); // For centering the watermark on any image
	    imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
	    imagejpeg($img, $newcopy, 100);
	    imagedestroy($img);
	    imagedestroy($watermark);


	}

	function __checkpermissions(){

		if(!$this->ion_auth->logged_in()){
			echo "chưa login";
		}else{

			$this->load->model('group_permission_model');

			$controller 	= 	$this->router->fetch_class();
			$action 		=	$this->router->fetch_method();

			$group_permission = $this->group_permission_model->with_group('fields:name,redirect_controller,redirect_action')->where(array('controller'=>$controller,'action'=>$action))->get_all();

			$groups;
			if(!empty($group_permission)){
				foreach($group_permission as $k=>$v){
					$groups[] = $v->group->name;
				}
				if(!$this->ion_auth->in_group('admin') && !$this->ion_auth->in_group($groups)){
					$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
					redirect('admin','refresh');
				}
			}else if(!$this->ion_auth->in_group('admin')){
				redirect('admin','refresh');
			}else{
				//echo 'passed';
			}
		}

	}

	function __main_script(){
		return "$(function () {
			    $('#data').DataTable({
				    'language': {'url':'//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json'}
			    });
			  })
			  console.log($('#data tr:first th').length);
			  $('td.no-data').attr('colspan',$('#data tr:first th').length);

			  //Date picker
			    $('#doc').datepicker({
				  language: 'vi',
				  format: 'yyyy-mm-dd',
			      autoclose: true,
			    });

			    $('#dob').datepicker({
				    defaultViewDate: '1990-01-01',
				    language: 'vi',
					  format: 'yyyy-mm-dd',
				      autoclose: true,
			    });

			    //Initialize Select2 Elements
			    $('.select2').select2()

			    //Datemask dd/mm/yyyy
			   // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
			    //Datemask2 mm/dd/yyyy
			    //$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
			    //Money Euro
			   // $('[data-mask]').inputmask()

			    //Date range picker
			    $('#reservation').daterangepicker()
			    //Date range picker with time picker
			    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
			    //Date range as a button
			    $('#daterange-btn').daterangepicker(
			      {
			        ranges   : {
			          'Today'       : [moment(), moment()],
			          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
			          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
			          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			        },
			        startDate: moment().subtract(29, 'days'),
			        endDate  : moment()
			      },
			      function (start, end) {
			        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
			      }
			    )


			    //iCheck for checkbox and radio inputs
			   /* $('input[type=\"checkbox\"].minimal, input[type=\"radio\"].minimal').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    })
			    //Red color scheme for iCheck
			    $('input[type=\"checkbox\"].minimal-red, input[type=\"radio\"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    })


			    //Colorpicker
			    $('.my-colorpicker1').colorpicker()
			    //color picker with addon
			    $('.my-colorpicker2').colorpicker()

			    //Timepicker
			    $('.timepicker').timepicker({
			      showInputs: false
			    })*/
			    $('input[type=\"checkbox\"].minimal-red, input[type=\"radio\"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    })

			    $('input[type=\"checkbox\"].minimal-blue, input[type=\"radio\"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    })

			    total_tuition_fee = 0;
			    $('#courses').change(function(){
				    course_id = $(this).val();
				    //console.log(courses[course_id]);
				    option_html  = '';
				    for(i = 0; i<courses[course_id].length;i++){
						//option_html += '<option value=\"'+courses[course_id][i].id+'\">' + courses[course_id][i]->name + '</option>';
						option_html += '<option value=\"'+ courses[course_id][i].id+'\">'+ courses[course_id][i].name+'</option>';
					}

					$('#classes').html(option_html);
					$('#classes').removeAttr('disabled');

					console.log(courses_info[course_id][0]);

					$('#tuition').text(currency(courses_info[course_id][0].tuition_fee));
					$('#chemical_fee').text(currency(courses_info[course_id][0].chemicals_fee));
					$('#tool_fee').text(currency(courses_info[course_id][0].tool_fee));

					total_tuition_fee = Number(courses_info[course_id][0].tuition_fee) + Number(courses_info[course_id][0].chemicals_fee) + Number(courses_info[course_id][0].tool_fee);

					$('#total_tuition_fee').text(currency(total_tuition_fee));


			    });

			    // Pay Fee

			    tuition_student_pay = '';

			    $('#tuition_student_pay').on('keyup change',function(){
				    if($(this).val() > total_tuition_fee){
					    return;
					}
				    tuition_student_pay = $(this).val();

				    indebtedness = total_tuition_fee - tuition_student_pay;
				    $('#debt').text(currency(indebtedness));
				    $('input[name=indebtedness]').val(indebtedness);
				});

				$('#tuition_student_pay').on('focus',function(){
					$(this).val(tuition_student_pay);
				});

				$('#tuition_student_pay').on('blur',function(){
					$(this).val(currency(tuition_student_pay,''));
				});


				$('[data-mask]').inputmask();

				$('dd.currency').html(function(){
					return $(this).html().toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,')+ ' đ';
				});";
	}

	function __before_head_script(){
		return "<script>
			function currency(n, currency) {

				if (typeof(currency) == 'undefined'){
					currency = 'VNĐ';
				}

			    return Number(n).toFixed(0).replace(/./g, function(c, i, a) {
			        return (i > 0 && c !== '.' && (a.length - i) % 3 === 0 ? ',' + c : c);
			    }) + ' ' + currency;

			}
		</script>";
	}

	/*
		Functions for settle database
	*/

	function __submit($data,$model){
		$model_name = $model.'_model';
		$this->load->model(strval($model_name));
		if(isset($data['relation'])){
			$relation = $data['relation'];
			unset($data['relation']);
		}
		/*if update*/
		if(isset($data['id'])){
			$model_id = $data['id'];
			unset($data['id']);

			if($this->$model_name->update($data,$model_id) >=0){

				// Update Translation
				if(isset($relation['translation'])){
					$this->load->model('translation_model');
					$this->load->model('slug_model');

					foreach($relation['translation'] as $k=>$v){
						$value['content'] = json_encode($v['content']);

						if(isset($v['tags'])) $value['tags'] = $v['tags'];
						//Check if translation  exists
						if(isset($v['id']) && ($this->translation_model->update($value,$v['id']) >= 0)){
							//$this->translation_model->update($value,$v['id'])
							// Update slug
							if(isset($relation['slug'])){
								if(isset($relation['slug'][$k]['id'])){

									$slug_id = $relation['slug'][$k]['id'];
									unset($relation['slug'][$k]['id']);
									if(!($this->slug_model->update($relation['slug'][$k],$slug_id) >=0)) return false;
								}else{
										$relation['slug'][$k]['translation_id'] = $v['id'];
										$this->slug_model->insert($relation['slug'][$k]);
								}
							}
						}else{
							$value['model'] = $model;
							$value['model_id'] = $model_id;
							$value['language'] = $k;

							$trans_id = $this->translation_model->insert($value);
							if(isset($relation['slug'])){
								if(isset($relation['slug'][$k]['id'])){
									$slug_id = $relation['slug'][$k]['id'];
									unset($relation['slug'][$k]['id']);
									$this->slug_model->update($value,$slug_id);
								}else{
										$value['slug'] = $relation['slug'][$k]['slug'];
										$value['translation_id'] = $trans_id;
										$this->slug_model->insert($value);
								}
							}
						}

					}
				}
			}else{
				return false;
			}

			return true;
		}

		/* if create new*/
		if(($id = $this->$model_name->insert($data)) && isset($relation['translation'])){

				$this->load->model('translation_model');
				$this->load->model('slug_model');

				foreach($relation['translation'] as $k =>$value){
					$v['model'] = $model;
					$v['model_id'] = $id;
					$v['content'] = json_encode($value['content']);
					$v['language'] = $k;

					if(($trans_id = $this->translation_model->insert($v)) && isset($relation['slug'])){

							unset($v['content']);
							$v['slug'] = $relation['slug'][$k]['slug'];
							$v['translation_id'] = $trans_id;
							if(!$this->slug_model->insert($v)){
								return false;
							}
					}
				}
			return $id;
		}else{
			return false;
		}

  }


	//=== Delete Table with Translation

	function __delete($id,$table_name='',$delete_translation = false,$delete_slug = false){

		$table = $table_name.'_model';

		$this->load->model(strval($table));

		if($delete_translation){
			$this->load->model('translation_model');
			$this->translation_model->delete(array('model_id'=>$id,'model'=>$table_name));
		}

		if($delete_slug){
			$this->load->model('slug_model');
			$this->slug_model->delete(array('model_id'=>$id,'model'=>$table_name));
		}

		if($this->$table->delete(array('id'=>$id))){
			return true;
		}else{
			return false;
		}

	}

}
