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
}
