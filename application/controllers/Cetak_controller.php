<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('Pdf');
        $this->load->model('Praktikan_model');
    }

    public function cetakJadwal()
    {
        $user = $this->Auth_model->cekUser();
        //var_dump($user);
        switch ($user['role']) {
            case '2':
                $data['mhs'] = $this->Praktikan_model->getAllJadwal();
                break;
            case '3':
            case '4':
                $data['mhs'] = $this->Praktikan_model->getJadwalUser();
                break;
            default:
                $this->load->view('errors/simlab/unauthorized_access');
        }
        $this->load->view('cetak/jadwal', $data);
    }

    public function cetakBebasLab()
    {
        $user = $this->Auth_model->cekUser();
    }

    public function cetakPresensi()
    {
        $user = $this->Auth_model->cekUser();
    }
}
