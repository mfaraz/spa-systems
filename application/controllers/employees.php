<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Employees extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Employees Management';
		$this->load->model(array('memployees'));
	}

	/**
	 * Retrieve all groups and members
	 */
	public function index() {
		$this->_data['active'] = 'employees';
		$this->_data['employees'] = $this->memployees->select();
		$this->load->view('index', $this->_data);
	}

	/**
	 * Add new member
	 */
	public function add_employee() {
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
				'field' => 'sex',
				'label' => 'sex',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_select('sex');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'employees';
			$this->load->view('index', $this->_data);
		} else {
			if ($this->memployees->add()) {
				$this->session->set_flashdata('message', alert_message("Employee profile has been saved!", 'success'));
				redirect('employees/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Employee profile cannot be added, please try again", 'danger'));
				redirect('employees/add_employee');
			}
		}
	}

	/**
	 * Edit member
	 */
	public function edit_employee($id) {
		$this->_data['employee'] = $this->memployees->select_by_id($id);
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
				'field' => 'sex',
				'label' => 'sex',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_select('sex');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'employees'; 
			$this->load->view('index', $this->_data);
		} else {
			if ($this->memployees->edit()) {
				$this->session->set_flashdata('message', alert_message("Employee profile has been updated!", 'success'));
				redirect('employees/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Employee profile cannot be updated, please try again", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete employees
	 */
	public function discard_employee() {
		if ($this->memployees->discard()) {
			$this->session->set_flashdata('message', alert_message("Employee profile has been deleted!", 'success'));
			redirect('employees/', 'refresh');
		} else {
			$this->session->set_flashdata('message', alert_message("Employee profile cannot been deleted,
			please try again", 'danger'));
			redirect('employees/', 'refresh');
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
