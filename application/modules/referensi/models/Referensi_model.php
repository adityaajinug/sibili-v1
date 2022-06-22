<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi_model extends CI_Model
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
  public function getIndustri()
  {
    $this->db->select('industries.*, industries_address.address, industries_address.industries_id, industries_address.maps')
      ->from('industries')
      ->join('industries_address', 'industries_address.industries_id = industries.id_industries');

    return $this->db->get()->result_array();
  }
  public function getUpload()
  {
    $this->db->distinct('tahun')
      ->select('upload.*')
      ->from('upload')
      ->where('upload.tahun=', 2019)
      ->where('upload.category_upload=', 1);


    return $this->db->get()->result_array();
  }
  public function getDetailLap($id)
  {
    $this->db
      ->select('upload.*, user.username')
      ->from('upload')
      ->join('user', 'upload.user_id = user.id_user')
      ->where('upload.tahun=', 2019)
      ->where('upload.category_upload=', 1);


    return $this->db->get()->result_array();
  }
  public function getAjaran()
  {
    return $this->db->get('school_year')->result_array();
  }
}
