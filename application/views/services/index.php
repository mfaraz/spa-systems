<div class="panel-heading">
	<h3 class="panel-title"><?php echo $title; ?></h3>
</div>
<div class="panel-body">
	<?php
	echo $this->session->flashdata('message');
	echo form_toolbar();
	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>N&ordm;</th>
				<th>Name</th>
				<th>Price (USD)</th>
				<th>Description</th>
				<th>Created Date</th>
				<th>Modified Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($services):
				$i = 1;
				foreach ($services as $service):
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td class="align-left"><?php echo $service->name; ?></td>
						<td><?php echo $service->price; ?></td>
						<td><?php echo ($service->description) ? $service->description : '---'; ?></td>
						<td><?php echo mdate('%d-%M-%Y', $service->crdate); ?></td>
						<td><?php echo ($service->modate) ? mdate('%d-%M-%Y', $service->modate) : '---'; ?></td>
						<td>
							<?php
							echo ($service->status == 1) ? '<span class="glyphicon glyphicon-ok-sign color-green"></span>' : '<span class="glyphicon glyphicon-minus-sign color-red"></span>';
							?>
						</td>
						<td>
							<?php
							echo anchor('services/edit/' . $service->pid, '<span class="glyphicon glyphicon-edit"></span>', 'title="Edit" class="btn btn-warning btn-xs"') . '&nbsp;' . anchor('services/discard/' . $service->pid, '<span class="glyphicon glyphicon-trash"></span>', 'title="Delete" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure you want to delete this service?\')"');
							?>
						</td>
					</tr>
					<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
</div>
