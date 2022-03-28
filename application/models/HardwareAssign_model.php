<?php 
class HardwareAssign_model extends Application_Model{
  public $_table_name = 'hardware_assign';

  function create($data)
  { 
    $this->db->insert('hardware_assign',$data);
  }
}
?>