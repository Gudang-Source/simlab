<?php
class Matkul_model extends CI_Controller
{
    public function getAllMatkul()
    {
        $this->db->select('*');
        $this->db->from('matkul');
        return $this->db->get();
    }

    public function insert($data)
    {
        if ($this->db->insert('matkul', $data))
            return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('matkul', $data))
            return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('matkul'))
            return true;
    }
}
