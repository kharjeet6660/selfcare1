<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Locations extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'address1' => array('type' => 'VARCHAR','constraint' => 255),
      'address2' => array('type' => 'VARCHAR','constraint' => 255),
      'city' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'state' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'country' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'postal_code' => array('type' => 'VARCHAR','constraint' => 255),
      'primary_email' => array('type' => 'VARCHAR','constraint' => 255),
      'primary_contact' => array('type' => 'VARCHAR','constraint' => 255),
      'active' => array('type' => 'TINYINT','constraint' => 1, 'default'=> 1),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('locations');
  }

  public function down()
  {
    $this->dbforge->drop_table('locations');
  }
}

