<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_UserProfiles extends CI_Migration
{
  public function up()
  {
    
    $fields = array(
      'nationality' => array('type' => 'VARCHAR','constraint' => 100, 'default' => 'India'),
      'date_of_birth' => array('type' => 'datetime'),
    );
    $this->dbforge->add_column('user_profiles', $fields);
  }

  public function down()
  {
    $this->dbforge->drop_column('user_profiles', 'nationality');
    $this->dbforge->drop_column('user_profiles', 'date_of_birth');
  }
}

