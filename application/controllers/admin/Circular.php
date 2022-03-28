<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Circular extends Application_Controller {

  function __construct() {
    parent::__construct();
    $this->logged_in();
    $this->admin_only();
    $this->load->model('Circular_model');
    $this->load->helper('download');
  }
  public function index() {
    $config['base_url'] = base_url('admin/circular/index');
    $config['total_rows'] = $this->Circular_model->total_rows();
    $config['per_page'] = 10;
    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

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
    $data['circular'] = $this->Circular_model->index($config['per_page'],$data['page']);

    $this->load->view('admin/circular/index', $data);
  }
  public function new () {
    $this->load->view('admin/circular/add');
  }
  public function create() {
    $config = ['upload_path' => './upload/', 'allowed_types' => 'pdf', 'encrypt_name' => true, ];

    $this->load->library('upload', $config);

    $this->form_validation->set_rules('department', 'Department', 'required');
    $this->form_validation->set_rules('title', 'Tiltle', 'required');

    if ($this->form_validation->run() == true && $this->upload->do_upload('pdf_file')) {

      $pdf_file = $this->upload->data('pdf_file');
      $file_name = $this->upload->data('file_name');

      $data = array();
      $data['department'] = $this->security->xss_clean($this->input->post('department'));
      $data['title'] = $this->security->xss_clean($this->input->post('title'));
      $data['file_path'] = 'upload/'.$file_name;

      $data['issue_date'] = date('Y-m-d H:i:s',now());
      $data['created_at'] = date('Y-m-d H:i:s',now());
      $data['creator_id'] = current_user()->id;

      $this->Circular_model->create($data);
      $this->session->set_flashdata('success', 'Record added successfully');
      redirect(base_url('admin/circular'));
    }
    else {
      $this->session->set_flashdata('failure', 'Record not added in databse');
      $upload_error = $this->upload->display_errors();
      $this->load->view('admin/circular/add', compact('upload_error'));
    }
  }
  public function edit($Id) {
    $circular = $this->Circular_model->find($Id);
    $data['circular'] = $circular;
    $this->load->view('admin/circular/edit', $data);
  }

  public function update($Id) {
   $circular = $this->Circular_model->find($Id);
   $data['circular'] = $circular;

   $this->form_validation->set_rules('title', 'TITLE', 'required');
   $this->form_validation->set_rules('department', 'Department', 'required');

   if ($this->form_validation->run() == true)
   {
     $data = array();
     $data['title'] = $this->security->xss_clean($this->input->post('title'));
     $data['department'] = $this->security->xss_clean($this->input->post('department'));
     $this->Circular_model->update($data,$Id);
     $this->session->set_flashdata('success', 'Record Updated successfully');

     redirect(base_url('admin/circular')); 
   }
   else
   {
    $this->session->set_flashdata('failure', 'Record Not Updated !');
    $this->load->view('admin/circular/edit', $data);
  } 
}

public function fileEdit($Id)
{
  $data['circular'] = $this->Circular_model->find($Id);
  $this->load->view('admin/circular/file_update',$data);
}
public function fileUpdate($Id)
{
  $data['circular'] = $this->Circular_model->find($Id);

  $config = ['upload_path' => './upload/', 'allowed_types' => 'pdf','encrypt_name'=>TRUE ];
  $this->load->library('upload', $config);

  $pdf_file = $this->upload->data('pdf_file');
  $file_name = $this->upload->data('file_name');

  if ($this->upload->do_upload('pdf_file')) 
  {

   $pdf_file = $this->upload->data('pdf_file');
   $file_name = $this->upload->data('file_name');
   $old_filename= $data['circular']->file_path;
   $file_path = array();
   $file_path['file_path'] = 'upload/'.$file_name;

   if (unlink($old_filename)) 
   {
     $this->session->set_flashdata('success', 'File Updated successfully !');
   }
   $this->Circular_model->update($file_path,$Id);
   $this->session->set_flashdata('success', 'File Updated successfully !');
   redirect(base_url('admin/circular/'.$data['circular']->id.'/edit'));
 }
 else
 {
   $this->session->set_flashdata('failure', 'Record not found in Database !');
   $data['upload_error'] = $this->upload->display_errors();
   $this->load->view('admin/circular/file_update',$data);
 }
}

public function download($Id) {
  if (!empty($Id)) {
    $fileInfo = $this->Circular_model->find($Id);
    $file = $fileInfo->file_path;
    force_download($file, null);
  }
}

public function destroy($Id) {

  $circular = $this->Circular_model->find($Id);
  if (empty($circular))
  {
    $this->session->set_flashdata('failure', 'Record not found in Database !');
    redirect(base_url('products'));
  }

  $path_to_file =$circular->file_path;
  if(unlink($path_to_file)) {
   echo 'Deleted successfully';
 }

 $this->Circular_model->delete($Id);
 $this->session->set_flashdata('success', 'Record deleted successfully !');
 redirect(base_url('admin/circular'));
}
}
