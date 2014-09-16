<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Execution SQL statement on table ci_reports
 *
 * @author manmath
 */
class Mreports extends CI_Model {

	private $_data = array();

	/**
	 * MIS report
	 */
	public function mis_report() {
		$this->db->select(array('i.iid', 'i.invoice_number', 'i.crdate AS invoice_date', 'i.card_id', 'i.customer_phone',
				'u.firstname AS invoice_seller', 's.name AS service_name',
				'c.name AS category_name', 'i.grand_total as invoice_total'))
			->from('ci_invoices i')
			->join('ci_users u', 'u.uid = i.cruser')
			->join('ci_invoice_details d', 'd.iid = i.iid')
			->join('ci_services s', 's.name = d.name')
			->join('ci_categories c', 'c.cid = s.cid')
			->where('i.status', 1)
			->where('i.report', 0);
		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			foreach ($result->result() as $arr) {
				$this->_data = array(
					'invoice_number' => $arr->invoice_number,
					'invoice_seller' => $arr->invoice_seller,
					'customer_card' => $arr->card_id,
					'customer_phone' => $arr->customer_phone,
					'invoice_date' => mdate('%d-%m-%Y', $arr->invoice_date),
					'invoice_day' => mdate('%d', $arr->invoice_date),
					'invoice_month' => mdate('%m', $arr->invoice_date),
					'invoice_year' => mdate('%Y', $arr->invoice_date),
					'service_name' => $arr->service_name,
					'category_name' => $arr->category_name,
					'invoice_total' => $arr->invoice_total
				);
				if ($this->db->insert('ci_reports', $this->_data)) {
					$this->db->set('report', 1)
						->where('iid', $arr->iid)
						->update('ci_invoices');
				}
			}
		}
	}

	/**
	 * @return bool/mixed
	 */
	public function generate_report() {
		if ($this->input->post('date')) {
			$date = $this->input->post('date');
		} else {
			$date = mdate('%d-%m-%Y');
		}

		if ($this->input->post('type')) {
			$type = $this->input->post('type');
			$this->session->set_userdata('type', $type);
		} else {
			$type = 'daily';
		}

		if ($this->input->post('cashier')) {
			$this->db->where('invoice_seller', $this->input->post('cashier'));
		}

		if ($this->input->post('category')) {
			$this->db->where('category_name', $this->input->post('category'));
		}

		$date_split = explode('-', $date);
		switch ($type) {
			case 'yearly':
				$this->db->where('invoice_year', $date_split[2]);
				break;
			case 'monthly':
				$this->db->where('invoice_month', $date_split[1]);
				$this->db->where('invoice_year', $date_split[2]);
				break;
			default:
				$this->db->where('invoice_day', $date_split[0]);
				$this->db->where('invoice_month', $date_split[1]);
				$this->db->where('invoice_year', $date_split[2]);
				break;
		}
		$result = $this->db->get('ci_reports');
		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

}
