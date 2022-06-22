<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    is_logged_in();
  }
  public function index()
  {
    $data = [
      'title' => 'Data Dosen',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->admin->getAllDosen()
    ];
    $this->template->load('templates/templates', 'dosen/index', $data);
  }
  public function tambah_dosen()
  {
    $npp = $this->input->post('username');
    $result = preg_replace("/[^0-9]/", "", $npp);
    $tahun = substr($result, 6, 3);
    $akhir = substr($result, 9, 4);
    $default = 'DTI';
    $pass = $default . '-' . +$tahun . $akhir;
    // var_dump($pass);
    $data = [
      'title' => 'Tambah Data Dosen',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'role' => $this->admin->getRoleDosen()
    ];
    $this->form_validation->set_rules('username', 'NPP', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templates/templates', 'dosen/tambah', $data);
    } else {
      $data = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($pass, PASSWORD_DEFAULT),
        'role_id' => htmlspecialchars($this->input->post('role_id', true)),
        'image' => htmlspecialchars($this->input->post('image', true)),
        'status' => htmlspecialchars($this->input->post('status', true)),
      ];
      $this->db->insert('user', $data);

      $user_id = $this->db->insert_id();

      $data_dosen = [
        'dosen_name' => htmlspecialchars($this->input->post('dosen_name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'status_penguji' => htmlspecialchars($this->input->post('status_penguji', true)),
        'user_id' => htmlspecialchars($user_id, true),
      ];
      $this->db->insert('dosen', $data_dosen);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan!</div>');
      redirect('admin/dosen');
    }
  }
}
