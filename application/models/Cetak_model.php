<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_model extends CI_Model
{
    public function getJadwalUser()
    {
        $mhs = $_SESSION['iduser'];
        $this->db->select('ma.nama, ma.semester, ma.pengampu, j.kelas, j.sesi, j.hari', FALSE);
        $this->db->from('jadwal as j');
        $this->db->join('matkul as ma', 'ma.id = j.matkul_id');
        $this->db->join('praktikum as p', 'p.jadwal_id = j.id');
        $this->db->where('p.mhs_id', $mhs);
        return $this->db->get();
    }

    public function getAllJadwal()
    {
        $this->db->select('ma.nama, ma.semester, ma.pengampu, j.kelas, j.sesi, j.hari', FALSE);
        $this->db->from('jadwal as j');
        $this->db->join('matkul as ma', 'ma.id = j.matkul_id');
        $this->db->join('praktikum as p', 'p.jadwal_id = j.id');
        return $this->db->get();
    }
}
