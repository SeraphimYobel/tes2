<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosenMahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
	
		$this->load->model('DosenMahasiswa_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['url'] = '../assets/unsia.png';
		$this->load->view('resource2', $data);
		$this->load->view('nav');
		$this->load->view('dash_dosen_mahasiswa');
	}

	// Dosen
public function create_dosen() {
    // Tampilkan halaman form tambah data dosen
}

public function store_dosen() {
    // Proses tambah data dosen ke database
}

public function edit_dosen($id) {
    // Tampilkan halaman form edit data dosen berdasarkan ID
}

public function update_dosen($id) {
    // Proses update data dosen ke database berdasarkan ID
}

public function delete_dosen($id) {
    // Proses hapus data dosen dari database berdasarkan ID
}
public function get_all_mahasiswa(){
	$data = $this->DosenMahasiswa_model->get_all_mahasiswa();
	echo json_encode($data);
}
// Mahasiswa
public function create_mahasiswa() {
    // Tampilkan halaman form tambah data mahasiswa
}

public function store_mahasiswa() {
    // Proses tambah data mahasiswa ke database
}

public function edit_mahasiswa($id) {
    // Tampilkan halaman form edit data mahasiswa berdasarkan ID
}

public function update_mahasiswa($id) {
    // Proses update data mahasiswa ke database berdasarkan ID
}

public function delete_mahasiswa($id) {
    // Proses hapus data mahasiswa dari database berdasarkan ID
}

}
