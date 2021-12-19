<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KKI_model extends CI_Model
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
  public function getKelompok()
  {
    $this->db
      ->select('group_code.code, dosen.dosen_name')
      ->from('groups')
      ->join('dosen', 'dosen.group_id = groups.group')
      ->join('group_code', 'group_code.group_id = groups.group');

    return $this->db->get()->result_array();
  }
  public function getKelompokId($id)
  {
    $data = [
      'group_code.code' => $id,
    ];

    $this->db
      ->select('group_code.code, dosen.dosen_name, groups.group')
      ->from('groups')
      ->join('dosen', 'dosen.group_id = groups.group')
      ->join('group_code', 'group_code.group_id = groups.group')
      ->where($data);

    return $this->db->get()->row_array();
  }
  public function getDetailKelompok($id)
  {
    $data = [
      'group_code.code' => $id,
    ];
    $this->db->distinct('group_code.code');
    $this->db->select('user.username, mahasiswa.mhs_name, mahasiswa.status, mahasiswa.email, dosen.dosen_name, group_code.code');
    $this->db->from('groups');
    $this->db->join('dosen', 'dosen.group_id = groups.group');
    $this->db->join('mahasiswa', 'mahasiswa.group_id = groups.group');
    $this->db->join('group_code', 'group_code.group_id = groups.group');
    $this->db->join('user', 'user.id_user = mahasiswa.user_id');
    $this->db->where($data);
    return $this->db->get()->result_array();
  }
}
