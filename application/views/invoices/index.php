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
						<div class="form-group <?php echo form_is_error('identity_type'); ?>">
							<label for="identity_type" class="control-label col-sm-3">Select Type:</label>
							<div class="col-md-9">
								<?php
								$options = array(
									'1' => 'Card ID',
									'2' => 'Customer Phone'
								);
								echo form_dropdown('identity_type', $options, set_value('identity_type'), 'class="form-control input-sm" id="identity_type"')
								?>
							</div>
						</div>
						<div class="form-group card <?php echo form_is_error('identity_id'); ?>">
							<label for="identity_id" class="control-label col-sm-3">Card ID</label>
							<div class="col-md-9">
								<input type="text" name="identity_id" id="identity_id" class="form-control input-sm" value="<?php echo set_value('identity_id'); ?>" />
								<?php echo form_error('identity_id'); ?>
							</div>
						</div>
						<div class="form-group phone <?php echo form_is_error('identity_id'); ?>">
							<label for="identity_id" class="control-label col-sm-3">Customer Phone </label>
							<div class="col-md-9">
								<input type="text" name="identity_id" id="identity_id" class="form-control input-sm" value="<?php echo set_value('identity_id'); ?>" pattern=".{9,30}" title="Allow enter between 9 to 30 characters" />
								<?php echo form_error('identity_id'); ?>
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
$js = "var availableTags = [";
foreach ($members as $rows) {
	$js.="'" . $rows->phone . "',";
}
$js.="];";

print $js;
?>
		$("#customer_phone").autocomplete({
			source: availableTags
		});
		console.log($('#identity_type').val());
		if ($('#identity_type').val() == 1) {
			$('.card').show();
			$('.phone').hide();
		} else {
			$('.card').hide();
			$('.phone').show();
		}

		$("#identity_type").change(function() {
			if ($(this).val() == 1) {
				$('.card').show();
				$('.phone').hide();
			} else {
				$('.card').hide();
				$('.phone').show();
			}
		});
	});
</script>
