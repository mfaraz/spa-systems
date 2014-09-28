<div class="panel-heading">
	<h3 class="panel-title">Edit - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('rooms/edit_room/' . $this->uri->segment(3), 'role="form" class="form-horizontal"');
	echo $this->session->flashdata('message');
	echo form_toolbar();
	if ($room):
		?>
		<div class="row-fluid">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Room Profile</h4>
					</div>
					<div class="panel-body">
						<div class="form-group <?php echo form_is_error('firstname'); ?>">
							<?php echo form_label('Room Name', 'room_name', array('class' => 'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo form_input('room_name', set_value('room_name', $room->room_name), 'class="form-control input-sm"'); ?>
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
