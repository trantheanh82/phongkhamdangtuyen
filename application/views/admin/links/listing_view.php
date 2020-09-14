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
						<form action="<?=site_url().'/admin/ajax/create'?>" id='ajax_form_post' method="post" enctype='multipart/form-data'>

		<table id="data" class="table table-bordered table-striped table-hover">
		    <thead>
			    <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang('Links')?></th>
			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang('Active')?></th>
			      <th class='text-center'><?=lang("Action")?></th>

			    </tr>
		    </thead>
			<tbody>

				<?php
					if(!empty($items)):
						foreach($items as $k=>$v):
						$link_edit = base_url().'admin/'.$page_name.'/edit/'.$v->id;
						$link_delete = base_url().'admin/'.$page_name.'/delete/'.$v->id;
					?>
					<tr>
						<td class='text-center'><?=$v->id?></td>
						<td><a href="<?=$link_edit?>"><?=$v->translation->content->name?></a></td>

						<td><a href="<?=$link_edit?>"><?=$v->link?></a></td>
						<td class='text-center'><?=$v->sort?></td>
						<td class='text-center'><?=$v->active?></td>
						<td class='text-center'><?=anchor($link_edit,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor($link_delete,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
					</tr>
				<?php
						endforeach;
					endif;
					?>
					<!--
					<tr class='common_row'>
							<?php
								echo form_hidden('model','link_model');
								echo form_hidden('show_in','footer');
							?>
							<td class='text-center'><i class="fa fa-plus" aria-hidden="true"></i><span class='hidden'>1000000</span></td>
							<td>
								<?=form_input('name','',array('class'=>'required'))?>
							</td>
							<td><?=form_input('link','',array('class'=>'required'))?></td>
							<td class='text-center'><?=form_input('sort','5',array('width'=>10))?></td>
							<td class='text-center'><input type="checkbox" name="active" value="Y" checked  class="minimal" />
	</td>
							<td class='text-center'>
								<button class='btn btn-primary' id='btn_ajax_submit' type="submit"><i class="fa fa-plus" aria-hidden="true"></i> <?=lang("Create New")?></button>
							</td>

					</tr>
				-->
			</tbody>
			<tfoot>

					 <tr>
			      <th class='text-center'><?=lang("ID")?></th>
			      <th class='text-center'><?=lang("Name")?></th>
			      <th class='text-center'><?=lang('Links')?></th>
			      <th class='text-center'><?=lang("Order")?></th>
			      <th class='text-center'><?=lang('Active')?></th>
			      <th class='text-center'><?=lang("Action")?></th>

			    </tr>
			</tfoot>
		</table>
		</form>
	</div>

<?=content_close()?>
