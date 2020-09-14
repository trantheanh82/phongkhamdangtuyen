<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$this->load->helper(array('url'));
if ( ! function_exists('menulink'))
{

    function menulink($link,$admin = true)
    {
	    $url = "";
	    if($admin){
	    	$url = 'admin/';
	    }

	    if(!empty($link->link)){
		    $url = $url.$link->link;
	    }else{
		    if(!empty($link->controller)){
			    $url = $url.$link->controller.'/'.$link->action;
		    }
	    }

        return site_url($url);
    }
}

if( ! function_exists('icon'))
{

	function icon($icon){
		if(!empty($icon)){
			return $icon;
		}else{
			return "fa fa-circle-o";
		}
	}
}

if( !function_exists('content_open')){
	function content_open($box_header=""){
		$ci =& get_instance();
		if(empty($box_header)){

			$box_header = $ci->router->fetch_class();
		}

		$content = '
		<section class="content">
		<div class="row">
			<div class="col-md-12">

			<div class="box">
		   		<!-- /.box-header -->
		   		<div class="box-header with-border">
		   			<h3 class="box-title"> '.lang($box_header).'</h3>
		   		</div>';

		return $content;
	}
}

if(!function_exists('content_open_tabs')){
	function content_open_tabs($box_header="",$tabs){
		if(empty($box_header)){
			$box_header = $ci->router->fetch_class();
		}

		$tab ='';

		$i = 1;
		foreach($tabs as $k => $v){
			$tab .= '<li class="'.($i==1?"active":"").'"><a href="#tab_'.$i.'" data-toggle="tab" aria-expanded="'.($i==1?"true":"false").'">'.$v.'</a></li>';
			$i++;
		}

		$content = '
			<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">'.$tab.'</ul>'
		;
		return $content;
	}
}

if(!function_exists('content_close_tabs')){
	function content_close_tabs(){
		$content = '</div></div>
		</div>
		</section>';
		return $content;
	}
}

if(! function_exists('echo_space')){
	function echo_space($times = 5){
		$spaces = '';
		for($i = 1; $i <= $times; $i++){
			$spaces .= '&nbsp;';
		}

		return $spaces;
	}
}

if( ! function_exists('content_close')){
	function content_close(){

		$content = '</div>
					</div>
				</div>
				</div>
				</section>';
		return $content;
	}
}

/**
*
*
*/

if( !function_exists('language_tabs')){
	function language_tabs($languages,$current_lang,$name=""){
		$tabs = "";
		foreach($languages as $lang){
			$tabs .= '<li'.($lang['slug']==$current_lang?" class='active'":"").'><a href="#'.$lang['slug'].(!empty($name)?"_".$name:"").'" data-toggle="tab"><img src="'.base_url().'/assets/img/flags/'.$lang['image'].'"/></a></li>';
		}
			$content = '<!-- open languages tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				'.$tabs.'
				</ul>
				<div class="tab-content">
			';
			return $content;
	}
}

if( !function_exists('language_tabs_close')){
	function language_tabs_close(){
		$content = "</div> <!-- close tab-content -->
		</div> <!-- close nav-tabs-custome -->";
		return $content;
	}
}

if( ! function_exists('moneytoword')){
	function moneytoword( $number )
	{
		$hyphen = ' ';
		$conjunction = '  ';
		$separator = ' ';
		$negative = 'âm ';
		$decimal = ' phẩy ';
		$dictionary = array(
			0 => 'Không',
			1 => 'Một',
			2 => 'Hai',
			3 => 'Ba',
			4 => 'Bốn',
			5 => 'Năm',
			6 => 'Sáu',
			7 => 'Bảy',
			8 => 'Tám',
			9 => 'Chín',
			10 => 'Mười',
			11 => 'Mười một',
			12 => 'Mười hai',
			13 => 'Mười ba',
			14 => 'Mười bốn',
			15 => 'Mười năm',
			16 => 'Mười sáu',
			17 => 'Mười bảy',
			18 => 'Mười tám',
			19 => 'Mười chín',
			20 => 'Hai mươi',
			30 => 'Ba mươi',
			40 => 'Bốn mươi',
			50 => 'Năm mươi',
			60 => 'Sáu mươi',
			70 => 'Bảy mươi',
			80 => 'Tám mươi',
			90 => 'Chín mươi',
			100 => 'trăm',
			1000 => 'ngàn',
			1000000 => 'triệu',
			1000000000 => 'tỷ',
			1000000000000 => 'nghìn tỷ',
			1000000000000000 => 'ngàn triệu triệu',
			1000000000000000000 => 'tỷ tỷ'
		);

		if( !is_numeric( $number ) )
		{
			return false;
		}

		if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
		{
			// overflow
			trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
			return false;
		}

		if( $number < 0 )
		{
			return $negative . moneytoword( abs( $number ) );
		}

		$string = $fraction = null;

		if( strpos( $number, '.' ) !== false )
		{
			list( $number, $fraction ) = explode( '.', $number );
		}

		switch (true)
		{
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens = ((int)($number / 10)) * 10;
				$units = $number % 10;
				$string = $dictionary[$tens];
				if( $units )
				{
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if( $remainder )
				{
					$string .= $conjunction . moneytoword( $remainder );
				}
				break;
			default:
				$baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
				$numBaseUnits = (int)($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = moneytoword( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
				if( $remainder )
				{
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= moneytoword( $remainder );
				}
				break;
		}

		if( null !== $fraction && is_numeric( $fraction ) )
		{
			$string .= $decimal;
			$words = array( );
			foreach( str_split((string) $fraction) as $number )
			{
				$words[] = $dictionary[$number];
			}
			$string .= implode( ' ', $words );
		}

			return $string;
	}
}
