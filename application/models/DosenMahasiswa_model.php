<?php
// DosenMahasiswa_model.php
class Dosen_mahasiswa_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Operasi pada tabel Dosen
    public function create_dosen($data) {
        $this->db->insert('Dosen', $data);
        return $this->db->insert_id();
    }

    public function read_dosen($id = null) {
        if ($id) {
            return $this->db->get_where('Dosen', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Dosen')->result_array();
        }
    }

    public function update_dosen($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Dosen', $data);
        return $this->db->affected_rows();
    }

    public function delete_dosen($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Dosen');
        return $this->db->affected_rows();
    }

    // Operasi pada tabel Mahasiswa
    public function create_mahasiswa($data) {
        $this->db->insert('Mahasiswa', $data);
        return $this->db->insert_id();
    }

    public function read_mahasiswa($id = null) {
        if ($id) {
            return $this->db->get_where('Mahasiswa', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Mahasiswa')->result_array();
        }
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function delete_mahasiswa($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Mahasiswa');
        return $this->db->affected_rows();
    }

	class DosenMahasiswa_model extends CI_Model {
    public function create_dosen($data) {
        $this->db->insert('Dosen', $data);
        return $this->db->insert_id();
    }

    public function read_dosen($id = null) {
        if ($id) {
            return $this->db->get_where('Dosen', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Dosen')->result_array();
        }
    }

    public function update_dosen($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Dosen', $data);
        return $this->db->affected_rows();
    }

    public function delete_dosen($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Dosen');
        return $this->db->affected_rows();
    }

    public function create_mahasiswa($data) {
        $this->db->insert('Mahasiswa', $data);
        return $this->db->insert_id();
    }

    public function read_mahasiswa($id = null) {
        if ($id) {
            return $this->db->get_where('Mahasiswa', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Mahasiswa')->result_array();
        }
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function delete_mahasiswa($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Mahasiswa');
        return $this->db->affected_rows();
    }
}

}
