<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
	$this->load->view('admin/elements/section_header_view');
?>
<?=content_open($page_name,$this)?>
	<?php
		echo form_open();
		echo form_hidden('group_id',$group->id);
	?>
	<div class='box-body'>
		<?php
			if(!empty($controllers)):
			 $i = 0;
				foreach($controllers as $controller=>$methods):
					$groups = array();
					if(!empty($group_permissions)){
						foreach($group_permissions as $k=>$value){

							if($value->controller == $controller){
								$groups[] = $group_permissions->$k;

								unset($group_permissions->$k);
							}
						}
					}
			?>
			<?php
				if($i == 0):
			?>
			<div class='row' style='margin-bottom:5%'>
				<?php
					endif;
					?>
				<div class='col-md-4'>
					<label><?=__($controller,$this)?></label> &nbsp;&nbsp;&nbsp;<label><input id="<?=$controller?>" type="checkbox" class="minimal" />
					<?=__("Check All",$this)?></label><hr />
					<?php
						foreach($methods as $k=>$method):
						$check = '';
							if(is_array($groups)){
								foreach($groups as $k=>$value){
									if($method == $value->action){
										$check = ' checked';
										unset($groups[$k]);
									}
								}
							}
					?>
					<div class='col-xs-12 col-sm-12 col-md-12'>
						<div class="form-group" style='border-bottom:1px solid #eee'>
			                <label class='border-bottom'>
			                  <input type="checkbox" class="minimal <?=$controller?>" name="Permissions[<?=$controller.']['.$method.'].'?>" <?=$check?>>
			                  <small><?=$method?></small>
			                </label>
						</div>
					</div>
					<?php
						endforeach;
						?>

						<div class='col-md-6 text-center'>
							<button type='submit' class='btn btn-flat btn btn-block btn-success btn-xs'><?=__("Save change",$this)?></button>
						</div>
				</div>

			<?php
				$i++;
				if($i == 3):
				?>
			</div>
			<?php
					$i = 0;
				endif;
			?>

		<?php
				endforeach;
			endif;
			?>
		</div><!--./row -->
	</div><!-- ./box-body -->
	<?=form_close();?>
<?=content_close()?>
