<?php

class Presensi extends CI_Model
{
	function edit_data()
	{
		$p_detail = $this->db->select('ket_absen.id_ket_absen,ket_absen.ket_absen,REPLACE(absensi.id_siswa,absensi.id_siswa,\'selected\') AS selected')->from('ket_absen')
			->join('absensi', 'ket_absen.id_ket_absen = absensi.p1 AND absensi.id_siswa= 21' ,'left')
			->order_by('ket_absen.id_ket_absen', 'ASC')
			->get();



		return $p_detail->result();
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
