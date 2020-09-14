<?php
	/*
		array format
		command_tools = array('create'=>array('url'=>'admin/tools','name'=>'Create')));
		*/
	if(!empty($command_tools)):	
?>
<div class='row'>
<div class='col-md-12'>
		<div class="btn-group  pull-right">
		  <button type="button" class="btn btn-default"><?=__('Action',$this)?></button>
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    <span class="caret"></span>
		    <span class="sr-only">Toggle Dropdown</span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
			  <?php
				  foreach($command_tools as $key => $value):
				  echo '<li style="padding:2% 0px">';
				  	switch($key){
					  	case 'create':
					  		echo anchor($value['url'],'<i class="fa fa-plus" aria-hidden="true"></i> '.__($value['name'],$this));
					  		break;
					  	case 'save':
					  		echo '<button type="submit" class="btn btn-block btn-primary cmd-save btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>';
					  		break;
					  	case 'cancel':
					  	
					  		echo '<button type="button" class="btn btn-block btn-default cmd-button">Cancel</button>';
					  		break;
					  	default:
					  		echo "abc";
					  		
				  	}
				  	echo '</li>';
					endforeach;
					
				?>
				<!--<li class="divider"></li>
				<li><a href="#">Separated link</a></li>-->
		  </ul>
		</div>
</div>
</div>
<br />
<?php
	endif;
	?>