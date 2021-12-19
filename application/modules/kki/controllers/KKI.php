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
  public function kelompok()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompok(),
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/index', $data);
  }
  public function detail_kelompok($id)
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompokId($id),
      'detail'  => $this->kki->getDetailKelompok($id)
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/detail', $data);
  }
  public function tambah_kelompok()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/tambah', $data);
  }
}
