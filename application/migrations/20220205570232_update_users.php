<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_update_users extends CI_Migration
{
  public function up()
  {
    
    $fields = array(
      'employee_id' => array('type' => 'VARCHAR','constraint' => 200,'unique' => true),
      'email' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false,'unique' => true),
    );
    $this->dbforge->modify_column('users', $fields);
    
  }

  public function down()
  {
    $this->dbforge->drop_column('users', 'employee_id');
    $this->dbforge->drop_column('users', 'email');
  }
}

