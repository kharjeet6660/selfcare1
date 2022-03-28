<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Setup extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'creator_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'key' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'value' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('setup');
    $this->dbforge->add_column('setup',['CONSTRAINT `setup_creator_foreign` FOREIGN KEY(`creator_id`) REFERENCES `users`(`id`)']);
  }
  public function down()
  {
    $this->dbforge->drop_table('setup');
  }
}

