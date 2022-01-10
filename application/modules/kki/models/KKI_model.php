<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KKI_model extends CI_Model
{
  public function getDosen()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, dosen.dosen_name, dosen.id_dosen');
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
      ->select('dosen_pembimbing.group, dosen.dosen_name')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id');

    return $this->db->get()->result_array();
  }
  public function getKelompokId($id)
  {
    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.group, dosen.dosen_name')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where($data);

    return $this->db->get()->row_array();
  }

  public function getDetailKelompok($id)
  {
    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.group, dosen.dosen_name, mahasiswa.mhs_name, mahasiswa.email, mahasiswa.status, user.username')
      ->from('mhs_bimbingan')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where($data)
      ->where('mahasiswa.status=', 'aktif');

    return $this->db->get()->result_array();
  }
  public function getIndustri()
  {
    return $this->db->get('industries')->result_array();
  }
  public function allBab()
  {
    return $this->db->get('bab_kki')->result_array();
  }
  public function getBab()
  {

    $data = $this->session->userdata('username');
    $this->db->select('bab_kki.id_bab, file_laporan.file, bab_kki.name, bab_kki.description, dosen_pembimbing.group')
      ->from('bab_kki')
      ->join('file_laporan', 'file_laporan.bab_id = bab_kki.id_bab')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = file_laporan.pembimbing_id')
      ->join('user', 'user.id_user = file_laporan.user_id')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->where('user.username=', $data)
      ->group_by(array('bab_kki.id_bab', 'file_laporan.file', 'bab_kki.name', 'bab_kki.description', 'dosen_pembimbing.group'))
      ->order_by('bab_kki.id_bab', 'ASC');

    return $this->db->get()->result_array();
  }
  public function paramBab1()
  {
    $data = $this->session->userdata('username');
    $this->db->select('bab_kki.id_bab, bab_kki.name, bab_kki.description, dosen_pembimbing.group')
      ->from('bab_kki')
      ->join('file_laporan', 'file_laporan.bab_id = bab_kki.id_bab')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = file_laporan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = dosen.user_id')
      ->where('user.username=', $data)
      ->group_by(array('bab_kki.id_bab', 'bab_kki.name', 'bab_kki.description', 'dosen_pembimbing.group'))
      ->order_by('bab_kki.id_bab', 'ASC');

    return $this->db->get()->result_array();
  }
  public function getAllDosen()
  {
    return $this->db->get('dosen')->result_array();
  }
  public function getAllMhs()
  {
    $this->db->select('mahasiswa.id_mhs,mahasiswa.mhs_name, user.username')
      ->from('mahasiswa')
      ->join('user', 'user.id_user=mahasiswa.user_id')
      ->where('mahasiswa.status=', 'aktif');
    return $this->db->get()->result_array();
  }

  public function getBabDetail($file)
  {
    $this->db
      ->select('file_laporan.file, user.username, mahasiswa.mhs_name, user.status')
      ->from('file_laporan')
      ->join('user', 'user.id_user = file_laporan.user_id')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = file_laporan.pembimbing_id')
      ->where('file_laporan.file', $file)
      ->where('file_laporan.jenis_kki=', 1);
    return $this->db->get()->row_array();
  }
  public function getBabMhsPertama($id)
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('file_laporan.file, file_laporan.bab_id')
      ->from('file_laporan')
      ->join('user', 'file_laporan.user_id = user.id_user')
      ->where('file_laporan.bab_id', $id)
      ->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getUserChat($id, $group)
  {
    $this->db
      ->select('user.id_user, file_laporan.file, file_laporan.bab_id, dosen.dosen_name, user.status, dosen_pembimbing.group')
      ->from('file_laporan')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = file_laporan.pembimbing_id')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = dosen.user_id')
      ->where('file_laporan.bab_id', $id)
      ->where('dosen_pembimbing.group', $group);
    return $this->db->get()->row_array();
  }
  public function getLaporanPertama($id, $group)
  {

    $this->db->select('file_laporan.file, mahasiswa.mhs_name, dosen.dosen_name, user.image, user.status, bab_kki.name, file_laporan.bab_id, dosen_pembimbing.group')
      ->from('file_laporan')
      ->join('user', 'file_laporan.user_id = user.id_user')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('bab_kki', 'bab_kki.id_bab = file_laporan.bab_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = file_laporan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where('file_laporan.bab_id', $id)
      ->where('dosen_pembimbing.group', $group)
      ->where('file_laporan.jenis_kki=', 1);
    return $this->db->get()->result_array();
  }
  public function pembimbingId()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('dosen_pembimbing.id_pembimbing, mahasiswa.mhs_name')
      ->from('dosen_pembimbing')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mahasiswa', 'mhs_bimbingan.mhs_id = mahasiswa.id_mhs')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where('user.username=', $data);

    return $this->db->get()->row_array();
  }
  public function getChat($id, $group)
  {
    $this->db
      ->select('*')
      ->from('chats')
      ->where('bab_id', $id)
      ->where('pembimbing_id', $group);
    return $this->db->get()->result();
  }
  public function chatMessage($outgoing_chat_id, $incoming_chat_id, $id, $group)
  {
    $this->db
      ->select('*')
      ->from('chats')
      ->where('outgoing_chat_id', $outgoing_chat_id)
      ->where('incoming_chat_id', $incoming_chat_id)
      ->where('bab_id', $id)
      ->where('pembimbing_id', $group)
      ->order_by('message', 'Desc');

    return $this->db->get()->result();
  }
}
