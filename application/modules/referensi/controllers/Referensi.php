<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi extends CI_Controller
{
  public function file()
  {
    $this->template->load('templates/templates', 'file_pa/index');
  }
  public function file_detail()
  {
    $this->template->load('templates/templates', 'file_pa/detail');
  }
  public function video()
  {
    $this->template->load('templates/templates', 'video/index');
  }
}
