<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard_model', 'dashboard');
  }
  public function index()
  {
    // $id = $this->session->userdata('username');
    $id = $this->uri->segment(2);
    $data = [
      'title' => 'Dashboard',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->dashboard->getDosen(),
      'mhs' => $this->dashboard->getMhs(),
      'mhs_bimbingan' => $this->dashboard->getMhsBimbingan($id)
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'dashboard_views/admin', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'dashboard_views/mhs', $data);
    } else {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    }
  }
}
