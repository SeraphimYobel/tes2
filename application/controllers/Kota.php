<?php
// Kota.php
class Kota extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kota_model');
    }

    public function index() {
        $data['kota'] = $this->Kota_model->read();
        $this->load->view('kota/index', $data);
    }

    public function create() {
        $this->load->view('kota/create');
    }

    public function store() {
        $data = [
            'Kode_Kota' => $this->input->post('kode_kota'),
            'Nama' => $this->input->post('nama')
        ];

        $insert_id = $this->Kota_model->create($data);

        if ($insert_id) {
            $this->session->set_flashdata('success', 'Data kota berhasil ditambahkan.');
            redirect('kota');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan data kota.');
            redirect('kota/create');
        }
    }

    public function edit($id) {
        $data['kota'] = $this->Kota_model->read($id);
        $this->load->view('kota/edit', $data);
    }

    public function update($id) {
        $data = [
            'Kode_Kota' => $this->input->post('kode_kota'),
            'Nama' => $this->input->post('nama')
        ];

        $affected_rows = $this->Kota_model->update($id, $data);

        if ($affected_rows) {
            $this->session->set_flashdata('success', 'Data kota berhasil diperbarui.');
            redirect('kota');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui data kota.');
            redirect('kota/edit/'.$id);
        }
    }

    public function delete($id) {
        $affected_rows = $this->Kota_model->delete($id);

        if ($affected_rows) {
            $this->session->set_flashdata('success', 'Data kota berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus data kota.');
        }

        redirect('kota');
    }
}
