<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model('User_model', 'user');
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->user->getDosen(),
      'mhs' => $this->user->getMhs()
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'dashboard_views/admin', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'dashboard_views/mhs', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    }
  }
}
