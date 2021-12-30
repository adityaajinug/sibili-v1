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
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
    ];
    $this->template->load('templates/templates', 'file_pa/index', $data);
  }
  public function file_detail()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
    ];
    $this->template->load('templates/templates', 'file_pa/detail', $data);
  }
  public function video()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
    ];
    $this->template->load('templates/templates', 'video/index', $data);
  }
  public function industri()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->referensi->getDosen(),
      'mhs' => $this->referensi->getMhs(),
      'industri' => $this->referensi->getIndustri()
    ];
    $this->template->load('templates/templates', 'data-industri/index', $data);
  }
}
