<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_groups extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'name' => array('type' => 'VARCHAR', 'constraint' => 50, 'null' => false),
      'status' => array('type' => 'TINYINT','constraint' => 1, 'null' => false, 'default' => 1),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('groups');

    $this->dbforge->add_field(array(
      'user_id' => array('type' => 'INT','constraint' => 11),
      'group_id' => array('type' => 'INT','constraint' => 11),
    ));
    $this->dbforge->create_table('user_groups');
    $this->dbforge->add_column('user_groups',['CONSTRAINT `user_groups_users_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('user_groups',['CONSTRAINT `user_groups_groups_foreign` FOREIGN KEY(`group_id`) REFERENCES `groups`(`id`)']);
  }
  public function down()
  {
    $this->dbforge->drop_table('groups');
    $this->dbforge->drop_table('user_groups');
  }
}

