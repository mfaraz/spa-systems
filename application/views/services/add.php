<div class="panel-heading">
	<h3 class="panel-title">New - <?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo form_open('services/add', 'role="form" class="form-horizontal"');
	echo form_toolbar();
	?>
	<div class="row-fluid">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Service Information</h4>
				</div>
				<div class="panel-body">
					<div class="form-group <?php echo form_is_error('name'); ?>">
						<?php echo form_label('Name <span class="required">*</span>', 'name', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_input('name', set_value('name'), 'id="name" class="form-control input-sm" placeholder="Name" pattern=".{2,50}" title="Allow enter between 2 to 50 characters"') . form_error('name'); ?>
						</div>
					</div>
					<div class="form-group <?php echo form_is_error('name'); ?>">
						<?php echo form_label('Price (USD) <span class="required">*</span>', 'service_price', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_input('price', set_value('price'), 'id="price" class="form-control input-sm" placeholder="Service Price" pattern=".{1,50}" title="Allow enter between 1 to 50 character(s)"') . form_error('price'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Description', 'description', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_textarea('description', set_value('description'), 'id="description" class="form-control input-sm"'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Service Settings</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<?php echo form_label('Category', 'cid', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<?php echo form_select('cid', $categories, 'category', set_value('cid')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Product status', 'status', array('class' => 'col-sm-3 control-label')); ?>
						<div class="col-sm-9">
							<div class="checkbox"><input type="checkbox" name="status" id="status" value="1" <?php echo set_checkbox('status', 1, TRUE); ?>> Check to publish this product</div>
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