<div class="panel-heading">
	<h3 class="panel-title"><?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo $this->session->flashdata('message');
	?>
	<div class="tab-content">
		<div class="tab-pane <?php echo ($active == 'employees') ? 'active' : ''; ?>" id="employees">
			<div class="panel-group" id="accordion">
				<div class="btn-toolbar" role="toolbar">
					<?php
					echo anchor('/employees/add_employee/', '<span class="glyphicon glyphicon-plus-sign"></span> Create', 'class="btn btn-sm btn-success" title="Add new employee"');
					?>
				</div>
				<div class="content">
					<div class="filter hidden">
						<?php
						echo form_open('employees/', 'class="form-inline"');
						?>
						<div class="form-group">
							<label class="sr-only" for="fname">Name</label>
							<input type="text" class="form-control input-sm" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="Name">
						</div>
						<div class="form-group">
							<label class="sr-only" for="status">Status</label>
							<?php echo form_dropdown('status', array('' => '-- All Status --', '1' => 'Enabled', '0' => 'Disabled'), set_value('status', $this->session->userdata('status')), 'class="form-control input-sm"') ?>
						</div>
						<button type="submit" class="btn btn-primary btn-sm" value="submit" name="submit"><i class="glyphicon glyphicon-filter"></i> Filter</button>
						<?php
						echo form_close();
						?>
					</div>
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>N&ordm;</th>
								<th>Name</th> 
								<th>Sex</th>
                                <th>Created Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($employees) {
								$i = 1;
								foreach ($employees as $employee) {
									echo '<tr>'
									. '<td>' . $i++ . '</td>'
									. '<td class="align-left">' . $employee->firstname . ' ' . $employee->lastname . '</td>'
									. '<td>' . ($employee->sex == 0 ? 'M' : 'F') . '</td>'
									. '<td>' . mdate('%d-%m-%Y', $employee->crdate) . '</td>';
									?>
								<td>
									<?php
									echo anchor('employees/edit_employee/' . $employee->eid, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning btn-xs" title="Edit"') . '&nbsp;' . anchor('employees/discard_employee/' . $employee->eid, '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"');
									?>
								</td>
								</tr>
								<?php
							}
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
