<?php
// DosenMahasiswa_model.php
class DosenMahasiswa_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Operasi pada tabel Dosen
    public function create_dosen($data) {
        $this->db->insert('pejabat', $data);
        return $this->db->insert_id();
    }

    public function read_dosen($id = null) {
        if ($id) {
            return $this->db->get_where('Dosen', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Dosen')->result_array();
        }
    }
    public function get_all_mahasiswa(){
        return $this->db->query("SELECT mahasiswa.id, mahasiswa.nama, mahasiswa.nomor_taruna, mahasiswa.tempat_lahir, mahasiswa.tanggal_lahir, mahasiswa.program_studi, mahasiswa.foto, kota.nama as namakota, prodi.nama as namaprodi, prodi.program_pendidikan, prodi.akreditasi FROM `taruna` as mahasiswa 
        LEFT JOIN kota as kota
        ON mahasiswa.tempat_lahir = kota.id
        LEFT JOIN program_studi as prodi
        ON mahasiswa.program_studi = prodi.id")->result_array();   
    }
    public function get_all_dosen(){
        return $this->db->get('pejabat')->result_array();   
    }
    public function update_dosen($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pejabat', $data);
        return $this->db->affected_rows();
    }

    public function delete_dosen($id) {
        $this->db->where('id', $id);
        $this->db->delete('pejabat');
        return $this->db->affected_rows();
    }

    // Operasi pada tabel Mahasiswa
    public function create_mahasiswa($data) {
        $data = array(
            'nama' => $data["nama"],
            'nomor_taruna' => $data["nomor_taruna"],
            'tempat_lahir' => $data["tempat_lahir"],
            'tanggal_lahir' => $data["tanggal_lahir"],
            'program_studi' => $data["program_studi"],
            'foto' => $data["foto"]
        );
        return $this->db->insert('taruna', $data);
    }

    public function read_mahasiswa($id = null) {
        if ($id) {
            return $this->db->get_where('Mahasiswa', ['ID' => $id])->row_array();
        } else {
            return $this->db->get('Mahasiswa')->result_array();
        }
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('taruna', $data);
        return $this->db->affected_rows();
    }

    public function delete_mahasiswa($id) {
        $this->db->where('id', $id);
        $this->db->delete('taruna');
        return $this->db->affected_rows();
    }
}
