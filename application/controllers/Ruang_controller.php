<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Ruang_model');
    }

    public function index()
    {
        $data['ruang'] = $this->Ruang_model->getAllRuang();
        $this->load->view('laboran/kelola_ruang', $data);
    }

    public function tambahRuang()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'lokasi' => $this->input->post('lokasi')
        );
        //$data = sanitasiInput($temp);
        if ($this->Ruang_model->insert($data)) {
            echo 'sukses menambah';
            $this->index();
        } else
            echo 'gagal menambah';
    }

    public function editRuang()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'semester' => $this->input->post('semester'),
            'prodi' => $this->input->post('prodi'),
            'pengampu' => $this->input->post('pengampu'),
            'biaya_modul' => $this->input->post('biaya')
        );
        if ($this->Ruang_model->update($data['id'], $data)) {
            echo 'sukses menambah';
            $this->index();
        } else
            echo 'gagal menambah';
    }

    public function hapusRuang()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Ruang_model->delete($id))
            header('Location: ' . site_url('Ruang_controller'));
        else
            echo 'gagal menghapus';
    }
}
