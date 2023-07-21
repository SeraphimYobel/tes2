<?php

// Kota_model.php
class Kota_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        $data = array(
            'kode_kota' => $data["kode_kota"],
            'nama' => $data["nama"],
        );
        return $this->db->insert('kota', $data);
    }
    public function get_all_kota(){
        return $this->db->get('Kota')->result_array();
    }
    public function read($id = null) {
        if ($id) {
            return $this->db->get_where('Kota', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Kota')->result_array();
        }
    }

    public function update($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Kota', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Kota');
        return $this->db->affected_rows();
    }
    public function read_kota($id = null) {
        if ($id) {
            return $this->db->get_where('Kota', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Kota')->result_array();
        }
    }

    public function update_kota($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Kota', $data);
        return $this->db->affected_rows();
    }

    public function delete_kota($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Kota');
        return $this->db->affected_rows();
    }
}
