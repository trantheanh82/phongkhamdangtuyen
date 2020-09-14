<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php 
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open(ucfirst($page_name),$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/'.$page_name.'/create','name'=>lang('Create '. $page_name)))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang('Brand logo')?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang("Products")?></th>
			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang("Active")?></th>
			      <th class='text-center'><?=lang("Action")?></th>
			               
			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
						$img = base_url().$v->image;
						$link_edit = base_url().'admin/'.$page_name.'/edit/'.$v->id;
						$link_delete = base_url().'admin/'.$page_name.'/edit/'.$v->id;
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=$link_edit?>"><?=img($img,false,array('style'=>'max-width:50px;max-height:20px'))?></a></td>
						<td><a href="<?=$link_edit?>"><?=$v->name?></a></td>
						<td class='text-center'><?=$v->products_count?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=anchor($link_edit,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor($link_delete,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>