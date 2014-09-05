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
				->from('ci_member m')
				->join('ci_group g', 'g.gid = m.gid')
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
		$result = $this->db->select(array('mid', 'm.gid', 'm.card_id', 'm.firstname', 'm.lastname', 'm.sex', 'm.phone', 'm.status'))
			->from('ci_member m')
			->join('ci_group g', 'g.gid = m.gid')
			->where('mid', $id)
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
		$this->_data = array(
			'gid' => $this->input->post('gid'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'card_id' => $this->input->post('card'),
			'sex' => $this->input->post('sex'),
			'phone' => $this->input->post('phone'),
			'status' => $this->input->post('status'),
			'crdate' => time()
		);
		return $this->db->insert('ci_member', $this->_data);
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
		return $this->db->update('ci_member', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete user
	 *
	 * @return bool
	 */
	public function discard () {
		$this->db->where('mid', $this->uri->segment(3));
		return $this->db->delete('ci_member') ? TRUE : FALSE;
	}
}

/* End of file musers.php */
/* Location: ./application/models/musers.php */
