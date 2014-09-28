<div class="panel-heading">
	<h3 class="panel-title"><?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo $this->session->flashdata('message');
	?>
	<div class="tab-content">
		<div class="tab-pane <?php echo ($active == 'referrers') ? 'active' : ''; ?>" id="referrers">
			<div class="panel-group" id="accordion">
				<div class="btn-toolbar" role="toolbar">
					<?php
					echo anchor('/referrers/add_referrer/', '<span class="glyphicon glyphicon-plus-sign"></span> Create', 'class="btn btn-sm btn-success" title="Add new referrer"');
					?>
				</div>
				<div class="content">
					<div class="filter hidden">
						<?php
						echo form_open('referrers/', 'class="form-inline"');
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
                                <th>Phone</th>
                                <th>Email</th>
								<th>Address</th>
                                <th>Created Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($referrers) {
								$i = 1;
								foreach ($referrers as $referrer) {
									echo '<tr>'
									. '<td>' . $i++ . '</td>'
									. '<td class="align-left">' . $referrer->firstname . ' ' . $referrer->lastname . '</td>'
									. '<td>' . ($referrer->sex == 0 ? 'M' : 'F') . '</td>'
                                    . '<td>' . $referrer->phone . '</td>'
                                    . '<td>' . $referrer->email . '</td>'
                                    . '<td>' . $referrer->address . '</td>'
									. '<td>' . mdate('%d-%m-%Y', $referrer->crdate) . '</td>';
									?>
								<td>
									<?php
									echo anchor('referrers/edit_referrer/' . $referrer->rfid, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning btn-xs" title="Edit"') . '&nbsp;' . anchor('referrers/discard_referrer/' . $referrer->rfid, '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"');
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
