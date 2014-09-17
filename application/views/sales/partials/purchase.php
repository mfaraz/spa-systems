<div class="print-invoice">
	<?php
	if ($invoice_items) {
		$i = 1;
		?>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>N&ordm;</th>
					<th>Description</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($invoice_items as $item) { ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td  class="align-left"><?php echo $item->name == 'Accessories' ? $item->accessories : $item->name; ?></td>
						<td  class="align-left"><?php echo '$' . $item->price; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } else { ?>
		<p>There is not any purchase service yet!</p>
	<?php } ?>
</div>
