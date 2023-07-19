<?php
// IjazahTranskrip_model.php
class Ijazah_transkrip_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Operasi pada tabel Ijazah
    public function create_ijazah($data) {
        $this->db->insert('Ijazah', $data);
        return $this->db->insert_id();
    }

    public function read_ijazah($id = null) {
        if ($id) {
            return $this->db->get_where('Ijazah', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Ijazah')->result_array();
        }
    }

    public function update_ijazah($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Ijazah', $data);
        return $this->db->affected_rows();
    }

    public function delete_ijazah($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Ijazah');
        return $this->db->affected_rows();
    }

    // Operasi pada tabel Transkrip Nilai
    public function create_transkrip($data) {
        $this->db->insert('Transkrip_Nilai', $data);
        return $this->db->insert_id();
    }

    public function read_transkrip($id = null) {
        if ($id) {
            return $this->db->get_where('Transkrip_Nilai', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Transkrip_Nilai')->result_array();
        }
    }

    public function update_transkrip($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Transkrip_Nilai', $data);
        return $this->db->affected_rows();
    }

    public function delete_transkrip($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Transkrip_Nilai');
        return $this->db->affected_rows();
    }

	class IjazahTranskrip_model extends CI_Model {
    public function create_ijazah($data) {
        $this->db->insert('Ijazah', $data);
        return $this->db->insert_id();
    }

    public function read_ijazah($id = null) {
        if ($id) {
            return $this->db->get_where('Ijazah', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Ijazah')->result_array();
        }
    }

    public function update_ijazah($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Ijazah', $data);
        return $this->db->affected_rows();
    }

    public function delete_ijazah($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Ijazah');
        return $this->db->affected_rows();
    }

    public function create_transkrip($data) {
        $this->db->insert('TranskripNilai', $data);
        return $this->db->insert_id();
    }

    public function read_transkrip($id = null) {
        if ($id) {
            return $this->db->get_where('TranskripNilai', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('TranskripNilai')->result_array();
        }
    }

    public function update_transkrip($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('TranskripNilai', $data);
        return $this->db->affected_rows();
    }

    public function delete_transkrip($id) {
        $this->db->where('ID', $id);
        $this->db->delete('TranskripNilai');
        return $this->db->affected_rows();
    }
}

}
