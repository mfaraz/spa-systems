<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation on services management
 *
 * @author manmath
 */
class Services extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Service Management';
		$this->load->model(array('mservices', 'mcategories'));
	}

	/**
	 * List all categoires
	 */
	public function index() {
		$this->_data['services'] = $this->mservices->select();
		$this->load->view('index', $this->_data);
	}

	/**
	 * Add
	 *
	 * @access public
	 * @return void
	 */
	public function add() {
		$this->form_validation->set_rules('name', 'name', 'required|trim|max_length[50]|min_length[2]|is_unique[ci_services.name]');
		$this->form_validation->set_rules('price', 'Price', 'required|trim|max_length[50]|min_length[1]|numeric');
		$this->form_validation->set_rules('description', '', 'trim');
		$this->form_validation->set_rules('status', '', 'trim');
		$this->form_validation->set_rules('cid', '', 'trim');
		$this->form_validation->set_select('cid');
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['categories'] = $this->mcategories->select(1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mservices->add()) {
				$this->session->set_flashdata('message', alert_message("Service has been saved!", 'success'));
				redirect('services/');
			} else {
				$this->session->set_flashdata('message', alert_message("Service cannot be saved, please try again!", 'danger'));
				redirect('services/add');
			}
		}
	}

	/**
	 * Edit
	 *
	 * @param integer $id service id to edit
	 * @access public
	 * @return void
	 */
	public function edit($id) {
		$this->_data['services'] = $this->mservices->select_by_id($id);

		$this->form_validation->set_rules('name', 'name', 'required|trim|max_length[50]|min_length[2]|callback_uniqueExcept[ci_services.name, pid]');
		$this->form_validation->set_rules('price', 'sprice', 'required|trim|max_length[50]|min_length[1]|numeric');
		$this->form_validation->set_rules('description', '', 'trim');
		$this->form_validation->set_rules('cid', '', 'trim');
		$this->form_validation->set_rules('status', '', 'trim');
		$this->form_validation->set_select('cid');
		$this->form_validation->set_checkbox('status');
		if ($this->form_validation->run() == FALSE) {
			$this->_data['categories'] = $this->mcategories->select(1);
			$this->load->view('index', $this->_data);
		} else {
			if ($this->mservices->edit()) {
				$this->session->set_flashdata('message', alert_message("Service has been updated!", 'success'));
				redirect('services/');
			} else {
				$this->session->set_flashdata('message', alert_message("Service cannot be updated, please try again!", 'danger'));
				$this->load->view('index', $this->_data);
			}
		}
	}

	/**
	 * Delete
	 *
	 * @param integer $id category id to delete
	 * @access public
	 * @return void
	 */
	public function discard($id) {
		if ($this->mservices->discard_by_id($id)) {
			$this->session->set_flashdata('message', alert_message("Service has been deleted!", 'success'));
			redirect('services/');
		} else {
			$this->session->set_flashdata('message', alert_message("Service cannot be deleted, please try again!", 'danger'));
			redirect('services/');
		}
	}

	public function get_service_autocomplete() {
		if (isset($_GET['term'])) {
			$name = strtolower($_GET['term']);
			$this->mservices->get_service_autocomplete($name);
		}
	}

}

/* End of file services.php */
/* Location: ./application/controllers/services.php */
