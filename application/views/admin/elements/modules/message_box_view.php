<?php
	/**
		$modal_style: modal-default, modal-info, modal-primary, modal-warning, modal-success, modal-danger
		$title: Title for this box
		$message: Message to show
	**/
	if(!isset($modal_style)){
		$modal_style = 'modal-default';
	}
?>
<div class="modal <?=$modal_style?> fade" id="<?=$modal_style?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?=$title?></h4>
      </div>
      <div class="modal-body">
        <p><?=__($message,$this)?></p>
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
		<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->