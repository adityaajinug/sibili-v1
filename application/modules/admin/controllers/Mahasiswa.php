<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
      'title' => 'Data Mahasiswa',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'mhs' => $this->admin->getAllMhs()
    ];
    $this->template->load('templates/templates', 'mahasiswa/index', $data);
  }
  public function tambah_mhs()
  {
    $nim = $this->input->post('username');
    $result = preg_replace("/[^0-9]/", "", $nim);
    $tahun = substr($result, 3, 4);
    $akhir = substr($result, 7, 4);
    $default = 'DTI';
    $pass = $default . '-' . +$tahun . $akhir;
    // var_dump($pass);
    $data = [
      'title' => 'Tambah Data Mahasiswa',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
    ];
    $this->form_validation->set_rules('username', 'NIM', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templates/templates', 'mahasiswa/tambah', $data);
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

      $data_mhs = [
        'mhs_name' => htmlspecialchars($this->input->post('mhs_name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'status_mhs' => htmlspecialchars($this->input->post('status_mhs', true)),
        'user_id' => htmlspecialchars($user_id, true),
      ];
      $this->db->insert('mahasiswa', $data_mhs);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan!</div>');
      redirect('admin/mahasiswa');
    }
  }
  public function update_all_year()
  {
    $year = $this->input->post('year_id');

    $this->db->set('year_id', $year);
    $this->db->update('mahasiswa');
    $this->db->where('id_mhs');
    redirect('admin/mahasiswa');
  }
}
