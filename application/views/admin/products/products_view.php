<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php 
	$this->load->view('admin/elements/section_header_view');
?>
	<!-- Main Content -->
	<?=content_open($page_name,$this)?>
		
		<div class='box-body'>
			<?php
				$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/products/create','name'=>' Product'))));
				?>
			<table id="data" class="table table-bordered table-striped table-hover">
			    <thead>
				    <tr>
				      <th class='text-center'><?=__("ID",$this)?></th>
				      <th class='text-center'><?=__("Name",$this)?></th>
				      <th class='text-center'><?=__("Image",$this)?></th>
				      <th class='text-center'><?=__("Description",$this)?></th>     
				      <th class='text-center'><?=__("Create",$this)?></th>
				       <th class='text-center'><?=__("Sort",$this)?></th>
				       <th class='text-center'><?=__("Action",$this)?></th>     
				    </tr>
			    </thead>
				<tbody>
					<?php
						if(isset($items)):
							foreach($items as $k => $v):
						?>
						<tr>
								<td class='text-center'><?=$v->id;?></td>
								<td><a href="<?=base_url()?>admin/products/edit/<?=$v->id?>"><?=$v->name;?></a></td>
								<td class='text-center'><a href="<?=base_url()?>admin/products/edit/<?=$v->id?>"><img src='<?=base_url()?>assets/upload/product/thumbnail/<?=isset($v->image['name'])?$v->image['name']:""?>' height="100" onerror="this.src='<?=base_url()?>assets/img/default-image.jpg'" /></a></td>
								<td><?=substr($v->description,0,100)?></td>
								<td class='text-center'><?=$v->created_at?></td>
								<td class='text-center'><?=$v->sort	?></td>
								<td class='text-center'><?=anchor('admin/products/edit/'.$v->id,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/products/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
						</tr>
					<?php
							endforeach;
						
						endif;
						?>
				</tbody>
			</table>
		</div>
	<?=content_close()?>

