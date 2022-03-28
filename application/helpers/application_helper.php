<?php
defined('BASEPATH') or exit('No direct script access allowed');

function current_user() {
  $ci =& get_instance();
  return $ci->current_user();
}

function get_user($id) {
  $ci =& get_instance();
  return $ci->User_model->find($id);
}

function is_user_active($status) {
  return $status==1;
}
function is_current_user_admin() {
  // puts current_user();
  return true;
}
