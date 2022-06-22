<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KKI_model extends CI_Model
{

  /* GET SESSION STUDENT AND LECTURER
  ------------------------------------------
  */

  public function getDosen()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, dosen.dosen_name, dosen.id_dosen, dosen.year_id, dosen.user_id');
    $this->db->from('user');
    $this->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  public function getMhs()
  {
    $data = $this->session->userdata('username');
    $this->db->select('user.username, mahasiswa.mhs_name, mahasiswa.id_mhs, mahasiswa.year_id, mahasiswa.user_id');
    $this->db->from('user');
    $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
    $this->db->where('user.username=', $data);
    return $this->db->get()->row_array();
  }
  /* END GET SESSION STUDENT AND LECTURER
  ------------------------------------------
  */


  /* KOORDINATOR KKI 
  ------------------------------------------------------
  */
  public function getKelompok()
  {
    $this->db
      ->select('dosen_pembimbing.id_pembimbing,dosen_pembimbing.group, dosen.dosen_name, dosen_pembimbing.dosen_id')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->order_by('dosen_pembimbing.id_pembimbing');

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
  public function getPembimbingId($id)
  {

    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.*, dosen.dosen_name, dosen_pembimbing.group')
      ->from('dosen_pembimbing')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where($data);

    return $this->db->get()->row_array();
  }
  public function getMhsBimbingan($id)
  {
    $this->db
      ->select('mhs_bimbingan.*, dosen_pembimbing.*')
      ->from('mhs_bimbingan')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan.pembimbing_id')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')

      ->where('dosen_pembimbing.group', $id);

    return $this->db->get()->result_array();
  }
  public function getBimbinganMhs($id)
  {
    $this->db
      ->select('mhs_bimbingan.*, mahasiswa.mhs_name, user.username')
      ->from('mhs_bimbingan')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where('mhs_bimbingan.pembimbing_id', $id);
    return $this->db->get()->result();
  }


  public function getForm()
  {
    $this->db
      ->select('form_upload.*')
      ->from('form_upload')
      ->order_by('form_upload.id_form', 'Desc');

    return $this->db->get()->result_array();
  }

  public function getDetailKelompok($id)
  {
    $data = [
      'dosen_pembimbing.group' => $id,
    ];

    $this->db
      ->select('dosen_pembimbing.group, dosen.dosen_name, mahasiswa.mhs_name, mhs_bimbingan.id_mhs_bimbingan, mahasiswa.email, mahasiswa.status_mhs, user.username')
      ->from('mhs_bimbingan')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->where($data)
      ->where('mahasiswa.status_mhs=', 1);

    return $this->db->get()->result_array();
  }
  public function getIndustri()
  {
    $this->db->select('industries.*, industries_address.address, industries_address.industries_id, industries_address.maps')
      ->from('industries')
      ->join('industries_address', 'industries_address.industries_id = industries.id_industries');

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
      ->where('mahasiswa.status_mhs=', 1);
    return $this->db->get()->result_array();
  }
  public function deleteGroupKelompok($id)
  {
    $this->db->where('id_mhs_bimbingan', $id);
    $this->db->delete('mhs_bimbingan');
  }
  public function getSchedule()
  {
    $this->db
      ->select('schedule.*, school_year.*, semester.*')
      ->from('schedule')
      ->join('school_year', 'school_year.id_year = schedule.year_id')
      ->join('semester', 'school_year.id_year = semester.year_id');

    return $this->db->get()->result_array();
  }
  public function getScheduleId($id)
  {
    $this->db
      ->select('schedule.*, school_year.*, semester.*')
      ->from('schedule')
      ->join('school_year', 'school_year.id_year = schedule.year_id')
      ->join('semester', 'school_year.id_year = semester.year_id')
      ->where('schedule.id_schedule', $id);

    return $this->db->get()->row();
  }
  public function getMhsExam($id)
  {
    $this->db
      ->select('mhs_exam.*, mahasiswa.mhs_name, dosen.dosen_name, user.username')
      ->from('mhs_exam')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_exam.pembimbing_id')
      ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_exam.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user')
      ->where('schedule.id_schedule', $id);
    return $this->db->get()->result();
  }
  public function getMhsExamId($id)
  {
    $this->db
      ->select('mhs_exam.*, mahasiswa.mhs_name, dosen.dosen_name, user.username')
      ->from('mhs_exam')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_exam.pembimbing_id')
      ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_exam.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user')
      ->where('mhs_exam.schedule_id', $id);
    return $this->db->get()->result();
  }
  public function getScheduleExam()
  {
    $this->db
      ->select('schedule.schedule_start, mhs_exam.room_exam, mhs_exam.assesor_one, mhs_exam.assesor_two, mahasiswa.mhs_name, dosen.dosen_name, user.username')
      ->from('mhs_exam')
      ->join('schedule', 'schedule.id_schedule = mhs_exam.schedule_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = mhs_exam.pembimbing_id')
      ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_exam.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user');
    return $this->db->get()->result();
  }
  public function getRules()
  {
    $this->db
      ->select('rules_exam.*')
      ->from('rules_exam')
      ->where('rules_exam.category_rules', 1);
    return $this->db->get()->result_array();
  }
  public function deleteMhsUjian($id)
  {
    $this->db->where('id_exam', $id);
    $this->db->delete('mhs_exam');
  }
  public function getAnnouncement()
  {
    return $this->db->get_where('announcement', ['category_announce' => 1])->result_array();
  }
  public function getAnnounceId($id)
  {
    return $this->db->get_where('announcement', ['id_announce' => $id])->row_array();
  }
  public function getDokumenFormat()
  {
    return $this->db->get_where('format', ['category_format' => 1])->result_array();
  }


  /* END KOORDINATOR KKI 
  ------------------------------------------------------
  */


  /* ALL GET FOR KKI LAPORAN
  -----------------------------------------------------------
  */
  public function allBabKki()
  {
    return $this->db->get_where('bab', ['category_bab' => 1])->result_array();
  }


  public function getLaporanPertama($id, $year, $group)
  {
    $this->db->select('bimbingan.id_bimbingan,bimbingan.file, bimbingan.category_bimbingan, user.username, mahasiswa.mhs_name, bab.name, bimbingan.bab_dosen_id, bimbingan.category_bimbingan, dosen_pembimbing.group, bimbingan.user_id, bimbingan.status_konfirmasi, school_year.year')
      ->from('bimbingan')
      ->join('user', 'bimbingan.user_id = user.id_user')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('bab_dosen', 'bimbingan.bab_dosen_id = bab_dosen.bab_id')
      ->join('school_year', 'school_year.id_year = bimbingan.year_id')
      ->join('bab', 'bab.status_bab = bab_dosen.bab_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
      ->where('bimbingan.bab_dosen_id', $id)
      ->where('bimbingan.year_id', $year)
      ->where('dosen_pembimbing.group', $group)
      ->group_by(array('user.id_user', 'bimbingan.id_bimbingan', 'bimbingan.file', 'mahasiswa.mhs_name', 'dosen.dosen_name', 'user.image', 'user.status', 'bab.name', 'bimbingan.bab_dosen_id', 'dosen_pembimbing.group', 'bimbingan.user_id', 'bimbingan.status_konfirmasi'))
      ->order_by('bimbingan.user_id', 'asc');

    return $this->db->get()->result_array();
  }
  public function getBabDosen()
  {
    $data = $this->session->userdata('username');
    $this->db->select('bab_dosen.bab_id, bab.name, bab.description, dosen_pembimbing.group, dosen.year_id')
      ->from('user')
      ->join('dosen', 'dosen.user_id = user.id_user')
      ->join('school_year', 'school_year.id_year = dosen.year_id')
      ->join('dosen_pembimbing', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      ->join('bab_dosen', 'bab_dosen.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
      ->where('user.username=', $data)
      ->group_by(array('bab_dosen.bab_id', 'bab.name', 'bab.description', 'dosen_pembimbing.group', 'dosen.year_id'))
      ->order_by('bab_dosen.bab_id', 'ASC');
    return $this->db->get()->result_array();
  }
  public function getAllBabDosen()
  {
    $data = $this->session->userdata('id_user');
    $this->db
      ->select('mahasiswa.mhs_name, mhs_bimbingan.pembimbing_id, bab_dosen.bab_id, school_year.year, user.id_user, user.username, bab_dosen.pembimbing_id, bab.name, dosen.year_id')
      ->from('user')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->join('school_year', 'school_year.id_year = mahasiswa.year_id')
      ->join('mhs_bimbingan', 'mhs_bimbingan.mhs_id = mahasiswa.id_mhs')
      ->join('dosen', 'school_year.id_year = dosen.year_id')
      ->join('bab_dosen', 'bab_dosen.pembimbing_id = mhs_bimbingan.pembimbing_id')
      ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
      ->join('dosen_pembimbing', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
      ->where('user.id_user', $data)
      ->group_by(array('mahasiswa.mhs_name', 'mhs_bimbingan.pembimbing_id', 'bab_dosen.bab_id', 'school_year.year', 'user.id_user', 'user.username', 'bab_dosen.pembimbing_id', 'bab.name', 'dosen.year_id'));

    return $this->db->get()->result_array();
  }

  public function getBimbingan()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('bimbingan.id_bimbingan,dosen_pembimbing.id_pembimbing, dosen_pembimbing.dosen_id, user.username, user.id_user, bimbingan.file, dosen_pembimbing.group, bimbingan.bab_dosen_id, bab.name, bab.description, bimbingan.status_konfirmasi, bimbingan.category_bimbingan')
      ->from('dosen_pembimbing')
      ->join('bimbingan', 'bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('bab_dosen', 'bab_dosen.bab_id = bimbingan.bab_dosen_id')
      ->join('bab', 'bab.status_bab = bab_dosen.bab_id')
      ->join('user', 'user.id_user = bimbingan.user_id')
      ->group_by(array('bimbingan.id_bimbingan', 'dosen_pembimbing.id_pembimbing', 'bimbingan.user_id', 'bimbingan.file', 'bab.name', 'bab.description', 'dosen_pembimbing.group', 'bimbingan.bab_dosen_id', 'bimbingan.status_konfirmasi'))
      ->order_by('bimbingan.bab_dosen_id', 'asc')
      ->where('user.username=', $data);

    return $this->db->get()->result_array();
  }
  public function getBimbinganKoreksi($id, $group, $year, $user)
  {

    $this->db
      ->select('bimbingan_koreksi.id_bimbingan_koreksi,bimbingan_koreksi.file, bimbingan_koreksi.bab_dosen_id, bimbingan_koreksi.category_bimbingan_koreksi')
      ->from('bimbingan_koreksi')
      ->join('bab_dosen', 'bimbingan_koreksi.bab_dosen_id = bab_dosen.bab_id')
      ->join('dosen_pembimbing', 'bimbingan_koreksi.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
      ->join('user', 'bimbingan_koreksi.outgoing_file_id = user.id_user')
      ->where('bimbingan_koreksi.bab_dosen_id=', $id)
      ->where('dosen_pembimbing.group=', $group)
      ->where('bimbingan_koreksi.year_id', $year)
      ->where('bimbingan_koreksi.incoming_file_id=', $user);
    return $this->db->get()->row_array();
  }

  public function getBabDetail($id, $group, $year, $user)
  {
    $this->db
      ->select('bimbingan.id_bimbingan, bimbingan.file, bab.name, user.username, mahasiswa.mhs_name, user.status, user.id_user, dosen_pembimbing.group, bimbingan.bab_dosen_id, bimbingan.category_bimbingan')
      ->from('bimbingan')
      ->join('dosen_pembimbing', 'dosen_pembimbing.id_pembimbing = bimbingan.pembimbing_id')
      ->join('user', 'user.id_user = bimbingan.user_id')
      ->join('bab_dosen', 'bab_dosen.bab_id = bimbingan.bab_dosen_id')
      ->join('bab', 'bab_dosen.bab_id = bab.status_bab')
      ->join('mahasiswa', 'mahasiswa.user_id = user.id_user')
      ->where('bimbingan.bab_dosen_id', $id)
      ->where('dosen_pembimbing.group', $group)
      ->where('bimbingan.year_id', $year)
      ->where('bimbingan.user_id', $user)
      ->where('bimbingan.category_bimbingan=', 1);
    return $this->db->get()->row_array();
  }
  public function getBabMhs($id)
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('bimbingan.file, bimbingan.bab_dosen_id, bimbingan.id_bimbingan')
      ->from('bimbingan')
      ->join('user', 'bimbingan.user_id = user.id_user')
      ->where('bimbingan.bab_dosen_id', $id)
      ->where('user.username=', $data);
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
  public function pembimbingId()
  {

    if ($this->session->userdata('role_id') == 2) {
      $data = $this->session->userdata('username');
      $this->db
        ->select('dosen_pembimbing.id_pembimbing, dosen_pembimbing.group, mahasiswa.mhs_name, dosen_pembimbing.dosen_id, user.id_user')
        ->from('dosen_pembimbing')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('mahasiswa', 'mhs_bimbingan.mhs_id = mahasiswa.id_mhs')
        ->join('user', 'user.id_user = mahasiswa.user_id')
        ->where('user.username=', $data);
      return $this->db->get()->row_array();
    } else {
      $data = $this->session->userdata('id_user');
      $this->db
        ->select('dosen_pembimbing.id_pembimbing, dosen_pembimbing.group')
        ->from('dosen_pembimbing')
        ->join('mhs_bimbingan', 'mhs_bimbingan.pembimbing_id = dosen_pembimbing.id_pembimbing')
        ->join('dosen', 'dosen_pembimbing.dosen_id = dosen.id_dosen')
        ->join('user', 'user.id_user = dosen.user_id')
        ->where('user.id_user=', $data);

      return $this->db->get()->row_array();
    }
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


  /* END ALL GET FOR KKI LAPORAN
  -----------------------------------------------------------
  */



  /* GET FOR KKI LAPORAN PERTAMA
  -----------------------------------------------------------
  */

  public function chatMessage($outgoing_chat_id, $incoming_chat_id, $bab_dosen_id, $group, $bimbingan_id)
  {

    $this->db
      ->select('chats.*')
      ->from('chats')
      ->join('bimbingan', 'bimbingan.id_bimbingan = chats.bimbingan_id')
      ->where('chats.outgoing_chat_id', $outgoing_chat_id)
      ->where('chats.incoming_chat_id', $incoming_chat_id)
      ->where('chats.bab_dosen_id',  $bab_dosen_id)
      ->where('chats.group', $group)
      ->or_where('chats.outgoing_chat_id', $incoming_chat_id)
      ->where('chats.incoming_chat_id', $outgoing_chat_id)
      ->where('chats.bimbingan_id', $bimbingan_id)
      ->where('chats.category_chats=', 1)
      ->group_by(array('chats.id_chats', 'chats.bimbingan_id'));
    $sql = $this->db->get();
    return $sql->result();
  }
  /* END GET FOR KKI LAPORAN PERTAMA
  -----------------------------------------------------------
  */



  /* MAGANG
  -----------------------------------------------------------
  */

  public function getAddressindustries($id)
  {
    $this->db->select('industries_address.address, industries_address.industries_id, industries_address.maps')
      ->from('industries_address')
      ->where('industries_address.industries_id', $id);

    return $this->db->get()->result();
  }

  public function getInternship()
  {
    $data = $this->session->userdata('username');
    $this->db->select('internship.*, mahasiswa.mhs_name, user.username')
      ->from('internship')
      ->join('mahasiswa', 'mahasiswa.id_mhs = internship.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user')
      // ->join('industries', 'industries.id_industries = internship.internship_industry_name');
      ->where('user.username', $data);


    return $this->db->get()->row_array();
  }
  public function getAllInternship()
  {

    $this->db->select('internship.*, mahasiswa.mhs_name, user.username')
      ->from('internship')
      ->join('mahasiswa', 'mahasiswa.id_mhs = internship.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user');
    // ->join('industries', 'industries.id_industries = internship.internship_industry_name')
    return $this->db->get()->result_array();
  }
  public function getInternshipActivity()
  {
    $data = $this->session->userdata('username');
    $this->db
      ->select('internship_activity.*')
      ->from('internship_activity')
      ->join('mahasiswa', 'mahasiswa.id_mhs = internship_activity.mhs_id')
      ->join('user', 'mahasiswa.user_id = user.id_user')
      ->where('user.username', $data);
    return $this->db->get()->result_array();
  }
  /* END MAGANG
  -----------------------------------------------------------
  */
}
