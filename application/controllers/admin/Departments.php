<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departments extends Application_Controller {

	function __construct() {
		parent::__construct();
		$this->logged_in();
		$this->admin_only();
		$this->load->model('Department_model');
	}
	public function index() {
		$this->load->library('pagination');

		$config['base_url'] = base_url('admin/departments/index');
		$config['total_rows'] = $this->Department_model->total_rows();
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
		$data['departments'] = $this->Department_model->index($config['per_page'],$config['page']);
		$this->load->view('admin/departments/index', $data);
	}
	public function new () {
		$this->load->view('admin/departments/add');
	}
	public function create() {
		$this->form_validation->set_rules('department', 'Department Name', 'required');

		if ($this->form_validation->run() == true) {

			$data = array();
			$data['name'] = $this->security->xss_clean($this->input->post('department'));
			$data['active'] = 1;



			$this->Department_model->create($data);
			$this->session->set_flashdata('success', 'Record added successfully');
			redirect(base_url('admin/departments'));
		}
		else {
			$this->session->set_flashdata('failure', 'Record not added in databse');
			$this->load->view('admin/departments/add');
		}
	}
	public function edit($Id) {
		$data['department'] = $this->Department_model->find($Id);

		$this->load->view('admin/departments/edit', $data);
	}

	public function update($Id) {
		$data['department'] = $this->Department_model->find($Id);

		$this->form_validation->set_rules('department', 'Department Name', 'required');

		if ($this->form_validation->run() == true)
		{
			$data = array();
			$data['name'] = $this->security->xss_clean($this->input->post('department'));
			$this->Department_model->update($data,$Id);
			$this->session->set_flashdata('success', 'Record Updated successfully');

			redirect(base_url('admin/departments')); 
		}
		else
		{
			$this->session->set_flashdata('failure', 'Record Not Updated !');
			$this->load->view('admin/departments/edit', $data);
		} 
	}
	public function destroy($Id) {
		$item = $this->Department_model->find($Id);
		$action = $item->active ;
		if ($item) {
			$status = ($action == 1) ? '0' : '1';
			$data['active'] = $status ;
			$this->Department_model->update($data, $Id);
			$this->session->set_flashdata('success', 'Record Updated Successfully !');
		}
		redirect(base_url('admin/departments'));
	}
}
