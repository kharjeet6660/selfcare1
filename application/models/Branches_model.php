<?php 
class Branches_model extends Application_Model{
	public $_table_name = 'branches';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}
	function index($limit,$offset) {
		$this->db->limit($limit,$offset);
		return $branches = $this->db->get('branches')->result_array();
	}
}
