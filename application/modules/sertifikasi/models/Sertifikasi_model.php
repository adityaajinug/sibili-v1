<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi_model extends CI_Model
{
  public function getDosen()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, dosen.dosen_name');
    $this->db->from('user');
    $this->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getMhs()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, mahasiswa.mhs_name');
    $this->db->from('user');
    $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getForm()
  {
    $this->db
      ->select('form_upload.*')
      ->from('form_upload')
      ->where('category_form=', 4)
      ->order_by('form_upload.id_form', 'Desc');

    return $this->db->get()->result_array();
  }
  public function getFormUpload()
  {
    $this->db
      ->select('form_upload.*')
      ->from('form_upload')
      ->limit('1')
      ->where('category_form=', 4)
      ->order_by('form_upload.id_form', 'Desc');

    return $this->db->get()->row_array();
  }
  public function getUpload()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('upload.*, user.id_user')
      ->from('upload')
      ->join('user', 'upload.user_id = user.id_user', 'left')
      ->where('category_upload=', 4)
      ->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getUserGuide()
  {
    $this->db
      ->select('upload.*, user.username, mahasiswa.mhs_name')
      ->from('upload')
      ->join('user', 'upload.user_id = user.id_user')
      ->join('mahasiswa', '.mahasiswa.user_id = user.id_user')
      ->where('category_upload=', 4);
    return $this->db->get()->result_array();
  }
  public function getPembimbing()
  {
    $this->db
      ->select('dosen_pembimbing.*, dosen.dosen_name')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id');
    return $this->db->get()->result_array();
  }
  public function getDetailKelompok($id)
  {
    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.group, mhs_bimbingan_akhir.mhs_id, dosen.dosen_name, mahasiswa.mhs_name, mahasiswa.email, mahasiswa.status, user.username')
      ->from('mhs_bimbingan_akhir')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan_akhir.mhs_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan_akhir.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where($data)
      ->where('mahasiswa.status=', 'aktif');

    return $this->db->get()->result_array();
  }
  public function getPembimbingId($id)
  {

    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.*, dosen.dosen_name')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where($data);

    return $this->db->get()->row_array();
  }
  public function getAllMhs()
  {
    $this->db->select('mahasiswa.id_mhs,mahasiswa.mhs_name, user.username')
      ->from('mahasiswa')
      ->join('user', 'user.id_user=mahasiswa.user_id')
      ->where('mahasiswa.status=', 'aktif');
    return $this->db->get()->result_array();
  }
  public function getAllDosen()
  {
    $this->db->select('dosen.id_dosen,dosen.dosen_name, user.username')
      ->from('dosen')
      ->join('user', 'user.id_user=dosen.user_id');
    return $this->db->get()->result_array();
  }
  public function getDosenCode()
  {
    $this->db->select('dosen.id_dosen,dosen.dosen_name, user.username')
      ->from('dosen')
      ->join('user', 'user.id_user=dosen.user_id');
    return $this->db->get()->row_array();
  }
  public function getMhsBimbingan()
  {
    $this->db->select('mahasiswa.id_mhs,mahasiswa.mhs_name, user.username, dosen.dosen_name, mhs_bimbingan_akhir.mhs_id, dosen_pembimbing.id_pembimbing')
      ->from('mhs_bimbingan_akhir')
      ->join('mahasiswa', 'mhs_bimbingan_akhir.mhs_id = mahasiswa.id_mhs')
      ->join('user', 'user.id_user=mahasiswa.user_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan_akhir.pembimbing_id')
      ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      // ->where('dosen_pembimbing.id_pembimbing', $id)
      ->where('mahasiswa.status=', 'aktif');
    return $this->db->get()->result_array();
  }
  public function getSchedule($id)
  {
    $this->db
      ->select('schedule.*, school_year.*')
      ->from('schedule')
      ->join('school_year', 'school_year.id_year = schedule.year_id')
      ->where('category_schedule=', 2)
      ->where('schedule.year_id', $id);
    return $this->db->get()->result_array();
  }
  public function getYear()
  {
    return $this->db->get('school_year')->result_array();
  }
  public function getMhsExam($id)
  {
    $this->db
      ->select('schedule.*, school_year.*')
      ->from('mhs_exam')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id')
      ->join('school_year', 'school_year.id_year = schedule.year_id')
      ->where('category_schedule=', 2)
      ->where('mhs_exam.id_exam', $id);
    return $this->db->get()->result_array();
  }
  public function getScheduleId($id)
  {
    $this->db
      ->select('schedule.*, school_year.*')
      ->from('schedule')
      ->join('school_year', 'school_year.id_year = schedule.year_id')
      ->where('category_schedule=', 2)
      ->where('schedule.id_schedule', $id);
    return $this->db->get()->row_array();
  }
}
