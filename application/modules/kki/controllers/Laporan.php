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
      'title' => 'Kuliah Kerja Industri',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),


    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/index', $data);
    } else {
      $this->template->load('templates/templates', 'laporan/dosen/index', $data);
    }
  }

  public function kki_pertama()
  {
    $data = [
      'title' => 'Kuliah Kerja Industri / Bab',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'allbabkki' => $this->kki->allBabKki(),
      'bab' => $this->kki->getBab(),
      'pembimbing' => $this->kki->pembimbingId(),
      'babDosen' => $this->kki->getBabDosen(),
      'allBabDosen' => $this->kki->getAllBabDosen(),
      'bimbingan' => $this->kki->getBimbingan()

    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/detail', $data);
    } else {
      $this->template->load('templates/templates', 'laporan/dosen/detail', $data);
    }
  }


  public function detail_bab()
  {
    date_default_timezone_set('Asia/Jakarta');
    $id = $this->uri->segment(4);
    $group = $this->uri->segment(5);


    $data = [
      'title' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'bab_mhs' => $this->kki->getBabMhsPertama($id),
      'user_chat' => $this->kki->getUserChat($id, $group),
      'laporan' => $this->kki->getLaporanPertama($id, $group),
      'bimbingan_koreksi' =>  $this->kki->getBimbinganKoreksi($id),

    ];


    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/chat', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/data_bab', $data);
    } else {
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
      date_default_timezone_set('Asia/Jakarta');
      $outgoing_chat_id = $this->input->post('outgoing_chat_id');
      $incoming_chat_id = $this->input->post('incoming_chat_id');
      $bab_dosen_id = $this->input->post('bab_dosen_id');
      $group = $this->input->post('group');
      $message = $this->input->post('message');
      $file = $this->input->post('file');
      $now = date("Y-m-d H:i:s");

      if (!empty($message)) {
        $data = [
          'incoming_chat_id' => $incoming_chat_id,
          'outgoing_chat_id' => $outgoing_chat_id,
          'group' => $group,
          'bab_dosen_id' => $bab_dosen_id,
          'message' => $message,
          'time' => $now,
          'category_chats' => 1
        ];
        $this->db->insert('chats', $data);
        redirect('kki/laporan/detail_bab/' . $bab_dosen_id . '/' . $group . '/' . $file);
      }
    }
  }

  public function bab_detail()
  {

    $file = $this->uri->segment(6);
    $id = $this->uri->segment(4);
    $data = [
      'title' => 'Bab Detail',
      'kki' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'pembimbing' => $this->kki->pembimbingId(),
      'bab_detail' => $this->kki->getBabDetail($file),
      'bimbingan_koreksi' =>  $this->kki->getBimbinganKoreksi($id),

    ];
    $this->template->load('templates/templates', 'laporan/dosen/chat', $data);
  }
  public function tambah_file_kki1()
  {
    $config['upload_path']   = FCPATH . './assets/file/laporan/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);

    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'bab_dosen_id' => $this->input->post('bab_id'),
      'file' => $file['file_name'],
      'pembimbing_id' => $this->input->post('pembimbing_id'),
      'user_id' => $this->input->post('user_id'),
      'status_konfirmasi' => 0,
      'category_bimbingan' => 1,
    ];
    $this->db->insert('bimbingan', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/kki_pertama');
  }
  public function tambah_bab_dosen()
  {
    $data = [
      'bab_id' => $this->input->post('bab_id'),
      'user_id' => $this->input->post('user_id'),
      'pembimbing_id' => $this->input->post('pembimbing_id'),
    ];
    $this->db->insert('bab_dosen', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/kki_pertama');
  }
  public function tambah_koreksi()
  {
    $bab_dosen_id = $this->input->post('bab_dosen_id');
    $group = $this->input->post('kel');
    $berkas = $this->input->post('berkas');
    $config['upload_path']   = FCPATH . './assets/file/laporan/koreksi';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);

    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'bab_dosen_id' => $this->input->post('bab_dosen_id'),
      'file' => $file['file_name'],
      'pembimbing_id' => $this->input->post('pembimbing_id'),
      'user_id' => $this->input->post('user_id'),
      'category_bimbingan_koreksi' => 1,
    ];
    $this->db->insert('bimbingan_koreksi', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/bab_detail/' . $bab_dosen_id . '/' . $group . '/' . $berkas);
  }
  public function konfirmasi()
  {
    $group = $this->input->post('group');
    $bab_dosen_id = $this->input->post('bab_dosen_id');
    $mhs_name = $this->input->post('mhs_name');
    $id = $this->input->post('user_id');
    $data = [
      'status_konfirmasi' => $this->input->post('status_konfirmasi')
    ];
    $this->db->where('user_id', $id);
    $this->db->update('bimbingan', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> File BAB ' . $bab_dosen_id . ' &nbsp; ' . $mhs_name . ' Berhasil Dikonfirmasi!</div>');
    redirect('kki/laporan/detail_bab/' . $bab_dosen_id . '/' . $group);
  }
}
