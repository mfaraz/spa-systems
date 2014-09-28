<div class="panel-heading">
	<h3 class="panel-title">Edit - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('members/edit_member/' . $this->uri->segment(3), 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar();
	if ($member):
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
								<?php echo form_input('firstname', set_value('firstname', $member->firstname), 'class="form-control input-sm"'); ?>
							</div>
						</div>
						<div class="form-group <?php echo form_is_error('lastname'); ?>">
							<?php echo form_label('Last name', 'lastname', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('lastname', set_value('lastname', $member->lastname), 'class="form-control input-sm"'); ?>
							</div>
						</div>

						<div class="form-group <?php echo form_is_error('card_id'); ?>">
							<?php echo form_label('Card Id', 'card_id', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('card_id', set_value('card_id', $member->card_id), 'class="form-control input-sm" ') . form_error('card_id'); ?>
							</div>
						</div>
						<div class="form-group" >
							<?php echo form_label('Phone', 'phone', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('phone', set_value('phone', $member->phone), 'class="form-control input-sm" required') . form_error('phone'); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo form_label('Sex', 'sex', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php
								echo form_sex(set_value('sex', $member->sex));
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Member Settings</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<?php echo form_label('Select user group', 'gid', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_select('gid', $group, 'group', set_value('gid', $member->gid)); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo form_label('User status', 'status', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<div class="checkbox"><input type="checkbox" name="status" id="status" value="1" <?php echo set_checkbox('status', 1, ($member->status == 1) ? TRUE : FALSE); ?>> Check to enable this member account</div>
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
