<?php 
class User_model extends Application_Model{
  public $_table_name = 'users';
  public $id;

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }

  function find_by_auth_token($auth_token) {
    $this->db->select('u.*, up.first_name, up.last_name, d.name,l.address1,l.state,l.city,l.country');
    $this->db->where('u.current_auth_token',$auth_token);
    $this->db->join('departments as d', 'u.id = d.id', 'LEFT');
    $this->db->join('locations as l', 'u.id = l.id', 'LEFT');
    $this->db->join('user_profiles up', 'up.id = u.id', 'LEFT');
    return $this->db->get('users u')->row(0, 'User_model');
  }

  function index($limit,$offset) {
    $this->db->select('u.*, up.first_name, up.last_name, up.phone_no, l.state, l.city, d.name department');
    $this->db->join('user_profiles up', 'up.users_id = u.id');
    $this->db->join('departments d', 'd.id = u.department_id');
    $this->db->join('locations l', 'l.id = u.location_id');
    $this->db->limit($limit,$offset);
    return $users = $this->db->get('users u')->result_array();
  }
  function update_login_details($Id, $auth_token) {
    $user = $this->User_model->find($Id);
    if ($user) {
      $count = $user->sign_in_count;
      $current_time = date('Y-m-d H:i:s');
      $current_ip = $this->input->ip_address();
      $sign_in_count = $count + 1;
      $query=$this->db->query("update users SET
        current_auth_token='$auth_token',
        current_sign_in_at='$current_time',
        current_sign_in_ip='$current_ip',
        sign_in_count='$sign_in_count'
        where id='$Id';");
    }
  }

  public function update_status($Id) {
    $user = $this->User_model->find($Id);
    if ($user) {
      $data['status'] = $user->status == 0 ? 1 : 0;
      $this->db->where('id',$Id);
      $this->db->update('users',$data);   
    }
  }

  public function find_by_email($email) {
    $this->db->where('email', $email);
    return $this->db->get("users")->row(0, 'User_model');
  } 
  public function find_row($Id){
    $this->db->where('id', $Id);
    return $this->db->get("users")->result_array();
  } 

  public function update_reset_password_token($to_email){
    $token = random_string('alnum', 32);
    $this->db->where('email',$to_email);
    $this->db->set('reset_password_token', $token);
    $this->db->update('users');
  }

  function find_user_by_token($token){
    $this->db->where('reset_password_token',$token);
    return $this->db->get('users')->result_array();
  }
}
