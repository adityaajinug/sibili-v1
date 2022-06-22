<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

// use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
require FCPATH . 'vendor/autoload.php';

require FCPATH . 'assets/mpdf/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
// use PhpOffice\PhpSpreadsheet\Cell\DataType;
// use PhpOffice\PhpSpreadsheet\Style\Fill;
// use PhpOffice\PhpSpreadsheet\Style\Color;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Style\Border;
// use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Kki extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    // sub();
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
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/index', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/index', $data);
    } else {
      redirect('blocked');
    }
  }
  /*
  KELOMPOK
  -------------------------------------------------
  */
  public function kelompok()
  {
    date_default_timezone_set('Asia/Jakarta');
    // }
    $awal = 'DTI';

    $clock = date('s');
    // $year = date('Y');
    $minute = date('i');
    // $end = substr($year, 2, 2);
    $noSekarang = $awal . $clock . $minute;
    $data = [
      'title' => 'Kelompok Bimbingan',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompok(),
      'kode' => $noSekarang,
      'allDosen' => $this->kki->getAllDosen(),
      'allMhs' => $this->kki->getAllMhs(),
    ];

    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/kelompok/index', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/kelompok/index', $data);
    } else {
      redirect('blocked');
    }
  }
  public function detail_kelompok()
  {
    $id = $this->uri->segment(3);
    $data = [
      'title' => 'Detail Kelompok',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'kelompok' => $this->kki->getKelompokId($id),
      'pembimbing' => $this->kki->getPembimbingId($id),
      'allMhs' => $this->kki->getAllMhs(),
      'detail'  => $this->kki->getDetailKelompok($id)
    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/kelompok/detail', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/kelompok/detail', $data);
    } else {
      redirect('blocked');
    }
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
      $this->db->insert('mhs_bimbingan_akhir', $isi[$m]);
    }

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/detail_kelompok/' . $kelompok);
  }
  public function edit_kelompok()
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
      'detail'  => $this->kki->getDetailKelompok($id),
      'mhs_bimbingan' => $this->kki->getMhsBimbingan($id),
    ];
    $this->template->load('templates/templates', 'koordinator/kelompok/edit', $data);
  }
  public function delete_group_kelompok()
  {
    if ($this->input->post('checkbox_value')) {
      $id = $this->input->post('checkbox_value');
      for ($count = 0; $count < count($id); $count++) {
        $this->kki->deleteGroupKelompok($id[$count]);
      }
    }
  }


  public function tambah_pembimbing()
  {
    $data = [
      'group' => $this->input->post('group'),
      'dosen_id' => $this->input->post('dosen_id'),

    ];
    $this->db->insert('dosen_pembimbing', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/kelompok');
  }
  /*
   END KELOMPOK
  -------------------------------------------------
  */

  /*
  DATA TEMPAT MAGANG
  -------------------------------------------------
  */
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
  public function data_magang()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'internship' => $this->kki->getAllInternship()
    ];
    $this->template->load('templates/templates', 'koordinator/data-mahasiswa-magang/index', $data);
  }

  /*
   END DATA TEMPAT MAGANG
  -------------------------------------------------
  */
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
  /*
  UJIAN
  -------------------------------------------------
  */
  public function jadwal()
  {
    $data = [
      'title' => 'Jadwal',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'schedule' => $this->kki->getSchedule(),
      'semester' => $this->kki->getSemester(),
      'rules' => $this->kki->getRules(),
      'form' => $this->kki->getForm()
    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/jadwal/index', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/jadwal/index', $data);
    } else {
      redirect('login/blocked');
    }
  }
  public function tambah_jadwal()
  {
    $schedule_start = $this->input->post('schedule_start');
    $year_id = $this->input->post('year_id');
    $category_schedule = $this->input->post('category_schedule');
    $schedule_name = $this->input->post('schedule_name');
    $data = [
      'schedule_start' => $schedule_start,
      'year_id' => $year_id,
      'category_schedule' => $category_schedule,
      'schedule_name' => $schedule_name,
    ];
    $this->db->insert('schedule', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Jadwal Tersimpan!</div>');
    redirect('kki/jadwal');
  }
  public function edit_jadwal()
  {
    $id = $this->input->post('id_schedule');
    $schedule_start = $this->input->post('schedule_start');
    $year_id = $this->input->post('year_id');
    $category_schedule = $this->input->post('category_schedule');
    $schedule_name = $this->input->post('schedule_name');
    $data = [
      'schedule_start' => $schedule_start,
      'year_id' => $year_id,
      'category_schedule' => $category_schedule,
      'schedule_name' => $schedule_name,
    ];
    $this->db->where('id_schedule', $id);
    $this->db->update('schedule', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Jadwal Telah Diubah!</div>');
    redirect('kki/jadwal');
  }
  public function delete_jadwal()
  {
    $id = $this->input->post('id_schedule');
    $this->db->where('id_schedule', $id);
    $this->db->delete('schedule');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Jadwal Telah Dihapus!</div>');
    redirect('kki/jadwal');
  }
  public function detail_jadwal()
  {
    $id = $this->uri->segment(3);
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'scheduleId' => $this->kki->getScheduleId($id),
      'semester' => $this->kki->getSemester(),
      'kelompok' => $this->kki->getKelompok(),
      'allDosen' => $this->kki->getAllDosen(),
      'mhs_exam' => $this->kki->getMhsExam($id)
    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/jadwal/detail', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/jadwal/detail', $data);
    } else {
      redirect('blocked');
    }
  }
  public function tambah_peraturan()
  {
    $data = [
      'rules' => $this->input->post('rules'),
      'category_rules' => $this->input->post('category_rules')
    ];
    $this->db->insert('rules_exam', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Peraturan Tersimpan!</div>');
    redirect('kki/jadwal');
  }
  public function edit_peraturan()
  {
    $id = $this->input->post('id_rules');
    $data = [
      'rules' => $this->input->post('rules'),
      'category_rules' => $this->input->post('category_rules')
    ];
    $this->db->where('id_rules', $id);
    $this->db->update('rules_exam', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Peraturan Telah Diubah!</div>');
    redirect('kki/jadwal');
  }
  public function delete_peraturan()
  {
    $id = $this->input->post('id_rules');
    $this->db->where('id_rules', $id);
    $this->db->delete('rules_exam');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Peraturan Terhapus!</div>');
    redirect('kki/jadwal');
  }
  public function tambah_submission_exam()
  {
    $slug = url_title($this->input->post('title'), 'dash', true);
    date_default_timezone_set('Asia/Jakarta');
    $data = [
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'limit_end' => $this->input->post('limit_end'),
      'category_form' => $this->input->post('category_form'),
      'year_id' => $this->input->post('year_id'),
    ];
    $this->db->insert('form_upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/jadwal');
  }
  public function edit_submission_exam()
  {
    $slug = url_title($this->input->post('title'), 'dash', true);
    date_default_timezone_set('Asia/Jakarta');
    $data = [
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'limit_end' => $this->input->post('limit_end'),
      'category_form' => $this->input->post('category_form'),
      'year_id' => $this->input->post('year_id'),
    ];
    $this->db->where('id_form', $this->input->post('id_form'));
    $this->db->update('form_upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Telah di Ubah!</div>');
    redirect('kki/jadwal');
  }
  public function delete_submission_exam()
  {
    $id = $this->input->post('id_form');
    $this->db->where('id_form', $id);
    $this->db->delete('form_upload');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Submission Telah dihapus!</div>');
    redirect('kki/jadwal');
  }

  public function getMhsBimbingan()
  {
    $id = $this->input->post('id');
    $data = $this->kki->getBimbinganMhs($id);
    $output = '<option value="">Pilih Mahasiswa</option>';
    $no = 1;
    foreach ($data as $mhs) {
      $output .= '<option value="' . $mhs->mhs_id . '">' . $no++ . '. ' . $mhs->username . ' - ' . $mhs->mhs_name . '</option>';
    }
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($output));
  }

  public function tambah_mhs_ujian()
  {
    $schedule_id = $this->input->post('id_schedule');
    $pembimbing_id = $this->input->post('dosen_pembimbing');
    $assesor_one = $this->input->post('assesor_one');
    $assesor_two = $this->input->post('assesor_two');
    $group_exam = $this->input->post('group_exam');
    $mahasiswa = count($this->input->post('mhs_id'));
    for ($m = 0; $m < $mahasiswa; $m++) {
      $isi[$m] = [
        'schedule_id' => $schedule_id,
        'pembimbing_id' => $pembimbing_id,
        'assesor_one' => $assesor_one,
        'assesor_two' => $assesor_two,
        'room_exam' => $group_exam,
        'mhs_id' => $this->input->post('mhs_id[' . $m . ']')
      ];
      $this->db->insert('mhs_exam', $isi[$m]);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/detail_jadwal/' . $schedule_id);
  }
  public function delete_mhs_ujian()
  {
    if ($this->input->post('checkbox_value')) {
      $id = $this->input->post('checkbox_value');
      for ($count = 0; $count < count($id); $count++) {
        $this->kki->deleteMhsUjian($id[$count]);
      }
    }
  }
  /*
   END JADWAL
  -------------------------------------------------
  */
  /*
   INFORMASI DAN SUBMISSION
  -------------------------------------------------
  */
  public function info()
  {

    $data = [
      'title' => 'Informasi',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'semester' => $this->kki->getSemester(),
      'announce' => $this->kki->getAnnouncement(),
      'form' => $this->kki->getForm()

    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/info/index', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/info/index', $data);
    } else {
      redirect('blocked');
    }
  }

  public function tambah_informasi()
  {
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),

    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/info/tambah', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/info/tambah', $data);
    } else {
      redirect('blocked');
    }
  }
  public function tambah_info_db()
  {
    date_default_timezone_set('Asia/Jakarta');
    $slug = url_title($this->input->post('title'), 'dash', true);
    $date = date('Y-m-d H:i:s');
    $config['upload_path']   = FCPATH . './assets/file/announcement';
    $config['allowed_types'] = 'pdf|doc|docx|xlsx';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('file')) {
      $data = [
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'description' => $this->input->post('description'),
        'year_id' => $this->input->post('year_id'),
        'date_created' => $date,
        'category_announce' => 1,
      ];
      $this->db->insert('announcement', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
      redirect('kki/info');
    } else {
      $file = $this->upload->data();
      $data = [

        'file' => $file['file_name'],
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'description' => $this->input->post('description'),
        'year_id' => $this->input->post('year_id'),
        'date_created' => $date,
        'category_announce' => 1,
      ];
      $this->db->insert('announcement', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
      redirect('kki/info');
    }
  }
  public function edit_info()
  {
    $id = $this->uri->segment(3);
    $data = [
      'title' => 'Koordinator KKI',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'announceId' => $this->kki->getAnnounceId($id)

    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/info/edit', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/info/edit', $data);
    } else {
      redirect('login/blocked');
    }
  }
  public function edit_info_db()
  {
    date_default_timezone_set('Asia/Jakarta');
    $slug = url_title($this->input->post('title'), 'dash', true);
    $date = date('Y-m-d H:i:s');
    $config['upload_path']   = FCPATH . './assets/file/announcement';
    $config['allowed_types'] = 'pdf|doc|docx|xlsx';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('file')) {
      $data = [
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'file' => $this->input->post('fileold'),
        'description' => $this->input->post('description'),
        'year_id' => $this->input->post('year_id'),
        'date_created' => $date,
        'category_announce' => 1,
      ];
      $this->db->where('id_announce', $this->input->post('id_announce'));
      $this->db->update('announcement', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
      redirect('kki/info');
      redirect('kki/info');
    } else {
      $old_file = $this->input->post('fileold');
      $path = FCPATH . './assets/file/announcement/' . $old_file;
      unlink($path);

      $file = $this->upload->data('file_name');
      $data = [

        'file' => $file,
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'description' => $this->input->post('description'),
        'year_id' => $this->input->post('year_id'),
        'date_created' => $date,
        'category_announce' => 1,
      ];
      $this->db->where('id_announce', $this->input->post('id_announce'));
      $this->db->update('announcement', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
      redirect('kki/info');
    }
  }
  public function delete_info()
  {
    $old_file = $this->input->post('fileold');
    $path = FCPATH . './assets/file/announcement/' . $old_file;
    unlink($path);
    $id = $this->input->post('id_announce');
    $this->db->where('id_announce', $id);
    $this->db->delete('announcement');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Informasi Telah dihapus!</div>');
    redirect('kki/info');
  }
  public function tambah_submission()
  {
    $slug = url_title($this->input->post('title'), 'dash', true);
    date_default_timezone_set('Asia/Jakarta');
    $data = [
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'limit_end' => $this->input->post('limit_end'),
      'category_form' => $this->input->post('category_form'),
      'year_id' => $this->input->post('year_id'),
    ];
    $this->db->insert('form_upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/info');
  }
  public function edit_submission()
  {
    $slug = url_title($this->input->post('title'), 'dash', true);
    date_default_timezone_set('Asia/Jakarta');
    $data = [
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'limit_end' => $this->input->post('limit_end'),
      'category_form' => $this->input->post('category_form'),
      'year_id' => $this->input->post('year_id'),
    ];
    $this->db->where('id_form', $this->input->post('id_form'));
    $this->db->update('form_upload', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Telah di Ubah!</div>');
    redirect('kki/info');
  }
  public function delete_submission()
  {
    $id = $this->input->post('id_form');
    $this->db->where('id_form', $id);
    $this->db->delete('form_upload');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Submission Telah dihapus!</div>');
    redirect('kki/info');
  }
  /*
  END INFORMASI DAN SUBMISSION
  -------------------------------------------------
  */
  /*
   DOKUMEN FORMAT
  -------------------------------------------------
  */
  public function dokumen_format()
  {
    $data = [
      'title' => 'Dokumen Format',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'semester' => $this->kki->getSemester(),
      'dokumen' => $this->kki->getDokumenFormat()


    ];
    if ($this->session->userdata('role_id') == 4) {
      $this->template->load('templates/templates', 'koordinator/dokumen-format/index', $data);
    } else if ($this->session->userdata('role_id') == 7) {
      $this->template->load('templates/templates', 'koordinator/dokumen-format/index', $data);
    } else {
      redirect('blocked');
    }
  }
  public function tambah_dokumen()
  {
    $config['upload_path']   = FCPATH . './assets/file/format';
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size']      = 3000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);
    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'format_name' => $this->input->post('format_name'),
      'file' => $file['file_name'],
      'category_format' => 1
    ];
    $this->db->insert('format', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
    redirect('kki/dokumen_format');
  }
  public function edit_dokumen()
  {
    $config['upload_path']   = FCPATH . './assets/file/format';
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size']      = 3000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('file')) {
      $data = [
        'format_name' => $this->input->post('format_name'),
        'category_format' => 1
      ];
      $this->db->where('id_format', $this->input->post('id_format'));
      $this->db->update('format', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Data Tersimpan</div>');
      redirect('kki/dokumen_format');
    } else {
      $old_file = $this->input->post('fileold');
      $path = FCPATH . './assets/file/format/' . $old_file;
      unlink($path);

      $file = $this->upload->data('file_name');
      $data = [
        'format_name' => $this->input->post('format_name'),
        'file' => $file,
        'category_format' => 1
      ];
      $this->db->where('id_format', $this->input->post('id_format'));
      $this->db->update('format', $data);
      redirect('kki/dokumen_format');
    }
  }
  public function delete_dokumen()
  {
    $old_file = $this->input->post('fileold');
    $path = FCPATH . './assets/file/format/' . $old_file;
    unlink($path);
    $id = $this->input->post('id_format');
    $this->db->where('id_format', $id);
    $this->db->delete('format');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
    <strong>Deleted - </strong> Data Format Telah dihapus!</div>');
    redirect('kki/dokumen_format');
  }



  /*
  END DOKUMEN FORMAT
  -------------------------------------------------
  */
  /*
   EXPORT
  -------------------------------------------------
  */
  public function exportJadwalPDF($id)
  {

    // $id = $this->uri->segment(3);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
    $scheduleId  = $this->kki->getScheduleId($id);
    $data = $this->kki->getMhsExam($id);
    $semester = $this->kki->getSemester();
    $rules = $this->kki->getRules();

    if ($this->session->userdata('role_id') == 4) {
      $view = $this->load->view('koordinator/jadwal/pdf', ['jad' => $data, 'scheduleId' => $scheduleId, 'semester' => $semester, 'rules' => $rules], true);
    } else if ($this->session->userdata('role_id') == 7) {
      $view = $this->load->view('koordinator/jadwal/pdf', ['jad' => $data, 'scheduleId' => $scheduleId, 'semester' => $semester, 'rules' => $rules], true);
    } else {
      redirect('blocked');
    }
    $mpdf->WriteHTML($view);
    if ($semester['ganjil'] == 1) {
      echo $s = "Ganjil";
    } else if ($semester['genap'] == 1) {
      echo  $s = "Genap";
    }

    $filename = 'Jadwal-Ujian-' . $scheduleId->schedule_name . '-Semester-' . $s  . '-TA-' . $semester['year'] . '.pdf';
    // var_dump($filename);
    $mpdf->Output($filename, 'I');
  }
  public function exportJadwalExcelId($id)
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $styleArray = [
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
      ],
      'borders' => [
        'top' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'bottom' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'left' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'right' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
      ],
      'font' => [
        'size' => 11,
        'bold' => true,
      ],

    ];
    $fontStyle = [
      'font' => [
        'size' => 16,
        'bold' => true,
      ],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
      ],
    ];
    $borderArray = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
      ],
      'borders' => [
        'top' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],

      ],

    ];
    $DateTime = [
      'font' => [
        'size' => 12,
        'bold' => true,
        'italic' => true,
      ],
    ];
    $RuleExam = [
      'font' => [
        'size' => 11,
        'bold' => true,

      ],
    ];
    $semester = $this->kki->getSemester();
    if ($semester['genap'] != 1) {
      $s = 'Ganjil';
    } else if ($semester['genap'] == 1) {
      $s = 'Genap';
    }
    $scheduleId = $this->kki->getScheduleId($id);
    $tgl = $scheduleId->schedule_start;
    $time = $scheduleId->schedule_start;


    $title = 'Jadwal Ujian' . ' ' . $scheduleId->schedule_name . ' ' . 'Teknik Informatika D3';

    $sheet->setCellValue('B2', $title);
    $sheet->mergeCells('B2:H2');


    $sheet->setCellValue('B3', 'Semester' . ' ' .  $s . ' ' . 'T.A' . ' ' . $semester['year']);
    $sheet->mergeCells('B3:H3');
    $sheet->getStyle('B2')->applyFromArray($fontStyle);
    $sheet->getStyle('B3')->applyFromArray($fontStyle);




    $sheet->setCellValue('B5', 'Hari, Tanggal : ' . tgl_indo($tgl));
    $sheet->mergeCells('B5:E5');
    $sheet->getStyle('B5')->applyFromArray($DateTime);
    $sheet->setCellValue('F5', 'Jam : ' . waktu_indo($time) . ' - Selesai');
    $sheet->mergeCells('F5:H5');
    $sheet->getStyle('F5')->applyFromArray($DateTime);

    $sheet->setCellValue('B6', 'NO');
    $sheet->setCellValue('C6', 'NIM');
    $sheet->setCellValue('D6', 'NAMA MAHASISWA');
    $sheet->setCellValue('E6', 'DOSEN PEMBIMBING');
    $sheet->setCellValue('F6', 'KETUA PENGUJI');
    $sheet->setCellValue('G6', 'ANGGOTA PENGUJI');
    $sheet->setCellValue('H6', 'RUANG');



    $sheet->getStyle('B6')->applyFromArray($styleArray);
    $sheet->getStyle('C6')->applyFromArray($styleArray);
    $sheet->getStyle('D6')->applyFromArray($styleArray);
    $sheet->getStyle('E6')->applyFromArray($styleArray);
    $sheet->getStyle('F6')->applyFromArray($styleArray);
    $sheet->getStyle('G6')->applyFromArray($styleArray);
    $sheet->getStyle('H6')->applyFromArray($styleArray);

    $no = 1;
    $x = 7;
    $data = $this->kki->getMhsExam($id);
    foreach ($data as $exam) {


      $sheet->setCellValue('B' . $x, $no++);
      $sheet->setCellValue('C' . $x, $exam->username);
      $sheet->setCellValue('D' . $x, $exam->mhs_name);
      $sheet->setCellValue('E' . $x, $exam->dosen_name);
      $sheet->setCellValue('F' . $x, $exam->assesor_one);
      $sheet->setCellValue('G' . $x, $exam->assesor_two);
      $sheet->setCellValue('H' . $x, $exam->room_exam);


      $sheet->getStyle('B' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('C' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('D' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('E' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('F' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('G' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('H' . $x)->applyFromArray($borderArray);


      $x++;
    }
    $sheet->setCellValue('J6', 'Peraturan Ujian : ');
    $sheet->getStyle('J6')->applyFromArray($RuleExam);
    $rules = $this->kki->getRules();
    $no = 1;
    $x = 7;

    foreach ($rules as $r) {
      $sheet->setCellValue('J' . $x, $no++);
      $sheet->setCellValue('K' . $x, $r['rules']);
      $x++;
    }


    $spreadsheet->getActiveSheet()->getDefaultRowDimension('B:H')->setRowHeight(19);


    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3.5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(3);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(7);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(3.5);
    $spreadsheet->getSheetByName($scheduleId->schedule_name . '-Semester-' . $s);
    $filename = 'Jadwal-Ujian-' . $scheduleId->schedule_name . '-Semester-' . $s  . '-TA-' . $semester['year'] . tgl_indo($tgl);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
  }
  public function exportJadwalExcel()
  {

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $styleArray = [
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
      ],
      'borders' => [
        'top' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'bottom' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'left' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
        'right' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,

        ],
      ],
      'font' => [
        'size' => 11,
        'bold' => true,
      ],

    ];
    $fontStyle = [
      'font' => [
        'size' => 16,
        'bold' => true,
      ],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
      ],
    ];
    $borderArray = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
      ],
      'borders' => [
        'top' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],

      ],

    ];
    $sheet->setCellValue('B2', 'Jadwal Ujian KKI D3 Teknik Informatika');
    $sheet->mergeCells('B2:J2');
    $semester = $this->kki->getSemester();
    if ($semester['genap'] != 1) {
      $s = 'Ganjil';
    } else if ($semester['genap'] == 1) {
      $s = 'Genap';
    }
    $sheet->setCellValue('B3', 'Semester' . ' ' .  $s . ' ' . $semester['year']);
    $sheet->mergeCells('B3:J3');
    $sheet->getStyle('B2')->applyFromArray($fontStyle);
    $sheet->getStyle('B3')->applyFromArray($fontStyle);

    $sheet->setCellValue('B6', 'NO');
    $sheet->setCellValue('C6', 'TANGGAL');
    $sheet->setCellValue('D6', 'WAKTU');
    $sheet->setCellValue('E6', 'NIM');
    $sheet->setCellValue('F6', 'NAMA MAHASISWA');
    $sheet->setCellValue('G6', 'DOSEN PEMBIMBING');
    $sheet->setCellValue('H6', 'KETUA PENGUJI');
    $sheet->setCellValue('I6', 'ANGGOTA PENGUJI');
    $sheet->setCellValue('J6', 'RUANG');

    $sheet->getStyle('B6')->applyFromArray($styleArray);
    $sheet->getStyle('C6')->applyFromArray($styleArray);
    $sheet->getStyle('D6')->applyFromArray($styleArray);
    $sheet->getStyle('E6')->applyFromArray($styleArray);
    $sheet->getStyle('F6')->applyFromArray($styleArray);
    $sheet->getStyle('G6')->applyFromArray($styleArray);
    $sheet->getStyle('H6')->applyFromArray($styleArray);
    $sheet->getStyle('I6')->applyFromArray($styleArray);
    $sheet->getStyle('J6')->applyFromArray($styleArray);




    $no = 1;
    $x = 7;
    $data = $this->kki->getScheduleExam();
    foreach ($data as $exam) {
      $tgl = $exam->schedule_start;
      $time = $exam->schedule_start;
      $link = '<a href="">' . $exam->room_exam . '</a>';

      $sheet->setCellValue('B' . $x, $no++);
      $sheet->setCellValue('C' . $x, tgl_indo($tgl));
      $sheet->setCellValue('D' . $x, waktu_indo($time) . ' - Selesai');
      $sheet->setCellValue('E' . $x, $exam->username);
      $sheet->setCellValue('F' . $x, $exam->mhs_name);
      $sheet->setCellValue('G' . $x, $exam->dosen_name);
      $sheet->setCellValue('H' . $x, $exam->assesor_one);
      $sheet->setCellValue('I' . $x, $exam->assesor_two);
      $sheet->setCellValue('J' . $x, $link);



      $sheet->getStyle('B' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('C' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('D' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('E' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('F' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('G' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('H' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('I' . $x)->applyFromArray($borderArray);
      $sheet->getStyle('J' . $x)->applyFromArray($borderArray, $fontStyle);
      $x++;
    }

    $spreadsheet->getActiveSheet()->getDefaultRowDimension('B:J')->setRowHeight(17);


    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(3);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(7);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Jadwal-Ujian-KKI-' . $semester['year'] . '-' . $s . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
  }
  /*
   END EXPORT
  -------------------------------------------------
  */
}
