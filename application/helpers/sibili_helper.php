<?php

function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('login');
  } else {
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryMenu['id'];

    $userAccess = $ci->db->get_where('user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ]);
    if ($userAccess->num_rows() < 1) {
      redirect('login/blocked');
    }
  }
}

function check_access($role_id, $menu_id)
{
  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('user_access_menu');

  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}
function check_access_sub($role_id, $submenu_id)
{
  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('submenu_id', $submenu_id);
  $result = $ci->db->get('user_access_sub_menu');

  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}
function user_get()
{

  $ci = get_instance();
  $ci->load->model('User_model', 'user');
  $data = [
    'user' => $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array(),
    'dosen' => $ci->user->getDosen(),
    'mhs' => $ci->user->getMhs()
  ];
  if ($ci->session->userdata('role_id') == 1) {
    $ci->template->load('templates/templates', 'dashboard_views/admin', $data);
  } else if ($ci->session->userdata('role_id') == 2) {
    $ci->template->load('templates/templates', 'dashboard_views/mhs', $data);
  }
}
