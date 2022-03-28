<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Application_Controller extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->helper('security');
  }

  function logged_in() {
    if (!$this->session->userdata('auth_token')){
      redirect(base_url('/login'));
    }
    $auth_token = $this->session->userdata('auth_token');
    $user = $this->User_model->find_by_auth_token($auth_token);
    if (!$user) {
      $this->session->unset_userdata('auth_token');
      redirect(base_url('/login'));
    }


  }
  function admin_only() {
    if (current_user()->usertype ==0) {
      redirect(base_url());
    }
  }
  function current_user() {
    if($this->session->userdata('auth_token'))
      $auth_token = $this->session->userdata('auth_token');
      return $this->User_model->find_by_auth_token($auth_token);
  }
}

