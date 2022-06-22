<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{
  public function getDosen()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, dosen.dosen_name, dosen.id_dosen, dosen.year_id');
    $this->db->from('user');
    $this->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getMhs()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, mahasiswa.mhs_name, mahasiswa.year_id');
    $this->db->from('user');
    $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getAnnouncement()
  {
    $this->db->select('announcement.*')->from('announcement')->order_by('announcement.id_announce', 'desc');
    return $this->db->get()->result_array();
  }
  public function getForm()
  {
    $this->db->select('form_upload.*')->from('form_upload')->order_by('form_upload.id_form', 'desc');
    return $this->db->get()->result_array();
  }
  public function getSemester()
  {
    if ($this->session->userdata('role_id') == 2) {
      $data = $this->session->userdata('id_user');
      $this->db
        ->select('mahasiswa.*, school_year.*, semester.*, user.id_user, user.username, mahasiswa.user_id')
        ->from('user')
        ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
        ->join('school_year', 'school_year.id_year = mahasiswa.year_id')
        ->join('semester', 'semester.year_id = school_year.id_year')
        ->where('user.id_user', $data);

      return $this->db->get()->row_array();
    } else {
      $data = $this->session->userdata('id_user');
      $this->db
        ->select('dosen.year_id, dosen.user_id, user.username, school_year.year, semester.*')
        ->from('user')
        ->join('dosen', 'dosen.user_id = user.id_user')
        ->join('school_year', 'school_year.id_year = dosen.year_id')
        ->join('semester', 'semester.year_id = school_year.id_year')
        ->where('user.id_user', $data);

      return $this->db->get()->row_array();
    }
  }
}
