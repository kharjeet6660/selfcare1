<?php 
class Bankdirectory_model extends Application_Model{
	public $_table_name = 'bank_directory';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}

	function index($limit,$offset){ 
		$this->db->limit($limit,$offset);
		return $this->db->get('bank_directory')->result_array();
	}
}
?>