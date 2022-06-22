<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Informasi_model', 'info');
  }
  public function info()
  {
    $data = [
      'title' => 'Kuliah Kerja Industri',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->info->getDosen(),
      'mhs' => $this->info->getMhs(),
      'announce' => $this->info->getAnnouncement(),
      'form' => $this->info->getForm(),
      'semester' => $this->info->getSemester()


    ];

    $this->template->load('templates/templates', 'info/index', $data);
  }
}
