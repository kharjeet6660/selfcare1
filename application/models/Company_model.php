<?php 
class Company_model extends Application_Model{
  public $_table_name = 'company';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }

  // has many locations []
  // has many financial_statements []
  //   -- income statement
  //   -- balance_sheet
  //   -- cash_flow
}
