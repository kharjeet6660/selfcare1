<?php 
class Coviddata_model extends Application_Model{
	public $_table_name = 'covid_done';
	public $id;

	public function __construct() {
		parent::__construct();
		$this->load->model('Application_Model');
	}
	function index($limit,$offset) {
		$this->db->limit($limit,$offset);
		return $covid_data = $this->db->get('covid_done')->result_array();
	}
}
