<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locations extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Location_model');
  }
  public function index() {

    $config['base_url'] = base_url('admin/locations/index');
    $config['total_rows'] = $this->Location_model->total_rows();
    $config['per_page'] = 10;
    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

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

    $this->pagination->initialize($config);
    $data['location'] = $this->Location_model->index($config['per_page'],$data['page']);

    $this->load->view('admin/locations/index', $data);
  }
  public function new () {
    $this->load->view('admin/locations/add');
  }
  public function create() {


    $this->form_validation->set_rules('address1', 'Address1', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('state', 'State', 'required');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
    $this->form_validation->set_rules('primary_email', 'Primary Email', 'required');
    $this->form_validation->set_rules('primary_contact', 'Primary Contact', 'required');

    if ($this->form_validation->run() == true) {


      $data = array();
      $data['address1'] = $this->security->xss_clean($this->input->post('address1'));
      $data['city'] = $this->security->xss_clean($this->input->post('city'));
      $data['address2'] = $this->security->xss_clean($this->input->post('address2'));
      $data['state'] = $this->security->xss_clean($this->input->post('state'));
      $data['country'] = $this->security->xss_clean($this->input->post('country'));
      $data['postal_code'] = $this->security->xss_clean($this->input->post('postal_code'));
      $data['primary_email'] = $this->security->xss_clean($this->input->post('primary_email'));
      $data['primary_contact'] = $this->security->xss_clean($this->input->post('primary_contact'));

      $this->Location_model->create($data);
      $this->session->set_flashdata('success', 'Record added successfully');
      redirect(base_url('admin/locations'));
    }
    else {
      $this->session->set_flashdata('failure', 'Record not added in databse');
      $this->load->view('admin/locations/add');
    }
  }
  public function edit($Id) {
    $location = $this->Location_model->find($Id);
    $data['location'] = $location;
    $this->load->view('admin/locations/edit', $data);
  }

  public function update($Id) {
   $location = $this->Location_model->find($Id);
   $data['location'] = $location;

   $this->form_validation->set_rules('address1', 'Address1', 'required');
   $this->form_validation->set_rules('city', 'City', 'required');
   $this->form_validation->set_rules('state', 'State', 'required');
   $this->form_validation->set_rules('country', 'Country', 'required');
   $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
   $this->form_validation->set_rules('primary_email', 'Primary Email', 'required');
   $this->form_validation->set_rules('primary_contact', 'Primary Contact', 'required');

   if ($this->form_validation->run() == true)
   {
     $data = array();
     $data['address1'] = $this->security->xss_clean($this->input->post('address1'));
     $data['city'] = $this->security->xss_clean($this->input->post('city'));
     $data['state'] = $this->security->xss_clean($this->input->post('state'));
     $data['country'] = $this->security->xss_clean($this->input->post('country'));
     $data['postal_code'] = $this->security->xss_clean($this->input->post('postal_code'));
     $data['primary_email'] = $this->security->xss_clean($this->input->post('primary_email'));
     $data['primary_contact'] = $this->security->xss_clean($this->input->post('primary_contact'));
     if (!empty($this->security->xss_clean($this->input->post('address2')))) {
      $data['address2'] = $this->security->xss_clean($this->input->post('address2'));
    }

    $this->Location_model->update($data,$Id);
    $this->session->set_flashdata('success', 'Record Updated successfully');

    redirect(base_url('admin/locations')); 
  }
  else
  {
    $this->session->set_flashdata('failure', 'Record Not Updated !');
    $this->load->view('admin/locations/edit', $data);
  } 
}
public function destroy($Id) {
  $location = $this->Location_model->find($Id);
  $action = $location->active ;
  if ($location) {
    $data['active'] = ($action == 1) ? '0' : '1' ;
    $this->Location_model->update($data, $Id);
    $this->session->set_flashdata('success', 'Record Updated Successfully !');
  }
  redirect(base_url('admin/locations'));
}
}
