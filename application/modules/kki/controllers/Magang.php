<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function index()
  {
    $data = [
      'title' => 'Magang',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'mhs' => $this->kki->getMhs(),
      'semester' => $this->kki->getSemester(),


    ];
    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'magang/index', $data);
    } else {
      redirect('blocked');
    }
  }
  public function kki_pertama()
  {
    $data = [
      'title' => 'Magang KKI Pertama',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'mhs' => $this->kki->getMhs(),
      'semester' => $this->kki->getSemester(),
      'industri'  => $this->kki->getIndustri(),
      'internship'  => $this->kki->getInternship(),
      'activity'  => $this->kki->getInternshipActivity()

    ];
    if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'magang/kki-pertama/detail', $data);
    } else {
      redirect('blocked');
    }
  }
  public function getAddress()
  {
    $id = $this->input->post('id');
    $data = $this->kki->getAddressindustries($id);
    $output = '';

    foreach ($data as $add) {
      $output .=   $add->address;
    }
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($output));
  }
  public function tambah_magang()
  {
    $internship_industry =  $this->input->post('internship_industry');
    $address = $this->input->post('address');
    $supervisor = $this->input->post('supervisor');
    $mhs_id = $this->input->post('mhs_id');
    $year_id = $this->input->post('year_id');
    $status_internship = $this->input->post('status_internship');
    $category_internship = $this->input->post('category_internship');



    $data = [
      'internship_industry_name' => $internship_industry,
      'address' => $address,
      'supervisor' => $supervisor,
      'mhs_id' => $mhs_id,
      'year_id' => $year_id,
      'status_internship' => $status_internship,
      'category_internship' => $category_internship,
    ];
    $this->db->insert('internship', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/magang/kki_pertama');
  }
  public function tambah_log()
  {

    $date = $this->input->post('date_activity');
    $activity = $this->input->post('activity');
    $year_id = $this->input->post('year_id');
    $mhs_id = $this->input->post('mhs_id');
    $category_activity = $this->input->post('category_activity');

    $data = [
      'date_activity' => $date,
      'activity' => $activity,
      'year_id' => $year_id,
      'mhs_id' => $mhs_id,
      'category_activity' => $category_activity,
    ];
    $this->db->insert('internship_activity', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Data Tersimpan!</div>');
    redirect('kki/magang/kki_pertama');
  }
}
