<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_branches extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'name' => array('type' => 'VARCHAR','constraint' => 100),
      'ro' => array('type' => 'VARCHAR','constraint' => 100),
      'created_at TIMESTAMP default current_timestamp',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('branches');
    
  }

  public function down()
  {
    $this->dbforge->drop_table('branches');
  }
}

