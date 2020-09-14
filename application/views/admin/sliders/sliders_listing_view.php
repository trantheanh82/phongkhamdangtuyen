<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/sliders/create','name'=>lang('Create sliders')))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Image")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang("Description")?></th>
			      <th class='text-center'><?=lang("Created")?></th>
			      <th class='text-center'><?=lang("Active")?></th>
			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang("Action")?></th>
			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
						$img = img(base_url().preg_replace("/upload/","thumbs",$v->translation->content->image),'',array('width'=>100));
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=base_url()?>admin/sliders/edit/<?=$v->id?>"><?=$img?></a>
						<td><a href="<?=base_url()?>admin/sliders/edit/<?=$v->id?>"><?=$v->translation->content->headline?></a></td>
						<td><?=getSnippet($v->translation->content->description,10)?> [<a href="<?=base_url()?>admin/sliders/edit/<?=$v->id?>">...</a>]<br /><br /><strong><?=lang("Button text")?></strong>: <?=$v->translation->content->button_text?><br /><strong><?=lang('Link')?></strong>: <?=$v->translation->content->button_link?></td>
						<td class='text-center'><?=$v->created_at?></td>
						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=anchor('admin/sliders/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/sliders/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
