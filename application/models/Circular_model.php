<?php 
class Circular_model extends Application_Model{
	public $_table_name = 'circulars';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}

	function index($limit,$offset){ 
		$this->db->limit($limit,$offset);
		$this->db->where('status',1);
		return $this->db->get('circulars')->result_array();
	}

}
?>