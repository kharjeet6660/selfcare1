<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_payroll extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'employee_id' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'payroll_month' => array('type' => 'DATE'),
      'working_days' => array('type' => 'INT','constraint' => 10),
      'basic' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'hra' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'conveyance' => array('type' => 'INT','constraint' => 10),
      'special_allowance' => array('type' => 'INT','constraint' => 10),
      'bonus' => array('type' => 'INT','constraint' => 10),
      'advance' => array('type' =>  'INT','constraint' => 10),
      'lta' => array('type' =>  'INT','constraint' => 10),
      'total_earnings' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'tds' => array('type' => 'INT','constraint' => 10),
      'professional_tax' => array('type' => 'INT','constraint' => 10),
      'epf' => array('type' => 'INT','constraint' => 10),
      'other_deductions' => array('type' => 'INT','constraint' => 10),
      'loan' => array('type' => 'INT','constraint' => 10),
      'total_deductions' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'net_salary' => array('type' => 'INT','constraint' => 10, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('payroll');
  }

  public function down()
  {
    $this->dbforge->drop_table('payroll');
  }
}

