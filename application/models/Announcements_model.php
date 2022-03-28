<?php 
class Announcements_model extends Application_Model{

	function index()
	{ $this->db->where('status','valid');
	return $announcements = $this->db->get('announcements')->result_array();
}
function create($data)
{ 
	$this->db->insert('announcements',$data);
}
function get($Id)
{
	$this->db->where('id',$Id);
	$this->db->where('status','valid');
	return $announcements = $this->db->get('announcements')->row_array();
}
function update($Id,$data)
{
	$this->db->where('id',$Id);
	$this->db->update('announcements',$data);
}
function delete($Id)
{
	$data = array();
	$data['status'] = 'deleted';
	$this->db->where('id',$Id);
	$this->db->update('announcements',$data);
}
}
?>