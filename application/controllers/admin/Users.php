<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('User_model');
    $this->load->model('UserProfile_model');
    $this->load->model('Department_model');
    $this->load->model('Location_model');
    
  }

  public function index() {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/users/index');
    $config['total_rows'] = $this->User_model->total_rows();
    $config['per_page'] = 10;
    $config['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $config['full_tag_open'] = '<div class="pagination">';
    $config['full_tag_close'] = '</div>';
    $config['prev_link'] = '&lt; Prev';
    $config['prev_tag_open'] = '';
    $config['prev_tag_close'] = '';
    $config['next_link'] = 'Next &gt;';
    $config['cur_tag_open'] = '<a class="active">';
    $config['cur_tag_close'] = '</a>';
    $config['num_tag_open'] = '';
    $config['num_tag_close'] = '';

    $this->pagination->initialize($config);
    $data['users'] = $this->User_model->index($config['per_page'],$config['page']);
    $this->load->view('admin/users/index',$data);
  }

  public function new(){
    $data['departments'] = $this->Department_model->get();
    $data['location'] = $this->Location_model->get(); 
    $this->load->view('admin/users/add',$data);
  }

  public function create(){
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('emp_id', 'Employee Id', 'required');
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');

    if ($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('failure', 'Record not added in database');
      $this->load->view('admin/users/add');
    }
    else
    {
      //update users table
      $user = array();
      $user['email'] = $this->security->xss_clean($this->input->post('email'));
      $user['encrypted_password'] = md5($this->security->xss_clean($this->input->post('password')));
      $user['gender'] = $this->security->xss_clean($this->input->post('gender'));
      $user['employee_id'] = $this->security->xss_clean($this->input->post('emp_id'));
      $user['department_id'] = $this->security->xss_clean($this->input->post('department'));
      $user['location_id'] = $this->security->xss_clean($this->input->post('location'));
      $user['usertype'] = $this->security->xss_clean($this->input->post('role'));

      //update user_profiles table
      $user_profile = array();
      $user_profile['users_id'] = $this->User_model->create($user);
      $user_profile['first_name'] = $this->security->xss_clean($this->input->post('first_name'));
      $user_profile['last_name'] = $this->security->xss_clean($this->input->post('last_name'));

      $this->UserProfile_model->create($user_profile);
      $this->session->set_flashdata('success', 'Record added successfully');
      redirect(base_url('admin/users'));
    }
  }

  public function edit($Id) {
    
    $data['user'] = $this->User_model->find($Id);
    $data['location'] = $this->Location_model->get(); 
    $data['department'] = $this->Department_model->get();
    $data['user_profile'] = $this->UserProfile_model->find_by_user_id($Id);
    $this->load->view('admin/users/edit', $data);
  }

  public function update($Id){
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('location', 'Location', 'required');
    $this->form_validation->set_rules('department', 'Department', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == true){

        $user['gender'] = $this->security->xss_clean($this->input->post('gender'));
        $user['location_id'] = $this->security->xss_clean($this->input->post('location'));
         $user['department_id'] = $this->security->xss_clean($this->input->post('department'));
          $user['usertype'] = $this->security->xss_clean($this->input->post('role'));
        $this->User_model->update($user,$Id);
        
      $up_data['first_name'] = $this->security->xss_clean($this->input->post('first_name'));
      $up_data['last_name'] = $this->security->xss_clean($this->input->post('last_name'));
      $profile = $this->UserProfile_model->find_by_user_id($Id);
      $this->UserProfile_model->update($up_data, $profile->id);
      $this->session->set_flashdata('success', 'User Details Sucessfully Updated.');
      redirect(base_url('admin/users'));
    }
    else
    {
      $data['user'] = $this->User_model->find($Id);
      $data['user_profile'] = $this->UserProfile_model->find_by_user_id($data['user']->id);
      $this->session->set_flashdata('failure', 'Record not found in Database !');
      $this->load->view('admin/users/edit', $data);

    }
  }
  public function destroy($Id) {
    $user = $this->User_model->find($Id);
    if (empty($user))
    {
      $this->session->set_flashdata('failure', 'Unable to find user with valid record!');
      redirect(base_url('admin/users'));
    }
    $this->User_model->update_status($Id);
    $this->session->set_flashdata('success', 'User successfuly marked de-activated!');
    redirect(base_url('admin/users'));
  }
  function show_user_profile($id){
     $data['user_profile'] = $this->UserProfile_model->find_by_user_id($id);
    $this->load->view('users/profile', $data);
  }
}
