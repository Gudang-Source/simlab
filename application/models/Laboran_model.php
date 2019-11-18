<?php
class Laboran_model extends CI_Model
{
    private $password;

    public function hashPassword($pass)
    {
        //$timeTarget = 0.05; // 50 milliseconds 
        $cost = 8;
        //do {
        //$cost++;
        //$start = microtime(true);
        $this->password = password_hash($pass, PASSWORD_BCRYPT, ["cost" => $cost]);
        //$end = microtime(true);
        //} while (($end - $start) < $timeTarget);
        return $this->password;
    }

    public function getUser($role)
    {
        $this->db->select('id, nama, prodi');
        $this->db->where('role_id', $role);
        $this->db->from('users');
        return $this->db->get();
    }

    public function addUser($data)
    {
        $this->hashPassword($data['password']);
        $data['password'] = $this->password;
        if ($this->db->insert('users', $data))
            return true;
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('users', $data))
            return true;
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('users'))
            return true;
    }

    public function getAllAsisten()
    {
        $this->db->select('nim, nama, prodi');
        $this->db->from('asisten');
        return $this->db->get();
    }

    public function getAllSetting($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pengaturan');
        return $this->db->get();
    }

    public function getAllMatkul()
    {
        $this->db->select('*');
        $this->db->from('matkul');
        return $this->db->get();
    }

    public function addMatkul($data)
    {
        if ($this->db->insert('matkul', $data))
            return true;
    }

    public function updateMatkul($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('matkul', $data))
            return true;
    }

    public function deleteMatkul($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('matkul'))
            return true;
    }

    public function getAllModul()
    {
        $this->db->select('m.id, m.matkul_id, m.nama_file, m.pertemuan, ma.nama', false);
        $this->db->from('modul as m');
        $this->db->join('matkul as ma', 'ma.id = m.matkul_id');
        return $this->db->get();
    }

    public function getModulById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('modul');
        return $this->db->get();
    }

    public function addModul($data)
    {
        if ($this->db->insert('modul', $data))
            return true;
    }

    public function deleteModul($id)
    {
        $temp = $this->getModulById($id);
        $file = $temp->row();
        unlink($file->path);
        $this->db->where('id', $id);
        if ($this->db->delete('modul'))
            return true;
    }

    public function updateSettingPendaftaran($id, $data)
    {
        $today = date('Y-m-d');
        if ($today >= $data['tgl_mulai'] && $today <= $data['tgl_akhir'])
            $data['value'] = 'Dibuka';
        else
            $data['value'] = 'Ditutup';
        $this->db->where('id', $id);
        if ($this->db->update('pengaturan', $data))
            return true;
    }

    public function formatTanggal($date)
    {
        $val1 = explode('/', $date['input1']);
        $val2 = explode('/', $date['input2']);
        $val1 = $val1[2] . '-' . $val1[0] . '-' . $val1[1];
        $val2 = $val2[2] . '-' . $val2[0] . '-' . $val2[1];
        $result = array(
            'tgl_mulai' => $val1,
            'tgl_akhir' => $val2
        );
        return $result;
    }
}
