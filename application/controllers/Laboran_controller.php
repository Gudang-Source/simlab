<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboran_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laboran_model');
    }

    public function index()
    {
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            $val = $this->input->get('page');
            switch ($val) {
                case "dashboard":
                    $this->load->view('laboran/dashboard');
                    break;
                case "praktikan":
                    $this->tampilPraktikan();
                    break;
                case "asisten":
                    $this->tampilAsisten();
                    break;
                case "jadwal":
                    $this->tampilJadwal();
                    break;
                case "matkul":
                    $this->tampilMatkul();
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

    public function tampilPraktikan()
    {
        $data['praktikan'] = $this->Laboran_model->getUser('praktikan');
        $this->load->view('laboran/kelola_praktikan', $data);
    }

    public function tambahPraktikan()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
            'role' => 'praktikan'
        );
        //$data = sanitasiInput($temp);
        if ($this->Laboran_model->addUser($data)) {
            redirect('Laboran_controller/?page=praktikan');
        } else
            echo 'gagal menambah';
    }

    public function editPraktikan()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi')
        );
        //$data = sanitasiInput($temp);
        if ($this->Laboran_model->updateUser($data['id'], $data))
            redirect('Laboran_controller/?page=praktikan');
        else
            echo 'gagal update';
    }

    public function hapusPraktikan()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Laboran_model->deleteUser($id))
            redirect('Laboran_controller/?page=praktikan');
        else
            echo 'gagal menghapus';
    }

    public function tampilAsisten()
    {
        $data['asisten'] = $this->Laboran_model->getUser('asisten');
        $this->load->view('laboran/kelola_asisten', $data);
    }

    public function tambahAsisten()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
            'role' => 'asisten'
        );
        //$data = sanitasiInput($temp);
        if ($this->Laboran_model->addUser($data)) {
            redirect('Laboran_controller/?page=asisten');
        } else
            echo 'gagal menambah';
    }

    public function editAsisten()
    {
        $data = array(
            'nim' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi')
        );
        //$data = sanitasiInput($temp);
        if ($this->Laboran_model->updateUser($data['id'], $data))
            redirect('Laboran_controller/?page=asisten');
        else
            echo 'gagal update';
    }

    public function hapusAsisten()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Laboran_model->deleteUser($id))
            redirect('Laboran_controller/?page=asisten');
        else
            echo 'gagal menghapus';
    }

    public function tampilMatkul()
    {
        $data['matkul'] = $this->Laboran_model->getAllMatkul();
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
        if ($this->Laboran_model->addMatkul($data))
            redirect('Laboran_controller/?page=matkul');
        else
            redirect('gagal tambah');
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

        if ($this->Laboran_model->updateMatkul($data['id'], $data))
            redirect('Laboran_controller/?page=matkul');
        else
            redirect('gagal tambah');
    }

    public function tampilModul()
    {
        $data['modul'] = $this->Laboran_model->getAllModul();
        $data['matkul'] = $this->Laboran_model->getAllMatkul();
        $this->load->view('laboran/kelola_modul', $data);
    }

    public function tambahModul()
    {
        $config['upload_path'] = './uploads/modul/';
        $config['allowed_types'] = 'pdf|doc|odt';
        $config['max_size'] = '5120';
        $config['max_filename'] = '128';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('modul');

        $data = array(
            'matkul_id' => $this->input->post('idmatkul'),
            'nama_file' => $this->upload->data('file_name'),
            'pertemuan' => $this->input->post('pertemuan'),
            'tipe' => $this->upload->data('file_type'),
            'size' => $this->upload->data('file_size'),
            'path' => $this->upload->data('full_path')
        );
        if ($this->Laboran_model->addModul($data)) {
            redirect('Laboran_controller/?page=modul');
        } else {
            echo 'gagal';
        }
    }

    public function hapusModul()
    {
        $n = $this->uri->total_segments();
        $id = $this->uri->segment("$n");
        if ($this->Laboran_model->deleteModul($id))
            redirect('Laboran_controller/?page=modul');
        else
            echo 'gagal menghapus';
    }

    public function tampilSetting()
    {
        $data['setting'] = $this->Laboran_model->getAllSetting(1);
        //var_dump($data['setting']);
        $this->load->view('laboran/pengaturan', $data);
    }

    public function updateSetting()
    {
        $tanggal = array(
            'input1' => $this->input->post('mulai'),
            'input2' => $this->input->post('akhir')
        );
        $data = $this->Laboran_model->formatTanggal($tanggal);
        if ($this->Laboran_model->updateSettingPendaftaran(1, $data))
            redirect('Laboran_controller/?page=setting');
        else
            echo 'gagal redirect';
    }
}
