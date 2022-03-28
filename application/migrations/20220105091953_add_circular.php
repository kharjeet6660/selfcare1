<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_circular extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'title' => array('type' => 'VARCHAR','constraint' => 200, 'null' => false),
      'department' => array('type' => 'VARCHAR','constraint' => 200, 'null' => false),
      'file_path' => array('type' => 'VARCHAR','constraint' => 200, 'null' => false),
      'creator_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'status' => array('type' => 'TINYINT','constraint' => 1, 'null' => false, 'default' => 1,'comment'=>'1=Active | 0=Inactive'),
      'issue_date' => array('type' =>  'date', 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (creator_id) REFERENCES users(id)');
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('circulars');
    $this->dbforge->add_column('circulars',['CONSTRAINT `frx_creator` FOREIGN KEY(`creator_id`) REFERENCES `users`(`id`)']);
  }
  public function down()
  {
    $this->dbforge->drop_table('circulars');
  }
} 