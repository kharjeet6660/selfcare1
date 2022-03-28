<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeOff extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Holiday_model');
    $this->load->model('TimeOff_model');
    $this->load->model('UserProfile_model');
    $this->load->model('TimeOffPolicy_model');
  }

  public function annual_holidays()
  {
    $data['holidays'] = $this->Holiday_model->index();
    $this->load->view('timeoff/annual_holidays', $data);
  }

  public function index()
  {
    $data['holidays'] = $this->Holiday_model->index();
    $data['timeoffs'] = $this->TimeOffPolicy_model->consumed(current_user()->id);
    $data['user_timeoffs'] = $this->TimeOff_model->index(current_user()->id);
    $this->load->view('timeoff/index', $data);
  }

  public function new()
  {
    $data['holidays'] = $this->Holiday_model->index();
    $data['policies'] = $this->TimeOffPolicy_model->index();
    $data['user_timeoffs'] = $this->TimeOff_model->user_timeoffs_summary(current_user()->id);
    $this->load->view('timeoff/new', $data);
  }

  public function create()
  {
    $this->form_validation->set_rules('start_date','start_date','required');
    $this->form_validation->set_rules('end_date','end_date','required');
    $this->form_validation->set_rules('policy_id','policy_id','required');
    if ($this->form_validation->run() == true) {
      ## TODO Calcuate no fo workind days between start day and end day and remove Sun/Saturday or any holiday
      $start = new DateTime($this->input->post('start_date'));
      $end = new DateTime($this->input->post('end_date'));
      $end->modify('+1 day');

      $total_days = $end->diff($start)->days;
      $period = new DatePeriod($start, new DateInterval('P1D'), $end);

      $annual_holidays = array('2022-09-07');

      foreach($period as $dt) {
        $curr = $dt->format('D');

        ## Rules to Calculate total leave days
        if ($curr == 'Sat' || $curr == 'Sun'){$days--;}
        ## Increase Saturday as holiday if considered as weekend
        elseif ($curr == 'Sat' && true){$days--;}
        elseif (in_array($dt->format('Y-m-d'), $annual_holidays)) { $days--; }
      }

      $data = [
        'start_date' => $this->security->xss_clean($this->input->post('start_date')),
        'end_date'   => $this->security->xss_clean($this->input->post('end_date')),
        'policy_id'  => $this->security->xss_clean($this->input->post('policy_id')),
        'reason'     => $this->security->xss_clean($this->input->post('reason')),
        'user_id'    => current_user()->id,
        'manager_id' => current_user()->id,
        'total_days' => $total_days,
        'status'     => 'approve'
      ];
      $id = $this->TimeOff_model->create($data);

      if($id) {
        redirect(base_url('/timeoff'));
      } else {
        ## Errors
        // echo validation_errors();
        redirect(base_url('/timeoff/request'));
      }
    redirect(base_url('/timeoff'));
    }
    else {
      echo 'form_validaiton false';      
    }
  }

  public function cancel($Id){
    $timeoff = $this->TimeOff_model->find($Id);
    if ($timeoff && $timeoff->user_id == current_user()->id) {
      ## && $timeoff->start_date <= current_date;
      $data['status'] = 'cancel';
      $this->TimeOff_model->update($data, $Id);
    }
    redirect(base_url('timeoff'));

  }
}