<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Invoices extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Invoice Management';
		$this->load->model(array('msales', 'mmembers'));
	}

	/**
	 * Load invoice
	 */
	public function index() {
		// check in case invoice exist
		$this->_data['invoice_items'] = $this->msales->check_purchase();
		$this->_data['sub_total'] = $this->msales->get_total();
		$this->_data['members'] = $this->mmembers->select_member(1);

		$this->form_validation->set_rules('identity_id', '', 'trim');
		$this->form_validation->set_rules('identity_type', '', 'trim');
		$this->form_validation->set_rules('cash_receive', 'Cash Received', 'required|numeric');
		$this->form_validation->set_select('identity_type');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('index', $this->_data);
		} else {
			$cash_receive = $this->input->post('cash_receive');
			$identity_type = $this->input->post('identity_type');
			$total = $this->_data['sub_total'];

			if ($identity_type == 1) {
				$card_id = $identity_type;
				$phone = '';
				$result = $this->mmembers->select_member_discount($card_id);
			} else {
				$card_id = '';
				$phone = $identity_type;
				$result = $this->mmembers->select_member_discount($phone, 'phone');
			}

			// Discount
			if ($result) {
				$discount = $result->discount;
				$grant_total = $total * (1 - $discount / 100);
			} else {
				$discount = 0;
				$grant_total = $total;
			}

			// Exchange
			if ($cash_receive > $grant_total) {
				$cash_exchange = $cash_receive - $grant_total;
			} else {
				$cash_exchange = 0;
			}

			$data = array(
				'card_id' => $card_id,
				'customer_phone' => $phone,
				'total' => $total,
				'cash_receive' => $cash_receive,
				'discount' => $discount,
				'grand_total' => $grant_total,
				'cash_exchange' => $cash_exchange
			);

			if ($this->msales->update_invoice($data)) {
				$this->session->set_flashdata('message', alert_message("Invoice is ready for printing!", 'success'));
			}

			redirect('invoices/');
		}
	}

	/**
	 * Printing invoice
	 */
	public function print_invoice() {
		$this->msales->print_invoice();
		$this->session->unset_userdata('cur_invoice_id');
		$this->session->set_flashdata('message', alert_message("New invoice has been printed and saved!", 'success'));
		redirect('sales/');
	}

}

/* End of file invoices.php */
/* Location: ./application/controllers/invoices.php */
