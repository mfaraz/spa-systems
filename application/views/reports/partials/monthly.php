
<table id="areaToPrint" border="1" cellpadding="3" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>N&ordm;</th>
            <th>Invoice Number</th>
            <th>Invoice Date</th>
            <th>Cashier</th>
            <th>Category</th>
            <th>Service</th>
            <th>Referrer</th>
            <th>Employee</th>
            <th>Room</th>
            <th>Price</th>
            <th>Discount</th>
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
					<td><?php echo $report->category_name; ?></td>
                    <td><?php echo $report->service_name; ?></td>
                    <td><?php echo $report->referrer_name; ?></td>
                    <td><?php echo $report->employee; ?></td>
                    <td><?php echo $report->room; ?></td>
                    <td><?php echo '$' . $report->price; ?></td>
                    <td><?php echo $report->discount.'%'; ?></td>
                    <td><?php echo '$' . $report->amount; ?></td>
				</tr>
				<?php
			}
		} else {
			echo '<tr><td colspan="11" class="align-left">There is not any data for this filer.</td></tr>';
		}
		?>
	</tbody>
</table>