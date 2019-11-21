<?php
defined('BASEPATH') or exit();

class Auth_controller extends CI_Controller
{
    public function index()
    {
        $user = $this->Auth_model->cekUser();
        if (isset($user['role'])) {
            $this->Auth_model->login($user['role']);
        } else
            $this->load->view('login/pengguna');
    }

    public function authUser()
    {
        $input = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass')
        );

        $user_data = $this->Auth_model->selectUser($input);
        $verified = $this->Auth_model->verifikasi($input, $user_data);
        if ($verified) {
            $this->Auth_model->setSession($user_data);
            $this->Auth_model->login($user_data->role_id);
        } else
            echo 'username atau password salah';
    }

    public function logout()
    {
        $this->Auth_model->destroySession();
        $this->load->view('login/pengguna');
    }
}
