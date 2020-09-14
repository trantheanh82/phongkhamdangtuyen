<?php
	echo form_open('admin/receipt/process'); ?>
<div class='row'>
	<div class='col-xs-12 col-md-12 col-lg-12'>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$Settings['company_name']?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
	              <div class='row'>
		              <div class='col-md-6 col-lg-6'>
			              <div class="form-group">
			                  <label for="exampleInputEmail1"><?=__("Receipt No",$this)?></label>
			                  <input name="receipt_no" type="input" class="form-control" id="exampleInputEmail1" value="<?=$receipt_no?>"  readonly>
			              </div>
			                
			              <div class="form-group">
			                  <label for="exampleInputEmail1"><?=__("Date",$this)?></label>
			                  <input name="receipt_date" type="input" class="form-control" id="exampleInputEmail1" value="<?=date('d-m-Y')?>"  readonly>
			              </div>
			              
			              <div class="form-group">
			                  <label for="exampleInputEmail1"><?=__("Pay Amount",$this)?></label>
			                  <input name="pay_amount" type="input" class="form-control currency" id="exampleInputEmail1" value="<?=$data['pay_amount']?>"  readonly>
			              </div>
			              
			              <div class="form-group">
				              
				            <label for="payment_method_id"><?=__("Payment methods",$this)?></label>
			                <select name='payment_method_id' class="form-control select2" id='payment_method_id' style='width:100%;'>
			                 	<?php
				                 	foreach($payment_methods as $k => $c):
				                 	?>
				                 	<option value="<?=$k?>"><?=$c?></option>
				                <?php
					                endforeach;
					                ?>
			                </select>
				              
			              </div>
		              </div>
		              <div class='col-md-6 col-lg-6'>
			              <dl>
			                <dt><?=__('Amount',$this)?></dt>
			                <dd><span class='currency'><?=$data['total_value']?></span></dd>
			                <dt><?=__('Pay Amount',$this)?></dt>
			                <dd><span class='currency'><?=$data['pay_amount']?></span></dd>
			                <dd></dd>
			                
			                <dt><?=__('Dept',$this)?></dt>
			                <dd><span class='currency'><?=$data['dept']?></span></dd>
			                
			              </dl>
		              </div>
	              </div>
	              <div class='row'>
		              <div class='col-md-6 col-lg-6'>
			               <div class="form-group">
			                  <label for="exampleInputEmail1"><?=__("Payer",$this)?></label>
			                  <input type="input" class="form-control" name="payer" id="payer" placeholder="<?=__("Name",$this)?>">
			              </div>
			              
			              <div class="form-group">
			                  <label for="exampleInputEmail1"><?=__("Phone",$this)?></label>
			                  <input type="input" class="form-control" name="phone" id="phone" placeholder="<?=__("Phone",$this)?>">
			              </div>
			              
			                <div class="form-group">
			                  <label for="exampleInputPassword1"><?=__("Email",$this)?></label>
			                  <input type="input" class="form-control" name="email" id="email" placeholder="<?=__("Email",$this)?>">
			                </div>
		              </div>
		              <div class='col-md-6 col-lg-6'>
			                <div class="form-group">
			                  <label for="exampleInputPassword1"><?=__("Reason",$this)?></label>
			                  <textarea class="form-control" rows="3" name="reason" placeholder="<?=__("Reason",$this)?>"></textarea>
			                </div>
		              </div>
	              </div>
	                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
	              <button type="button" class="btn btn-default back"><?=__('Back',$this)?></button>

                <button type="submit" class="btn btn-primary pull-right"><?=__('Submit',$this)?></button>
              </div>
	    </div>
	</div>
</div>
<?php
	echo form_hidden('student_id',$data['student_id']);
	echo form_hidden('pay_amount',$data['pay_amount']);
	echo form_hidden('total_value',$data['total_value']);
	echo form_hidden('course_id',$data['course_id']);
	echo form_hidden('dept',$data['dept']);
	
	echo form_close();
?>