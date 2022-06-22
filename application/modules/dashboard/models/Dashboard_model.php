<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function getDosen()
    {
        $data = $this->session->userdata('username');
        $this->db->select('user.username, dosen.dosen_name');
        $this->db->from('user');
        $this->db->join('dosen', 'user.id_user = dosen.user_id', 'left');
        $this->db->where('user.username=', $data);
        return $this->db->get()->row_array();
    }
    public function getMhs()
    {
        $data = $this->session->userdata('username');
        $this->db->select('user.username, mahasiswa.mhs_name,mahasiswa.year_id');
        $this->db->from('user');
        $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
        $this->db->where('user.username=', $data);
        return $this->db->get()->row_array();
    }
    public function getAllAnnounce()
    {
        $this->db
            ->select('announcement.*')
            ->from('announcement');

        return $this->db->get()->result_array();
    }
}
