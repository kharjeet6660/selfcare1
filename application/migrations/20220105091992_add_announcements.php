<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_announcements extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'creator_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'start_date' => array('type' =>  'date', 'null' => false),
      'end_date' => array('type' =>  'date', 'null' => false),
      'title' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'status' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false, 'default' => 'valid','comment'=>'|Valid|Expired|deleted|'),
      'description' => array('type' => 'VARCHAR','constraint' => 1000, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (creator_id) REFERENCES users(id)');
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('announcements');
  }

  public function down()
  {
    $this->dbforge->drop_table('announcements');
  }
}