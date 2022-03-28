<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_hardware_assign extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'hardware_id' => array('type' => 'INT','constraint' => 11,'null' => false),
      'assigned_to' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'assigned_by' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'assigned_on datetime default current_timestamp',
      'action' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false,'comment'=>'Assign|Collect'),
      'notes' => array('type' => 'VARCHAR','constraint' => 255,'null' => false),
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('hardware_assign');
    $this->dbforge->add_column('hardware_assign',['CONSTRAINT `frx_creator1` FOREIGN KEY(`assigned_to`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('hardware_assign',['CONSTRAINT `frx_creator2` FOREIGN KEY(`assigned_by`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('hardware_assign',['CONSTRAINT `frx_creator3` FOREIGN KEY(`hardware_id`) REFERENCES `hardware`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('hardware_assign');
  }
}
