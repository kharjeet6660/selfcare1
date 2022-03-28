<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobilebanking extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Mobilebanking_model');
  }

  public function index() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('Mobilebanking/index');
    $config['total_rows'] = $this->Mobilebanking_model->total_rows();
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
    $data['mobile_banking_request'] = $this->Mobilebanking_model->index($config['per_page'],$config['page']);
    $this->load->view('Mobilebanking/index',$data);
  }

  public function new () {
  	$data['branches'] = $this->Mobilebanking_model->getbranch();
    $this->load->view('Mobilebanking/add',$data);
  }
  public function create(){
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('cif', 'CIF', 'required');
    $this->form_validation->set_rules('account_no', 'Account Number', 'required');
    $this->form_validation->set_rules('branch_id', 'Branch', 'required');
    $this->form_validation->set_rules('request_type', 'Request Type', 'required');

    if ($this->form_validation->run() == false)
    {
    	$data['branches'] = $this->Mobilebanking_model->getbranch();
      $this->session->set_flashdata('failure', 'failed, Request not generated!');
      $this->load->view('Mobilebanking/add',$data);
    }
    else
    {
      $request = array();
      $request['name'] = $this->security->xss_clean($this->input->post('name'));
      $request['cif'] = $this->security->xss_clean($this->input->post('cif'));
      $request['account_no'] = $this->security->xss_clean($this->input->post('account_no'));
      $request['branch_id'] = $this->security->xss_clean($this->input->post('branch_id'));
      $request['request_type'] = $this->security->xss_clean($this->input->post('request_type'));
      $request['created_by'] = current_user()->id;

      $this->Mobilebanking_model->create($request);
      $this->session->set_flashdata('success', 'Your issue request has been sent to our team!');
      redirect(base_url('mobile-banking-request'));
    }
  }
}
