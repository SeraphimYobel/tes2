<?php
// ProgramStudi_model.php
class MataKuliah_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        // $this->db->insert('mata_kuliah', $data);
        // return $this->db->insert_id();
        $data = array(
            'kode' => $data["kode"],
            'matakuliah' => $data["matakuliah"],
            'sks' => $data["sks"],
            'nilai_angka' => $data["nilai_angka"],
            'nilai_huruf' => $data["nilai_huruf"],
            'semester' => $data["semester"],
        );
        // return $this->db->insert('mata_kuliah', $data);
        return $this->db->insert('matakuliah', $data);
    }

    public function read($id = null) {
        if ($id) {
            return $this->db->get_where('mata_kuliah', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('mata_kuliah')->result_array();
        }
    }
    // get all data program studi
    public function get_all_matakuliah(){
        // return $this->db->get('mata_kuliah')->result_array();
        return $this->db->get('matakuliah')->result_array();
    }
    // handle update program studi
    public function update($id, $data) {
        $this->db->where('ID', $id);
        // $this->db->update('mata_kuliah', $data);
        $this->db->update('matakuliah', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('ID', $id);
        // $this->db->delete('mata_kuliah');
        $this->db->delete('matakuliah');
        return $this->db->affected_rows();
    }


	public function create_matakuliah() {
    // Tampilkan halaman form tambah data matakuliah
}

public function store_matakuliah() {
    // Proses tambah data matakuliah ke database
}

public function edit_matakuliah($id) {
    // Tampilkan halaman form edit data matakuliah berdasarkan ID
}

public function update_matakuliah($id) {
    // Proses update data matakuliah ke database berdasarkan ID
}

public function delete_matakuliah($id) {
    // Proses hapus data matakuliah dari database berdasarkan ID
}

}
