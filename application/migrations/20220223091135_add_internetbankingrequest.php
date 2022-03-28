<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_internetbankingrequest extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'branch_id' => array('type' => 'INT','constraint' => 11,),
      'cif' => array('type' => 'VARCHAR','constraint' => 16),
      'account_no' => array('type' => 'VARCHAR','constraint' => 16),
      'name' => array('type' => 'VARCHAR','constraint' => 255),
      'request_type' => array('type' => 'ENUM','constraint' => array('block-account','unblock-account','new-issue')),
      'created_by' => array('type' => 'INT'),
      'created_at TIMESTAMP default current_timestamp',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('internet_banking_request');
    $this->dbforge->add_column('internet_banking_request',['CONSTRAINT `frx_inbrequest` FOREIGN KEY(`created_by`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('internet_banking_request',['CONSTRAINT `frx_branches` FOREIGN KEY(`branch_id`) REFERENCES `branches`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('internet_banking_request');
  }
}

