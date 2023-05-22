<?php

class Siswa_Model extends CI_Model
{
    public function getsiswa()
    {
        $this->db->select("*");
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.kode_kelas = siswa.kelas_siswa');
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get()->result();
    }

    public function getsiswabynim($data)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.kode_kelas = siswa.kelas_siswa');
        $this->db->where('siswa.nim', $data);
        return $this->db->get()->row();
    }

    public function insert_bulk($data)
    {
        return $this->db->insert_batch('siswa', $data);
    }
}
