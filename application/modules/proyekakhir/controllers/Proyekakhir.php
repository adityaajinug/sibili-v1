<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyekakhir extends CI_Controller
{
  public function index()
  {
    $this->template->load('templates/templates', 'bimbingan/index');
  }
  public function absensi()
  {
    $this->template->load('templates/templates', 'absensi/absen_mhs');
  }
}
