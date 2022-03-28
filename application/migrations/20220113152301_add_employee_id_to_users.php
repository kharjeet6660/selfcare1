<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Employee_id_to_Users extends CI_Migration
{
  public function up() {
    $fields = array('employee_id' => array('type' => 'VARCHAR','constraint' => 200));
    $this->dbforge->add_column('users', $fields);
  }

  public function down() {
    $this->dbforge->drop_column('users', 'employee_id');
  }
}

