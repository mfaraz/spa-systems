<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Description of Musers
 *
 * @author manmath
 */
class Mreferrers extends CI_Model {

	private $_data = array();

	/**
	 * Retrieve user record
	 *
	 * @param integer $id
	 * @return boolean/array_object
	 */
	public function select($id = '') {
		$this->db->select(array('rf.*'))
			->from('ci_referrers rf')
			->order_by('rf.firstname');

		if ($id !== '') {
			$this->db->where('rfid', $id)
				->limit(1);
		}

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	public function select_by_id($id) {
		$result = $this->db->where('rfid', $id)
			->limit(1)
			->get('ci_referrers');
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
        return $this->db->insert('ci_referrers', $this->_data) ? TRUE : FALSE;
    }
    
    public function add_new_referrer($fname,$lname,$phone,$email,$add,$gender) {
		$this->db->set('crdate', time(), FALSE);
		$data =  array(
            'firstname' => $fname,
            'lastname' => $lname,
            'phone' => $phone,
            'email' => $email,
            'address' => $add,
            'sex' => $gender
        );
		return $this->db->insert('ci_referrers', $data) ? TRUE : FALSE;
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
		$this->db->where('rfid', $this->uri->segment(3));
		return $this->db->update('ci_referrers', $this->_data) ? TRUE : FALSE;
	}

	/**
	 * Delete user
	 *
	 * @return bool
	 */
	public function discard() {
		$this->db->where('rfid', $this->uri->segment(3));
		return $this->db->delete('ci_referrers') ? TRUE : FALSE;
	}

}

/* End of file musers.php */
/* Location: ./application/models/musers.php */
