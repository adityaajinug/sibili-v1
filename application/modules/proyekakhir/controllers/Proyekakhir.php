<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyekakhir extends CI_Controller
{
  public function index()
  {
    $this->load->model('User_model', 'user');
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->user->getDosen(),
      'mhs' => $this->user->getMhs()
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'bimbingan/dosen', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'bimbingan/index', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'bimbingan/dosen', $data);
    }
  }
  public function absensi()
  {
    $this->load->model('User_model', 'user');
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->user->getDosen(),
      'mhs' => $this->user->getMhs()
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'absensi/absen_dosen', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'absensi/absen_mhs', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'absensi/absen_dosen', $data);
    }
  }
  public function koordinator()
  {
    $this->load->model('User_model', 'user');
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->user->getDosen(),
      'mhs' => $this->user->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/index', $data);
  }
}
