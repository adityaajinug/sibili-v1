<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kaprodi_model', 'kaprodi');
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
  public function detail_th($id)
  {
    $data = [
      'title' => 'Detail Tahun Ajaran',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'semester' => $this->kaprodi->getSemester($id)
    ];
    $this->template->load('templates/templates', 'tahun_ajaran/detail', $data);
  }
  public function check_semester()
  {
    $id = htmlspecialchars($this->input->post('id', true));
    $check = htmlspecialchars($this->input->post('check_semester', true));

    if ($check == 0) :
      $check = 1;
    else :
      $check = 0;
    endif;

    $this->db->set('ganjil', $check);
    $this->db->where('id_semester', $id);
    $this->db->update('semester');
  }
  public function check_read()
  {
    $id = htmlspecialchars($this->input->post('id', true));
    $check = htmlspecialchars($this->input->post('check_read', true));

    if ($check == 0) :
      $check = 1;
    else :
      $check = 0;
    endif;

    $this->db->set('genap', $check);
    $this->db->where('id_semester', $id);
    $this->db->update('semester');
  }
}
