<div class="panel-heading">
	<h3 class="panel-title">New - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('employees/add_employee', 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar('add');
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
							<?php echo form_input('firstname', set_value('firstname'), 'class="form-control input-sm" '); ?>
						</div>
					</div>
					<div class="form-group <?php echo form_is_error('lastname'); ?>">
						<?php echo form_label('Last name', 'lastname', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('lastname', set_value('lastname'), 'class="form-control input-sm" ') ;?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Sex ', 'gender ', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php
							echo form_sex(set_value('sex'));
							?>
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
