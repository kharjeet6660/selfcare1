<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Documents extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'valid' => array('type' => 'TINYINT','constraint' => 1, 'null' => false, 'default' => 1),
      'creator_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'document_name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'document_type' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('documents');
    $this->dbforge->add_column('documents',['CONSTRAINT `document_creator_foreign` FOREIGN KEY(`creator_id`) REFERENCES `users`(`id`)']);
  }
  public function down()
  {
    $this->dbforge->drop_table('documents2');
  }
}

