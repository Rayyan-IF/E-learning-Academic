<?php

class Admin_Model extends CI_Model
{
    public function getlist()
    {
        return $this->db->get('admin')->result();
    }

    public function get_by_email($email)
    {
        return $this->db->get('admin', ['email' => $email])->row();
    }

    public function insert()
    {
        $data = [
            'nama_admin' => $this->input->post('nama_admin', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 1,
            'date_created' => time(),
            'is_active' => 1,
            'gambar' => "default.png"
        ];

        $this->db->insert('admin', $data);
    }

    public function update()
    {
        $data = [
            'nama_admin' => $this->input->post('nama_admin', true)
        ];

        $this->db->where('email', $this->input->post('email'));
        $this->db->update('admin', $data);
    }

    public function insert_bulk($data)
    {
        return $this->db->insert_batch('admin', $data);
    }
}
