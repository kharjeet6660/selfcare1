<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('UserProfile_model');
    $this->load->model('Location_model');
    $this->load->model('Department_model');

  }

  public function profile()
  {
    $data['user_profile'] = $this->UserProfile_model->find_by_user_id(current_user()->id);
    $this->load->view('users/profile', $data);
  }
  
  public function notifications()
  {
    $this->load->view('users/notifications');
  }

  public function editprofile(){
     $data['user_profile'] = $this->UserProfile_model->find_by_user_id(current_user()->id);
    $data['locations']=$this->Location_model->get();
    $data['departments']=$this->Department_model->get();
    $data['user'] = $this->UserProfile_model->find_by_user_id(current_user()->id);
    $this->load->view('users/edit_profile',$data);
  }

  public function updateprofile(){
    $config = ['upload_path' => './profile_image/', 'allowed_types' => 'jpg|jpeg|png', 'encrypt_name' => true ];

    $this->load->library('upload', $config);

    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('phone_no', 'Phone no', 'required');
    $this->form_validation->set_rules('nationality', 'Nationality', 'required');
    $this->form_validation->set_rules('location', 'Location', 'required');
    $this->form_validation->set_rules('department', 'Department', 'required');

    if ($this->form_validation->run() == TRUE) {
      if ($this->upload->do_upload('filename')) {
       $image_data= $this->upload->data();

     $this->db->where('id',current_user()->id);
      $user_profile_data = $this->db->get('user_profiles')->result_array();
       $image_path = './profile_image/'.$this->upload->data('file_name');
       $data['profile_image'] = $image_path;
     

        $old_file=$user_profile_data[0]['profile_image'];
         
         if(unlink($old_file)){
          echo "file updated success";
         }


      }
       
      $data['first_name'] = $this->security->xss_clean($this->input->post('first_name'));
      $data['last_name'] = $this->security->xss_clean($this->input->post('last_name'));
      $data['phone_no'] = $this->security->xss_clean($this->input->post('phone_no'));
      $data['nationality'] = $this->security->xss_clean($this->input->post('nationality'));
      $location['location_id'] = $this->security->xss_clean($this->input->post('location'));
      $this->User_model->update($location,current_user()->id);
      $this->UserProfile_model->update($data,current_user()->id);
      $this->session->set_flashdata('success', 'Record Updated successfully');
      redirect(base_url('profile'));
    }
    else {
     $this->session->set_flashdata('failure', 'Record not found in Database !');
     $data['upload_error'] = $this->upload->display_errors();
      redirect(base_url('profile/edit'),$data);
    }
  }

  public function password()
  {
    $this->load->view('users/reset_password');
  }
  public function update_password()
  {
    $this->form_validation->set_rules('o_pass', 'Old Password', 'required');
    $this->form_validation->set_rules('n_pass', 'New Password', 'required');
    $this->form_validation->set_rules('c_pass', 'Confirm Password', 'required');

    if ($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('failure', 'Old password is incorrect.');
      $this->load->view('users/reset_password');
    }else{
      $data = $this->User_model->find(current_user()->id);
      $old_password = md5($this->input->post('o_pass'));
      $new_password = md5($this->input->post('n_pass'));
      $confirm_password = md5($this->input->post('c_pass'));
      if ($new_password == $confirm_password) {
        if($old_password == $data->encrypted_password){
        $password = array();
        $password['encrypted_password'] = $confirm_password;
        $this->User_model->update($password,current_user()->id);
        $this->session->set_flashdata('success', 'You have successfully changed your password!');
        redirect(base_url());
      }
      else{
        $this->session->set_flashdata('failure', 'Old password is incorrect.');
        redirect(base_url('password'));
      }
      }else{
        $this->session->set_flashdata('failure', 'New password and Confirm Password is not matched.');
        redirect(base_url('password'));
      }
    }
  }
}