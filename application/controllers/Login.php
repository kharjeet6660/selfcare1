<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function index()
  {
    $this->load->view('login/index');
  }

  public function sign_out()
  {
    $this->session->unset_userdata('auth_token');
    redirect(base_url());
  }
  
  public function page404()
  {
    echo 'Ops 404! This page is missing.';
  }
  public function sign_in() {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == true) {
      $username = $this->security->xss_clean($this->input->post('username'));
      $password = $this->security->xss_clean($this->input->post('password'));
      $this->db->where('status', 1);
      $this->db->where('email', $username);
      $this->db->or_where('Employee_id', $username);
      $user = $this->db->get('users')->row(0, 'User_model');
      if ($user && $user->encrypted_password == md5($password))
      {
        $auth_token = random_string('alnum', 32);
        $this->User_model->update_login_details($user->id, $auth_token);
        $this->session->set_userdata('auth_token', $auth_token);
        redirect(base_url());
      }
      else
      {
        $this->session->set_flashdata('failure','Incorrect credentals');
        redirect(base_url('login'));
      }
    }
    else
    {
      $this->load->view('login/index');
    }
  }
  public function forgetPassword() {
    $this->load->view('users/forget_password');
  }
  public function getPassword() {
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() == true) {
      $user = $this->User_model->find_by_email($this->security->xss_clean($this->input->post('email')));

      if($user) {
        $this->User_model->update_reset_password_token($user->email);
        $sendmail = $this->sendemail();

        if ($sendmail) {
          $this->session->set_flashdata('success','Password reset-link sent to your email address..');
          redirect('login');;
        }
        $this->load->view('users/forget_password');
      }
      else {
        $this->session->set_flashdata('failure','Invalid email address...');
        $this->load->view('users/forget_password');
      }
    }
    else {
      $this->load->view('users/forget_password');
    }
  }

  public function sendemail(){
    $to_email = $this->input->post('email'); 
    $this->db->where('email',$to_email);
    $token = $this->db->get('users')->row_array()['reset_password_token'];
    $from_email = "support@brandmetrics.com"; 
    $message = '';
    $message .= "<h2>You are receiving this message in response to your request for password reset</h2>"
    . "<p>Follow this link to reset your password <a href='".base_url()."reset-password?hash=.token' >Reset Password</a> </p>"
    . "<p>If You did not make this request kindly ignore!</p>"
    . "<P class='pj'><h2>Kind Regard: BrandMetrics</h2></p>"
    . "<style>"
    . ".pj{"
    . "color:green;"
    . "}"
    . "</style>"
    . "";
          //Load email library 
    $this->email->from($from_email, 'Club First'); 
    $this->email->to($to_email);
    $this->email->subject('Reset Password'); 
    $this->email->message($message); 

          //Send mail 
    return   $this->email->send();
  }

  public function setnewpassword() {
    $data['token'] = $_GET['reset_token'] ;
    $row = $this->User_model->find_user_by_token($_GET['reset_token']);
    $data['item'] = $this->User_model->find_row($row[0]['id']);
    $this->load->view('users/set_new_password',$data);
  }

  public function updatenewpassword(){
    $userData = $this->User_model->find_user_by_token($_GET['reset_token']);

    $this->form_validation->set_rules('npassword', 'New Password', 'required');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
    if ($this->form_validation->run() == true)
    {
      $n_pass= $this->security->xss_clean($this->input->post('npassword'));
      $c_pass= $this->security->xss_clean($this->input->post('cpassword'));

      if ($n_pass == $c_pass ) {
        $data = array ();
        $data['encrypted_password'] = md5($this->security->xss_clean($this->input->post('cpassword')));
        $data['reset_password_token'] = '';
        $this->User_model->update($data, $userData[0]['id']);
        $this->session->set_flashdata('success', 'Password Updated successfully');
        redirect(base_url('login'));
      }
    }
    else{
      $this->session->set_flashdata('failure', 'New Password and Confirm Not Matched!');
      redirect(base_url('login/setnewpassword'));
    }
  }
}
