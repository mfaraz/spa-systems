<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Description of Musers
 *
 * @author manmath
 */
class Mgroups extends CI_Model {

	/**
	 * Retrieve record in table ci_groups
	 *
	 * @param integer $id
	 * @param integer $status
	 * @return array records
	 */
	public function select_group($id = '', $status = '') {
		$this->db->select('*');

		if ($id !== '') {
			$this->db->where('gid', $id);
		}

		if ($status !== '') {
			$this->db->where('status', $status);
		}

		$result = $this->db->get('ci_groups');
		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_by_id($id) {
		$this->db->select('*');

		if ($id !== '') {
			$this->db->where('gid', $id);
		}
		$result = $this->db->get('ci_groups');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return FALSE;
	}

	/**
	 * Create new group
	 *
	 * @return bool
	 */
	public function add() {
		$this->db->set('crdate', time(), FALSE);
		$this->_data = $this->input->post();
		return $this->db->insert('ci_groups', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Edit
	 *
	 * @access public
	 * @return boolean
	 */
	public function edit() {
		$this->db->set('modate', time(), FALSE);
		$this->_data = $this->input->post();
		if (empty($this->_data['status'])) {
			$this->db->set('status', 0);
		}
		$this->db->where('gid', $this->uri->segment(3));
		return $this->db->update('ci_groups', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete group
	 *
	 * @return bool
	 */
	public function discard() {
		$this->db->where('gid', $this->uri->segment(3));
		return $this->db->delete('ci_groups') ? TRUE : FALSE;
	}

}

/* End of file musers.php */
/* Location: ./application/models/mmembers.php */
