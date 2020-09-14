<div class='box-footer clearfix'>
	<?php
		if(isset($command_tools)):
		?>
	<div class="box-tools pull-right">
			<?php
				foreach($command_tools as $k => $v):
				if($v == 'save'):
				?>
	        <button type="submit" class="btn btn-primary cmd-save"><i class="fa fa-floppy-o" aria-hidden="true"></i>
 <?=__('Save',$this)?></button>
	        <?php
		        endif;
		        
		        if($v == 'cancel'):
		        ?>
		    <?=echo_space(5)?><button type="button" class="btn btn-default cmd-button"><?=__('Cancel',$this)?></button>
			<?php
			    endif;
			    endforeach; //endforeach line 7
			    ?>
    </div>
    	<?php
	    	endif;
	    	?>
</div>