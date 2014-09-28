<div class="panel-heading">
	<h3 class="panel-title">Edit - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('referrers/edit_referrer/' . $this->uri->segment(3), 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar();
	if ($referrer):
		?>
		<div class="row-fluid">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Employee Profile</h4>
					</div>
					<div class="panel-body">
						<div class="form-group <?php echo form_is_error('firstname'); ?>">
							<?php echo form_label('First name', 'firstname', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('firstname', set_value('firstname', $referrer->firstname), 'class="form-control input-sm"'); ?>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('lastname'); ?>">
							<?php echo form_label('Last name', 'lastname', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('lastname', set_value('lastname', $referrer->lastname), 'class="form-control input-sm"'); ?>
							</div>
						</div>
                        <div class="form-group <?php echo form_is_error('phone'); ?>">
                            <?php echo form_label('Phone', 'phone', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('phone', set_value('phone', $referrer->phone), 'class="form-control input-sm" ') ;?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('email'); ?>">
                            <?php echo form_label('Email', 'email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo form_input('email', set_value('email', $referrer->email), 'class="form-control input-sm" ') ;?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_is_error('address'); ?>">
                            <?php echo form_label('Address', 'address', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo form_textarea('address', set_value('address', $referrer->address), 'class="form-control input-sm" ') ;?>
                            </div>
                        </div>
						<div class="form-group">
							<?php echo form_label('Sex', 'sex', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php
								echo form_sex(set_value('sex', $referrer->sex));
								?>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
		<?php
	endif;
	echo form_close();
	?>
</div>
