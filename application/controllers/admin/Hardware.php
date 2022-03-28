<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hardware extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Hardware_model');
    $this->load->model('HardwareAssign_model');
    $this->load->model('UserProfile_model');
  }

  public function index() {

    $config['base_url'] = base_url('admin/hardware/index');
    $config['total_rows'] = $this->Hardware_model->total_rows();
    $config['per_page'] = 10;
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $config['full_tag_open'] = '<div class="pagination">';
    $config['full_tag_close'] = '</div>';
    $config['prev_link'] = '&lt; Prev';
    $config['prev_tag_open'] = '';
    $config['prev_tag_close'] = '';
    $config['next_link'] = 'Next &gt;';
    $config['cur_tag_open'] = '<a class="active">';
    $config['cur_tag_close'] = '</a>';
    $config['num_tag_open'] = '';
    $config['num_tag_close'] = '';
    $config['first_link'] = "";
    $config['last_link'] = "";

    $this->pagination->initialize($config);
    $data['hardware'] = $this->Hardware_model->index($config['per_page'],$data['page']);
    $this->load->view('admin/hardware/index', $data);
  }

  public function new () {
    $this->load->view('admin/hardware/add');
  }

  public function create() {
    $this->form_validation->set_rules('equipement', 'Equipement', 'required');
    $this->form_validation->set_rules('purchased_on', 'Purchased_on', 'required');
    $this->form_validation->set_rules('purchased_order', 'Purchased_Order', 'required');

    if ($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('failure', 'Record not added in databse');
      redirect(base_url('admin/hardware/new'));
    }
    else
    {

      $data = array();
      $data['equipement'] = $this->security->xss_clean($this->input->post('equipement'));
      $data['purchased_on'] = $this->security->xss_clean($this->input->post('purchased_on'));
      $data['purchased_order'] = $this->security->xss_clean($this->input->post('purchased_order'));
      $data['creator_id'] = current_user()->id;
      $data['aasm_state'] = 'in-stock';

      $this->Hardware_model->create($data);
      $this->session->set_flashdata('success', 'Record added successfully');
      redirect(base_url('admin/hardware'));
    }
  }

  public function edit($Id) {
    $item = $this->Hardware_model->find($Id);
    if ($item && $item->aasm_state != 'deprecate'){
      $data['hardware'] = $item;
      $this->load->view('admin/hardware/edit', $data);
    } 
    else {
      redirect(base_url('admin/hardware'));
    }
  }

  public function update($Id) {
    $item['hardware'] = $this->Hardware_model->find($Id);
    $this->form_validation->set_rules('equipement', 'Equipement', 'required');
    $this->form_validation->set_rules('purchased_on', 'Purchased_on', 'required');
    $this->form_validation->set_rules('purchased_order', 'Purchased_Order', 'required');
    if ($this->form_validation->run() == true)
    {
      $data['equipement'] = $this->security->xss_clean($this->input->post('equipement'));
      $data['purchased_on'] = $this->security->xss_clean($this->input->post('purchased_on'));
      $data['purchased_order'] = $this->security->xss_clean($this->input->post('purchased_order'));

      $this->Hardware_model->update($data, $Id);
      $this->session->set_flashdata('success', 'Record Updated successfully');
      redirect(base_url('admin/hardware'));
    }
    else
    {
      $this->session->set_flashdata('failure', 'Record not found in Database !');
      redirect(base_url('admin/hardware/edit', $item));
    }
  }

  public function delete($Id) {   
    $item = $this->Hardware_model->find($Id);
    if ($item &&  $item->aasm_state =='in-stock'){
      $item = array();
      $item['aasm_state'] = 'deprecate';
      $this->Hardware_model->update($item,$Id);
      $this->session->set_flashdata('success', 'Record successfully marked deprecated !');
    }

    redirect(base_url('admin/hardware'));
  }

  public function assign($Id) {
    $data['hardware'] = $this->Hardware_model->find($Id);
    if ($data['hardware']->aasm_state == 'in-stock') {
      $this->load->view('admin/hardware/assign', $data);
    } 
    else {
      $this->session->set_flashdata('danger', 'Hardware is already assigned to some user. Please collect it first before reassigning');
      redirect(base_url('admin/hardware'));
    }
  }

  public function updateassign($Id) {
    $action = 'assign';
    if ($this->Hardware_model->find($Id)) {
      $data['hardware_id'] = $Id;
      $data['notes']       = $this->security->xss_clean($this->input->post('notes'));
      $data['assigned_to'] = $this->security->xss_clean($this->input->post('user_id'));
      $data['assigned_by'] = current_user()->id;
      $data['action']      = $action;
      $this->HardwareAssign_model->create($data);

      $item['aasm_state']  = $action;
      $this->Hardware_model->update($item, $Id);
    }
    redirect(base_url('admin/hardware'));
  }
  public function collect($Id) {
    $action = 'collected';
    if ($this->HardwareAssign_model->find($Id)) {
      $data['action'] = $action;
      $hardware_data['aasm_state'] = 'in-stock';
      $this->HardwareAssign_model->update($data, $Id);
      $this->Hardware_model->update($hardware_data, $Id);
    }
    redirect(base_url('admin/hardware'));
  }
}