<?php
  defined('BASEPATH') or exit('No direct script access allowed');

  class Migration_Create_Holidays extends CI_Migration
  {
    public function up() {
      $this->dbforge->add_field(array(
        'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
        'location' => array('type' => 'VARCHAR','constraint' => 255),
        'actual_date' => array('type' => 'datetime', 'null' => false),
        'reason' => array('type' => 'VARCHAR','constraint' => 255),
        'active' => array('type' => 'TINYINT','constraint' => 1, 'default' => 1),
        'created_at datetime default current_timestamp',
      ));
      $this->dbforge->add_key('id', true);
      $this->dbforge->create_table('holidays');
    }

    public function down() {
      $this->dbforge->drop_table('holidays');
    }
}
