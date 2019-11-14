<?php
class Ruang_model extends CI_Controller
{
    public function getAllRuang()
    {
        $this->db->select('*');
        $this->db->from('ruang');
        return $this->db->get();
    }

    public function insert($data)
    {
        if ($this->db->insert('ruang', $data))
            return true;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('ruang', $data))
            return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('ruang'))
            return true;
    }
}
