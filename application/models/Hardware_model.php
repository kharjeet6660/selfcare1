<?php 
class Hardware_model extends Application_Model {
  public $_table_name = 'hardware';

  function index ($limit,$offset){
    $this->db->select('*,h.id');
    $this->db->join('hardware_assign ha', 'ha.hardware_id=h.id','left' );
    $this->db->join('users u', 'u.id=ha.assigned_to','left');
    $this->db->where('h.aasm_state', 'assign');
    $this->db->or_where_in('h.aasm_state', 'in-stock');
    return $hardware = $this->db->get('hardware h')->result_array();
  }
  function allowted_to($Id,$limit,$offset) {
    $this->db->where('u.id',$Id);
    $this->db->from('hardware as h');
    $this->db->join('hardware_assign as ha', 'ha.hardware_id = h.id', 'left');
    $this->db->join('users as u', 'u.id = ha.assigned_to', 'left');
    $this->db->limit($limit,$offset);
    return $this->db->get()->result_array();
  }
}
?>