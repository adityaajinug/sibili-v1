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
      ->select('dosen_pembimbing.group, dosen.dosen_name, mahasiswa.mhs_name, mahasiswa.email, mahasiswa.status_mhs, user.username')
      ->from('mhs_bimbingan')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where($data)
      ->where('mahasiswa.status_mhs=', 'aktif');

    return $this->db->get()->result_array();
  }
  public function getIndustri()
  {
    return $this->db->get('industries')->result_array();
  }
  public function allBabKki()
  {
    return $this->db->get_where('bab', ['category_bab' => 1])->result_array();
  }
  public function getBab()
  {
    $this->db->select('bab_dosen.bab_id, bab.name, bab.description, dosen_pembimbing.group')
      ->from('bab_dosen')
      ->join('bimbingan', 'bab_dosen.bab_id = bimbingan.bab_dosen_id')
      ->join('bab', 'bab_dosen.bab_id = bab.id_bab')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bab_dosen.pembimbing_id')
      ->join('user', 'user.id_user = bab_dosen.user_id')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->order_by('bab_dosen.bab_id', 'ASC');

    return $this->db->get()->result_array();
  }
  public function getBabDosen()
  {

    if ($this->session->userdata('role_id') == 2) {
      $this->db->select('bab_dosen.bab_id, bab.name, bab.description, dosen_pembimbing.group')
        ->from('bab_dosen')
        ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
        ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bab_dosen.pembimbing_id')
        ->join('user', 'user.id_user = bab_dosen.user_id')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
        ->order_by('bab.id_bab', 'ASC');

      return $this->db->get()->result_array();
    } else {
      $data = $this->session->userdata('username');
      $this->db->select('bab_dosen.bab_id, bab.name, bab.description, dosen_pembimbing.group')
        ->from('bab_dosen')
        ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
        ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bab_dosen.pembimbing_id')
        ->join('user', 'user.id_user = bab_dosen.user_id')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
        ->where('user.username=', $data)
        ->order_by('bab.id_bab', 'ASC');
      return $this->db->get()->result_array();
    }


    // ->group_by(array('bab.id_bab', 'bab.name', 'bab.description', 'dosen_pembimbing.group'))

  }
  public function getAllBabDosen()
  {


    $this->db
      ->distinct('bab_dosen.pembimbing_id,bab_dosen.bab_id')
      ->select('bab_dosen.bab_id, bab_dosen.id_bab_dosen, bab.name, dosen_pembimbing.group, bab_dosen.pembimbing_id')
      ->from('bab')

      ->join('bab_dosen', 'bab_dosen.bab_id = bab.status_bab')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bab_dosen.pembimbing_id')
      ->join('user', 'bab_dosen.user_id = user.id_user')
      // ->where('bab_dosen.pembimbing_id=', 6)
      ->group_by(array('bab_dosen.bab_id', 'bab_dosen.id_bab_dosen', 'bab_dosen.bab_id', 'bab.name', 'bab.description', 'bab_dosen.pembimbing_id'))

      ->order_by('bab_dosen.bab_id', 'ASC');

    return $this->db->get()->result_array();
  }

  public function getBimbingan()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('bimbingan.file, dosen_pembimbing.group, bimbingan.bab_dosen_id, bab.name, bab.description, bimbingan.status_konfirmasi')
      ->from('bimbingan')
      ->join('bab_dosen', 'bimbingan.bab_dosen_id = bab_dosen.bab_id')
      ->join('bab', 'bab.status_bab = bab_dosen.bab_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('user', 'bimbingan.user_id = user.id_user')
      ->where('bimbingan.category_bimbingan=', 1)
      // ->group_by(array('bimbingan.file', 'dosen_pembimbing.group', 'bimbingan.bab_dosen_id,', 'bab.name', 'bab.description', 'bimbingan.status_konfirmasi'))
      ->where('user.username=', $data);
    return $this->db->get()->result_array();
  }
  public function getBimbinganKoreksi($id, $group)
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('bimbingan_koreksi.file, bimbingan_koreksi.bab_dosen_id')
      ->from('bimbingan_koreksi')

      ->join('bab_dosen', 'bimbingan_koreksi.bab_dosen_id = bab_dosen.bab_id')
      ->join('dosen_pembimbing', 'bimbingan_koreksi.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('user', 'bimbingan_koreksi.user_id = user.id_user')
      // ->where('bimbingan_koreksi.file=', $file)
      ->where('bimbingan_koreksi.bab_dosen_id=', $id)
      ->where('dosen_pembimbing.group=', $group)
      ->where('bimbingan_koreksi.category_bimbingan_koreksi=', 1);
    // ->where('user.username=', $data);

    return $this->db->get()->row_array();
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
      ->where('mahasiswa.status_mhs=', 'aktif');
    return $this->db->get()->result_array();
  }


  public function getBabDetail($file)
  {
    $this->db
      ->select('bimbingan.file, bab.name, user.username, mahasiswa.mhs_name, user.status, user.id_user, dosen_pembimbing.group, bimbingan.bab_dosen_id')
      ->from('bimbingan')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('user', 'user.id_user = bimbingan.user_id')
      ->join('bab_dosen', 'bab_dosen.bab_id = bimbingan.bab_dosen_id')
      ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->where('bimbingan.file', $file)
      ->where('bimbingan.category_bimbingan=', 1);
    return $this->db->get()->row_array();
  }
  public function getBabMhsPertama($id)
  {
    // $data = $this->session->userdata('username');
    $this->db
      ->select('bimbingan.file, bimbingan.bab_dosen_id')
      ->from('bimbingan')
      ->join('user', 'bimbingan.user_id = user.id_user')
      ->where('bimbingan.bab_dosen_id', $id);
    // ->where('bimbingan.group', $group);
    // ->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getUserChat($id, $group)
  {
    $this->db
      ->select('user.id_user, bimbingan.file, bimbingan.bab_dosen_id, dosen.dosen_name, user.status, dosen_pembimbing.id_pembimbing, dosen_pembimbing.group')
      ->from('bimbingan')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = dosen.user_id')
      ->where('bimbingan.bab_dosen_id', $id)
      ->where('dosen_pembimbing.group', $group);
    return $this->db->get()->row_array();
  }
  public function getLaporanPertama($id, $group)
  {

    $this->db->select('bimbingan.file, mahasiswa.mhs_name, dosen.dosen_name, user.image, user.status, bab.name, bimbingan.bab_dosen_id, dosen_pembimbing.group, bimbingan.user_id, bimbingan.status_konfirmasi')
      ->from('bimbingan')
      ->join('user', 'bimbingan.user_id = user.id_user')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('bab_dosen', 'bimbingan.bab_dosen_id = bab_dosen.bab_id')
      ->join('bab', 'bab.status_bab = bab_dosen.bab_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where('bimbingan.bab_dosen_id', $id)
      ->where('dosen_pembimbing.group', $group)
      ->where('bimbingan.category_bimbingan=', 1);
    return $this->db->get()->result_array();
  }
  public function pembimbingId()
  {

    if ($this->session->userdata('role_id') == 2) {
      $data = $this->session->userdata('username');
      $this->db
        ->select('dosen_pembimbing.id_pembimbing, mahasiswa.mhs_name')
        ->from('dosen_pembimbing')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('mahasiswa', 'mhs_bimbingan.mhs_id = mahasiswa.id_mhs')
        ->join('user', 'user.id_user = mahasiswa.user_id')
        ->where('user.username=', $data);
      return $this->db->get()->row_array();
    } else {
      $data = $this->session->userdata('id_user');
      $this->db
        ->select('dosen_pembimbing.id_pembimbing')
        ->from('dosen_pembimbing')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
        ->join('user', 'user.id_user = dosen.user_id')
        ->where('user.id_user=', $data);

      return $this->db->get()->row_array();
    }
  }
  public function chatMessage($outgoing_chat_id, $incoming_chat_id, $bab_dosen_id, $group)
  {

    $this->db->from('chats');
    $this->db->where('outgoing_chat_id', $outgoing_chat_id);
    $this->db->where('incoming_chat_id', $incoming_chat_id);
    $this->db->where('bab_dosen_id', $bab_dosen_id);
    $this->db->where('group', $group);
    // $this->db->where('outgoing_chat=', $data);
    $this->db->or_where('outgoing_chat_id', $incoming_chat_id);
    $this->db->or_where('incoming_chat_id', $outgoing_chat_id);

    $r = $this->db->get();

    return $r->result();
  }
  public function getForm()
  {
    // $data = $this->session->userdata('id_user');
    $this->db
      ->select('form_upload.*')
      ->from('form_upload')
      ->join('user', 'form_upload.user_id = user.id_user')
      ->where('category_form=', 1)
      ->or_where('category_form=', 2)
      ->or_where('category_form=', 3)
      ->or_where('category_form=', 4)
      // ->where('user.id_user=', $data)
      ->order_by('form_upload.id_form', 'Desc');

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
  public function getFormUpload()
  {
    $this->db
      ->select('form_upload.*')
      ->from('form_upload')
      ->join('user', 'form_upload.user_id = user.id_user')
      ->limit('1')
      ->where('category_form=', 1)
      ->or_where('category_form=', 2)
      ->order_by('form_upload.id_form', 'Desc');

    return $this->db->get()->row_array();
  }
  public function getUpload()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('upload.*, user.id_user')
      ->from('upload')
      ->join('user', 'upload.user_id = user.id_user')
      ->where('category_upload=', 1)
      ->or_where('category_upload=', 2)
      ->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getUserDosen($id)
  {
    $this->db
      ->select('dosen.id_dosen,dosen.dosen_name, user.username')
      ->from('dosen')
      ->join('user', 'dosen.user_id = user.id_user')
      ->where('user.id_user=', $id);
    return $this->db->get()->result_array();
  }
}
