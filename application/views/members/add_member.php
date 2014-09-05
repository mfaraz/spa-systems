<div class="panel-heading">
	<h3 class="panel-title">New - Member</h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('members/add_member', 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar('add');
	?>
	<div class="row-fluid">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Member Profile</h4>
				</div>
				<div class="panel-body">
					<div class="form-group <?php echo form_is_error('firstname'); ?>">
						<?php echo form_label('First name', 'firstname', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('firstname', set_value('firstname'), 'class="form-control input-sm" pattern=".{3,50}" title="Allow enter from 3 to 50 characters"') . form_error('firstname'); ?>
						</div>
					</div>
					<div class="form-group <?php echo form_is_error('lastname'); ?>">
						<?php echo form_label('Last name', 'lastname', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('lastname', set_value('lastname'), 'class="form-control input-sm" pattern=".{3,50}" title="Allow enter from 3 to 50 characters"') . form_error('lastname'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Card id', 'card', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('card', set_value('card'), 'class="form-control input-sm"'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Phone<span class="required">*</span>', 'phone', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('phone', set_value('phone'), 'class="form-control input-sm"'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Sex', 'gender', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php
							echo form_sex(set_value('sex'));
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Member Setting</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<?php echo form_label('Select user group', 'gid', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_select('gid', $group, 'group', set_value('gid')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('User status', 'status', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<div class="checkbox"><input type="checkbox" name="status" id="status" value="1" <?php echo set_checkbox('status', 1, TRUE); ?>> Check to enable this user account</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	echo form_close();
	?>
</div>
