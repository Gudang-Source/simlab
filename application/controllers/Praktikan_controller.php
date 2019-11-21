<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Praktikan_model');
    }

    public function index()
    {
        if (isset($_SESSION['username']) && $_SESSION['role'] == 4) {
            $val = $this->input->get('page');
            switch ($val) {
                case "dashboard":
                    $this->load->view('praktikan/dashboard');
                    break;
                case "pendaftaran":
                    $this->tampilPendaftaran();
                    break;
                case "jadwal":
                    $this->tampilJadwal();
                    break;
                case "nilai":
                    $this->tampilNilai();
                    break;
                case "modul":
                    $this->tampilModul();
                    break;
                case "setting":
                    $this->tampilSetting();
                    break;
                default:
                    $this->load->view('errors/html/error_404');
            }
        } else {
            redirect('Auth_controller');
            //$url = site_url() . $this->uri->uri_string();
        }
    }

    public function tampilPendaftaran()
    {
        $daftar = $this->Praktikan_model->getPengaturan();
        $buka = $this->Praktikan_model->cekSettings($daftar);
        if ($buka) {
            $empty = $this->Praktikan_model->isPraktikumEmpty();
            if ($empty) {
                $data['praktikum'] = $this->Praktikan_model->getAllPraktikum();
                $this->load->view('praktikan/praktikum_daftar', $data);
            } else {
                $data['praktikum'] = $this->Praktikan_model->getPraktikumAvail();
                $this->load->view('praktikan/praktikum_daftar', $data);
            }
        } else {
            $this->load->view('errors/simlab/praktikum_daftar');
        }
    }

    public function tambahPendaftaran()
    {
        $data = array(
            'mhs_id' => $_SESSION['iduser'],
            'role_id' => $_SESSION['role'],
            'jadwal_id' => $this->input->get('jdw'),
            'status' => 'belum lulus',
            'keterangan' => 'ambil'
        );
        if ($this->Praktikan_model->addPraktikum($data))
            redirect('Praktikan_controller/?page=pendaftaran');
        else
            redirect('Praktikan_controller/?page=dashboard');
    }

    public function hapusPendaftaran()
    { }

    public function tampilJadwal()
    {
        $data['jadwal'] = $this->Praktikan_model->getJadwalUser();
        $this->load->view('praktikan/praktikum_jadwal', $data);
    }

    public function tampilModul()
    { }

    public function tampilNilai()
    { }

    public function cetakJadwal()
    { }

    public function cetakBuktiBayar()
    { }
}
