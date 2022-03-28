<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_coviddone extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'member_name' => array('type' => 'VARCHAR','constraint' => 255),
      'relation' => array('type' => 'ENUM','constraint' => array('self','father','mother','brother','sister','wife','son','daughter','grandfather','grandmother')),
      'date_1st_dose' => array('type' => 'DATE'),
      'date_2nd_dose' => array('type' => 'DATE'),
      'date_3rd_dose' => array('type' => 'DATE'),
      'created_by' => array('type' => 'INT'),
      'created_at TIMESTAMP default current_timestamp',
      'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('covid_done');
    $this->dbforge->add_column('covid_done',['CONSTRAINT `frx_coviddone` FOREIGN KEY(`created_by`) REFERENCES `users`(`id`)']);
  }

  public function down()
  {
    $this->dbforge->drop_table('covid_done');
  }
}

