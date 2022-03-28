<?php 
class BankAccount_model extends Application_Model{
  public $_table_name = 'bank_accounts';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }

  // belongs to employee
}
