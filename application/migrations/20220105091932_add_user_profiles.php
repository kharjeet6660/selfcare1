<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_user_profiles extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'users_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'first_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'last_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('user_profiles');
    $this->dbforge->add_column('user_profiles',['CONSTRAINT `users_profiles_users_foreign` FOREIGN KEY(`users_id`) REFERENCES `users`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('user_profiles');
  }
}

