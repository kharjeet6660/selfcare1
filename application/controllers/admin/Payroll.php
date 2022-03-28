<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll extends Application_Controller {

	function __construct() {
		parent::__construct();
		$this->logged_in();
		$this->admin_only();

        // Load Payroll model
		$this->load->model('Payroll_model');
	}

    public function index(){

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/payroll/index');
        $config['total_rows'] = $this->Payroll_model->total_rows();
        $config['per_page'] = 10;
        $config['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = 'Next &gt;';
        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';

        $this->pagination->initialize($config);
        $paginate = array(
            'per_page' => $config['per_page'],
            'page' => $config['page'],
            
        );
        $data['payroll'] = $this->Payroll_model->getRows($paginate);
        $this->load->view('admin/payroll/index', $data);
    }
    public function edit($Id) {
        $data['payroll'] = $this->Payroll_model->find($Id);
        $this->load->view('admin/payroll/edit', $data);
    }
    public function update($Id) {
        $data['payroll'] = $this->Payroll_model->find($Id);

        $this->form_validation->set_rules('working_days', 'working_days', 'required');
        $this->form_validation->set_rules('basic', 'basic', 'required');
        $this->form_validation->set_rules('hra', 'hra', 'required');
        $this->form_validation->set_rules('conveyance', 'conveyance', 'required');
        $this->form_validation->set_rules('special_allowance', 'special_allowance', 'required');
        $this->form_validation->set_rules('bonus', 'bonus', 'required');
        $this->form_validation->set_rules('advance', 'advance', 'required');

        $this->form_validation->set_rules('lta', 'lta', 'required');
        $this->form_validation->set_rules('total_earnings', 'total_earnings', 'required');
        $this->form_validation->set_rules('tds', 'tds', 'required');
        $this->form_validation->set_rules('professional_tax', 'professional_tax', 'required');
        $this->form_validation->set_rules('epf', 'epf', 'required');

        $this->form_validation->set_rules('other_deductions', 'other_deductions', 'required');
        $this->form_validation->set_rules('loan', 'loan', 'required');
        $this->form_validation->set_rules('total_deductions', 'total_deductions', 'required');
        $this->form_validation->set_rules('net_salary', 'net_salary', 'required');
        $this->form_validation->set_rules('naration1', 'naration1', 'required');
        $this->form_validation->set_rules('naration2', 'naration2', 'required');

        if ($this->form_validation->run() == true)

        {
           $data = array();
           $data['working_days'] = $this->security->xss_clean($this->input->post('working_days'));
           $data['basic'] = $this->security->xss_clean($this->input->post('basic'));
           $data['hra'] = $this->security->xss_clean($this->input->post('hra'));
           $data['conveyance'] = $this->security->xss_clean($this->input->post('conveyance'));
           $data['special_allowance'] = $this->security->xss_clean($this->input->post('special_allowance'));
           $data['bonus'] = $this->security->xss_clean($this->input->post('bonus'));
           $data['advance'] = $this->security->xss_clean($this->input->post('advance'));

           $data['lta'] = $this->security->xss_clean($this->input->post('lta'));
           $data['total_earnings'] = $this->security->xss_clean($this->input->post('total_earnings'));
           $data['tds'] = $this->security->xss_clean($this->input->post('tds'));
           $data['professional_tax'] = $this->security->xss_clean($this->input->post('professional_tax'));
           $data['epf'] = $this->security->xss_clean($this->input->post('epf'));

           $data['other_deductions'] = $this->security->xss_clean($this->input->post('other_deductions'));
           $data['loan'] = $this->security->xss_clean($this->input->post('loan'));
           $data['total_deductions'] = $this->security->xss_clean($this->input->post('total_deductions'));
           $data['net_salary'] = $this->security->xss_clean($this->input->post('net_salary'));
           $data['naration1'] = $this->security->xss_clean($this->input->post('naration1'));
           $data['naration2'] = $this->security->xss_clean($this->input->post('naration2'));


           $this->Payroll_model->update($data,$Id);
           $this->session->set_flashdata('success', 'Record Updated successfully');

           redirect(base_url('admin/payroll')); 
       }
       else
       {
        $this->session->set_flashdata('failure', 'Record Not Updated !');
        $this->load->view('admin/payroll/edit',$data);
    } 
}
public function destroy($Id) {
  $item = $this->Payroll_model->find($Id);
  $action = $item->status ;
  if ($item) {
     $status = ($action == 1) ? '0' : '1';
     $data['status'] = $status ;
     $this->Payroll_model->updateStatus($data, $Id);
     $this->session->set_flashdata('success', 'Record Updated Successfully !');
 }
 redirect(base_url('admin/payroll'));
}

}