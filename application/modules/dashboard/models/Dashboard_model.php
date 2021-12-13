<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getDosen()
    {
        $data = $this->session->userdata('username');
        $this->db->select('user.username, dosen.complete_name');
        $this->db->from('user');
        $this->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
        $this->db->where('user.username=', $data);
        return $this->db->get()->row_array();
    }
    public function getMhs()
    {
        $data = $this->session->userdata('username');
        $this->db->select('user.username, mahasiswa.complete_name');
        $this->db->from('user');
        $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
        $this->db->where('user.username=', $data);
        return $this->db->get()->row_array();
    }
}
