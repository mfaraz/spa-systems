<div class="panel-heading hidden-print">
	<h2 class="panel-title">Invoice Generation</h2>
</div>
<div class="panel-body">
	<?php
	echo $this->session->flashdata('message');
	?>
	<div class="content sale">
		<div class="row">
			<div class="col-md-6 hidden-print">
				<?php
				echo form_open('invoices/', 'class="form-horizontal" role="form"');
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							Customer Information
							<button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
						</h3>
					</div>
					<div class="panel-body">
						<div class="form-group <?php echo form_is_error('card_id'); ?>">
							<label for="cid" class="control-label col-sm-3">Select Type:</label>
							<div class="col-md-9">
								<select class="form-control select-sm" id="selectType" data-placeholder="Choose">
									<option value="0" default selected="">Choose</option>
									<option value="1">Card ID</option>
									<option value="2" class="next">Customer Phone</option>
								</select>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('card_id'); ?>">
							<label id="lCardId" for="cash_receive" class="control-label col-sm-3">Card ID</label>
							<div class="col-md-9">
								<input type="text" name="card_id" id="card_id" class="form-control input-sm" value="<?php echo set_value('card_id'); ?>" />
								<?php echo form_error('card_id'); ?>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('customer_phone'); ?>">
							<label id="lCusPhone" for="customer_phone" class="control-label col-sm-3">Customer Phone </label>
							<div class="col-md-9">
								<input type="text" name="customer_phone" id="customer_phone" class="form-control input-sm" value="<?php echo set_value('customer_phone'); ?>" pattern=".{9,30}" title="Allow enter between 9 to 30 characters" />
								<?php echo form_error('customer_phone'); ?>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('cash_receive'); ?>">
							<label for="cash_receive" class="control-label col-sm-3">Cash Received </label>
							<div class="col-md-9">
								<input type="text" name="cash_receive" id="cash_receive" class="form-control input-sm" value="<?php echo set_value('cash_receive'); ?>" pattern=".{1,50}" title="Allow enter between 1 to 50 characters" />
								<?php echo form_error('cash_receive'); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				echo form_close();
				?>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading hidden-print">
						<h3 class="panel-title">
							Purchase Information
							<?php
							if ($invoice_items) {
								foreach ($invoice_items as $item) {
									if ($item->cash_receive != '0.00') {
										?>
										<a href="<?php echo base_url(); ?>invoices/print_invoice" class="btn btn-sm btn-info print"
										   title="Print"><span class="glyphicon glyphicon-print"></span> Print</a>
										   <?php
									   }
									   break;
								   }
							   }
							   ?>
						</h3>
					</div>
					<div class="panel-body">
						<?php $this->load->view('invoices/invoice'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		<?php
			
			$js ="var availableTags = [";
			foreach($members as $rows){
				$js.="'".$rows->phone."',";
			}
			$js.="];";
			
			print $js;
		?>
		$( "#customer_phone" ).autocomplete({
			source: availableTags
		});
	});
	
	$(document).ready(function() {
		$('#lCardId').hide();
		$('#card_id').hide();
		$('#lCusPhone').show();
		$('#customer_phone').show();
		$("#selectType").change(function() {
		   if($(this).val() == 0) {
				$('#lCardId').hide();
				$('#card_id').hide();
				$('#lCusPhone').hide();
				$('#customer_phone').hide();
		   }
		   else if($(this).val() == 1) {
				$('#lCardId').show();
				$('#card_id').show();
				$('#lCusPhone').hide();
				$('#customer_phone').hide();
		   }else{
				$('#lCardId').hide();
				$('#card_id').hide();
				$('#lCusPhone').show();
				$('#customer_phone').show();
		   }
		});
	});
</script>
