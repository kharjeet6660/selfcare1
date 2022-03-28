<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Circular extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Circular_model');
    $this->load->helper('download');
  }
  public function index() {

    $config['base_url'] = base_url('circular/index');
    $config['total_rows'] = $this->Circular_model->total_rows();
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
    $data['circular'] = $this->Circular_model->index($config['per_page'],$data['page']);

    $this->load->view('circular/index', $data);
  }
  
  public function download($Id) {
    if (!empty($Id)) {
      $fileInfo = $this->Circular_model->find($Id);
      $file = $fileInfo->file_path;
      force_download($file, null);
    }
  }

}
