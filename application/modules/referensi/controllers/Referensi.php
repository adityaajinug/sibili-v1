<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Referensi_model', 'referensi');
  }
  public function file()
  {
    $data = [
      'title' => 'File Proyek Akhir',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
    ];
    $this->template->load('templates/templates', 'file_pa/index', $data);
  }
  public function file_detail()
  {
    $data = [
      'title' => 'File Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
    ];
    $this->template->load('templates/templates', 'file_pa/detail', $data);
  }
  public function laporan()
  {
    $data = [
      'title' => 'File Laporan',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
      'th' => $this->referensi->getAjaran(),
      'laporan' => $this->referensi->getUpload()
    ];
    $this->template->load('templates/templates', 'laporan/index', $data);
  }
  public function detail_laporan($id)
  {
    $data = [
      'title' => 'File Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
      'all' => $this->referensi->getDetailLap($id),
    ];
    $this->template->load('templates/templates', 'laporan/detail', $data);
  }
  public function industri()
  {
    $data = [
      'title' => 'Data Industri',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
      'industri' => $this->referensi->getIndustri()
    ];
    $this->template->load('templates/templates', 'data-industri/index', $data);
  }
}
