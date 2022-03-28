<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seed extends Application_Controller {

  function __construct() {
    parent::__construct();
    // $this->load->model('Announcements_model');
    $this->load->model('User_model');
    $this->load->model('UserProfile_model');
    $this->load->model('Location_model');
    $this->load->model('Department_model');
    // $this->load->model('Circular_model');
  }

  public function index()
  {
    $departments = array('Admin', 'Human Resource', 'Information Technology', 'Software Development', 'Sales');
    foreach ($departments as $name) {
      $department = $this->Department_model->find_by_name($name);
      if(!$department) { $this->Department_model->create(array('name' => $name) ); }
    }
    $department = $this->Department_model->find_by_name('Admin');
    echo '1. Default Departments Updated.<br />'; 

    $data = array('address1' => 'Remote', 'address2' => 'Remote', 'city'=> 'Remote', 'state'=> 'Rajasthan', 'country'=> 'India', 'postal_code'=> '313001', 'primary_email'=> 'support@teambrandmetrics.com', 'primary_contact'=> '9876543210', 'active'=> 1);
    
    $location = $this->Location_model->find_by_city('Remote');
    if(!$location) {
      $this->Location_model->create($data);
    } else {
      $this->Location_model->update($data, $location['id']);
    }
    echo '2. Default Locations Updated.<br />';

    $user_data = array(
      'email' => 'support@teambrandmetrics.com',
      'encrypted_password' => '81dc9bdb52d04dc20036dbd8313ed055',
      'gender' => 1,
      'status' => 1,
      'employee_id' => 'admin',
      'location_id' => $location['id'],
      'department_id' => $department['id'],
      'usertype' => 1
    );

    $userprofile_data = array(
      'first_name' => 'Support',
      'last_name' => 'Admin',
      'nationality' => 'India',
      'phone_no' => '+91-8302173272',
    );

    $admin_user = $this->User_model->find_by_email('support@teambrandmetrics.com');
    if(!$admin_user) {
      $user_id = $this->User_model->create($user_data);
    } else {
      $user_id = $admin_user->id;
      $this->User_model->update($user_data, $admin_user->id);
    }
    $user_profile = $this->UserProfile_model->find_by_user_id($user_id);
    if(!$user_profile) {
      $userprofile_data['users_id'] = $user_id;
      $this->UserProfile_model->create($userprofile_data);
    } else {
      $userprofile_data['users_id'] = $user_id;
      $this->UserProfile_model->update($userprofile_data, $user_profile->id);
    }
    echo '<br />Seed Data Inserted into DB';
  }  
}