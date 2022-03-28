<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bankdirectory extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Bankdirectory_model');
  }

  public function index() {

    $config['base_url'] = base_url('bankdirectory/index');
    $config['total_rows'] = $this->Bankdirectory_model->total_rows();
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
    $data['bankdirectory'] = $this->Bankdirectory_model->index($config['per_page'],$data['page']);
    $this->load->view('bankdirectory/index',$data);
  }
}
