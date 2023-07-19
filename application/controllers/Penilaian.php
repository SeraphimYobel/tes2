<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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
		$this->load->view('dash_penilaian');
	}

	public function create_penilaian() {
    // Tampilkan halaman form tambah data penilaian
}

public function store_penilaian() {
    // Proses tambah data penilaian ke database
}

public function edit_penilaian($id) {
    // Tampilkan halaman form edit data penilaian berdasarkan ID
}

public function update_penilaian($id) {
    // Proses update data penilaian ke database berdasarkan ID
}

public function delete_penilaian($id) {
    // Proses hapus data penilaian dari database berdasarkan ID
}

}
