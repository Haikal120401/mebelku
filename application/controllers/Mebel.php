<?php

class Mebel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mebel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Mebel';
        $data['mebel'] = $this->Mebel_model->getAllMebel();
        if( $this->input->post('keyword') ) {
            $data['mebel'] = $this->Mebel_model->cariDataMebel();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mebel/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mebel';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mebel/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Mebel_model->tambahDataMebel();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mebel');
        }
    }

    public function hapus($id)
    {
        $this->Mebel_model->hapusDataMebel($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mebel');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mebel';
        $data['mebel'] = $this->Mebel_model->getMebelById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mebel/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mebel';
        $data['mebel'] = $this->Mebel_model->getMebelById($id);
        // $data['nama'] = ['Kitchen Set', 'Lemari', 'Kursi', 'Sofa', 'Meja'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mebel/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mebel_model->ubahDataMebel();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mebel');
        }
    }

}
