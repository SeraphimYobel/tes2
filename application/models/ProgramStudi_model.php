<?php
// ProgramStudi_model.php
class Program_studi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        $this->db->insert('Program_Studi', $data);
        return $this->db->insert_id();
    }

    public function read($id = null) {
        if ($id) {
            return $this->db->get_where('Program_Studi', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Program_Studi')->result_array();
        }
    }

    public function update($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('Program_Studi', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Program_Studi');
        return $this->db->affected_rows();
    }
}
