<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Ujian_model', 'ujian');
  }
  public function index()
  {
    $data = [
      'title' => 'Submission / Ujian / Laporan',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->ujian->getDosen(),
      'mhs' => $this->ujian->getMhs(),
      // 'semester' => $this->ujian->getSemester()

    ];
    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'ujian/mahasiswa/laporan/index', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'ujian/dosen/laporan/index', $data);
    } else if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'ujian/dosen/laporan/index', $data);
    } else if ($this->session->userdata('role_id') == 5) {
      $this->template->load('templates/templates', 'ujian/dosen/laporan/index', $data);
    } else if ($this->session->userdata('role_id') == 6) {
      $this->template->load('templates/templates', 'ujian/dosen/index', $data);
    } else {
      redirect('blocked');
    }
  }
}
