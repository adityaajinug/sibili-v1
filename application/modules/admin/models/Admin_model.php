<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function getmenusub()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`. * 
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_menu`.`id` != 1
            ";

    return $this->db->query($query)->result_array();
  }
  public function getmenu()
  {
    $query = "SELECT  * 
            FROM `user_menu`
            ";

    return $this->db->query($query)->result_array();
  }
  public function getAllDosen()
  {
    $this->db
      ->select('dosen.*, user.*, user_role.*')
      ->from('dosen')
      ->join('user', 'user.id_user = dosen.user_id')
      ->join('user_role', 'user_role.id = user.role_id');

    return $this->db->get()->result_array();
  }
  public function getAllMhs()
  {
    $this->db
      ->select('mahasiswa.*, user.*, user_role.*')
      ->from('mahasiswa')
      ->join('user', 'user.id_user = mahasiswa.user_id')
      ->join('user_role', 'user_role.id = user.role_id');

    return $this->db->get()->result_array();
  }
  public function getRoleDosen()
  {
    $this->db
      ->select('user_role.*')
      ->from('user_role')
      ->where('user_role.category_role=', 3);


    return $this->db->get()->result_array();
  }
}
