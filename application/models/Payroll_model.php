<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends Application_Model{
    public $_table_name = 'payroll';
    function __construct() {
        // Set table name
        $this->table = 'payroll';
        $this->load->model('Application_Model');
    }
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('id', 'desc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }
    public function updateStatus($data, $Id){
        $this->db->where('id',$Id);
        $this->db->update('payroll',$data);
    }

   function month_wise_payslip($employee_id,$month) {
    $this->db->where('employee_id', $employee_id);
    $this->db->where('payroll_month', date('y-m-01',strtotime($month)));
    $payslip = $this->db->get('payroll')->result_array();
    
    if ($payslip == NULL) {
        $payslip = Array
        (
            (0) => Array
            (
                'working_days' => '',
                'basic' => '',
                'hra'=>  '',
                'conveyance' => '',
                'special_allowance' => '',
                'bonus' => '',
                'advance'=>  '',
                'lta' => '',
                'total_earnings'=>  '',
                'tds' => '',
                'professional_tax'=>  '',
                'epf'=>  '',
                'other_deductions' => '',
                'loan' => '',
                'total_deductions'=>  '',
                'net_salary'=>  '',
                'naration1' => '',
                'naration2' => '',
            ),
        );
    }
    return $payslip ;
}
}