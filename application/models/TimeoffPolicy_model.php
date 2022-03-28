<?php 
class TimeOffPolicy_model extends Application_model{
  public $_table_name = 'timeoff_policies';
// Sick Leave
// Vacation Leave
// Personal Leave
// Optional Leave 
// Compensation Leave
// Military Leave
// Paternity Leave
// Maternity Leave
// Earned Leave
// Sabbatical Leave
// Study Leave
// Bereavement Leave
  public function __construct() {
    parent::__construct();
    $this->load->model('Application_model');
  }

  public function index(){
    return $this->db->get('timeoff_policies')->result_array();
  }
  public function consumed($userid){
    $this->db
      ->select('p.id, p.name, p.count, COALESCE(sum(t.total_days), 0) as taken')
      ->join('timeoffs t', 't.policy_id= p.id', 'left')
      ->where('t.user_id', $userid)
      ->or_where('t.user_id', NULL)
      ->group_by('p.id, p.name, p.count');
    return $this->db->get('timeoff_policies p')->result_array();
  }
}