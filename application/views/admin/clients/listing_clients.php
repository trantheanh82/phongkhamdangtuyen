<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/ourclients/create','name'=>'Create Clients'))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=__("ID",$this)?></th>
			      <th class='text-center'><?=__("Image",$this)?></th>
			      <th class='text-center'><?=__("Name",$this)?></th>
			      <th class='text-center'><?=__("Order",$this)?></th>
			      <th class='text-center'><?=__("Active",$this)?></th>
			      <th class='text-center'><?=__("Action",$this)?></th>

			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
							$img = base_url().$v->logo;
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=base_url()?>admin/ourclients/edit/<?=$v->id?>"><?=img($img,TRUE,array('class'=>'img-responsive','style'=>'max-width:200px'))?></a>
						<td><a href="<?=base_url()?>admin/ourclients/edit/<?=$v->id?>"><?=(!empty($v->name)?$v->name:"")?></a></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=anchor('admin/ourclients/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/ourclients/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
