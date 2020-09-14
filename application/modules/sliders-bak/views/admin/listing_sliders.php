<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php 
	$this->load->view('admin/elements/section_header_view');
?>
	<!-- Main Content -->
	<?=content_open($page_name,$this)?>
		
		<div class='box-body'>
			<?php
				$this->load->view('admin/elements/ui/command_tools.php',array('command_tools'=>array('create'=>array('url'=>'admin/sliders/create','name'=>lang('Sliders')))));
				?>
			<table id="data" class="table table-bordered table-striped table-hover">
			    <thead>
				    <tr>
				      <th class='text-center'><?=__("ID",$this)?></th>
				      <th class='text-center'><?=__("Name",$this)?></th>
				      
				      <th class='text-center'><?=__("Head Line",$this)?></th>
				      <th class='text-center'><?=__("Image",$this)?></th>    
				      <th class='text-center'><?=__("Create",$this)?></th>
				       <th class='text-center'><?=__("Sort",$this)?></th>
				       <th class='text-center'><?=__("Action",$this)?></th>     
				    </tr>
			    </thead>
				<tbody>
					<?php
						if(isset($items)):
							foreach($items as $k => $v):
							
							$link = base_url().'admin/sliders/edit/'.$v->id;
						?>
						<tr>
								<td class='text-center'><?=$v->id;?></td>
								<td class='text-center'><?=anchor($link,$v->name)?></td>
								<td class='text-center'><?=anchor($link,$v->tag_line)?></td>
								<td class='text-center'><?=anchor($link,img($v->image,false,array('width'=>'100px')))?></td>
								<td class='text-center'><?=$v->created_at?></td>
								<td class='text-center'><?=$v->sort	?></td>
								<td class='text-center'><?=anchor($link,'<i class="fa fa-edit"></i>',array('title'=>__('Edit',$this))).' '.anchor('admin/sliders/delete/'.$v->id,'<i class="fa fa-trash"></i>',array('title'=>__('Delete',$this),'class'=>'confirm_delete'))?></td>
						</tr>
					<?php
							endforeach;
						
						endif;
						?>
				</tbody>
			</table>
		</div>
	<?=content_close()?>

