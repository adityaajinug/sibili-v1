<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian_model extends CI_Model
{
  public function getDosen()
  {
    dosen();
    return $this->db->get()->row_array();
  }
  public function getMhs()
  {
    mahasiswa();
    return $this->db->get()->row_array();
  }
  public function getSchedule()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('mhs_exam.*, schedule.*')
      ->from('mhs_exam')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_exam.mhs_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id')
      ->where('user.username=', $data);

    return $this->db->get()->result_array();
  }
  public function getAllSchedule()
  {

    $this->db
      ->select('mhs_exam.*, schedule.*, mahasiswa.mhs_name')
      ->from('mhs_exam')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_exam.mhs_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id');


    return $this->db->get()->result_array();
  }
}
