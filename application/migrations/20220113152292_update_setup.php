<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_Setup extends CI_Migration
{
  public function up()
  {
    $fields = array('editable' => array('type' => 'TINYINT','constraint' => 1, 'default' => 1));
    $this->dbforge->add_column('setup', $fields);
  }
  public function down()
  {
    $this->dbforge->drop_column('setup', 'editable');
  }
}

