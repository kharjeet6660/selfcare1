<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_update_userprofile_phoneno extends CI_Migration
{
  public function up()
  {
    
    $fields = array(
      'phone_no' => array('type' => 'VARCHAR','constraint' => 30, 'null' => false),
    );
    $this->dbforge->add_column('user_profiles', $fields);
  }

  public function down()
  {
    $this->dbforge->drop_column('user_profiles', 'phone_no');
  }
}

