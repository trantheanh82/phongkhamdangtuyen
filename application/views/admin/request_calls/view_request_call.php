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
					<td width='30%'><label><?=lang('Name')?></label></td>
					<td>: <?=$item->name?></td>
				</tr>
				<tr>
					<td width='10%'><label><?=lang('Email ')?></label></td>
					<td>: <?=(!empty($item->email)?$item->email:"")?></td>
				</tr>
				<tr>
					<td width='10%'><label><?=lang('Phone')?></label></td>
					<td>: <?=(!empty($item->phone)?"<a class='btn-sm btn-primary' href='tel:".$item->phone."'><i class='fa fa-phone'></i> ".lang('Call')." - ".$item->phone."</a>":"")?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
        <tr>
					<td width='10%'><label><?=lang('Content')?></label></td>
					<td>: <?=(!empty($item->content)?$item->content:"")?></td>
				</tr>
			</table>
		</div>
	</div>
<?=content_close()?>
