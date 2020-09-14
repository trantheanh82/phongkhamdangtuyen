<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/articles/create','name'=>'Create Article'))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=__("ID",$this)?></th>
			      <th class='text-center'><?=__("Image",$this)?></th>
			      <th class='text-center'><?=__("Title",$this)?></th>
			      <th class='text-center'><?=__("Description",$this)?></th>
			      <th class='text-center'><?=__("Created",$this)?></th>
			      <th class='text-center'><?=__("Modified",$this)?></th>

			      <th class='text-center'><?=__("Order",$this)?></th>
			      <th class='text-center'><?=__("Action",$this)?></th>

			    </tr>
		    </thead>
			<tbody>
				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
							$img = base_url().preg_replace('/upload/i','thumbs',$v->image);
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=base_url()?>admin/articles/edit/<?=$v->id?>"><?=img($img,TRUE,array('alt'=>(!empty($v->translation->content->name)?$v->translation->content->name:""),'class'=>'img-responsive','style'=>'max-width:100px'))?></a>
						<td><a href="<?=base_url()?>admin/articles/edit/<?=$v->id?>"><?=(!empty($v->translation->content->name)?$v->translation->content->name:"")?></a></td>
						<td><?=(!empty($v->translation->content->description)?$v->translation->content->description:"")?></td>
						<td class='text-center'><?=$v->created_at?></td>
						<td class='text-center'><?=$v->updated_at?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=anchor('admin/articles/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/articles/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
