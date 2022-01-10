<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function index()
  {
    $data = [
      'title' => 'Kuliah Kerja Industri',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),


    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/index', $data);
    } else {
      $this->template->load('templates/templates', 'laporan/dosen/index', $data);
    }
  }

  public function kki_pertama()
  {
    $data = [
      'title' => 'Kuliah Kerja Industri / Bab',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'allbab' => $this->kki->allBab(),
      'bab' => $this->kki->getBab(),
      'param' => $this->kki->paramBab1(),
      'pembimbing' => $this->kki->pembimbingId()

    ];
    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/detail', $data);
    } else {
      $this->template->load('templates/templates', 'laporan/dosen/detail', $data);
    }
  }


  public function detail_bab()
  {
    $id = $this->uri->segment(4);
    $group = $this->uri->segment(5);
    $data = [
      'title' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'bab_mhs' => $this->kki->getBabMhsPertama($id),
      'user_chat' => $this->kki->getUserChat($id, $group),
      'laporan' => $this->kki->getLaporanPertama($id, $group),
      'chat' => $this->kki->getChat($id, $group),

    ];

    if ($this->session->userdata('role_id') == 1) {
      $this->template->load('templates/templates', 'laporan/admin/index', $data);
    } else if ($this->session->userdata('role_id') == 2) {
      $this->template->load('templates/templates', 'laporan/mahasiswa/chat', $data);
    } else if ($this->session->userdata('role_id') == 3) {
      $this->template->load('templates/templates', 'laporan/dosen/data_bab', $data);
    } else {
      $this->template->load('templates/templates', 'laporan/dosen/data_bab', $data);
    }
  }
  public function update_status()
  {
    $id = $this->session->userdata('username');
    $time = time() + 10;

    $this->db->set('status', $time);
    $this->db->where('username', $id);
    $this->db->update('user');
  }
  // public function get_status($id)
  // {
  //   $id = $this->session->userdata('username');
  //   $time = time();
  //   $html = '';
  //   $user =  $this->kki->onlineUser($id)->result_array();
  //   // return $user;

  //   $status = 'Offline';
  //   $class = 'circle-offline';

  //   if ($user['status'] > $time) {
  //     $status = 'Online';
  //     $class = "circle-online";
  //   }
  //   $html .= '<li class="name">' . $user['dosen_name'] . '</li>
  //   <li class=' . $class . '></li>
  //   <li class="status">' . $status . '</li>';

  //   echo $html;
  // }

  public function input_chat()
  {

    if ($this->session->userdata('username')) {
      $outgoing_chat_id = $this->input->post('outgoing_chat_id');
      $incoming_chat_id = $this->input->post('incoming_chat_id');
      $bab_id = $this->input->post('bab_id');
      $pembimbing_id = $this->input->post('pembimbing_id');
      $message = $this->input->post('message');
      $file = $this->input->post('file');

      if (!empty($message)) {
        $data = [
          'incoming_chat_id' => $incoming_chat_id,
          'outgoing_chat_id' => $outgoing_chat_id,
          'pembimbing_id' => $pembimbing_id,
          'bab_id' => $bab_id,
          'message' => $message,
          'time' => time()
        ];
        $this->db->insert('chats', $data);
        redirect('kki/laporan/detail_bab/' . $bab_id . '/' . $pembimbing_id . '/' . $file);
      }
    }
  }
  public function getChat()
  {
    if ($this->session->userdata('username')) {
      $outgoing_chat_id = $this->input->post('outgoing_chat_id');
      $incoming_chat_id = $this->input->post('incoming_chat_id');
      $id = $this->input->post('bab_id');
      $group = $this->input->post('pembimbing_id');
      $output = '';
      $chat = $this->kki->chatMessage($outgoing_chat_id, $incoming_chat_id, $id, $group);
      var_dump($chat);

      foreach ($chat as $c) {
        if ($c['outgoing_chat_id'] === $outgoing_chat_id) {
          $output .= '<div class="chat-right">
          <div class="message">
            <p id="right">' . $c->message . '</p>
          </div>
          <div class="chat-time">
            <p>' . date_default_timezone_set('Asia/Jakarta');
          date('d m Y - H:i a', $c->time)

            . '</p>
          </div>
        </div>';
        } else {
          $output .= '<div class="chat-left">
          <div class="message">
            <p id="left">' . $c->message . '</p>
          </div>
          <div class="chat-time">
            <p>' . date_default_timezone_set('Asia/Jakarta');
          date('d m Y - H:i a', $c->time)

            . '</p>
          </div>
        </div>';
        }
      }
      echo $output;
    }
  }

  public function bab_detail()
  {
    $file = $this->uri->segment(6);
    $data = [
      'kki' => 'Kuliah Kerja Industri / Bab / Detail',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'dosen' => $this->kki->getDosen(),
      'mhs' => $this->kki->getMhs(),
      'bab_detail' => $this->kki->getBabDetail($file)
    ];
    $this->template->load('templates/templates', 'laporan/dosen/chat', $data);
  }
  public function tambah_file_kki1()
  {
    $config['upload_path']   = FCPATH . './assets/file/laporan/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 5000;
    $config['file_name']     = url_title($this->input->post('file'));
    $this->upload->initialize($config);

    $this->upload->do_upload('file');
    $file = $this->upload->data();
    $data = [
      'bab_id' => $this->input->post('bab_id'),
      'file' => $file['file_name'],
      'pembimbing_id' => $this->input->post('pembimbing_id'),
      'user_id' => $this->input->post('user_id'),
      'jenis_kki' => 1
    ];
    $this->db->insert('file_laporan', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <strong>Success - </strong> Wes Melbu!</div>');
    redirect('kki/laporan/kki_pertama');
  }
}
