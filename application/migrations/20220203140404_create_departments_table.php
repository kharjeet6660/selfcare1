<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_departments_table extends CI_Migration
{
  public function up()
  {
    
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'name' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false),
      'active' => array('type' => 'TINYINT','constraint' => 1, 'default'=> 1),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('departments');
  }

  public function down()
  {
    $this->dbforge->drop_table('departments');
  }
}

