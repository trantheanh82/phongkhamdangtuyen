<?php
	$subtotal = 0;
?>
<?php
	echo form_open('admin/invoices/create_invoice',array('id'=>'ajax_submit')); ?>
<!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?=$Settings['company_name']?>
            <small class="pull-right"><?=__("Date",$this)?>: <?=date('d-m-Y')?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <?=__('From',$this)?>
          <address>
            <strong><?=$Settings['company_name']?></strong><br>
            <?=__('Address',$this).': '.$Settings['company_address_1']?><br />
            <?=__('Phone',$this).': '.$Settings['company_phone_1']?><br />
            <?=__('Email',$this).': '.$Settings['company_email']?><br />
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <?=__('To',$this)?>
          <address>
            <strong><?=$data['customer_name']?></strong><br>
            <?=$data['customer_address']?><br>
            <?=__('Address',$this).': '.$data['customer_ward_name'].', '.$data['customer_province_name']?><br>
            <?=__('Phone',$this).': '.$data['customer_phone']?><br>
			<?=__('Email',$this).': '.$data['customer_email']?>
			</address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b><?=__("Invoice",$this).' '?> #<?=$invoice_no?></b><br>
          <br>
          <!--<b>Order ID:</b> 4F3S8J<br>
          <b><?=__('Payment Due',$this)?>:</b> <?=date('d-m-Y')?><br>
          <b>Account:</b> 968-34567-->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th><?=__('Name',$this)?></th>
              <th><?=__('Description',$this)?></th>
              <th><?=__('Subtotal',$this)?></th>
            </tr>
            </thead>
            <tbody>
	            <?php
		            if($data['items']):
		            $i = 1;
		            	foreach($data['items'] as $k => $v):
		            ?>
		    <tr>
              <td><?=$i?></td>
              <td>
	              <?=$v['name']?>
	               <?php
		              if(isset($v['deflation_amount']) && $v['deflation_amount']>0):?>
	              <br />
	              <span style='font-size:0.8em;' class='text-success'><?=__("Deflation Fee",$this)?></span>
	              <?php
		              endif;
		              ?>
	          </td>
              <td><?=$v['name']?></td>
              <td class='text-right'>
	              <span class='currency'><?=$v['price']?></span><?php
		              if(isset($v['deflation_amount']) && $v['deflation_amount']>0):?>
	              <br />
	              <span class='currency text-success' style='font-size:0.8em;'>-<?=$v['deflation_amount']?></span>
	              <?php
		              endif;
		              ?>
	          </td>
            </tr>   
		        <?php
			        		$subtotal += $v['price'];
			        		$i++;
			        	endforeach;
			        endif;
			        ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <!--<p class="lead"><?=__('Payment Methods',$this)?>:</p>
          <!--<img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><?=__('Amount Due',$this).' '.date('d-m-Y')?></p>

          <div class="table-responsive">
            <table class="table">
             
              <!-- 
	          <tr>
                <th><?=__('Taxx',$this)?> (9.3%)</th>
                <td>$10.34</td>
              </tr>
             <tr>
                <th><?=__('Shipping',$this)?>:</th>
                <td>$5.80</td>
              </tr>-->
              <tr>
                <th><?=__('Total',$this)?>:</th>
                <td class='text-right'>
	                <span class='currency'><?=$data['total_fee_after_deflation']?></span>
	            </td>
              </tr>
               <tr>
                <th style="width:50%"><?=__('Pay Amount',$this)?>:</th>
                <td class='text-right'><span class='currency'><?=$data['pay_amount']?></span></td>
              </tr>
              <tr>
                <th style="width:50%"><?=__('Dept',$this)?>:</th>
                <td class='text-right'><span class='currency'><?=(int)$data['pay_amount'] - $data['total_fee_after_deflation'] ?></span></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default" id='print' style='display:none'><i class="fa fa-print"></i> <?=__('Print',$this)?></a>
          <button name='submit_invoice' type="buttons" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> <?=__('Submit Payment',$this)?>
          </button>
		  <button type="button" class="btn btn-primary pull-right" id="generate_pdf" style="margin-right: 5px;display:none;">
            <i class="fa fa-download"></i> <?=__('Generate PDF',$this)?>
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
<?php
	
	echo form_hidden('invoice_no',$invoice_no);
	echo form_hidden('invoice_type','HV');
	echo form_hidden('invoice_date',date('Y-m-d H:i:s'));
	foreach($data as $k=>$v){
		if($k == 'items'){
			foreach($v as $s => $h){
				echo form_hidden('items['.$s.']',$h);
			}
		}else{
			echo form_hidden($k,$v);
		}
		
		
	}
	echo form_close();
	
?>
<!--<div class="modal modal-success fade" id="modal-success" style="display: none;">-->
<?php $this->load->view('admin/elements/modules/message_box_view',array('modal_style'=>'modal-success','title'=>__('Submited',$this),'message'=>'Payment submited success'))?>
<?php $this->load->view('admin/elements/modules/message_box_view',array('modal_style'=>'modal-danger','title'=>__('Submited',$this),'message'=>'Payment submited unsuccess'))?>