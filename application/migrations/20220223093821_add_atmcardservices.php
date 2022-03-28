<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_atmcardservices extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'branch_id' => array('type' => 'INT','constraint' => 11,),
      'cif' => array('type' => 'VARCHAR','constraint' => 16),
      'account_no' => array('type' => 'VARCHAR','constraint' => 16),
      'cardno' => array('type' => 'VARCHAR','constraint' => 16),
      'name' => array('type' => 'VARCHAR','constraint' => 255),
      'request_type' => array('type' => 'ENUM','constraint' => array('block-account','unblock-account','new-issue')),
      'amount_withdrawn' => array('type' => 'FLOAT','constraint' => '14,2'),
      'amount_dispensed' => array('type' => 'FLOAT','constraint' => '14,2'),
      'date_of_trx' => array('type' => 'DATE'),
      'created_by' => array('type' => 'INT'),
      'created_at TIMESTAMP default current_timestamp',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('atmcard_services');
    $this->dbforge->add_column('atmcard_services',['CONSTRAINT `frx_atmcard_services` FOREIGN KEY(`created_by`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('atmcard_services',['CONSTRAINT `frx_branchesidforatm` FOREIGN KEY(`branch_id`) REFERENCES `branches`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('atmcard_services');
  }
}

