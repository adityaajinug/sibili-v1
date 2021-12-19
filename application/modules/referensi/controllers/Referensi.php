<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi extends CI_Controller
{
  public function file()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
    ];
    $this->template->load('templates/templates', 'file_pa/index', $data);
  }
  public function file_detail()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
    ];
    $this->template->load('templates/templates', 'file_pa/detail', $data);
  }
  public function video()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
    ];
    $this->template->load('templates/templates', 'video/index', $data);
  }
}
