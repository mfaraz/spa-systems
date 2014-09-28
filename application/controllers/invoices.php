<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Invoices extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Invoice Management';
		$this->load->model(array('msales', 'mmembers', 'mreferrers'));
	}

	/**
	 * Load invoice
	 */
	public function index() {
		// check in case invoice exist
		$this->_data['invoice_items'] = $this->msales->check_purchase();
		$this->_data['sub_total'] = $this->msales->get_total();
		$this->_data['members'] = $this->mmembers->select_member(1);
		$this->_data['referrer'] = $this->mreferrers->select();

		$this->form_validation->set_rules('customer_phone', 'Customer Phone', 'min_length[9]');
		$this->form_validation->set_rules('cash_receive', 'Cash Received', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('index', $this->_data);
		} else {
			$cash_receive = $this->input->post('cash_receive');
			$referrer_exist = $this->input->post('referrerExist');
			$total = $this->_data['sub_total'];
			switch ($referrer_exist) {
				case 1:
					$referrerId = $this->input->post('referrer');
					$this->_data['referrer'] = $this->mreferrers->select_by_id($referrerId);
					$referrer_name = $this->_data['referrer']->firstname . " " . $this->_data['referrer']->lastname;

					break;
				case 2:
					$fname = $this->input->post('firstname');
					$lname = $this->input->post('lastname');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
					$add = $this->input->post('address');
					$gender = $this->input->post('sex');
					$this->mreferrers->add_new_referrer($fname, $lname, $phone, $email, $add, $gender);

					$referrer_name = $fname . " " . $lname;
					break;
			}

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
				'cash_exchange' => $cash_exchange,
				'referrer_name' => $referrer_name
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
		}
	}

}

/* End of file invoices.php */
/* Location: ./application/controllers/invoices.php */
