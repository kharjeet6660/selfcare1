<?php 
class UserProfile_model extends Application_Model{
  public $_table_name = 'user_profiles';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }

  function find_by_user_id($user_id) {
    $this->db->where('users_id',$user_id);
    return $this->db->get('user_profiles')->row(0, 'UserProfile_model');
  }
}
