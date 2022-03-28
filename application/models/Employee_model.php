<?php 
class Employee_model extends Application_Model{
  public $_table_name = 'employee';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }

  // belongs_to location
  // has many bank_accounts
}
