<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open(ucfirst($page_name),$this)?>
	<div class='box-body'>
		<!-- ./col left -->
		<div class='col-sm-9 border-right-3d'>
			<table border=0 cellpadding=10 cellspacing=0 width='100%'>
				<tr>
					<td width='10%'><label><?=lang('Name')?></label></td>
					<td>: <?=$item->name?></td>
				</tr>
				<tr>
					<td width='10%'><label><?=lang('Phone')?></label></td>
					<td>: <?=(!empty($item->phone)?$item->phone:"")?></td>
				</tr>
				<tr>
					<td width='10%'><label><?=lang('Type of Booking')?></label></td>
					<td>: <?=(!empty($item->type)?lang($item->type):"")?></td>
				</tr>
			</table>
		</div>
	</div>
<?=content_close()?>
