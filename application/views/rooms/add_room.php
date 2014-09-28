<div class="panel-heading">
	<h3 class="panel-title">New - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('rooms/add_room', 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar('add');
	?>
	<div class="row-fluid">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Room Setting</h4>
				</div>
				<div class="panel-body">
					<div class="form-group <?php echo form_is_error('firstname'); ?>">
						<?php echo form_label('Room Name', 'room_name', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_input('room_name', set_value('room_name'), 'class="form-control input-sm" '); ?>
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
