<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
  }

  public function role()
  {
    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'role' => $this->db->get('user_role')->result_array()
    ];
    $this->template->load('templates/templates', 'role/index', $data);
  }
  public function roleAkses($role_id)
  {

    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'role' => $this->db->get_where('user_role', ['id' => $role_id])->row_array(),
      'akses' => $this->admin->getmenusub(),
      'menu' => $this->admin->getmenu(),
      'submenu' => $this->db->get('user_sub_menu')->result_array()

    ];
    $this->template->load('templates/templates', 'role/role_akses', $data);
  }
  public function akses_sub($akses_id)
  {

    $data = [
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'role' => $this->db->get_where('user_role', ['id' => $akses_id])->row_array(),
      'submenu' => $this->db->get('user_sub_menu')->result_array()

    ];
    $this->template->load('templates/templates', 'role/sub_akses', $data);
  }
  public function role_change_access()
  {
    $menu_id = $this->input->post('menuid');
    $role_id = $this->input->post('roleid');


    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id,

    ];
    $akses = $this->db->get_where('user_access_menu', $data);
    if ($akses->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Wes digenti!</div>');
  }
  public function sub_change_access()
  {
    $submenu_id = $this->input->post('submenuid');
    $role_id = $this->input->post('roleid');


    $data = [
      'role_id' => $role_id,
      'submenu_id' => $submenu_id,

    ];
    $akses = $this->db->get_where('user_access_sub_menu', $data);
    if ($akses->num_rows() < 1) {
      $this->db->insert('user_access_sub_menu', $data);
    } else {
      $this->db->delete('user_access_sub_menu', $data);
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Wes digenti!</div>');
  }
}
