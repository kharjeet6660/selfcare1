<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_BankAccounts extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'user_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'account_no' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'account_currency' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false, 'default' => 'IN'),
      'bank_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'bank_ifsc_code' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'bank_micr_code' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'active' => array('type' => 'TINYINT','constraint' => 1, 'default'=> 1),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('bank_accounts');
    $this->dbforge->add_column('bank_accounts',['CONSTRAINT `ba_users_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('bank_accounts');
  }
}

