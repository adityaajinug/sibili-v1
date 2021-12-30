<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sertifikasi_model', 'sertifikasi');
  }
  public function koordinator()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/index', $data);
  }
}
