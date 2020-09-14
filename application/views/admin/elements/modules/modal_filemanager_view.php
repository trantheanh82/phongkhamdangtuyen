<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="modal fade in" id="modal-default-<?=$field_id?>">
<div class="modal-dialog" style="width:730px;">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><?=$modal_title?></h4>
    </div>
    <div class="modal-body">
	    <?php
 switch($type){ case 'image': 
 ?>
					<iframe width="700" height="400" src="<?=base_url()?>filemanager/dialog.php?akey=abc&type=2&field_id=<?=$field_id?>&fldr=<?=$path?>" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
		<?php
 break; } ?>
      			
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->