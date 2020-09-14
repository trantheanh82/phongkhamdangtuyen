<?php
	if(count($langs)>1):
?>

	 <div class="form-group">
	 		<h6 class='pull-left bold'><strong>Language</strong></h6>
	 		<div class='btn-group pull-left'>
		 		
		 		<a class="btn btn-text dropdown-toggle " id="sw_select_<?=$current_lang['slug']=='en'?'us':$current_lang['slug']?>_wrap_content" data-toggle="dropdown">
                    <i class="flag flag-<?=$current_lang['slug']=='en'?'us':$current_lang['slug']?>" data-ca-target-id="sw_select_<?=$current_lang['slug']=='en'?'us':$current_lang['slug']?>?>_wrap_content"></i>
                    <?=$current_lang['name']?><span class="caret"></span>
    			</a>
		 		<ul class="dropdown-menu cm-select-list popup-icons">
			 		<?php
				 		foreach($langs as $k => $l):
				 			if($l['slug'] != $current_lang['slug']):
				 	?>
                            <li><a name="<?=$l['slug']?>" href="<?=base_url().$l['slug']?>"><i class="flag flag-<?=$l['slug']=='en'?'us':$l['slug']?>"></i> <?=$l['name']?></a></li>
                    <?php
	                    	endif;
	                    endforeach; 
	                ?>
	 		</div>
	 </div>
	 <div class='clearfix'></div>
	 <div style='margin-bottom:30px;'></div>
<?php
	endif; 
?>