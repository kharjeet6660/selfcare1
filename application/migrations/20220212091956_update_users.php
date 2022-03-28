<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_update_users  extends CI_Migration {

  public function up()
  {
    $fields = array('usertype' => array('type' => 'TINYINT','constraint' => 1, 'default' => 0));
    $this->dbforge->add_column('users', $fields);
  }

  public function down()
  {
    $this->dbforge->drop_column('users', 'usertype');
  }
}