<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IjazahTranskrip extends CI_Controller {

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
		$this->load->view('dash_ijazah_transkrip');
	}

	// Ijazah
public function create_ijazah() {
    // Tampilkan halaman form tambah data ijazah
}

public function store_ijazah() {
    // Proses tambah data ijazah ke database
}

public function edit_ijazah($id) {
    // Tampilkan halaman form edit data ijazah berdasarkan ID
}

public function update_ijazah($id) {
    // Proses update data ijazah ke database berdasarkan ID
}

public function delete_ijazah($id) {
    // Proses hapus data ijazah dari database berdasarkan ID
}

public function print_ijazah($id) {
    // Proses cetak ijazah dalam bentuk PDF berdasarkan ID
}

// Transkrip Nilai
public function create_transkrip() {
    // Tampilkan halaman form tambah data transkrip nilai
}

public function store_transkrip() {
    // Proses tambah data transkrip nilai ke database
}

public function edit_transkrip($id) {
    // Tampilkan halaman form edit data transkrip nilai berdasarkan ID
}

public function update_transkrip($id) {
    // Proses update data transkrip nilai ke database berdasarkan ID
}

public function delete_transkrip($id) {
    // Proses hapus data transkrip nilai dari database berdasarkan ID
}

public function print_transkrip($id) {
    // Proses cetak transkrip nilai dalam bentuk PDF berdasarkan ID
}

}
