<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_guide extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sertifikasi_model', 'sertifikasi');
  }
  public function index()
  {
    $data = [
      'title' => 'User Guide',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'upload_form' => $this->sertifikasi->getFormUpload(),
      'upload' => $this->sertifikasi->getUpload(),
    ];
    $this->template->load('templates/templates', 'user-guide/index', $data);
  }
  public function tambah_user_guide()
  {
    $config['upload_path']   = FCPATH . './assets/file/user_guide/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);

    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'file' => $file['file_name'],
      'user_id' => $this->input->post('user_id'),
      'category_upload' => 4
    ];
    $this->db->insert('upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Terkirim!</div>');
    redirect('sertifikasi/user_guide');
  }
}
