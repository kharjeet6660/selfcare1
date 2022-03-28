<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_import_model extends Application_Model
{
   
    public function insert($data)
    {
        $this->db->insert_batch('payroll', $data);
    }

}