<?php
class Praktikan_model extends CI_Model
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
        if ($this->db->insert('praktikan', $data))
            return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('praktikan', $data))
            return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('praktikan'))
            return true;
    }

    public function auth($data)
    {
        //Ambil hash dari db
        $this->db->select('password');
        $this->db->where('username', $data['username']);
        $this->db->from('praktikan');
        $query = $this->db->get();
        //$val = array_shift($query->result_array());
        foreach ($query->result() as $q) {
            $val = $q->password;
        }

        // Verifikasi password
        $pass = password_verify($data['password'], $val);

        if ($pass) return true;
    }

    public function getAllPraktikan()
    {
        $this->db->select('nim, nama, prodi');
        $this->db->from('praktikan');
        return $this->db->get();
    }
}
