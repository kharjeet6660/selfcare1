<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hardware extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Hardware_model');
  }
  public function alloted() {
    $config['base_url'] = base_url('admin/hardware/alloted');
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
    $data['hardware'] = $this->Hardware_model->allowted_to(current_user()->id,$config['per_page'],$data['page']);
    $this->load->view('hardware/alloted', $data);
  }
}