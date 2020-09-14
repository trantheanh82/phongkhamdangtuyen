<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/faq/create','name'=>lang('Create Pages')))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Questions")?></th>
			      <th class='text-center'><?=lang("Answers")?></th>
			      <th class='text-center'><?=lang("Created")?></th>
			      <th class='text-center'><?=lang("Modified")?></th>
            <th class='text-center'><?=lang("Active")?></th>
			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang("Action")?></th>

			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td><a href="<?=base_url()?>admin/faq/edit/<?=$v->id?>"><?=(!empty($v->translation->content->question)?$v->translation->content->question:"")?></a></td>
						<td><?=getSnippet($v->translation->content->question,10)?> [<a href="<?=base_url()?>admin/faq/edit/<?=$v->id?>">...</a>]</td>
						<td class='text-center'><?=$v->created_at?></td>
						<td class='text-center'><?=$v->updated_at?></td>

						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=anchor('admin/faq/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/faq/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
