<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_hardware extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'equipement' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'purchased_on' => array('type' =>  'date', 'null' => false),
      'purchased_order' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'creator_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'valid' => array('constraint' => 1, 'null' => false,),
      'aasm_state' => array('type' =>  'VARCHAR','constraint' => 10, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (creator_id) REFERENCES users(id)');
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('hardware');
  }

  public function down()
  {
    $this->dbforge->drop_table('hardware');
  }
}