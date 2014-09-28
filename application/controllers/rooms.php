<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Rooms extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Room Management';
		$this->load->model(array('mrooms'));
	}

	/**
	 * Retrieve all groups and members
	 */
	public function index() {
		$this->_data['active'] = 'rooms';
		$this->_data['rooms'] = $this->mrooms->select();
		$this->load->view('index', $this->_data);
	}

	/**
	 * Add new member
	 */
	public function add_room() {
		$config = array(
			array(
				'field' => 'room_name',
				'label' => 'room name',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'rooms';
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mrooms->add()) {
				$this->session->set_flashdata('message', alert_message("Room has been saved!", 'success'));
				redirect('rooms/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Room  cannot be added, please try again", 'danger'));
				redirect('rooms/add_room');
			}
		}
	}

	/**
	 * Edit member
	 */
	public function edit_room($id) {
		$this->_data['room'] = $this->mrooms->select_by_id($id);
		$config = array(
			array(
				'field' => 'roomname',
				'label' => 'room name',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->_data['active'] = 'rooms'; 
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mrooms->edit()) {
				$this->session->set_flashdata('message', alert_message("Room has been updated!", 'success'));
				redirect('rooms/', 'refresh');
			} else {
				$this->session->set_flashdata('message', alert_message("Room cannot be updated, please try again", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete employees
	 */
	public function discard_room() {
		if ($this->mrooms->discard()) {
			$this->session->set_flashdata('message', alert_message("Room has been deleted!", 'success'));
			redirect('rooms/', 'refresh');
		} else {                                                            
			$this->session->set_flashdata('message', alert_message("Room profile cannot been deleted,
			please try again", 'danger'));
			redirect('rooms/', 'refresh');
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
