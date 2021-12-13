<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function index()
  {
    $data = [
      'menu' => $this->db->get('user_menu')->result_array()
    ];
    $this->template->load('templates/templates', 'menu_view/index', $data);
  }
  public function tambah()
  {
    $this->form_validation->set_rules('menu', 'Menu', 'required');
    if ($this->form_validation->run() ==  false) {
      redirect('menu');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Wes nambah!</div>');
      redirect('menu');
    }
  }
  public function submenu()
  {
    $this->load->model('Menu_model', 'menu');
    $data = [
      'menu' => $this->db->get('user_menu')->result_array(),
      'submenu' => $this->menu->getSubmenu()
    ];
    $this->template->load('templates/templates', 'submenu/index', $data);
  }
  public function tambah_submenu()
  {
    $config = array(
      array(
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'required'
      ),
      array(
        'field' => 'url',
        'label' => 'Url',
        'rules' => 'required'
      ),
      array(
        'field' => 'icon',
        'label' => 'Icon',
        'rules' => 'required'
      ),
      array(
        'field' => 'menu_id',
        'label' => 'Menu',
        'rules' => 'required'
      ),

    );

    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    if ($this->form_validation->run() ==  FALSE) {
      redirect('menu/submenu');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'icon' => $this->input->post('icon'),
        'url' => $this->input->post('url'),
        'is_active' => $this->input->post('is_active'),

      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      <strong>Success - </strong> Wes nambah!</div>');
      redirect('menu/submenu');
    }
  }
}
