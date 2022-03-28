<?php 
class Atmcardservices_model extends Application_Model{
	public $_table_name = 'atmcard_services';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}
	function index($limit,$offset) {
		$this->db->select('a.*, b.name AS branch_name');
		$this->db->limit($limit,$offset);
		$this->db->join('branches as b', 'a.branch_id = b.id', 'left');
		return $atmcard_services = $this->db->get('atmcard_services as a')->result_array();
	}
	function getbranch() {
		return $branches = $this->db->get('branches')->result_array();
	}
}
