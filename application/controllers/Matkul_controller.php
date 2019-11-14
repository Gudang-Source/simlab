<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Matkul_model');
    }

    public function index()
    {
        $data['matkul'] = $this->Matkul_model->getAllMatkul();
        $this->load->view('laboran/kelola_matkul', $data);
    }

    public function tambahMatkul()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'semester' => $this->input->post('semester'),
            'prodi' => $this->input->post('prodi'),
            'pengampu' => $this->input->post('pengampu'),
            'biaya_modul' => $this->input->post('biaya')
        );
        //$data = sanitasiInput($temp);
        if ($this->Matkul_model->insert($data)) {
            echo 'sukses menambah';
            $this->index();
        } else
            echo 'gagal menambah';
    }

    public function editMatkul()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'semester' => $this->input->post('semester'),
            'prodi' => $this->input->post('prodi'),
            'pengampu' => $this->input->post('pengampu'),
            'biaya_modul' => $this->input->post('biaya')
        );
        if ($this->Matkul_model->update($data['id'], $data)) {
            echo 'sukses menambah';
            $this->index();
        } else
            echo 'gagal menambah';
    }

    public function hapusMatkul()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Matkul_model->delete($id))
            header('Location: ' . site_url('Matkul_controller'));
        else
            echo 'gagal menghapus';
    }
}
