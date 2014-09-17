<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Invoices extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Invoice Management';
		$this->load->model(array('msales', 'mdeposits', 'mmembers'));
	}

	/**
	 * Load invoice
	 */
	public function index() {
		// check in case invoice exist
		$this->_data['invoice_items'] = $this->msales->check_purchase();
		$this->_data['sub_total'] = $this->msales->get_total();
		$this->_data['members'] = $this->mmembers->select_member(1);

		$this->form_validation->set_rules('customer_phone', 'Customer Phone', 'min_length[9]');
		$this->form_validation->set_rules('cash_receive', 'Cash Received', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('index', $this->_data);
		} else {
			$cash_receive = $this->input->post('cash_receive');
			$cash_type = $this->input->post('cash_type');
			$total = $this->_data['sub_total'];

		
			$phone = $this->input->post('customer_phone');
			
			if ($phone) {	
			// Discount
				$this->_data['dis'] = $this->mmembers->select_member_discount($phone);
				$discount = $this->_data['dis']->discount;
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
			
			$customer_phone = $this->input->post('customer_phone');
			$data = array(
				'customer_phone' => $customer_phone,
				'total' => $total,
				'cash_receive' => $cash_receive,
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
	 * Cut stock after printing invoice
	 */
	public function print_invoice() {
		if ($this->session->userdata('cur_invoice_id')) {
			$result = $this->msales->check_purchase();
			$this->msales->print_invoice();
			$this->session->unset_userdata('cur_invoice_id');
			$this->session->set_flashdata('message', alert_message("New invoice has been printed and saved!", 'success'));
			redirect('sales/');
		} else {
			$this->mdeposits->clear_deposit($this->uri->segment(3));
			$this->session->set_flashdata('message', alert_message("New invoice has been printed and saved!", 'success'));
			redirect('sales/');
		}
	}

	/**
	 * Complete payment from deposit
	 */
	public function complete_payment() {
		$invoice_no = $this->uri->segment(3);
		$this->_data['invoice_no'] = $invoice_no;

		$this->form_validation->set_rules('cash_receive', 'Cash Received', 'required|trim|numeric');
		$this->form_validation->set_rules('cash_type', '', 'trim');
		$this->form_validation->set_select('cash_type');
		if ($this->form_validation->run() == FALSE) {
			$this->msales->clear_invoice_history($invoice_no);
		} else {
			$cash_receive = $this->input->post('cash_receive');
			$cash_type = $this->input->post('cash_type');
			$balance = $this->input->post('balance');
			$prev_cash_type = $this->input->post('prev_cash_type');

			if ($cash_type != $prev_cash_type) {
				switch ($cash_type) {
					case 'US':
						$cash_receive = $cash_receive * USD_TO_KH;
						break;
					default:
						$balance = $balance * USD_TO_KH;
						break;
				}
			}

			if ($cash_receive == $balance) {
				$cash_exchange = 0.00;
			} else {
				$cash_exchange = $cash_receive - $balance;
			}

			$data = array(
				'cash_receive' => $cash_receive,
				'cash_type' => $cash_type,
				'cash_exchange' => $cash_exchange,
				'modate' => time()
			);
			$this->msales->new_invoice_hostory($invoice_no, $data);
		}
		$this->_data['invoice_items'] = $this->msales->check_purchase($invoice_no);
		$this->load->view('index', $this->_data);
	}

}

/* End of file invoices.php */
/* Location: ./application/controllers/invoices.php */
