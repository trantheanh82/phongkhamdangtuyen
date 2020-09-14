<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>

<div class='box-body'>
	 <?php
			$this->load->view('admin/elements/ui/command_tools',array('command_tools'=>array('create'=>array('url'=>'admin/category/create/'.$model,'name'=>'
 Category'))));
			?>

	<table id='data' class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th><?=lang('ID')?></th>
				<th><?=lang('Name')?></th>
				<th><?=lang('Image')?></th>
				<th><?=lang('Type')?></th>
				<th><?=lang('Sort')?></th>
				<th><?=lang('Active')?></th>
				<th><?=lang('Created')?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(!empty($items)):
				foreach($items as $item):
				?>
				<tr>
					<td><?=$item->id?></td>
					<td><?php echo anchor('admin/category/edit/'.$item->id,(!empty($item->translation->content->name)?$item->translation->content->name:""))?></td>
					<td>
						<?php
							if($item->image){
								echo anchor('admin/category/edit/'.$item->id,img($item->image,false,array('class'=>'img-responsive','style'=>'max-width:100px')));
							}
						?>
					</td>
					<td><?=$item->model?></td>
					<td><?=$item->sort?></td>

					<td><?=$item->active?></td>

					<td><?=$item->created_at?></td>
					<td class='text-center'><?=anchor('admin/category/edit/'.$item->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/category/delete/'.$item->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
				</tr>
			<?php
				endforeach;
			else:
		?>
			<tr>
				<td colspan=8>
					<?=lang("There aren't no item, create one")?> <?=anchor('admin/category/create/'.$model,lang("create a category"))?>
				</td>
			</tr>
		<?php
	endif;
		?>
		</tbody>
	</table>
</div>
<?=content_close()?>
