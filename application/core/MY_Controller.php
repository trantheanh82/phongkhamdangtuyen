<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
	protected $data = array();
	protected $langs = array();
	protected $default_lang;
	protected $current_lang;
	protected $template = 'dangtuyen';

	function __construct(){

		parent::__construct();

		if (version_compare(CI_VERSION, '2.1.0', '<')) $this->load->library('security');

    $this->load->helper(array('url','html','cookie','language'));
		$this->load->helpers(array('form'));

    $this->load->library('session');

		$this->load->driver('cache',array('adapter'=>'file','backup'=>'file'));


		$this->data['location'] = $this->config->item('location');

		/* Get Language */
		$this->load->model('language_model');

		$available_languages = $this->language_model->get_all(array('active'=>'1'));

		if(isset($available_languages))
		{
			foreach($available_languages as $lang)
			{
				$this->langs[$lang->slug] = array(
					'id'=>$lang->id,
					'slug'=>$lang->slug,
					'language_directory'=>$lang->language_directory,
					'language_code'=>$lang->language_code,
					'default'=>$lang->default,
					'image'=>$lang->image,
					'name'=>$lang->language_name);
					if($lang->default == '1') {

						$_SESSION['default_lang'] = $lang->slug;
						$this->default_lang = $lang->slug;
						$this->langs[$lang->slug]['alternate_link'] = '';
					}
			}
		}


		// Verify if we have a language set in the URL;
		$lang_slug = $this->uri->segment(0);

		//$lang_slug = $this->uri->config->config['language_abbr'];

		// If we do, and we have that languages in our set of languages we store the language slug in the session
		if(isset($lang_slug) && array_key_exists($lang_slug, $this->langs))
		{

			$this->current_lang = $lang_slug;
			$_SESSION['set_language'] = $lang_slug;

			$this->load->library('user_agent');

			if($lang_slug===$this->default_lang)
            {
                $segs = $this->uri->segment_array();
               // unset($segs[1]);
                $new_url = implode('/',$segs);
                //redirect($new_url, 'location', 301);
            }
		}
		else
		{
			if(!isset($_SESSION['set_language']))
            {
                $set_language = get_cookie('set_language',TRUE);

                if(isset($set_language)  && array_key_exists($set_language, $this->langs))
                {
                    $this->current_lang = $set_language;
                    $_SESSION['set_language'] = $this->current_lang;
                    //$language  = ($this->current_lang==$this->default_lang) ? '' : $this->current_lang;
                    //redirect($language);

                } else {
                    # set the default lang when visiting the site for the first time
                    $this->current_lang = $this->default_lang;
                    $_SESSION['set_language'] = $this->default_lang;
                }
            }
            else
            {
                $this->current_lang = $this->default_lang;
                $_SESSION['set_language'] = $this->default_lang;
            }
		}
        // We set a cookie so that if the visitor come again, he will be redirected to its chosen language
		set_cookie('set_language',$_SESSION['set_language'],2600000);

		// Now we store the languages as a $data key, just in case we need them in our views
		$this->data['langs'] = $this->langs;

        // Also let's have our current language in a $data key
		$this->data['current_lang'] = $this->langs[$this->current_lang];
        // For links inside our views we only need the lang slug. If the current language is the default language we don't need to append the language slug to our links

		if($this->current_lang != $this->default_lang)
		{
			$this->data['lang_slug'] = $this->current_lang.'/';
		}
		else
		{
			$this->data['lang_slug'] = '';
		}

    $_SESSION['lang_slug'] = $this->data['lang_slug'];

    //$this->load_languages();

    //Get global languages

		$this->data['page_title'] = $this->config->item('company_name');
		$this->data['page_description'] = 'Bee Platform';
		$this->data['before_head'] = '';
		$this->data['before_body'] = '';

		$this->data['script_for_layout'] = '';
		$this->data['script_for_page'] = '';
		$this->data['css_for_elements'] = '';
	}

	protected function render($the_view = NULL, $template = 'master'){
		if($template == 'json'){
			header("Content-Type: application/json");
			echo json_encode($this->data);
		}

		if($this->input->is_ajax_request()){
			header("Content-Type: text/html");
			$this->load->view($the_view,$this->data);
		}

		elseif(is_null($template))
		{
			$this->load->view($the_view,$this->data);
		}
		else{
			$this->data['the_view_content'] = (is_null($the_view))? '':$this->load->view($the_view,$this->data, TRUE);
			$this->load->view('templates/'.$template.'_view',$this->data);
		}
	}

	protected function __getGlobalSettings($section = ""){
			$this->load->model('setting_model');
			$settings = $this->setting_model->set_cache($this->current_lang.'_global_settings')->get_all();
			foreach($settings as $k => $v){
				$value[$v->form_name] = $v->value;
			}

		return $value;
	}

	/**
	*  Get Menu in Database
	*  $side is Menu in Admin or Public
	**/

	protected function __getMenus($side = 'admin'){

		$this->load->model('menu_model');

		$menus = $this->menu_model->getTreeMenus($side,'1',true);
		$this->lang->load($side.'/menu',$this->data['current_lang']['language_directory']);

		return $menus;
	}

	protected function __clearcache(){

		$CI =& get_instance();
		$path = $CI->config->item('cache_path');

		$cache_path = ($path == '') ? APPPATH.'cache/' : $path;

		$handle = opendir($cache_path);
	    while (($file = readdir($handle))!== FALSE)
	    {
	        //Leave the directory protection alone
	        if ($file != '.htaccess' && $file != 'index.html')
	        {
	           @unlink($cache_path.'/'.$file);
	        }
	    }
	    closedir($handle);

		return 0;

	}

	public function load_languages($admin=true){
		$controller_name = $this->router->fetch_class();

		if(file_exists(($admin?"admin/":"").$controller_name.'_lang.php')){
	  	$this->lang->load(($admin?"admin/":"").$controller_name.'_lang');
		}
	}

	protected function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	function insert_assets($files,$template,$type,$admin = false,$load=""){
		if($type=='css'){
			return insert_css($files,$template,$admin);
		}

		if($type = 'js'){
			return insert_js($files,$template,$admin,$load);
		}
	}

}


require_once(APPPATH.'core/Admin_Controller.php');

require_once(APPPATH.'core/Public_Controller.php');


/** Customer functions **/
function pr($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function __($label,$obj){

	$lang = $obj->lang->line($label);

	if($lang){
		return $lang;
	}else{

		return $label;
	}
}

function insert_css($files,$template='default',$admin = false){
	$link = base_url().'assets/'.$template;
	if($admin == true) $link .= 'admin/';

	$r = rand(0,100000);
	$assets = "";
	if(is_array($files)){
		foreach($files as $file){
			$assets .= "
			<link rel='preload' href='".$link.($file[0]=='/'?'':'/css/').$file."?r=".$r."' as='style' onload='this.onload=null;this.rel=\"stylesheet\"' />
			<noscript><link defer href='".$link.($file[0]=='/'?'':'/css/').$file."?r=".$r."' rel='stylesheet' type='text/css' /></noscript>\n";
		}
	}else{
		return "<link rel='preload' href='".$link.($files[0]=='/'?'':'/css/').$files."?r=".$r."' as='style' onload='this.onload=null;this.rel=\"stylesheet\"' />
		<noscript><link defer href='".$link.($files[0]=='/'?'':'/css/').$files."?r=".$r."' rel='stylesheet' type='text/css' /></noscript>\n";
	}
	return $assets;
}

function insert_js($files,$template='default',$admin = false,$load){
	$link = base_url().'assets/'.$template;

	if($admin == true) $link .= 'admin/';

	$assets = "";
	if(is_array($files)){
		foreach($files as $file){
			$assets .= "<script ".$load." type='text/javascript' src='".$link.($file[0]=='/'?'':'/js/').$file."'></script>\n";
		}
	}else{
		return "<script ".$load." type='text/javascript' src='".$link.($files[0]=='/'?'':'/js/').$files."'></script>\n";
	}
	return $assets;
}

/**
*	@param $file a string or array string
* @param $template
*	@param $type css or js
* @param $admin
*	@return link to css or javascript file
*/

function assets($file,$admin = true){
	$link = base_url().'assets/';

	if($admin){
		$link .= 'admin/';
	}

	$ext  = getfileext($link.$file);

	switch($ext){
		case "css":
			return "<link href='".$link.$file."' rel='stylesheet' type='text/css' />";
		break;
		case "js":
			return "<script type='text/javascript' src='".$link.$file."'></script>";
		break;
	}
}

function getfileext($file){
	$path = FCPATH.$file;
	return pathinfo($path, PATHINFO_EXTENSION);
}


function getSnippet( $str, $wordCount = 10 ) {
  return implode(
    '',
    array_slice(
      preg_split(
        '/([\s,\.;\?\!]+)/',
        $str,
        $wordCount*2+1,
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wordCount*2-1
    )
  );
}
