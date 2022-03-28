<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_import_data extends Application_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->admin_only();
        $this->load->model('excel_import_model');
        $this->load->library('excel');

    }
    public function new()
    {
        $this->load->view('admin/payroll/excel_import');
    }
    public function import()
    {

        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
            if ($ext == 'xlsx' || $ext == 'xls') {
             foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $employee_id  = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $working_days = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $basic  = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $hra = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $conveyance  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $special_allowance = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $bonus  = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $advance = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $lta  = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $total_earnings = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $tds  = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $professional_tax = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $epf  = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $other_deductions = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $loan  = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $total_deductions = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $net_salary  = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $naration1 = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $naration2  = $worksheet->getCellByColumnAndRow(18, $row)->getValue();

                    $time = strtotime($this->security->xss_clean($this->input->post('Payroll_month')));
                    $final =date("Y-m-1",  $time);

                    $data[] = array(
                        'employee_id' => $employee_id,
                        'payroll_month' => $final,
                        'working_days' => $working_days,
                        'basic' => $basic,
                        'hra' => $hra,
                        'conveyance' => $conveyance,
                        'special_allowance' => $special_allowance,
                        'bonus' => $bonus,
                        'advance' => $advance,
                        'lta' => $lta,
                        'total_earnings' => $total_earnings,
                        'tds' => $tds,
                        'professional_tax' => $professional_tax,
                        'epf' => $epf,
                        'other_deductions' => $other_deductions,
                        'loan' => $loan,
                        'total_deductions' => $total_deductions,
                        'net_salary' => $net_salary,
                        'naration1' => $naration1,
                        'naration2' => $naration2,
                        'status' => 1,

                    );
                }
            }
            $this->excel_import_model->insert($data);
            $this->session->set_flashdata('success', 'Data Inserted Successfully !');
            redirect(base_url('admin/payroll'));
        }else{
            $this->session->set_flashdata('failure', 'Only .xlsx and .xls files accepted!');
            redirect(base_url('admin/excel_import_data'));
        }

    }
}

}