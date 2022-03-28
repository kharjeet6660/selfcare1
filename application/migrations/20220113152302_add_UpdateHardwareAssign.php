<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_UpdateHardwareAssign extends CI_Migration
{
  public function up() {
    $fields = array('updated_at' => array('type' => 'datetime'));
    $this->dbforge->add_column('hardware_assign', $fields);
  }

  public function down() {
    $this->dbforge->drop_column('hardware_assign', 'updated_at');
  }
}

