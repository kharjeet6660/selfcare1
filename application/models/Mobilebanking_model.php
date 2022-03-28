<?php 
class Mobilebanking_model extends Application_Model{
	public $_table_name = 'mobile_banking_request';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}
	function index($limit,$offset) {
		$this->db->select('m.*, b.name AS branch_name');
		$this->db->limit($limit,$offset);
		$this->db->join('branches as b', 'm.branch_id = b.id', 'left');
		return $mobilebanking = $this->db->get('mobile_banking_request as m')->result_array();
	}
	function getbranch() {
		return $branches = $this->db->get('branches')->result_array();
	}
}
