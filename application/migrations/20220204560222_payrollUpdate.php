<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_payrollUpdate extends CI_Migration
{
  public function up()
  {
    
    $fields = array(
      'naration1' => array('type' => 'VARCHAR','constraint' => 200),
      'naration2' => array('type' => 'VARCHAR','constraint' => 200),
      'status' => array('type' => 'TINYINT','constraint' => 1),
    );
  }
  public function down()
  {
    $this->dbforge->drop_column('payroll', 'naration1');
    $this->dbforge->drop_column('payroll', 'naration2');
    $this->dbforge->drop_column('payroll', 'status');
  }
}

