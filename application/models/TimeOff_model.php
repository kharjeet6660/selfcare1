<?php 
class TimeOff_model extends Application_model{
  public $_table_name = 'timeoffs';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_model');
  }

  public function index($userid) {
    return $this->db
      ->select('t.*, p.name, p.count')
      ->where('t.user_id',$userid)
      ->where("t.status not in ('cancel')")
      ->join('timeoff_policies p', 'p.id = t.policy_id', 'left')
      ->order_by('t.end_date desc')
      ->get('timeoffs t')->result_array();
  }
  public function user_timeoffs_summary($userid) {
    return $this->db
      ->select('p.id, p.name, p.count, sum(t.total_days) AS taken')
      ->where('user_id', $userid)
      // ->where_not_in('t.status', 'approved, rejected')
      ->group_by('p.id')
      ->join('timeoffs t', 'p.id = t.policy_id', 'left')
      ->get('timeoff_policies p')->result_array();
  }

  // public function request_for_review(){
  //   return $this->db
  //     ->where(array('manager_id' => current_user()->id))
  //     ->where_not_in('status', 'approved, rejected')
  //     ->order_by('start_date')
  //     ->get('timeoffs')->result_array();
  // }
}
