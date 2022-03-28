<?php 
class Holiday_model extends Application_model{
  public $_table_name = 'holidays';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_model');
  }
  public function index() {
	$this->db->where('actual_date BETWEEN "'. date('y-m-d', strtotime("first day of this year")). '" and "'. date('y-m-d', strtotime("first day of next year")).'"');
  	return $this->db->get('holidays')->result_array('Holiday_model');
  }
}
