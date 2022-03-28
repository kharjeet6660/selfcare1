<?php 
class Location_model extends Application_Model{
	public $_table_name = 'locations';

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}

	function index($limit,$offset){ 
		$this->db->limit($limit,$offset);
		$this->db->where('active',1);
		return $this->db->get('locations')->result_array();
	}
	function get(){
		$this->db->where('active',1);
		return $this->db->get('locations')->result_array();
	}
	function find_by_city($city) {
		$this->db->where('city', $city);
		return $this->db->get('locations')->row_array();
	}
}
?>