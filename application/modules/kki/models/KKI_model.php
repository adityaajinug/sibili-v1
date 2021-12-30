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

  // Koordinator
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
  public function getIndustri()
  {
    return $this->db->get('industries')->result_array();
  }
  public function getBab()
  {
    return $this->db->get('bab_kki')->result_array();
    // $this->db->select('bab_kki.id_bab, file_laporan.group_id')
    //   ->from('bab_kki')
    //   ->join('file_laporan', 'file_laporan.bab_id = bab_kki.id_bab');
    // return $this->db->get()->result_array();
  }
  public function paramBab1($id)
  {
    $this->db->select('bab_kki.id_bab, file_laporan.group_id')
      ->from('bab_kki')
      ->join('file_laporan', 'file_laporan.bab_id = bab_kki.id_bab')
      ->where('file_laporan.bab_id', $id);
    return $this->db->get()->row_array();
  }
  public function paramBab2()
  {
    $this->db->select('bab_kki.id_bab, file_laporan.group_id')
      ->from('bab_kki')
      ->join('file_laporan', 'file_laporan.bab_id = bab_kki.id_bab')
      ->where('file_laporan.bab_id=', 2);
    return $this->db->get()->row_array();
  }
  public function getBabDetail($id)
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('file_laporan.file, user.username, mahasiswa.mhs_name, groups.group')
      ->from('file_laporan')
      ->join('user', 'user.id_user = file_laporan.user_id')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('groups', 'groups.group = file_laporan.group_id')
      ->where('file_laporan.bab_id', $id)
      ->where('user.username=', $data)
      ->group_by(array('file_laporan.file', 'user.username', 'mahasiswa.mhs_name', 'groups.group'));
    return $this->db->get()->row_array();
  }
  public function getUserChat($id)
  {
    $this->db
      ->select('user.id_user, file_laporan.file, mahasiswa.mhs_name, dosen.dosen_name, user.status')
      ->from('file_laporan')
      ->join('user', 'file_laporan.dosen_id = user.id_user')
      ->join('dosen', 'file_laporan.dosen_id = dosen.user_id')
      ->join('mahasiswa', 'mahasiswa.user_id = file_laporan.user_id')
      ->where('file_laporan.bab_id', $id);
    return $this->db->get()->row_array();
  }
  public function onlineUser($id)
  {
    $this->db
      ->select('user.id_user, file_laporan.file, mahasiswa.mhs_name, dosen.dosen_name, user.status')
      ->from('file_laporan')
      ->join('user', 'file_laporan.dosen_id = user.id_user')
      ->join('dosen', 'file_laporan.dosen_id = dosen.user_id')
      ->join('mahasiswa', 'mahasiswa.user_id = file_laporan.user_id')
      ->where('file_laporan.bab_id', $id);
  }
  public function getLaporan($id, $group)
  {
    // $this->db
    //   ->select('user.id_user, file_laporan.file, mahasiswa.mhs_name, dosen.dosen_name, user.status, bab_kki.name')
    //   ->from('file_laporan')
    //   ->join('user', 'file_laporan.dosen_id = user.id_user')
    //   ->join('dosen', 'file_laporan.dosen_id = dosen.user_id')
    //   ->join('mahasiswa', 'mahasiswa.user_id = file_laporan.user_id')
    //   ->join('bab_kki', 'bab_kki.id_bab = file_laporan.bab_id')
    //   ->where('file_laporan.bab_id', $id);
    // $data = $this->session->userdata('username');
    $this->db->select('file_laporan.file, mahasiswa.mhs_name, dosen.dosen_name, user.image, user.status, bab_kki.name');
    $this->db->from('file_laporan');
    $this->db->join('user', 'file_laporan.user_id = user.id_user');
    $this->db->join('dosen', 'dosen.group_id = file_laporan.group_id');
    $this->db->join('mahasiswa', 'mahasiswa.user_id = user.id_user');
    $this->db->join('bab_kki', 'bab_kki.id_bab = file_laporan.bab_id');
    $this->db->where('file_laporan.bab_id', $id);
    $this->db->where('file_laporan.group_id', $group);

    // $this->db->where('dosen.group_id', $id);
    // $this->db->where('file_laporan.dosen_id', $id);
    // $this->db->where('user.username=', $data);
    return $this->db->get()->result_array();
  }
}
