<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Referrers extends HD_Controller {

    public function __construct() {
        parent::__construct();
        $this->_data['title'] = 'Referrers Management';
        $this->load->model(array('mreferrers'));
    }
    /**
     * Retrieve all groups and members
     */
    public function index() {
        $this->_data['active'] = 'referrers';
        $this->_data['referrers'] = $this->mreferrers->select();
        $this->load->view('index', $this->_data);
    }

    /**
     * Add new member
     */
    public function add_referrer() {
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
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'trim|is_unique[ci_users.phone]'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|valid_email|is_unique[ci_users.email]'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim'
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
            $this->_data['active'] = 'referrers';
            $this->load->view('index', $this->_data);
        } else {
            if ($this->mreferrers->add()) {
                $this->session->set_flashdata('message', alert_message("Referrer profile has been saved!", 'success'));
                redirect('referrers/', 'refresh');
            } else {
                $this->session->set_flashdata('message', alert_message("Referrer profile cannot be added, please try again", 'danger'));
                redirect('referrers/add_referrer');
            }
        }
    }

    /**
     * Edit member
     */
    public function edit_referrer($id) {
        $this->_data['referrer'] = $this->mreferrers->select_by_id($id);
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
            ),array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'trim|is_unique[ci_users.phone]'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|valid_email|is_unique[ci_users.email]'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim'
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
            $this->_data['active'] = 'referrers'; 
            $this->load->view('index', $this->_data);
        } else {
            if ($this->mreferrers->edit()) {
                $this->session->set_flashdata('message', alert_message("Referrer profile has been updated!", 'success'));
                redirect('referrers/', 'refresh');
            } else {
                $this->session->set_flashdata('message', alert_message("Referrer profile cannot be updated, please try again", 'danger'));
                $this->load->view('index', $this->_data);
            }
        }
    }

    /**
     * Delete employees
     */
    public function discard_referrer() {
        if ($this->mreferrers->discard()) {
            $this->session->set_flashdata('message', alert_message("Referrer profile has been deleted!", 'success'));
            redirect('referrers/', 'refresh');
        } else {
            $this->session->set_flashdata('message', alert_message("Referrer profile cannot been deleted,
            please try again", 'danger'));
            redirect('referrers/', 'refresh');
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
