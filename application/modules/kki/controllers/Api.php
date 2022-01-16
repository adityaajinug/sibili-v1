<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KKI_model', 'kki');
  }
  public function chat_load()
  {
    $outgoing_chat_id = $this->input->get('outgoing_chat_id');
    $incoming_chat_id = $this->input->get('incoming_chat_id');
    $bab_dosen_id = $this->input->get('bab_dosen_id');
    $group = $this->input->get('group');



    $chat = $this->kki->chatMessage($outgoing_chat_id, $incoming_chat_id, $bab_dosen_id, $group);
    foreach ($chat as $c) {
      $result[] = array(
        'sender' => $this->session->userdata('id_user') == $c->outgoing_chat_id ? true : false,
        'id_chats' => $c->id_chats,
        'incoming_chat_id' => $c->incoming_chat_id,
        'outgoing_chat_id' => $c->outgoing_chat_id,
        'message' => $c->message,
        'time' => $c->time,
        'bab_dosen_id' => $c->bab_dosen_id,
        'group' => $c->group
      );
    }
    echo json_encode(
      array(
        'chat' => $result
      )
    );
  }
}
