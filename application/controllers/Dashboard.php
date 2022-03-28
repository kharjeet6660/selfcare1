<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->load->model('Document_model');
    $this->load->model('Announcements_model');
    

    $this->load->model('Payroll_model');

  }

  public function index() {
    $this->db->where('status','valid');
    $this->db->where('start_date <=', date('Y-m-d'));
    $this->db->where('end_date >=', date('Y-m-d'));
    $announcements = $this->db->get('announcements')->result_array();
    $data['announcements']= $announcements;
    $this->load->view('dashboard/index',$data);
  }

  public function payslips() {

    $month = isset($_GET['month']) ? $_GET['month'].'-01' : date('y-m-01',strtotime("-30 days"));

    $data['payslip'] = $this->Payroll_model->month_wise_payslip(current_user()->employee_id,$month);
    $this->load->view('dashboard/payslips', $data);
  }
  function payslip_pdf($Id)
  {
    $month = $this->input->post('month') ? $this->input->post('month').'-01' : date('y-m-01',strtotime("-30 days"));
    $payslip_data = $this->Payroll_model->month_wise_payslip(current_user()->employee_id,$month);


    $this->load->library('Pdf');
    $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $obj_pdf->SetTitle('payslip-'.$month.'.pdf');
    $obj_pdf->SetTopMargin(10);
    $obj_pdf->setFooterMargin(10);
    $obj_pdf->SetAutoPageBreak(true);
    $obj_pdf->SetAuthor('Author');
    $obj_pdf->SetDisplayMode('real', 'default');
    $obj_pdf->Write(5, 'CodeIgniter TCPDF Integration');
    $obj_pdf->AddPage();
    $content='';
    $content.= '
    <h1 style="text-align: center;">BRAND METRICS FINTECH PAYROLL SLIP</h1>
    <h2>MONTH OF PAYROLL:'.date(' F, Y', strtotime($month)).'</h2>
    <h2 style="text-align: center;">EARNINGS</h2>
    <table cellspacing="0" cellpadding="10" border="1" style="border-color:gray;">
    <thead>
    <tr style="background-color:gray;color:white;">
    <th>Earnings</th>
    <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th scope="row">Basic</th>
    <td class="text-end">'.$payslip_data[0]['basic'].'</td>
    </tr>
    <tr>
    <th scope="row">HRA</th>
    <td class="text-end">'.$payslip_data[0]['hra'].'</td>
    </tr>
    <tr>
    <th scope="row">Conveyance</th>
    <td class="text-end">'.$payslip_data[0]['conveyance'].'</td>
    </tr>
    <tr>
    <th scope="row">Special Allowance</th>
    <td class="text-end">'.$payslip_data[0]['special_allowance'].'</td>
    </tr>
    <tr>
    <th scope="row">Bonus</th>
    <td class="text-end">'.$payslip_data[0]['bonus'].'</td>
    </tr>
    <tr>
    <th scope="row">Advance</th>
    <td class="text-end">'.$payslip_data[0]['advance'].'</td>
    </tr>
    <tr>
    <th scope="row">LTA</th>
    <td class="text-end">'.$payslip_data[0]['lta'].'</td>
    </tr>
    <tr>
    <th scope="row">Total Earnings</th>
    <td class="text-end">'.$payslip_data[0]['total_earnings'].'</td>
    </tr>
    </tbody>
    </table>
    <h2 style="text-align: center;">DEDUCTIONS</h2>
    <table cellspacing="0" cellpadding="10" border="1" style="border-color:gray;">
    <thead>
    <tr style="background-color:gray;color:white;">
    <th>Deductions</th>
    <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th scope="row">TDS</th>
    <td class="text-end">'.$payslip_data[0]['tds'].'</td>
    </tr>
    <tr>
    <th scope="row">Professional Tax</th>
    <td class="text-end">'.$payslip_data[0]['professional_tax'].'</td>
    </tr>
    <tr>
    <th scope="row">EPF</th>
    <td class="text-end">'.$payslip_data[0]['epf'].'</td>
    </tr>
    <tr>
    <th scope="row">Other Deductions</th>
    <td class="text-end">'.$payslip_data[0]['other_deductions'].'</td>
    </tr>
    <tr>
    <th scope="row">Loan</th>
    <td class="text-end">'.$payslip_data[0]['loan'].'</td>
    </tr>
    <tr>
    <th scope="row">Total Deductions</th>
    <td class="text-end">'.$payslip_data[0]['total_deductions'].'</td>
    </tr>
    </tbody>
    </table>

    ';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('payslip-'.$month.'.pdf', 'I');
  }

  public function download($Id) {
    if (!empty($Id)) {
      $fileInfo = $this->Document_model->find($Id);
      echo $file = 'download/'.$fileInfo->document_name;
      $fp= fopen($file, "r");
      header("Cache-Control: maxage=1");
      header("Pragma: public");
      header("Content-type: application/pdf");
      header("Content-Disposition: inline; filename=".$file->filename."");
      header("Content-Description: PHP Generated Data");
      header("Content-Transfer-Encoding: binary");
      header('Content-Length:' .filesize($file));
      ob_clean();
      flush();
      while (!feof($fp)){
        $buff = fread($fp,1024);
        print $buff;
      }
      exit;
    }
  }

  public function forms($year =NULL)
  {
    $data['forms'] = scandir('./upload/static/');
    $this->load->view('dashboard/forms', $data);
  }
}