<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<table id="data_request_call" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang("Phone")?></th>
			      <th class='text-center'><?=lang("Content")?></th>
			      <th class='text-center'><?=lang("View")?></th>
			      <th class='text-center'><?=lang("Created")?></th>
			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
					?>
					<tr <?=$v->view=='N'?"class='highlight'":""?>>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=base_url()?>admin/requestcalls/view/<?=$v->id?>"><?=$v->name?></a>
						<td><a href="<?=base_url()?>admin/requestcalls/view/<?=$v->id?>"><?=$v->phone?></a></td>
						<td class='text-center'><?=$v->content?></td>
            <td class='text-center'><?=$v->view=='Y'?lang('Seen'):lang('Not seen yet')?>
						<td class='text-center'><?=$v->created_at?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
<script>
$(document).ready(function(){
  $('#data_request_call').DataTable({
	    'language'		: {'url':'//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json'},
	    'paging'      	: true,
	    'searching'   : true,
	    'ordering'    : false,
	    'info'        : true,
	    'pageLength'			: 50,
			'lengthMenu'	: [20,50,100]
	});
});
</script>
