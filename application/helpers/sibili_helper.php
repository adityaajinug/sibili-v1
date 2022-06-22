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
function sub()
{
  $ci = get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('login');
  } else {
    $role_id = $ci->session->userdata('role_id');
    $submenu = $ci->uri->segment(2);

    $querySubmenu = $ci->db->get_where('user_sub_menu', ['title' => $submenu])->row_array();
    $submenu = $querySubmenu['id'];

    $userAccess = $ci->db->get_where('user_access_sub_menu', [
      'role_id' => $role_id,
      'submenu_id' => $submenu
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
function fsize($file)
{
  $a = array("B", "KB", "MB", "GB", "TB", "PB");
  $pos = 0;
  $size = filesize($file);
  while ($size >= 1024) {
    $size /= 1024;
    $pos++;
  }
  return round($size, 2) . " " . $a[$pos];
}
function format_indo($date)
{
  date_default_timezone_set('Asia/Jakarta');
  // array hari dan bulan
  $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

  // pemisahan tahun, bulan, hari, dan waktu
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl = substr($date, 8, 2);
  $waktu = substr($date, 11, 5);
  $hari = date("w", strtotime($date));
  $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . ", " . $waktu;

  return $result;
}
function waktu_indo($date)
{
  $waktu = substr($date, 11, 5);
  $result = $waktu;

  return $result;
}
function tgl_indo($date)
{

  // array hari dan bulan
  $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

  // pemisahan tahun, bulan, hari, dan waktu
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl = substr($date, 8, 2);
  // $waktu = substr($date, 11, 5);
  $hari = date("w", strtotime($date));
  $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " ";

  return $result;
}

function session()
{
  $ci = get_instance();

  $ci->session->userdata('username');
}
function dosen()
{
  $ci = get_instance();
  $data = $ci->session->userdata('username');
  $ci->db->select('user.username, dosen.dosen_name, dosen.id_dosen, dosen.year_id, dosen.user_id');
  $ci->db->from('user');
  $ci->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
  $ci->db->where('user.username=', $data);
}
function mahasiswa()
{
  $ci = get_instance();
  $data = $ci->session->userdata('username');
  $ci->db->select('user.username, mahasiswa.mhs_name, mahasiswa.id_mhs, mahasiswa.year_id, mahasiswa.user_id');
  $ci->db->from('user');
  $ci->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
  $ci->db->where('user.username=', $data);
}
