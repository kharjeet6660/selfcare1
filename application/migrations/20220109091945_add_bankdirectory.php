<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_bankdirectory extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'brand_id' => array('type' => 'INT','constraint' => 11,'default'=>1),
      'particulars' => array('type' => 'VARCHAR','constraint' => 50, 'null' => false),
      'email' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false),
      'position' => array('type' => 'VARCHAR','constraint' => 30, 'null' => false),
      'contactno' => array('type' => 'VARCHAR','constraint' => 30, 'null' => false),
      'address' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false),
      'usertype' => array('type' => 'VARCHAR','constraint' => 20, 'null' => false),
      'ifsc' => array('type' => 'VARCHAR','constraint' => 11, 'null' => false),
      'micr' => array('type' => 'VARCHAR','constraint' => 10, 'null' => false),
      'tan' => array('type' => 'VARCHAR','constraint' => 20, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('bank_directory');
  }

  public function down()
  {
    $this->dbforge->drop_table('bank_directory');
  }
}