<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Description of Musers
 *
 * @author manmath
 */
class Memployees extends CI_Model {

	private $_data = array();

	/**
	 * Retrieve user record
	 *
	 * @param integer $id
	 * @return boolean/array_object
	 */
	public function select($id = '') {
		$this->db->select(array('e.*'))
			->from('ci_employees e')
			->order_by('e.firstname');

		if ($id !== '') {
			$this->db->where('eid', $id)
				->limit(1);
		}

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_by_id($id) {
		$result = $this->db->where('eid', $id)
			->limit(1)
			->get('ci_employees');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return FALSE;
	}

	/**

	  /**
	 * Create user
	 *
	 * @return boolean
	 */
	public function add() {
		$this->db->set('crdate', time(), FALSE);
		$this->_data = $this->input->post();
		return $this->db->insert('ci_employees', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Edit
	 *
	 * @access public
	 * @return boolean
	 */
	public function edit() {
		//$this->db->set('modate', time(), FALSE);
		$this->_data = $this->input->post();
		$this->db->where('eid', $this->uri->segment(3));
		return $this->db->update('ci_employees', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete user
	 *
	 * @return bool
	 */
	public function discard() {
		$this->db->where('eid', $this->uri->segment(3));
		return $this->db->delete('ci_employees') ? TRUE : FALSE;
	}

}

/* End of file musers.php */
/* Location: ./application/models/musers.php */
