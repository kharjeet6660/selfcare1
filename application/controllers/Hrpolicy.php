<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hrpolicy extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
  }

  public function index() {
    $this->load->view('hrpolicy/index');
  }
}
