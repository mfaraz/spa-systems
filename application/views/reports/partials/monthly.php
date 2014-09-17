<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>N&ordm;</th>
            <th>Invoice Number</th>
            <th>Invoice Date</th>
            <th>Cashier</th>
            <th>Category</th>
            <th>Service</th>
            <th>Price</th>
            <th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($reports) {
			$i = 1;
			foreach ($reports as $report) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $report->invoice_number; ?></td>
					<td><?php echo $report->invoice_date; ?></td>
					<td><?php echo $report->invoice_seller; ?></td>
					<td class="align-left"><?php echo $report->category_name; ?></td>
                    <td class="align-left"><?php echo $report->service_name; ?></td>
                    <td><?php echo '$' . $report->price; ?></td>
                    <td><?php echo '$' . $report->amount; ?></td>
				</tr>
				<?php
			}
		} else {
			echo '<tr><td colspan="9" class="align-left">There is not any data for this filer.</td></tr>';
		}
		?>
	</tbody>
</table>
