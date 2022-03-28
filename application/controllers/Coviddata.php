<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coviddata extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Coviddata_model');
  }

  public function index() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('Coviddata/index');
    $config['total_rows'] = $this->Coviddata_model->total_rows();
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
    $data['covid_data'] = $this->Coviddata_model->index($config['per_page'],$config['page']);
    $this->load->view('Coviddata/index',$data);
  }

  public function new () {
    $this->load->view('Coviddata/add');
  }
  public function create(){
    $this->form_validation->set_rules('member_name', 'Member Name', 'required');
    $this->form_validation->set_rules('relation', 'Relation', 'required');
    $this->form_validation->set_rules('date_1st_dose', 'Date Of 1st Dose', 'required');

    if ($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('failure', 'failed, Request not generated!');
      $this->load->view('Coviddata/add');
    }
    else
    {
      $data = array();
      $data['member_name'] = $this->security->xss_clean($this->input->post('member_name'));
      $data['relation'] = $this->security->xss_clean($this->input->post('relation'));
      $data['date_1st_dose'] = $this->security->xss_clean($this->input->post('date_1st_dose'));
      $dose2 = $this->security->xss_clean($this->input->post('date_1st_dose'));
      $dose3 = $this->security->xss_clean($this->input->post('date_2nd_dose'));
      if ($dose2) {
        $data['date_2nd_dose'] = $this->security->xss_clean($this->input->post('date_2nd_dose'));
        if ($dose3) {
        $data['date_3rd_dose'] = $this->security->xss_clean($this->input->post('date_3rd_dose'));
      }else{
        $data['date_3rd_dose'] = '';
      }
      }else{
        $data['date_2nd_dose'] = '';
      }
      $data['created_by'] = current_user()->id;
      $this->Coviddata_model->create($data);
      $this->session->set_flashdata('success', 'Your data has been sent to our team!');
      redirect(base_url('covid-data'));
    }
  }
}
