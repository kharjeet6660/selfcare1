<?php 
class Document_model extends Application_Model{
  public $_table_name = 'documents';

  public function __construct() {
    parent::__construct();
    $this->load->model('Application_Model');
  }
  function current_user_payslips($limit,$offset) {
    $this->db->where('creator_id', current_user()->id);

    $this->db->where('document_type', 'PaySlip');
    $this->db->order_by('created_at', 'desc');

    $this->db->limit($limit,$offset);
    return $payslip = $this->db->get('documents')->result('Document_model');
    
  }
}
