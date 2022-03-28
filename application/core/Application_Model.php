<?php
class Application_Model extends CI_Model
{
  protected $_table_name = '';
  protected $_primary_key = 'id';
  protected $_primary_filter = 'intval';
  protected $_order_by = '';
  public $rules = array();
  protected $_timestamps = true;

  function __construct()
  {
    parent::__construct();
  }

  public function array_post($fields)
  {
    $data = array();
    foreach ($fields as $field)
    {
      $data[$field] = $this->input->post($field);
    }
    return $data;
  }

  public function find($id = NULL)
  {
    $this->db->where($this->_primary_key, $id);
    return $this->db->get($this->_table_name)->row();
  }

  public function all()
  {
    return $this->db->get($this->_table_name)->row_array();
  }

  public function create($data)
  {
    if($this->_timestamps) {
      is_array($data) ? $data['created_at'] = date('Y-m-d H:i:s') : $data->created_at = date('Y-m-d H:i:s');
      is_array($data) ? $data['updated_at'] = date('Y-m-d H:i:s') : $data->updated_at = date('Y-m-d H:i:s');
    }
    !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
    $this->db->set($data);
    $this->db->insert($this->_table_name);
    return $this->db->insert_id();
  }
  public function update($data, $id)
  {
    if($this->_timestamps) {
      is_array($data) ? $data['updated_at'] = date('Y-m-d H:i:s') : $data->updated_at = date('Y-m-d H:i:s');
    }
    $this->db->set($data);
    $this->db->where($this->_primary_key, $id);
    $this->db->update($this->_table_name);
    return $id;
  }

  public function delete($id)
  {
    $this->db->where($this->_primary_key, $id);
    $this->db->limit(1);
    $this->db->delete($this->_table_name);
  }

  function total_rows(){
    return $this->db->get($this->_table_name)->num_rows();
  }

}

