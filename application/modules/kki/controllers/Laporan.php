<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function index()
  {
    $data = [
      'kki' => 'Kuliah Kerja Industri',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),


    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/index', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/index', $data);
    }
  }

  public function detail()
  {
    // $id = $this->uri->segment(4);
    // $group = $this->uri->segment(5);
    $data = [
      'kki' => 'Kuliah Kerja Industri / Bab',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'bab' => $this->kki->getBab(),
      'param' => $this->kki->paramBab1(),
      'param2' => $this->kki->paramBab2(),

    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/detail', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/detail', $data);
    }
  }


  public function detail_bab()
  {
    $id = $this->uri->segment(4);
    $group = $this->uri->segment(5);
    $data = [
      'kki' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'detailbab' => $this->kki->getBabDetail($id),
      'user_chat' => $this->kki->getUserChat($id),
      'laporan' => $this->kki->getLaporan($id, $group),

    ];




    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/chat', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/data_bab', $data);
    }
  }
  public function update_status()
  {
    $id = $this->session->userdata('username');
    $time = time() + 10;

    $this->db->set('status', $time);
    $this->db->where('username', $id);
    $this->db->update('user');
  }
  // public function get_status($id)
  // {
  //   $id = $this->session->userdata('username');
  //   $time = time();
  //   $html = '';
  //   $user =  $this->kki->onlineUser($id)->result_array();
  //   // return $user;

  //   $status = 'Offline';
  //   $class = 'circle-offline';

  //   if ($user['status'] > $time) {
  //     $status = 'Online';
  //     $class = "circle-online";
  //   }
  //   $html .= '<li class="name">' . $user['dosen_name'] . '</li>
  //   <li class=' . $class . '></li>
  //   <li class="status">' . $status . '</li>';

  //   echo $html;
  // }

  public function input_chat()
  {

    if ($this->session->userdata('username')) {
    }
  }
}
