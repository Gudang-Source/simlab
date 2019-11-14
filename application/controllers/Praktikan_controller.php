<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Praktikan_model');
    }

    public function index()
    {
        $this->load->view('praktikan/header');
        $this->load->view('praktikan/dashboard');
        $this->load->view('praktikan/footer');
        //$this->tampilPraktikan();
    }

    public function sanitasiInput($arr)
    {
        $arr = array(
            'nim' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
            'date_added' => $this->input->post('add'),
            'date_expired' => $this->input->post('exp')
        );
        return $arr;
    }

    public function tambahPraktikum()
    { }

    public function editPraktikan()
    { }

    public function hapusPraktikum()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Praktikan_model->delete($id))
            header('Location: ' . site_url('Praktikan_controller/kelolaPraktikan'));
        else
            echo 'gagal menghapus';
    }

    public function daftarPraktikum()
    {
        $data['praktikum'] = $this->Praktikan_model->getAllPraktikum();
        $this->load->view('praktikan/kelola_praktikum', $data);
    }

    public function login()
    {
        $data = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass')
        );
        //$data = sanitasiInput($temp);
        $verify = $this->Praktikan_model->auth($data);
        if ($verify === true) {
            $this->load->view('praktikan/dashboard');
        } else {
            $this->load->view('errors/salahPassword');
        }
    }

    public function logout()
    { }
}
