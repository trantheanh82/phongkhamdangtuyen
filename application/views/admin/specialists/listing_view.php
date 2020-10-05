<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Main Content -->
<?php
		$this->load->view('admin/elements/section_header_view');
	?>
<?=content_open($page_name,$this)?>
	<div class='box-body'>
		<?php
			$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/specialists/create','name'=>lang('Create Expert')))));
			?>
		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Image")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
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
              $img = img(base_url().preg_replace('/upload/i','thumbs',$v->image),'',array('width'=>50));
              $edit_link = base_url()."admin/specialists/edit/".$v->id;

					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td class='text-center'><a href="<?=$edit_link?>"><?=$img?></a></td>
            <td>
              <a href="<?=$edit_link?>"><?=$v->translation->content->name?></a>
            </td>
						<td class='text-center'><?=$v->created_at?></td>

						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=anchor($edit_link,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/specialists/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
			</tbody>
		</table>
	</div>
<?=content_close()?>
