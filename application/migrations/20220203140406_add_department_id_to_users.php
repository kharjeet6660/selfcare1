<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_department_id_to_users extends CI_Migration
{
  public function up()
  {
    $fields = array(
      'department_id' => array('type' => 'INTEGER', 'constraint' => 11, 'null' => false),
    );
    $this->dbforge->add_column('users', $fields);
    $this->dbforge->add_column('users','CONSTRAINT fks_did FOREIGN KEY(department_id) REFERENCES departments(id)');
  }

  public function down()
  {
    $this->dbforge->drop_column('users', 'department_id');
  }
}

