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
    $this->db->distinct('groups.group');
    $this->db->from('groups');
    return $this->db->get()->result_array();
  }
  public function getDetailKelompok()
  {
    $this->db->distinct('dosen.dosen_name , mahasiswa.mhs_name, groups.group');
    $this->db->from('dosen');
    $this->db->join('groups', 'dosen.id_dosen = groups.dosen_id');
    $this->db->join('mahasiswa', 'mahasiswa.id_mhs = groups.mhs_id');
    return $this->db->get()->result_array();
  }
}
