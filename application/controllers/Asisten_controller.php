<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asisten_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Asisten_model');
    }

    public function index()
    {
        $this->load->view('asisten/dashboard');
        //$this->tampilAsisten();
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

    public function tambahAsisten()
    {
        $data = array(
            'nim' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
            'date_added' => $this->input->post('add'),
            'date_expired' => $this->input->post('exp')
        );
        //$data = sanitasiInput($temp);
        if ($this->Asisten_model->insert($data)) {
            header('Location: ' . site_url('Asisten_controller/kelolaAsisten'));
        } else
            echo 'gagal menambah';
    }

    public function editAsisten()
    {
        $data = array(
            'nim' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
            'date_added' => $this->input->post('add'),
            'date_expired' => $this->input->post('exp')
        );
        //$data = sanitasiInput($temp);
        if ($this->Asisten_model->update($data['nim'], $data))
            header('Location: ' . site_url('Asisten_controller/kelolaAsisten'));
        else
            echo 'gagal update';
    }

    public function hapusAsisten()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Asisten_model->delete($id))
            header('Location: ' . site_url('Asisten_controller/kelolaAsisten'));
        else
            echo 'gagal menghapus';
    }

    public function kelolaAsisten()
    {
        $data['asisten'] = $this->Asisten_model->getAllAsisten();
        $this->load->view('asisten/kelola_asisten', $data);
    }

    public function login()
    {
        $data = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass')
        );
        //$data = sanitasiInput($temp);
        $verify = $this->Asisten_model->auth($data);
        if ($verify === true) {
            $this->load->view('asisten/dashboard');
        } else {
            $this->load->view('errors/salahPassword');
        }
    }

    public function logout()
    { }
}
