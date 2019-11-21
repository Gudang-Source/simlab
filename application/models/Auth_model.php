<?php
defined('BASEPATH') or exit();

class Auth_model extends CI_Model
{

    public function cekUser()
    {
        if (isset($_SESSION['iduser']) && isset($_SESSION['role'])) {
            $id = $_SESSION['iduser'];
            $role = $_SESSION['role'];
            return array('id' => $id, 'role' => $role);
        } else
            return FALSE;
    }

    public function login($role)
    {
        switch ($role) {
            case 1:
                redirect('Kalab_controller/?page=dashboard');
                break;
            case 2:
                redirect('Laboran_controller/?page=dashboard');
                break;
            case 3:
                redirect('Asisten_controller/?page=dashboard');
                break;
            case 4:
                redirect('Praktikan_controller/?page=dashboard');
                break;
            default:
                redirect('errors/404');
        }
    }

    public function selectUser($data)
    {
        $this->db->select('id, nama, username, password, role_id');
        $this->db->where('username', $data['username']);
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function verifikasi($input, $user_data)
    {
        if (password_verify($input['password'], $user_data->password))
            return TRUE;
        else
            return FALSE;
    }

    public function setSession($data)
    {
        $_SESSION['iduser'] = $data->id;
        $_SESSION['nama'] = $data->nama;
        $_SESSION['username'] = $data->username;
        $_SESSION['role'] = $data->role_id;
    }

    public function destroySession()
    {
        unset($_SESSION['nama']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        session_destroy();
    }

    public function cekSession()
    { }
}
