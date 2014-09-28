<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Execution SQL statement on table ci_services
 *
 * @author manmath
 */
class Mservices extends CI_Model {

	private $_data = array();

	/**
	 * Retreive all services
	 *
	 * @return boolean/array_object
	 */
	public function select() {
		$result = $this->db->get('ci_services');

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_by_id($id) {
		$result = $this->db->select(array('pid', 'p.cid', 'p.name', 'p.price', 'p.description', 'p.status'))
			->from('ci_services p')
			->join('ci_categories c', 'c.cid = p.cid')
			->where('pid', $id)
			->limit(1)
			->get();
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return FALSE;
	}

	public function select_price($cid, $name) {
		$this->db->select(array('*'))
			->from('ci_services');
		if ($cid !== '') {
			$this->db->where('cid', $cid);
		}
		if ($name !== '') {
			$this->db->where('name', $name);
		}
		$this->db->limit(1);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	/**
	 * Add
	 *
	 * @access public
	 * @return boolean
	 */
	public function add() {
		$this->db->set('cruser', $this->musers->has_login('sess_id'));
		$this->db->set('crdate', time(), FALSE);
		$this->_data = $this->input->post();
		return $this->db->insert('ci_services', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Edit
	 *
	 * @access public
	 * @return boolean
	 */
	public function edit() {
		$this->db->set('mouser', $this->musers->has_login('sess_id'));
		$this->db->set('modate', time(), FALSE);
		$this->_data = $this->input->post();
		if (empty($this->_data['status'])) {
			$this->db->set('status', 0);
		}
		$this->db->where('pid', $this->uri->segment(3));
		return $this->db->update('ci_services', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete
	 *
	 * @param integer $id
	 * @access public
	 * @return boolean
	 */
	public function discard_by_id($id) {
		$this->db->where('pid', $id);
		return $this->db->delete('ci_services') ? TRUE : FALSE;
	}

	/**
	 * Render JSON format of product name for autocomplete
	 *
	 * @param string $name
	 * @access public
	 * @return void
	 */
	public function get_service_autocomplete($name) {
		$result = $this->db->select('name')
			->like('name', $name)
			->where('status', 1)
			->get('ci_services');
		if ($result->num_rows() > 0) {
			foreach ($result->result_array() as $row) {
				$result_set[] = htmlentities(stripslashes($row['name'])); // build an array
			}
			echo json_encode($result_set); //format the array into json data
		}
	}

}
