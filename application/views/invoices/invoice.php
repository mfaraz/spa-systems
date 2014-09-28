<div class="print-invoice">
	<?php
	if ($invoice_items) {
		foreach ($invoice_items as $item) {
            $customer_phone = $item->customer_phone ? $item->customer_phone : '?';
			$cashier = $this->session->userdata('ci_firstname');
			$invoice_date = mdate('%d-%m-%Y %H:%i', $item->crdate);
            $invoice_number = $item->invoice_number;
			//$discount = $item->discount !== '0' ? $item->discount . '%' : '0';
			$total = $item->total !== '0.00' ? '$' . $item->total : '0.00';
			$grand_total = $item->grand_total !== '0.00' ? '$' . $item->grand_total : '0.00';
			$cash_receive = $item->cash_receive !== '0.00' ? '$' . $item->cash_receive : '0.00';
			$cash_exchange = $item->cash_exchange !== '0.00' ? '$' . $item->cash_exchange : '0.00';
			break;
		}
		if($customer_phone != 0){
			$this->load->model('mmembers');
			$dis = $this->mmembers->select_member_discount($customer_phone);
			$discount = $dis->discount !== '0' ? $dis->discount . '%' : '0';
            $customer_name = $dis->firstname." ".$dis->lastname;
            $referrer_name = $item->referrer_name ? $item->referrer_name : '?';
		}else{
			$discount = '0';
            $customer_name = "?";
            $referrer_name = "?";
		}
		$i = 1;
		?>
		<table class="table table-header">
			<caption>
				<?php echo img(array('src' => IMG_PATH . $this->msettings->display_setting('DEFAULT_COMPANY_LOGO'), 'align' => 'center')) . br(1); ?>
				<?php echo $this->msettings->display_setting('DEFAULT_COMPANY_ADDRESS') . br(); ?>
				<strong><?php echo $this->msettings->display_setting('DEFAULT_COMPANY_PHONE'); ?></strong>
			</caption>
			<tr>
				<td colspan="2" class="hidden-print align-left">
					Cashier: <?php echo $cashier; ?><br>
					Customer: <?php echo $customer_name ?>
				</td>
				<td colspan="2" class="visible-print align-left">
					Cashier: <?php echo $cashier; ?><br>
					Customer: <?php echo $customer_name ?>
				</td>
				<td colspan="2" class="align-left">
                    Date: <?php echo $invoice_date; ?><br>
                    N&ordm;: <?php echo $invoice_number; ?>
                </td>
                <td colspan="2" class="align-left">
                    Referrer: <?php echo $referrer_name; ?>
                </td>
                
			</tr>
		</table>
		<table class="table table-striped table-hover print" style="margin-bottom: 0;">
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
						<td>&nbsp;<?php echo $item->name; ?></td>
						<td><?php echo '$' . $item->price; ?></td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="1">&nbsp;</td>
					<td class="align-left">
						<?php
						if ($cash_receive == '0.00') {
							echo 'Total:';
						}
						if ($total !== '0.00' && $discount !== '0') {
							echo 'Sub Total:<br>';
						}
						if ($discount !== '0') {
							echo 'Discount:<br>';
						}
						if ($grand_total != '0.00') {
							echo 'Grand Total:<br>';
						}
						if ($cash_receive != '0.00') {
							echo 'Paid Amount:<br>';
						}
						if ($cash_exchange != '0.00') {
							echo 'Exchange:';
						}
						?>
					</td>
					<td class="align-right">
						<?php
						if ($cash_receive == '0.00') {
							echo '$' . $sub_total;
						}
						if ($total !== '0.00' && $discount !== '0') {
							echo $total . '<br>';
						}
						if ($discount !== '0') {
							echo $discount . '<br>';
						}
						if ($grand_total != '0.00') {
							echo $grand_total . '<br>';
						}
						if ($cash_receive != '0.00') {
							echo $cash_receive . '<br>';
						}
						if ($cash_exchange != '0.00') {
							echo $cash_exchange;
						}
						?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-header">
			<tr>
				<td>
					សូមអរគុណ សូមអញ្ជើញមកម្ដងទៀត<br />
					Thank you, please come again!<br />
				</td>
			</tr>
		</table>
	<?php } else { ?>
		<p>There is not any purchase product yet!</p>
	<?php } ?>
</div>
