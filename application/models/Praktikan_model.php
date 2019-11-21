<?php
class Praktikan_model extends CI_Model
{
    public function getPengaturan()
    {
        $this->db->select('tgl_mulai, tgl_akhir, value');
        $this->db->where('id', '1');
        $this->db->from('pengaturan');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function cekSettings($data)
    {
        $now = date("Y-n-j");
        $mulai = $data->tgl_mulai;
        $akhir = $data->tgl_akhir;

        if ($now >= $mulai && $now <= $akhir)
            return TRUE;
        else
            return FALSE;
    }

    public function isPraktikumEmpty()
    {
        $nim = $_SESSION['iduser'];
        $this->db->select('*');
        $this->db->from('praktikum');
        $this->db->where('mhs_id', $nim);
        $count = $this->db->count_all_results();
        if ($count < 1)
            return TRUE;
        else
            return FALSE;
    }

    public function getAllPraktikum()
    {
        $this->db->select('ma.nama, ma.semester, ma.pengampu, ma.biaya_modul, j.id, j.kelas, j.sesi, j.hari', FALSE);
        $this->db->from('jadwal as j');
        $this->db->join('matkul as ma', 'ma.id = j.matkul_id');
        return $this->db->get();
    }

    public function getPraktikumAvail()
    {
        /*
        SELECT ma.nama, ma.semester, ma.pengampu, ma.biaya_modul, j.kelas, j.sesi, j.hari
        FROM jadwal AS j
        INNER JOIN matkul AS ma ON ma.id = j.matkul_id
        INNER JOIN praktikum AS p ON p.jadwal_id != j.id
        WHERE j.id NOT IN (SELECT jadwal_id FROM praktikum WHERE mhs_id = 1500016034)
        GROUP BY j.id
        */

        $mhs = $_SESSION['iduser'];
        $this->db->select('ma.nama, ma.semester, ma.pengampu, ma.biaya_modul, j.id, j.kelas, j.sesi, j.hari', FALSE);
        $this->db->from('jadwal as j');
        $this->db->join('matkul as ma', 'ma.id = j.matkul_id');
        $this->db->join('praktikum as p', 'p.jadwal_id != j.id');
        $this->db->where_not_in('j.id', "(SELECT jadwal_id FROM praktikum WHERE mhs_id = $mhs)", FALSE);
        $this->db->group_by('j.id');
        return $this->db->get();
    }

    public function addPraktikum($data)
    {
        return $this->db->insert('praktikum', $data);
    }

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
