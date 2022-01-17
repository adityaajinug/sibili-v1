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
      'title' => 'Role Akses',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'role' => $this->db->get('user_role')->result_array()
    ];
    $this->template->load('templates/templates', 'role/index', $data);
  }
  public function roleAkses($role_id)
  {

    $data = [
      'title' => 'Detail Menu Akses',
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
      'title' => 'Detail Sub Menu Akses',
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
    <strong>Success - </strong> Role akses Telah diubah!</div>');
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
    <strong>Success - </strong> Role Akses Telah diubah</div>');
  }
  public function tahun_ajaran()
  {
    $data = [
      'title' => 'Detail Tahun Ajaran',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'th' => $this->db->get('school_year')->result_array()
    ];
    $this->template->load('templates/templates', 'tahun_ajaran/index', $data);
  }
  public function tambah_tahun_ajaran()
  {
    $data = [
      'year' => $this->input->post('year')
    ];
    $this->db->insert('school_year', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Telah Tersimpan</div>');
    redirect('admin/tahun_ajaran');
  }
}
