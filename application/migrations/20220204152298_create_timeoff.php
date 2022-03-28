 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Timeoff extends CI_Migration
{
  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'name' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'count' => array('type' => 'INT'),
      'type' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'active' => array('type' => 'TINYINT','constraint' => 1, 'default' => 1),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('timeoff_policies');

    $this->dbforge->add_field(array(
      'id' => array('type' => 'INT','constraint' => 11,'auto_increment' => true, 'null' => false),
      'start_date' => array('type' => 'datetime'),
      'end_date' => array('type' => 'datetime'),
      'total_days' => array('type' => 'INT','constraint' => 11,'null' => false),
      'reason' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'user_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'manager_id' => array('type' => 'INT','constraint' => 11),
      'policy_id' => array('type' => 'INT','constraint' => 11, 'null' => false),
      'status' => array('type' => 'VARCHAR','constraint' => 255, 'null' => false),
      'rejection_reason' => array('type' => 'VARCHAR','constraint' => 255),
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp',
    ));
    $this->dbforge->add_key('id', true);
    $this->dbforge->create_table('timeoffs');
    $this->dbforge->add_column('timeoffs',['CONSTRAINT `userid_timeoff` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('timeoffs',['CONSTRAINT `managerid_timeoff` FOREIGN KEY(`manager_id`) REFERENCES `users`(`id`)']);
    $this->dbforge->add_column('timeoffs',['CONSTRAINT `policy_timeoff` FOREIGN KEY(`policy_id`) REFERENCES `timeoff_policies`(`id`)']);

  }

  public function down()
  {
    $this->dbforge->drop_table('timeoff_policies');
    $this->dbforge->drop_table('timeoffs');
  }
}

