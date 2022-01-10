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
  public function kelompok()
  {
    date_default_timezone_set('Asia/Jakarta');
    // $kode = $this->kki->cekCodeKelompok();
    $awal = 'DTI';
    $clock = date('s');
    $year = date('Y');
    $end = substr($year, 2, 2);
    $noSekarang = $awal . $clock . $end;
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
      'detail'  => $this->kki->getDetailKelompok($id)
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/detail', $data);
  }
  public function tambah_kelompok()
  {
    $data = array(
      'group' => $this->input->post('group'),
      'dosen_id' => $this->input->post('dosen_id')
    );
    $this->db->insert('dosen_pembimbing', $data);

    $pembimbing_id = $this->db->insert_id();

    $mahasiswa = count($this->input->post('mhs_id'));

    for ($m = 0; $m < $mahasiswa; $m++) {
      $isi[$m] = [
        'pembimbing_id' => $pembimbing_id,
        'mhs_id' => $this->input->post('mhs_id[' . $m . ']')
      ];
      $this->db->insert('mhs_bimbingan', $isi[$m]);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Wes digenti!</div>');
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
}
