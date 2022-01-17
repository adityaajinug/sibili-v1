<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sertifikasi_model', 'sertifikasi');
  }
  public function koordinator()
  {
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs()
    ];
    $this->template->load('templates/templates', 'koordinator/index', $data);
  }
  public function form_submit()
  {
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'form' => $this->sertifikasi->getForm()
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
    redirect('sertifikasi/form_submit');
  }
  public function show_file()
  {
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'userGuide' => $this->sertifikasi->getUserGuide()
    ];
    $this->template->load('templates/templates', 'koordinator/file/index', $data);
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
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'kode' => $noSekarang,
      'pembimbing' => $this->sertifikasi->getPembimbing(),
      'allDosen' => $this->sertifikasi->getAllDosen(),
      'code' => $this->sertifikasi->getDosenCode(),

    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/index', $data);
  }
  public function detail_kelompok()
  {
    $id = $this->uri->segment(3);
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'detail' => $this->sertifikasi->getDetailKelompok($id),
      'pembimbing' => $this->sertifikasi->getPembimbingId($id),
      'allMhs' => $this->sertifikasi->getAllMhs(),
      'mhsBimbingan' => $this->sertifikasi->getMhsBimbingan($id)
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
      $this->db->insert('mhs_bimbingan_akhir', $isi[$m]);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('sertifikasi/detail_kelompok/' . $kelompok);
  }
  public function ujian()
  {
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'tahun' => $this->sertifikasi->getYear()

    ];
    $this->template->load('templates/templates', 'koordinator/tahun/index', $data);
  }
  public function detail_tahun()
  {
    $id = $this->uri->segment('3');
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'tahun' => $this->sertifikasi->getYear(),
      'schedule' => $this->sertifikasi->getSchedule($id)
    ];
    $this->template->load('templates/templates', 'koordinator/tahun/detail', $data);
  }
  public function tambah_jadwal()
  {
    $data = [
      'schedule_start' => $this->input->post('schedule_start'),
      'semester' => $this->input->post('semester'),
      'year_id' => $this->input->post('year_id'),
      'category_schedule' => $this->input->post('category_schedule'),
    ];
    $this->db->insert('schedule', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('sertifikasi/jadwal');
  }
  public function detail_schedule()
  {
    $id = $this->uri->segment('4');
    $data = [
      'title' => 'Koordinator Sertifikasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->sertifikasi->getDosen(),
      'mhs' => $this->sertifikasi->getMhs(),
      'mhs_exam' => $this->sertifikasi->getMhsExam($id),
      'allMhs' => $this->sertifikasi->getAllMhs(),
      'schedule' => $this->sertifikasi->getScheduleId($id),
      'pembimbing' => $this->sertifikasi->getPembimbing(),
      'mhsBimbingan' => $this->sertifikasi->getMhsBimbingan(),
      'allDosen' => $this->sertifikasi->getAllDosen(),

    ];
    $this->template->load('templates/templates', 'koordinator/tahun/jadwal-ujian/index', $data);
  }
}
