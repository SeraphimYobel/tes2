<?php
// IjazahTranskrip_model.php
class IjazahTranskrip_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Operasi pada tabel Ijazah
    public function create_ijazah($data) {
        $data = array(
            'taruna' => $data["taruna"],
            'program_studi' => $data["program_studi"],
            'tanggal_ijazah' => $data["tanggal_ijazah"],
            'tanggal_pengesahan' => $data["tanggal_pengesahan"],
            'gelar_akademik' => $data["gelar_akademik"],
            'nomor_sk' => $data["nomor_sk"],
            'direktur' => $data["direktur"],
            'wakil_direktur' => $data["wakil_direktur"],
            'direktur' => $data["direktur"],
            'nomor_ijazah' => $data["nomor_ijazah"],
            'nomor_seri' => $data["nomor_seri"],
            'tanggal_yudisium' => $data["tanggal_yudisium"],
            'judul_kkw' => $data["judul_kkw"],
        );
        // return $this->db->insert('mata_kuliah', $data);
        return $this->db->insert('ijazah', $data);
    }
    public function get_all_ijazah(){
        return $this->db->query("SELECT ijazah.*, pejabat.nama as wadir, dir.nama as dir, taruna.nama as tarunanama, prodi.nama as prodiname  FROM `ijazah` 
        LEFT JOIN taruna 
        ON ijazah.taruna = taruna.id
        LEFT JOIN pejabat
        ON ijazah.wakil_direktur = pejabat.id
        LEFT JOIN pejabat as dir
        ON ijazah.direktur = dir.id
        LEFT JOIN program_studi as prodi
        ON ijazah.program_studi = prodi.id")->result_array();
    }
    public function get_all_transkrip(){
        return $this->db->query("SELECT ijazah.nomor_ijazah, taruna.nama as tarunanama, prodi.nama as prodinama, tr.* FROM `transkip_nilai` as tr
        LEFT JOIN taruna
        on tr.taruna = taruna.id
        LEFT JOIN program_studi as prodi
        on tr.program_studi = prodi.id
        LEFT JOIN ijazah 
        on tr.ijazah = ijazah.id")->result_array();
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
        $this->db->update('ijazah', $data);
        return $this->db->affected_rows();
    }

    public function delete_ijazah($id) {
        $this->db->where('ID', $id);
        $this->db->delete('Ijazah');
        return $this->db->affected_rows();
    }

    // Operasi pada tabel Transkrip Nilai
    public function create_transkrip($data) {
        $data = array(
            'taruna' => $data["taruna"],
            'program_studi' => $data["program_studi"],
            'ijazah' => $data["ijazah"],
        );
        // return $this->db->insert('mata_kuliah', $data);
        return $this->db->insert('transkip_nilai', $data);
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
        $this->db->update('transkip_nilai', $data);
        return $this->db->affected_rows();
    }

    public function delete_transkrip($id) {
        $this->db->where('ID', $id);
        $this->db->delete('transkip_nilai');
        return $this->db->affected_rows();
    }
}
?>