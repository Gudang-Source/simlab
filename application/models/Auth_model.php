<?php
defined('BASEPATH') or exit();

class Auth_model extends CI_Model
{

    public function login($role)
    {
        switch ($role) {
            case "superadmin":
                redirect('Kalab_controller/?page=dashboard');
                break;
            case "admin":
                redirect('Laboran_controller/?page=dashboard');
                break;
            case "asisten":
                redirect('Asisten_controller/?page=dashboard');
                break;
            case "praktikan":
                redirect('Praktikan_controller/?page=dashboard');
                break;
            default:
                redirect('errors/404');
        }
    }

    public function selectUser($data)
    {
        $this->db->select('nama, username, password, role');
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
        $_SESSION['nama'] = $data->nama;
        $_SESSION['username'] = $data->username;
        $_SESSION['role'] = $data->role;
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
