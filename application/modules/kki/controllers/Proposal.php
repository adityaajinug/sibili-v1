<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function index()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs()
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/index', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/index', $data);
    }
  }
}
