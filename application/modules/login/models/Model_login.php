<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
  public function process_login($username, $password)
  {
    $user = $this->db->get_where('user', ['username' => $username]);
    if ($user->num_rows() > 0) {
      $data = $user->row_array();
      if (password_verify($password, $data['password'])) {
        $var = [
          'username' => $data['username'],
          'role_id' => $data['role_id'],
          'id_user' => $data['id_user'],
        ];
        $this->session->set_userdata($var);
      }
    }
  }
}
