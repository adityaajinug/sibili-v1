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
        $this->db->select('user.username, mahasiswa.mhs_name');
        $this->db->from('user');
        $this->db->join('mahasiswa', 'user.id_user = mahasiswa.user_id', 'left');
        $this->db->where('user.username=', $data);
        return $this->db->get()->row_array();
    }
    public function getMhsBimbingan($id)
    {
        $data = [
            'dosen_pembimbing.group' => $id,
        ];
        $this->db
            ->select('user.username, mahasiswa.mhs_name, mahasiswa.email, mahasiswa.status')
            ->from('dosen_pembimbing')
            ->join('mhs_bimbingan', 'dosen_pembimbing.id_pembimbing = mhs_bimbingan.pembimbing_id')
            ->join('mahasiswa', 'mahasiswa.id_mhs = mhs_bimbingan.mhs_id')
            ->join('dosen', 'dosen.id_dosen = dosen_pembimbing.dosen_id')
            ->join('user', 'user.id_user = dosen.user_id')
            ->where($data)
            ->where('mahasiswa.status=', 'aktif');
        return $this->db->get()->result_array();
    }
}
