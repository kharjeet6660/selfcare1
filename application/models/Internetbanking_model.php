<?php 
class Internetbanking_model extends Application_Model{
	public $_table_name = 'internet_banking_request';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}
	function index($limit,$offset) {
		$this->db->select('i.*, b.name AS branch_name');
		$this->db->limit($limit,$offset);
		$this->db->join('branches as b', 'i.branch_id = b.id', 'left');
		return $internetbanking = $this->db->get('internet_banking_request as i')->result_array();
	}
	function getbranch() {
		return $branches = $this->db->get('branches')->result_array();
	}
}
