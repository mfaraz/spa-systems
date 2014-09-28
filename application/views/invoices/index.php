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
									<option value="1">Card ID</option>
									<option value="2" default selected="">Customer Phone</option>
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
								<input type="text" name="customer_phone" id="customer_phone" class="form-control input-sm" value="" pattern=".{9,30}" title="Allow enter between 9 to 30 characters" />
								<?php echo form_error('customer_phone'); ?>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('cash_receive'); ?>">
							<label for="cash_receive" class="control-label col-sm-3">Cash Received </label>
							<div class="col-md-9">
								<input type="text" name="cash_receive" id="cash_receive" class="form-control input-sm" value="" pattern=".{1,50}" title="Allow enter between 1 to 50 characters" />
								<?php echo form_error('cash_receive'); ?>
							</div>
						</div>
					</div>
				</div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Referrer Information
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group <?php echo form_is_error('card_id'); ?>">
                            <label for="cid" class="control-label col-sm-3">Select Type:</label>
                            <div class="col-md-9">
                                <select name="referrerExist" class="form-control select-sm" id="selectReferrer" data-placeholder="Choose">
                                    <option value="1" default selected="">Already Exist</option>
                                    <option value="2">Not Yet Exist</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('referrer'); ?>">
                            <?php echo form_label('Referrer Name', 'rfid', array('class' => 'col-sm-3 control-label', 'id' => 'lRfname')); ?>
                            <div class="col-sm-9">
                                <?php echo form_select('referrer', $referrer, 'referrer', set_value('rfid')); ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('firstname'); ?>">
                            <?php echo form_label('First name', 'firstname', array('class' => 'col-sm-3 control-label', 'id' => 'lFname')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('firstname', set_value('firstname'), 'class="form-control input-sm" id="fName"'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('lastname'); ?>">
                            <?php echo form_label('Last name', 'lastname', array('class' => 'col-sm-3 control-label', 'id' => 'lLname')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('lastname', set_value('lastname'), 'class="form-control input-sm" id="lName"') ;?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('phone'); ?>">
                            <?php echo form_label('Phone', 'phone', array('class' => 'col-sm-3 control-label', 'id' => 'lPhone')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('phone', set_value('phone'), 'class="form-control input-sm" id="rfPhone"') ;?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('email'); ?>">
                            <?php echo form_label('Email', 'email', array('class' => 'col-sm-3 control-label', 'id' => 'lEmail')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('email', set_value('email'), 'class="form-control input-sm" id="rfEmail"') ;?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('address'); ?>">
                            <?php echo form_label('Address', 'address', array('class' => 'col-sm-3 control-label', 'id' => 'lAdd')); ?>
                            <div class="col-sm-9">
                                <?php echo form_textarea('address', set_value('address'), 'class="form-control input-sm" id="rfAdd"') ;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Sex ', 'gender ', array('class' => 'col-sm-3 control-label', 'id' => 'lSex')); ?>
                            <div class="col-sm-9">
                                <?php
                                echo form_sex(set_value('sex'));
                                ?>
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
           if($(this).val() == 1) {
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
    
    $(document).ready(function() {
		$('#lFname').hide();
        $('#fName').hide();
        $('#lLname').hide();
        $('#lName').hide();
        $('#lPhone').hide();
        $('#rfPhone').hide();
        $('#lEmail').hide();
        $('#rfEmail').hide();
        $('#lAdd').hide();
        $('#rfAdd').hide();
        $('#lSex').hide();
		$('#gender').hide();
		$('#lRfname').show();
		$('#referrer').show();
		$("#selectReferrer").change(function() {
		   if($(this).val() == 1) {
				$('#lFname').hide();
                $('#fName').hide();
                $('#lLname').hide();
                $('#lName').hide();
                $('#lPhone').hide();
                $('#rfPhone').hide();
                $('#lEmail').hide();
                $('#rfEmail').hide();
                $('#lAdd').hide();
                $('#rfAdd').hide();
                $('#lSex').hide();
                $('#gender').hide();
                $('#lRfname').show();
                $('#referrer').show();
		   }else{
				$('#lFname').show();
                $('#fName').show();
                $('#lLname').show();
                $('#lName').show();
                $('#lPhone').show();
                $('#rfPhone').show();
                $('#lEmail').show();
                $('#rfEmail').show();
                $('#lAdd').show();
                $('#rfAdd').show();
                $('#lSex').show();
                $('#gender').show();
                $('#lRfname').hide();
                $('#referrer').hide();
		   }
		});
	});
</script>
