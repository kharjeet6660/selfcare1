<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcements extends Application_Controller {

	function __construct() {
		parent::__construct();
		$this->logged_in();
		$this->admin_only();
		$this->load->model('Announcements_model');
		$this->load->model('UserProfile_model');
		
	}
	public function index() {
		$data['announcements']= $this->Announcements_model->index();
		$this->load->view('admin/announcements/index',$data);
	}
	public function new(){
		$this->load->view('admin/announcements/add');
	}
	public function create(){
		$this->form_validation->set_rules('startdate', 'StartDate', 'required');
		$this->form_validation->set_rules('enddate', 'EndDate', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('failure', 'Record not added in database');
			$this->load->view('admin/announcements/add');
		}
		else
		{

			$data = array();
			$data['start_date'] = $this->security->xss_clean($this->input->post('startdate'));
			$data['end_date'] = $this->security->xss_clean($this->input->post('enddate'));
			$data['title'] = $this->security->xss_clean($this->input->post('title'));
			$data['description'] = $this->security->xss_clean($this->input->post('description'));
			$data['status'] = 'valid';
			$data['creator_id'] = current_user()->id;

			$this->Announcements_model->create($data);
			$this->session->set_flashdata('success', 'Record added successfully');
			redirect(base_url('admin/announcements'));
		}
	}

	public function edit($Id) {
		$announcements = $this->Announcements_model->get($Id);
		$data['announcements'] = $announcements;
		$this->load->view('admin/announcements/edit', $data);
	}
	public function update($Id){
		$announcements = $this->Announcements_model->get($Id);
		$data['announcements'] = $announcements;
		$this->form_validation->set_rules('startdate', 'StartDate', 'required');
		$this->form_validation->set_rules('enddate', 'EndDate', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == false)
		{

			$this->session->set_flashdata('failure', 'Record not found in Database !');
			redirect(base_url('admin/announcements/edit'));
		}
		else
		{
			$start_date = $this->security->xss_clean($this->input->post('startdate'));
			$end_date = $this->security->xss_clean($this->input->post('enddate'));
			if ( $start_date <= date('Y-m-d') && $end_date > date('Y-m-d') ) {

			$data = array();
			$data['start_date'] = $this->security->xss_clean($this->input->post('startdate'));
			$data['end_date'] = $this->security->xss_clean($this->input->post('enddate'));
			$data['title'] = $this->security->xss_clean($this->input->post('title'));
			$data['description'] = $this->security->xss_clean($this->input->post('description'));

			$this->Announcements_model->update($Id, $data);
			$this->session->set_flashdata('success', 'Record Updated successfully');
			redirect(base_url('admin/announcements'));
		}
		$this->session->set_flashdata('failure', 'Start date must be less or equal than today and end date must be greater than today');
			redirect(base_url('admin/announcements'));
		}
	}
	public function destroy($Id) {
		$announcements = $this->Announcements_model->get($Id);
		if (empty($announcements))
		{
			$this->session->set_flashdata('failure', 'Record not found in Database !');
			redirect(base_url('admin/announcements'));
		}
		$this->Announcements_model->delete($Id);
		$this->session->set_flashdata('success', 'Record deleted successfully !');
		redirect(base_url('admin/announcements'));
	}
}
