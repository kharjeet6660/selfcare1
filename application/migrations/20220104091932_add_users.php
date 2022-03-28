<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'email' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false),
      'encrypted_password' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'current_auth_token' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'gender' => array('type' => 'TINYINT','constraint' => 1, 'null' => false),
      'status' => array('type' => 'TINYINT','constraint' => 1, 'null' => false, 'default' => 1),
      'sign_in_count' => array('type' => 'INT','constraint' => 11, 'null' => false, 'default' => 0),
      'reset_password_token' => array('type' => 'VARCHAR','constraint' => 100, 'null' => false),
      'reset_password_sent_at' => array('type' =>  'datetime', 'null' => false),
      'current_sign_in_at' => array('type' =>  'datetime', 'null' => false),
      'current_sign_in_ip' => array('type' => 'VARCHAR','constraint' => 30, 'null' => false),
      'confirmation_token' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('users');
    
  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }
}

