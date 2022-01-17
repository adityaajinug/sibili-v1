<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sertifikasi_model', 'sertifikasi');
  }
  public function index()
  {
    $data = [
      'title' => 'Sertifikasi KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'upload_form' => $this->sertifikasi->getFormUpload(),
      'upload' => $this->sertifikasi->getUpload(),
    ];
    $this->template->load('templates/templates', 'ujian/index', $data);
  }
  public function sertifikasi_pertama()
  {
    $data = [
      'title' => 'Sertifikasi sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'upload_form' => $this->sertifikasi->getFormUpload(),
      'upload' => $this->sertifikasi->getUpload(),
    ];
    $this->template->load('templates/templates', 'ujian/sertifikasi_pertama/index', $data);
  }
}
