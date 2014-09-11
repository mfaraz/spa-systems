<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Members extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Member Management';
		$this->load->model(array('mmembers', 'mgroups', 'mroles'));
	}

	/**
	 * Retrieve all groups and members
	 */
	public function index() {
		$this->_data['active'] = 'member';
		$this->_data['members'] = $this->mmembers->select();
		$this->_data['groups'] = $this->mgroups->select_group();
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
				'field' => 'card_id',
				'label' => 'card id',
				'rules' => 'trim|is_unique[ci_members.card_id]'
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'required|trim|is_unique[ci_members.phone]'
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
		$this->form_validation->set_select('sex');
		$this->form_validation->set_select('gid');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'member';
			$this->_data['group'] = $this->mgroups->select_group('', 1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mmembers->add()) {
				$this->session->set_flashdata('message', alert_message("Member account has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Member account cannot be added, please try again", 'danger'));
				redirect('members/add_member');
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
				'rules' => 'trim|callback_uniqueExcept[ci_members.card_id, mid]'
			),
			array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => 'trim|required|callback_uniqueExcept[ci_members.phone, mid]'
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
		$this->form_validation->set_select('sex');
		$this->form_validation->set_select('gid');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'member';
			$this->_data['group'] = $this->mgroups->select_group('', 1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mmembers->edit()) {
				$this->session->set_flashdata('message', alert_message("Member account has been updated!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Member account cannot be updated, please try again", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete member
	 */
	public function discard_member() {
		if ($this->mmembers->discard()) {
			$this->session->set_flashdata('message', alert_message("Member account has been deleted!", 'success'));
			redirect('members/', 'refresh');
		} else {
			$this->session->set_flashdata('message', alert_message("Member account cannot been deleted,
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
				'rules' => 'required|trim|max_length[50]|alpha|is_unique[ci_groups.name]'
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
			if ($this->mgroups->add()) {
				$this->session->set_flashdata('message', alert_message("Member role has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Member role cannot be added, please try again", 'danger'));
				redirect('members/add_group');
			}
		}
	}

	/**
	 * edit group
	 */
	public function edit_group($id) {
		$this->_data['group'] = $this->mgroups->select_by_id($id);
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required|callback_uniqueExcept[ci_groups.name, gid]'
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
			if ($this->mgroups->edit()) {
				$this->session->set_flashdata('message', alert_message("Group has been saved!", 'success'));
				redirect('members/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Group cannot be added, please try again", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete group
	 */
	public function discard_group() {
		if ($this->mgroups->discard()) {
			$this->session->set_flashdata('message', alert_message("Member role has been deleted!", 'success'));
			redirect('members/', 'refresh');
		} else {
			$this->session->set_flashdata('message', alert_message("Member role cannot been deleted, please try again", 'danger'));
			redirect('members/', 'refresh');
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
