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
      'title' => 'Kuliah Kerja Industri / Laporan',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'semester' => $this->kki->getSemester()

    ];
    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/mahasiswa/index', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/index', $data);
    } else if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/index', $data);
    } else if ($this->session->userdata('role_id') == 5) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/index', $data);
    } else if ($this->session->userdata('role_id') == 6) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/index', $data);
    } else {
      redirect('blocked');
    }
  }
  /*
  KULIAH KERJA INDUSTRI PERTAMA
  ------------------------------------
  */
  public function kki_pertama()
  {
    $data = [
      'title' => 'Kuliah Kerja Industri / Bab',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'allbabkki' => $this->kki->allBabKki(),
      'pembimbing' => $this->kki->pembimbingId(),
      'babDosen' => $this->kki->getBabDosen(),
      'allBabDosen' => $this->kki->getAllBabDosen(),
      'bimbingan' => $this->kki->getBimbingan(),
      'semester' => $this->kki->getSemester()


    ];

    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/mahasiswa/detail', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/detail', $data);
    } else if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/detail', $data);
    } else if ($this->session->userdata('role_id') == 5) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/detail', $data);
    } else if ($this->session->userdata('role_id') == 6) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/detail', $data);
    } else {
      redirect('blocked');
    }
  }


  public function detail_bab_satu()
  {
    $id = $this->uri->segment(4);
    $group = $this->kki->pembimbingId()['group'];

    $data = [
      'title' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'bab_mhs' => $this->kki->getBabMhs($id),
      'user_chat' => $this->kki->getUserChat($id, $group),
      'laporan' => $this->kki->getLaporanPertama($id, $this->kki->getSemester()['year_id'], $group),
      'bimbingan_koreksi' =>  $this->kki->getBimbinganKoreksi($id,  $group, $this->kki->getSemester()['year_id'], $this->kki->getSemester()['user_id']),

    ];

    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/mahasiswa/chat', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/data_bab', $data);
    } else if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/data_bab', $data);
    } else if ($this->session->userdata('role_id') == 5) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/data_bab', $data);
    } else if ($this->session->userdata('role_id') == 6) {
      $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/data_bab', $data);
    } else {
      redirect('blocked');
    }
  }
  public function bab_detail_satu()
  {

    $user = $this->uri->segment(6);
    $id = $this->uri->segment(4);
    $group = $this->kki->pembimbingId()['group'];
    $data = [
      'title' => 'Bab Detail',
      'kki' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'pembimbing' => $this->kki->pembimbingId(),
      'bab_detail' => $this->kki->getBabDetail($id, $group, $this->kki->getSemester()['year_id'], $user),
      'bimbingan_koreksi' =>  $this->kki->getBimbinganKoreksi($id, $group, $this->kki->getSemester()['year_id'], $user),

    ];
    $this->template->load('templates/templates', 'laporan/kki-pertama/dosen/chat', $data);
  }
  public function tambah_file_satu()
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
      'year_id' => $this->input->post('year_id'),
      'status_konfirmasi' => 0,
      'category_bimbingan' => 1,
    ];
    $this->db->insert('bimbingan', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/kki_pertama');
  }

  public function tambah_koreksi_satu()
  {
    $bab_dosen_id = $this->input->post('bab_dosen_id');
    $group = $this->input->post('kel');
    $berkas = $this->input->post('incoming_file_id');
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
      'outgoing_file_id' => $this->input->post('outgoing_file_id'),
      'incoming_file_id' => $this->input->post('incoming_file_id'),
      'year_id' => $this->input->post('year_id'),
      'category_bimbingan_koreksi' => 1,
    ];
    $this->db->insert('bimbingan_koreksi', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/detail/' . $bab_dosen_id . '/' . $group . '/' . $berkas);
  }
  public function edit_koreksi_satu()
  {
    $bab_dosen_id = $this->input->post('bab_dosen_id');
    $group = $this->input->post('kel');
    $berkas = $this->input->post('incoming_file_id');
    $id = $this->input->post('id_bimbingan_koreksi');
    $config['upload_path']   = FCPATH . './assets/file/laporan/koreksi';
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('file')) {

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      <strong>Gagal - </strong> File Belum di Unggah</div>');
      redirect('kki/laporan/detail/' . $bab_dosen_id . '/' . $group . '/' . $berkas);
    } else {
      $old_file = $this->input->post('fileold');
      $path = FCPATH . './assets/file/laporan/koreksi/' . $old_file;
      unlink($path);

      $file = $this->upload->data('file_name');
      $data = [
        'bab_dosen_id' => $this->input->post('bab_dosen_id'),
        'file' => $file,
        'pembimbing_id' => $this->input->post('pembimbing_id'),
        'outgoing_file_id' => $this->input->post('outgoing_file_id'),
        'incoming_file_id' => $this->input->post('incoming_file_id'),
        'year_id' => $this->input->post('year_id'),
        'category_bimbingan_koreksi' => 1,
      ];
      $this->db->where('id_bimbingan_koreksi', $id);
      $this->db->update('bimbingan_koreksi', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> File Telah di Ubah</div>');
      redirect('kki/laporan/detail/' . $bab_dosen_id . '/' . $group . '/' . $berkas);
    }
  }
  public function edit_lap_satu()
  {

    $id = $this->input->post('id_bimbingan');
    $config['upload_path']   = FCPATH . './assets/file/laporan/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);


    if (!$this->upload->do_upload('file')) {

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      <strong>Gagal - </strong> File Belum di Unggah</div>');
      redirect('kki/laporan/kki_pertama');
    } else {
      $old_image = $this->input->post('fileold');
      $path = FCPATH . './assets/file/laporan/' . $old_image;
      unlink($path);

      $file = $this->upload->data('file_name');
      $data = [
        'bab_dosen_id' => $this->input->post('bab_dosen_id'),
        'pembimbing_id' => $this->input->post('pembimbing_id'),
        'user_id' => $this->input->post('user_id'),
        'year_id' => $this->input->post('year_id'),
        'status_konfirmasi' => $this->input->post('status_konfirmasi'),
        'category_bimbingan' => 1,
        'file' => $file,
      ];
      $this->db->where('id_bimbingan', $id);
      $this->db->update('bimbingan', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> File Telah di Ubah</div>');
      redirect('kki/laporan/kki_pertama');
    }
  }
  public function input_chat_satu()
  {

    if ($this->session->userdata('username')) {
      date_default_timezone_set('Asia/Jakarta');
      $outgoing_chat_id = $this->input->post('outgoing_chat_id');
      $incoming_chat_id = $this->input->post('incoming_chat_id');
      $bab_dosen_id = $this->input->post('bab_dosen_id');
      $bimbingan_id = $this->input->post('bimbingan_id');
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
          'bimbingan_id' => $bimbingan_id,
          'message' => $message,
          'time' => $now,
          'category_chats' => 1
        ];
        $this->db->insert('chats', $data);
        // redirect('kki/laporan/detail_bab_satu/' . $bab_dosen_id . '/' . $group . '/' . $file);
      }
    }
  }

  /* END  KULIAH KERJA INDUSTRI PERTAMA 
  ------------------------------------------
  */

  /*
  KULIAH KERJA INDUSTRI KEDUA
  ------------------------------------
  */




  /* END  KULIAH KERJA INDUSTRI PERTAMA 
  ------------------------------------------
  */


  /*
  All INCLUDE
  --------------------------------------
  */

  public function tambah_bab_dosen()
  {
    $data = [
      'bab_id' => $this->input->post('bab_id'),
      'user_id' => $this->input->post('user_id'),
      'pembimbing_id' => $this->input->post('pembimbing_id'),
      'year_id' => $this->input->post('year_id'),
    ];
    $this->db->insert('bab_dosen', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/laporan/kki_pertama');
  }

  public function update_status()
  {
    $id = $this->session->userdata('username');
    $time = time() + 10;

    $this->db->set('status', $time);
    $this->db->where('username', $id);
    $this->db->update('user');
  }
  public function konfirmasi()
  {
    $group = $this->input->post('group');
    $bab_dosen_id = $this->input->post('bab_dosen_id');
    $mhs_name = $this->input->post('mhs_name');
    $id = $this->input->post('id_bimbingan');
    $data = [
      'status_konfirmasi' => $this->input->post('status_konfirmasi')
    ];
    $this->db->where('id_bimbingan', $id);
    $this->db->update('bimbingan', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> File BAB ' . $bab_dosen_id . ' &nbsp; ' . $mhs_name . ' Berhasil Dikonfirmasi!</div>');
    redirect('kki/laporan/bab/' . $bab_dosen_id . '/' . $group);
  }
  /*
  END All INCLUDE
  -------------------------------------------------
  */
}
