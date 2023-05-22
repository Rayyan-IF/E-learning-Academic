<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        is_admin();
    }

    // Dashboard

    public function index()
    {
        // MENU DATA
		$data['dashboard'] = [
			'menu' => '',
			'expanded' => 'false'
		];
		$data['master'] = [
			'menu' => '',
			'expanded' => 'false',
			'collapse' => ''
		];
		$data['sub_master'] = [
			'siswa' => '',
			'guru' => ''
		];
		$data['menu_jurusan'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_ruangan'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_kelas'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_mapel'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_jadwal'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_relasi'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_tahunajaran'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_profile'] = [
			'menu' => 'active',
			'expanded' => 'true',
		];

        $this->form_validation->set_rules('nama_admin', 'Nama', 'required');
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar/admin', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('nama_admin', htmlspecialchars($this->input->post('nama_admin')));

            if ($_FILES['avatar']['name']) {

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/app-assets/user/';
                $config['remove_spaces'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('avatar')) {
                    $this->db->set('avatar', $this->upload->data('file_name'));
                    $old_image = $data['admin']->avatar;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/app-assets/user/' . $old_image);
                    }
                }
            }

            $this->db->where('id_admin', $this->session->userdata('id'));
            $this->db->update('admin');

            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Profile telah diubah',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
            redirect('admin');
        }
    }

    public function update_password()
    {
        $admin = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row();

        if (password_verify($this->input->post('current_password'), $admin->password)) {
            $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
            $this->db->where('id_admin', $admin->id_admin);
            $this->db->update('admin');
            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Password telah diubah',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
            redirect('admin');
        } else {
            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops..',
                            text: 'Current Password Salah',
                            type: 'error',
                            padding: '2em'
                            });
                        ");
            redirect('admin');
        }
    }
}
