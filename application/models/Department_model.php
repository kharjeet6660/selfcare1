<?php 
class Department_model extends Application_Model{
	public $_table_name = 'departments'; 

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}

	function index($limit,$offset){ 
		$this->db->limit($limit,$offset);
		$this->db->where('active',1);
		return $this->db->get('departments')->result_array();
	}

	function get(){
		$this->db->where('active',1);
		return $this->db->get('departments')->result_array();
	}
	function find_by_name($name) {
		$this->db->where('name',$name);
		return $this->db->get('departments')->row_array();
	}
}
?>