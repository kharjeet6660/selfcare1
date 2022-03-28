<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Atmcardservices_model');
    $this->load->model('Internetbanking_model');
    $this->load->model('Mobilebanking_model');
  }

  public function atmcardservices() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/requests/atmcardservices');
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
    $this->load->view('admin/requests/atmcardservices',$data);
  }

  public function internetbanking() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/requests/internetbanking');
    $config['total_rows'] = $this->Internetbanking_model->total_rows();
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
    $data['internet_banking_request'] = $this->Internetbanking_model->index($config['per_page'],$config['page']);
    $this->load->view('admin/requests/internetbanking',$data);
  }

  public function mobilebanking() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/requests/mobilebanking');
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
    $this->load->view('admin/requests/mobilebanking',$data);
  }
}
