<?php

class NRP extends CI_Model
{
	public function getclass()
	{
		return $this->db->get('nrp')->result();
	}

	public function getclassbycode($data)
	{
		return $this->db->get_where('nrp', ['id' => $data])->row();
	}

	public function insert_bulk($data)
	{
		return $this->db->insert_batch('nrp', $data);
	}
}
