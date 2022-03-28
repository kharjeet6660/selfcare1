<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Employee extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'user_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'location_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'position' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'employee_id' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'pan' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'aadhar' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'primary_bank_account' => array('type' => 'INT','constraint' => 11),
      'primary_address' => array('type' => 'INT','constraint' => 11),
      'active' => array('type' => 'TINYINT','constraint' => 1, 'default'=> 1),
      'joining_date' => array('type' => 'datetime'),
      'termination_date' => array('type' => 'datetime'),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('employees');
    $this->dbforge->add_column('employees',['CONSTRAINT `employee_users_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('employees',['CONSTRAINT `employee_location_foreign` FOREIGN KEY(`location_id`) REFERENCES `locations`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('employees');
  }
}

