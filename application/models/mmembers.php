<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Description of Musers
 *
 * @author manmath
 */
class Mmembers extends CI_Model {

	private $_data = array();

	/**
	 * Retrieve user record
	 *
	 * @param integer $id
	 * @return boolean/array_object
	 */
	public function select($id = '') {
		$this->db->select(array('m.*', 'g.name'))
			->from('ci_members m')
			->join('ci_groups g', 'g.gid = m.gid')
			->order_by('m.firstname');

		if ($id !== '') {
			$this->db->where('mid', $id)
				->limit(1);
		}

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_by_id($id) {
		$result = $this->db->where('mid', $id)
			->limit(1)
			->get('ci_members');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return FALSE;
	}

	public function select_member($status = '') {
		if ($status) {
			$this->db->where('status', $status);
		}
		$result = $this->db->get('ci_members');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_member_discount($identity, $type = 'card') {
		if ($type == 'card') {
			$this->db->where('m.card_id', $identity);
		} else {
			$this->db->where('m.phone', $identity);
		}
		$result = $this->db->select('g.discount')
			->from('ci_members m')
			->join('ci_groups g', 'g.gid = m.gid')
			->limit(1)
			->get();
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
		return $this->db->insert('ci_members', $this->_data) ? TRUE : FALSE;
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
		$this->db->where('mid', $this->uri->segment(3));
		return $this->db->update('ci_members', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete user
	 *
	 * @return bool
	 */
	public function discard() {
		$this->db->where('mid', $this->uri->segment(3));
		return $this->db->delete('ci_members') ? TRUE : FALSE;
	}

}

/* End of file musers.php */
/* Location: ./application/models/musers.php */
