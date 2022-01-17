<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kki extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function koordinator()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/index', $data);
  }
  // public function get_kelurahan()
  // {
  //   $kecamatan = $this->input->post('id', TRUE);
  //   $data = $this->m_jasa->getKelurahan($kecamatan)->result();
  //   foreach ($data as $row) {
  //     echo '<option value="' . $row->id_kelurahan . '">' . $row->kelurahan . '</option>';
  //   }
  // }
  public function getDosen()
  {
    $id =  $this->input->post('id', TRUE);
    $data = $this->db->getUserDosen($id)->result();
    foreach ($data as $row) {
      echo '<option value="' . $row->id_user . '">' . $row->username . '</option>';
    }
  }
  public function kelompok()
  {
    date_default_timezone_set('Asia/Jakarta');
    // $kode = $this->kki->getAllDosen();

    // foreach ($kode as $k) {
    //   echo  $k['username'];
    // }
    $awal = 'DTI';

    $clock = date('s');
    // $year = date('Y');
    $minute = date('i');
    // $end = substr($year, 2, 2);
    $noSekarang = $awal . $clock . $minute;
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompok(),
      'kode' => $noSekarang,

      'allDosen' => $this->kki->getAllDosen(),
      'allMhs' => $this->kki->getAllMhs(),
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/index', $data);
  }
  public function detail_kelompok()
  {
    $id = $this->uri->segment(3);
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompokId($id),
      'pembimbing' => $this->kki->getPembimbingId($id),
      'allMhs' => $this->kki->getAllMhs(),
      'detail'  => $this->kki->getDetailKelompok($id)
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/detail', $data);
  }
  public function tambah_kelompok()
  {
    $kelompok = $this->input->post('group');
    $mahasiswa = count($this->input->post('mhs_id'));
    for ($m = 0; $m < $mahasiswa; $m++) {
      $isi[$m] = [
        'pembimbing_id' => $this->input->post('pembimbing_id'),
        'mhs_id' => $this->input->post('mhs_id[' . $m . ']')
      ];
      $this->db->insert('mhs_bimbingan', $isi[$m]);
    }
    // $this->db->insert('mhs_bimbingan_akhir', $isi[$m]);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/detail_kelompok/' . $kelompok);

    // $pembimbing_id = $this->db->insert_id();

    // $mahasiswa = count($this->input->post('mhs_id'));

    // for ($m = 0; $m < $mahasiswa; $m++) {
    //   $isi[$m] = [
    //     'pembimbing_id' => $pembimbing_id,
    //     'mhs_id' => $this->input->post('mhs_id[' . $m . ']')
    //   ];
    //   $this->db->insert('mhs_bimbingan', $isi[$m]);
    // }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/kelompok');
  }
  public function industri()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'industri' => $this->kki->getIndustri()
    ];
    $this->template->load('templates/templates', 'koordinator/data-industri/index', $data);
  }
  public function kelola_bab()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'allbab' => $this->kki->allBab()
    ];
    $this->template->load('templates/templates', 'koordinator/kelola-bab/index', $data);
  }
  public function form_submit()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'form' => $this->kki->getForm()
    ];
    $this->template->load('templates/templates', 'koordinator/form-submit/index', $data);
  }
  public function tambah_form_submit()
  {
    $data = [
      'limit_end' => $this->input->post('limit_end'),
      'category_form' => $this->input->post('category_form'),
      'user_id' => $this->input->post('user_id'),
    ];
    $this->db->insert('form_upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/form_submit');
  }
}
