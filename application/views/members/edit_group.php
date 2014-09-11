<div class="panel-heading">
	<h3 class="panel-title">New - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('members/edit_group/' . $this->uri->segment(3), 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar('add');
	if($group):
	?>
	<div class="row-fluid">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Member Group</h4>
				</div>
				<div class="panel-body">
					<div class="form-group ">
						<?php echo form_label('Group Name <span class="required">*</span>', 'name', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('name', set_value('name',$group->name), 'class="form-control input-sm" pattern=".{2,50}" title="Allow enter from 2 to 50 characters" required'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Discount <span class="required">*</span>', 'discount', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('discount', set_value('discount',$group->discount), 'class="form-control input-sm" pattern=".{1,3}" title="Allow enter from 1 to 3 characters" required'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Description', 'description', array('class' => 'col-sm-3
						control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_textarea('description', set_value('description',$group->description),
								'class="form-control input-sm" pattern=".{1,250}" title="Allow enter from 1 to 250 character(s)"'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Status', 'status', array('class' => 'col-sm-3
						control-label')); ?>
						<div class="col-sm-9">
							<div class="checkbox"><input type="checkbox" name="status" id="status" value="1" <?php echo set_checkbox('status', 1, TRUE); ?>> Check to enable this user account</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<?php
	endif;
	echo form_close();
	?>
</div>
