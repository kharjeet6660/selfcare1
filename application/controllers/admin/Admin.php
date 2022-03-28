<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Announcements_model');
    $this->load->model('User_model');
    $this->load->model('Location_model');
    $this->load->model('Department_model');
    $this->load->model('Circular_model');
  }

  public function index() {
    $data['user_count'] = $this->User_model->total_rows();
    $data['department_count'] = $this->Department_model->total_rows();
    $data['location_count'] = $this->Location_model->total_rows();
    $data['circular_count'] = $this->Circular_model->total_rows();
    $this->load->view('admin/admin/index', $data);
  }
  public function setup() {
    $this->db->where('editable', 1);
    $data['setup_entries'] = $this->db->get('setup')->result_array();
    $this->load->view('admin/admin/setup', $data);
  }
  public function setupupdate() {
  }

  public function directory() {
    $bankdirectory = $this->db->get('bank_directory')->result_array();
    $data['bankdirectory'] = $bankdirectory;
    $this->load->view('bankdirectory/index',$data);
  }

  public function delete_directory() {
  }
}