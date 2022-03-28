<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Company extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'valid_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'legal_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'registration_id' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'primary_email' => array('type' => 'VARCHAR','constraint' => 255),
      'primary_contact' => array('type' => 'VARCHAR','constraint' => 255),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('company');
  }

  public function down()
  {
    $this->dbforge->drop_table('company');
  }
}

