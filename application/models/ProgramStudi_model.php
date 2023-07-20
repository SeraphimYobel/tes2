<?php
// ProgramStudi_model.php
class ProgramStudi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        // $this->db->insert('Program_Studi', $data);
        // return $this->db->insert_id();
        $data = array(
            'nama' => $data["nama"],
            'program_pendidikan' => $data["program_pendidikan"],
            'akreditasi' => $data["akreditasi"],
            'sk_akreditasi' => $data["sk_akreditasi"]
        );
        return $this->db->insert('program_studi', $data);
    }

    public function read($id = null) {
        if ($id) {
            return $this->db->get_where('Program_Studi', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Program_Studi')->result_array();
        }
    }
    // get all data program studi
    public function get_all_programstudi(){
        return $this->db->get('program_studi')->result_array();
    }

    // Handle update program studi
    public function update($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('program_studi', $data);
        return $this->db->affected_rows();
    }

    // Handle delete program studi
    public function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('program_studi');
        return $this->db->affected_rows();
    }

    public function get_programstudi_by_id($id) {
        return $this->db->get_where('program_studi', ['ID' => $id])->row_array();
    }

// 	public function create_programstudi() {
//     // Tampilkan halaman form tambah data program studi
// }

// public function store_programstudi() {
//     // Proses tambah data program studi ke database
// }

public function edit_programstudi($id) {
    $data['programstudi'] = $this->ProgramStudi_model->read($id);
    $this->load->view('edit_program_studi', $data);
}

// public function update_programstudi($id) {
//     // Proses update data program studi ke database berdasarkan ID
//     public function update($id, $data) {
//         $this->db->where('ID', $id);
//         $this->db->update('program_studi', $data);
//         return $this->db->affected_rows();
//     }
// }

// public function delete_programstudi($id) {
//     // Proses hapus data program studi dari database berdasarkan ID
//     public function delete($id) {
//         $this->db->where('ID', $id);
//         $this->db->delete('program_studi');
//         return $this->db->affected_rows();
//     }
// }

}
