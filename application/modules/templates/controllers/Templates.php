<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends CI_Controller
{
  public function index()
  {
    $this->load->view('templates');
    $this->load->view('login_templates');
  }
}
