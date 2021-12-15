<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KKI extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function koordinator()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/index', $data);
  }
  public function dosen_pembimbing()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompok(),
      'detailKelompok' => $this->kki->getDetailKelompok()
    ];
    $this->template->load('templates/templates', 'koordinator/dosen_pembimbing/index', $data);
  }
  public function tambah_dosen_pembimbing()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/dosen_pembimbing/tambah', $data);
  }
}
