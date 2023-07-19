<?php
// ProgramStudi_model.php
class Program_studi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        $this->db->insert('Nilai', $data);
        return $this->db->insert_id();
    }

    public function read($id = null) {
        if ($id) {
            return $this->db->get_where('Nilai', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Nilai')->result_array();
        }
    }

    public function update($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Nilai', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Nilai');
        return $this->db->affected_rows();
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
