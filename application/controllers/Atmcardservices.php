<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atmcardservices extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Atmcardservices_model');
  }

  public function index() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('Atmcardservices/index');
    $config['total_rows'] = $this->Atmcardservices_model->total_rows();
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
    $data['atmcard_services'] = $this->Atmcardservices_model->index($config['per_page'],$config['page']);
    $this->load->view('Atmcardservices/index',$data);
  }

  public function new () {
  	$data['branches'] = $this->Atmcardservices_model->getbranch();
    $this->load->view('Atmcardservices/add',$data);
  }
  public function create(){
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('cif', 'CIF', 'required');
    $this->form_validation->set_rules('account_no', 'Account Number', 'required');
    $this->form_validation->set_rules('branch_id', 'Branch', 'required');
    $this->form_validation->set_rules('request_type', 'Request Type', 'required');
    $this->form_validation->set_rules('cardno', 'Card Number', 'required');
    $this->form_validation->set_rules('amount_withdrawn', 'Amount Withdrawn', 'required');
    $this->form_validation->set_rules('amount_dispensed', 'Amount Dispensed', 'required');
    $this->form_validation->set_rules('date_of_trx', 'Date of Transaction', 'required');

    if ($this->form_validation->run() == false)
    {
    	$data['branches'] = $this->Atmcardservices_model->getbranch();
      $this->session->set_flashdata('failure', 'failed, Request not generated!');
      $this->load->view('Atmcardservices/add',$data);
    }
    else
    {
      $request = array();
      $request['name'] = $this->security->xss_clean($this->input->post('name'));
      $request['cif'] = $this->security->xss_clean($this->input->post('cif'));
      $request['account_no'] = $this->security->xss_clean($this->input->post('account_no'));
      $request['branch_id'] = $this->security->xss_clean($this->input->post('branch_id'));
      $request['request_type'] = $this->security->xss_clean($this->input->post('request_type'));
      $request['cardno'] = $this->security->xss_clean($this->input->post('cardno'));
      $request['amount_withdrawn'] = $this->security->xss_clean($this->input->post('amount_withdrawn'));
      $request['amount_dispensed'] = $this->security->xss_clean($this->input->post('amount_dispensed'));
      $request['date_of_trx'] = $this->security->xss_clean($this->input->post('date_of_trx'));
      $request['created_by'] = current_user()->id;
      $this->Atmcardservices_model->create($request);
      $this->session->set_flashdata('success', 'Your issue request has been sent to our team!');
      redirect(base_url('atmcard-services'));
    }
  }
}
