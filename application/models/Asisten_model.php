<?php
class Asisten_model extends CI_Model
{
    private $password;

    public function hashPassword($pass)
    {
        $timeTarget = 0.05; // 50 milliseconds 
        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            $tmp = password_hash($pass, PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);
        return $this->password = $tmp;
    }

    public function insert($data)
    {
        $this->hashPassword($data['password']);
        $data['password'] = $this->password;
        if ($this->db->insert('asisten', $data))
            return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('asisten', $data))
            return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('asisten'))
            return true;
    }

    public function auth($data)
    {
        //Ambil hash dari db
        $this->db->select('password');
        $this->db->where('username', $data['username']);
        $this->db->from('asisten');
        $query = $this->db->get();
        //$val = array_shift($query->result_array());
        foreach ($query->result() as $q) {
            $val = $q->password;
        }

        // Verifikasi password
        $pass = password_verify($data['password'], $val);

        if ($pass) return true;
    }

    public function getAllAsisten()
    {
        $this->db->select('nim, nama, prodi');
        $this->db->from('asisten');
        return $this->db->get();
    }
}
