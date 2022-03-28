<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_location_id_to_users extends CI_Migration
{
  public function up()
  {
    $fields = array(
      'location_id' => array('type' => 'INTEGER', 'constraint' => 11, 'null' => false),
    );
    $this->dbforge->add_column('users', $fields);
    $this->dbforge->add_column('users','CONSTRAINT fks_lid FOREIGN KEY(location_id) REFERENCES locations(id)');
  }

  public function down()
  {
    $this->dbforge->drop_column('users', 'location_id');
  }
}

