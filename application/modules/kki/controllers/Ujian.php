<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function index()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      // 'upload_form' => $this->kki->getFormUpload(),
      // 'upload' => $this->kki->getUpload(),
    ];
    $this->template->load('templates/templates', 'ujian/index', $data);
  }
  public function kki_pertama()
  {
    $data = [
      'title' => 'Ujian KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      // 'upload_form' => $this->kki->getFormUpload(),
      // 'upload' => $this->kki->getUpload(),
    ];
    $this->template->load('templates/templates', 'ujian/kki_pertama/index', $data);
  }
  public function tambah_ujian()
  {
    $config['upload_path']   = FCPATH . './assets/file/laporan/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);

    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'file' => $file['file_name'],
      'user_id' => $this->input->post('user_id'),
      'category_upload' => $this->input->post('category_upload'),
      'tahun' => $this->input->post('th'),
    ];
    $this->db->insert('upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Terkirim!</div>');
    redirect('kki/ujian/kki_pertama');
  }
}
