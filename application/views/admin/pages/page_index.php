<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/pages/create','name'=>lang('Create Pages')))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Image")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang("Description")?></th>
			      <th class='text-center'><?=lang("Created")?></th>
			      <th class='text-center'><?=lang("Modified")?></th>

			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang("Action")?></th>

			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
						$img = img(base_url().preg_replace('/upload/i','thumbs',$v->image),'',array('width'=>100));
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=base_url()?>admin/pages/edit/<?=$v->id?>"><?=$img?></a>
						<td><a href="<?=base_url()?>admin/pages/edit/<?=$v->id?>"><?=(!empty($v->translation->content->name)?$v->translation->content->name:"")?></a></td>
						<td><?=getSnippet($v->translation->content->description,10)?> [<a href="<?=base_url()?>admin/pages/edit/<?=$v->id?>">...</a>]</td>
						<td class='text-center'><?=$v->created_at?></td>
						<td class='text-center'><?=$v->updated_at?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=anchor('admin/pages/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/pages/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
