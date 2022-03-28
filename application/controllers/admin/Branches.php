<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branches extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Branches_model');
  }

  public function index() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/branches/index');
    $config['total_rows'] = $this->Branches_model->total_rows();
    $config['per_page'] = 10;
    $config['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

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
    $data['branches'] = $this->Branches_model->index($config['per_page'],$config['page']);
    $this->load->view('admin/branches/index',$data);
  }

  public function new () {
    $this->load->view('admin/branches/add');
  }

  public function create(){
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('ro', 'RO', 'required');

    if ($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('failure', 'Record not added in database');
      $this->load->view('admin/branches/add');
    }
    else
    {
      $data = array();
      $data['name'] = $this->security->xss_clean($this->input->post('name'));
      $data['ro'] = $this->security->xss_clean($this->input->post('ro'));

      $this->Branches_model->create($data);
      $this->session->set_flashdata('success', 'Record added successfully');
      redirect(base_url('admin/branches'));
    }
  }
  public function edit($Id) {
    $data['branch'] = $this->Branches_model->find($Id);
    $this->load->view('admin/branches/edit', $data);
  }

  public function update($Id) {
   $data['branch'] = $this->Branches_model->find($Id);

   $this->form_validation->set_rules('name', 'Name', 'required');
   $this->form_validation->set_rules('ro', 'RO', 'required');

   if ($this->form_validation->run() == true)
   {
     $data = array();
     $data['name'] = $this->security->xss_clean($this->input->post('name'));
     $data['ro'] = $this->security->xss_clean($this->input->post('ro'));

    $this->Branches_model->update($data,$Id);
    $this->session->set_flashdata('success', 'Record Updated successfully');

    redirect(base_url('admin/branches')); 
  }
  else
  {
    $this->session->set_flashdata('failure', 'Record Not Updated !');
    $this->load->view('admin/branches/edit', $data);
  } 
}
  public function destroy($Id) {
    $branch = $this->Branches_model->find($Id);
    if (empty($branch))
    {
      $this->session->set_flashdata('failure', 'Unable to find branch with valid record!');
      redirect(base_url('admin/branches'));
    }
    $this->Branches_model->delete($Id);
    $this->session->set_flashdata('success', 'Record deleted successfully !');
    redirect(base_url('admin/branches'));
  }
}
