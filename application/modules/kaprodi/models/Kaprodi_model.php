<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_model extends CI_Model
{
  public function getSemester($id)
  {
    $this->db
      ->select('school_year.*, semester.*')
      ->from('semester')
      ->join('school_year', 'school_year.id_year = semester.year_id')
      ->where('school_year.id_year', $id);

    return  $this->db->get()->result_array();
  }
}
