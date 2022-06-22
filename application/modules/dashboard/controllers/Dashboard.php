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
      'announce' => $this->dashboard->getAllAnnounce()
    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'dashboard_views/admin', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'dashboard_views/mhs', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'dashboard_views/kaprodi', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    } else if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    } else if ($this->session->userdata('role_id') == 5) {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    } else if ($this->session->userdata('role_id') == 6) {
      $this->template->load('templates/templates', 'dashboard_views/dosen', $data);
    } else {
      redirect('login/blocked');
    }
  }
}
