<div class="panel-heading">
	<h3 class="panel-title">Member Management</h3>
</div>
<div class="panel-body">
	<ul class="nav nav-tabs" role="tablist">
		<li class="<?php echo ($active == 'member') ? 'active' : ''; ?>">
			<a href="#members" role="tab" data-toggle="tab">List of Member</a>
		</li>
		<li class="<?php echo ($active == 'group') ? 'active' : ''; ?>">
			<a href="#groups" role="tab" data-toggle="tab">Member Group</a>
		</li>
	</ul>
	<?php
	echo $this->session->flashdata('message');
	?>
	<div class="tab-content">
		<div class="tab-pane <?php echo ($active == 'member') ? 'active' : ''; ?>" id="members">
			<div class="panel-group" id="accordion">
				<div class="btn-toolbar" role="toolbar">
					<?php
					echo anchor('/members/add_member/', '<span class="glyphicon glyphicon-plus-sign"></span> Create', 'class="btn btn-sm btn-success" title="Add new member"');
					?>
				</div>
				<div class="content">
					<div class="filter">
						<?php
						echo form_open('members/', 'class="form-inline"');
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
								<th>Group</th>
								<th>Sex</th>
								<th>Phone</th>
								<th>Created Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($members) {
								$i = 1;
								foreach ($members as $member) {
									echo '<tr>'
									. '<td>' . $i++ . '</td>'
									. '<td class="align-left">' . $member->firstname . ' ' . $member->lastname . '</td>'
									. '<td class="align-left">' . ucfirst($member->name) . '</td>'
									. '<td>' . ($member->sex == 0 ? 'M' : 'F') . '</td>'
									. '<td>' . $member->phone . '</td>'
									. '<td>' . mdate('%d-%m-%Y', $member->crdate) . '</td>';
									?>
								<td><?php echo ($member->status == 1) ? '<span class="glyphicon glyphicon-ok-sign color-green"></span>' : '<span class="glyphicon glyphicon-minus-sign color-red"></span>'; ?></td>
								<td>
									<?php
										echo anchor('members/edit_member/' . $member->mid, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning btn-xs" title="Edit"') . '&nbsp;' . anchor('members/discard_member/' . $member->mid, '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"');
									
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
		<div class="tab-pane <?php echo ($active == 'group') ? 'active' : ''; ?>" id="groups">
			<div class="panel-group" id="accordion">
				<div class="btn-toolbar" role="toolbar">
					<?php
					echo anchor('members/add_group/', '<span class="glyphicon glyphicon-plus-sign"></span> Create', 'class="btn btn-sm btn-success" title="Add new roles"');
					?>
				</div>
				<div class="content">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>N&ordm;</th>
								<th>Name</th>
								<th>Discount</th>
								<th>Description</th>
								<th>Created Date</th>
								<th>Modified Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($groups) {
								$yes = '<span class="glyphicon glyphicon-ok-sign color-green"></span>';
								$no = '<span class="glyphicon glyphicon-minus-sign color-red"></span>';
								$i = 1;
								foreach ($groups as $group) {
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="align-left"><?php echo $group->name; ?></td>
										<td><?php echo $group->discount; ?></td>
										<td><?php echo $group->description; ?></td>
										<td><?php echo mdate('%d-%m-%Y', $group->crdate); ?></td>
										<td><?php echo $group->modate != 0 ? mdate('%d-%m-%Y', $group->modate) : '---'; ?></td>
										<td><?php echo ($group->status == 1) ? $yes : $no; ?></td>
										<td>
											<?php
												echo anchor('members/edit_group/' . $group->gid, '<span class="glyphicon glyphicon-edit"></span>', 'class="btn btn-warning btn-xs" title="Edit"') . '&nbsp;' . anchor('members/discard_group/' . $group->gid, '<span class="glyphicon glyphicon-trash"></span>', 'class="btn btn-danger btn-xs" title="Delete" onclick="return confirm(\'Are you sure you want to delete this role?\')"');
											
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
