<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Members extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Member Management';
		$this->load->model(array('mmembers', 'mgroup', 'mroles'));
	}

	/**
	 * Retrieve all groups and members
	 */
	public function index() {
		$this->_data['active'] = 'member';
		$this->_data['members'] = $this->mmembers->select();
		$this->_data['groups'] = $this->mgroup->select_group();
		$this->load->view('index', $this->_data);
	}

	/**
	 * Add new member
	 */
	public function add_member() {
		$config = array(
			array(
				'field' => 'firstname',
				'label' => 'first name',
				'rules' => 'trim|max_length[50]|alpha'
			),
			array(
				'field' => 'lastname',
				'label' => 'last name',
				'rules' => 'trim|max_length[50]|alpha'
			),
			array(
				'field' => 'card',
				'label' => 'card',
				'rules' => 'trim'
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'trim|is_unique[ci_member.phone]'
			),
			array(
				'field' => 'gid',
				'label' => 'group',
				'rules' => 'trim'
			),
			array(
				'field' => 'sex',
				'label' => 'sex',
				'rules' => 'trim'
			),
			array(
				'field' => 'status',
				'label' => 'status',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'member';
			$this->_data['group'] = $this->mgroup->select_group('',1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mmembers->add()) {
				$this->session->set_flashdata('message', alert_message("User account has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("User account cannot be added, please try again", 'danger'));
				redirect('members/add');
			}
		}
	}

	/**
	 * Edit member
	 */
	public function edit_member($id) {
		
		$this->_data['member'] = $this->mmembers->select_by_id($id);
		$config = array(
			array(
				'field' => 'firstname',
				'label' => 'first name',
				'rules' => 'trim|max_length[50]|alpha'
			),
			array(
				'field' => 'lastname',
				'label' => 'last name',
				'rules' => 'trim|max_length[50]|alpha'
			),
			array(
				'field' => 'card_id',
				'label' => 'card_id',
				'rules' => 'trim'
			),
			array(
				'field' => 'phon',
				'label' => 'phon',
				'rules' => 'trim|is_unique[ci_member.phone]'
			),
			array(
				'field' => 'gid',
				'label' => 'group',
				'rules' => 'trim'
			),
			array(
				'field' => 'sex',
				'label' => 'sex',
				'rules' => 'trim'
			),
			array(
				'field' => 'status',
				'label' => 'status',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'member';
			$this->_data['group'] = $this->mgroup->select_group('', 1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mmembers->edit()) {
				$this->session->set_flashdata('message', alert_message("User account has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("User account cannot be added, please try again", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}
	
	/**
	 * Delete member
	 */
	public function discard_member () {
		if ($this->mmembers->discard()) {
			$this->session->set_flashdata('message', alert_message("User account has been deleted!", 'success'));
			redirect('members/', 'refresh');
		} else {
			$this->session->set_flashdata('message', alert_message("User account cannot been deleted,
			please try again", 'danger'));
			redirect('members/', 'refresh');
		}
	}

	/**
	 * Add new group
	 */
	public function add_group() {
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|max_length[50]|alpha|is_unique[ci_group.name]'
			),
			array(
				'field' => 'discount',
				'label' => 'Discount',
				'rules' => 'trim'
			),
			array(
				'field' => 'description',
				'label' => '',
				'rules' => 'trim|max_length[250]'
			),
			array(
				'field' => 'status',
				'label' => '',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'group';
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mgroup->add()) {
				$this->session->set_flashdata('message', alert_message("User role has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("User role cannot be added, please try again",
					'danger'));
				redirect('members/add_group');
			}
		}
	}
	/**
	 * edit group
	 */
	 
	 public function edit_group($id) {
	 	$this->_data['group'] = $this->mgroup->select_by_id($id);
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim'
			),
			array(
				'field' => 'discount',
				'label' => 'Discount',
				'rules' => 'trim'
			),
			array(
				'field' => 'description',
				'label' => '',
				'rules' => 'trim|max_length[250]'
			),
			array(
				'field' => 'status',
				'label' => '',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'group';
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mgroup->edit()) {
				$this->session->set_flashdata('message', alert_message("User role has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("User role cannot be added, please try again",
					'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete group
	 */
	public function discard_group () {
		if ($this->mgroup->discard()) {
			$this->session->set_flashdata('message', alert_message("User role has been deleted!", 'success'));
			redirect('members/', 'refresh');
		} else {
			$this->session->set_flashdata('message', alert_message("User role cannot been deleted, please try again",
				'danger'));
			redirect('members/', 'refresh');
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
