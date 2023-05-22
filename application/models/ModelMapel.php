<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{

	public function allData()
	{
		return $this->db->table('mapel')
			->orderBy('id_mapel', 'DESC')
			->get()->getResultArray();
	}

	public function allDataMapel($id_kelas)
	{
		return $this->db->table('mapel')
			->where('id_kelas', $id_kelas)
			->orderBy('smt', 'ASC')
			->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('mapel')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('mapel')
			->where('id_mapel', $data['id_mapel'])
			->update($data);
	}

	public function delete_data($data)
	{
		$this->db->table('tbl_matkul')
			->where('id_mapel', $data['id_mapel'])
			->delete($data);
	}
}
