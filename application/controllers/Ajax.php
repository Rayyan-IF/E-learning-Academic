<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function edit_kelas()
	{
		if ($this->input->is_ajax_request()) {
			$kelas = decrypt_url($this->input->post('id_kelas'));
			$data_kelas = $this->db->get_where('kelas', ['id_kelas' => $kelas])->row();
			echo json_encode($data_kelas);
		} else {
			redirect('eror');
		}
	}

	public function edit_ruangan()
	{
		if ($this->input->is_ajax_request()) {
			$ruangan = decrypt_url($this->input->post('id_ruangan'));
			$data_ruang = $this->db->get_where('ruangan', ['id_ruangan' => $ruangan])->row();
			echo json_encode($data_ruang);
		} else {
			redirect('eror');
		}
	}

	public function edit_jurusan()
	{
		if ($this->input->is_ajax_request()) {
			$jurusan = decrypt_url($this->input->post('id_jurusan'));
			$data_jurusan = $this->db->get_where('jurusan', ['id_jurusan' => $jurusan])->row();
			echo json_encode($data_jurusan);
		} else {
			redirect('eror');
		}
	}

	public function edit_ta()
	{
		if ($this->input->is_ajax_request()) {
			$ta = decrypt_url($this->input->post('id_ta'));
			$data_ta = $this->db->get_where('ta', ['id_ta' => $ta])->row();
			echo json_encode($data_ta);
		} else {
			redirect('eror');
		}
	}

	public function edit_nrp()
	{
		if ($this->input->is_ajax_request()) {
			$nrp = decrypt_url($this->input->post('id_nrp'));
			$data_nrp = $this->db->get_where('nrp', ['id_nrp' => $nrp])->row();
			echo json_encode($data_nrp);
		} else {
			redirect('eror');
		}
	}

	public function edit_mapel()
	{
		if ($this->input->is_ajax_request()) {
			$mapel = decrypt_url($this->input->post('id_mapel'));
			$data_mapel = $this->db->get_where('mapel', ['id_mapel' => $mapel])->row();
			echo json_encode($data_mapel);
		} else {
			redirect('eror');
		}
	}

	public function edit_jadwal()
	{
		if ($this->input->is_ajax_request()) {
			$jadwal = decrypt_url($this->input->post('id_jadwal'));
			$data_jadwal = $this->db->get_where('jadwal', ['id_jadwal' => $jadwal])->row();
			echo json_encode($data_jadwal);
		} else {
			redirect('eror');
		}
	}

	public function edit_absensi()
	{
		if ($this->input->is_ajax_request()) {
			$absensi = decrypt_url($this->input->post('id_absensi'));
			$data_absensi = $this->db->get_where('absensi', ['id_absensi' => $absensi])->row();
			echo json_encode($data_absensi);
		} else {
			redirect('eror');
		}
	}

	public function edit_siswa()
	{
		if ($this->input->is_ajax_request()) {
			$siswa = decrypt_url($this->input->post('id_siswa'));
			$data_siswa = $this->db->get_where('siswa', ['id_siswa' => $siswa])->row();
			echo json_encode($data_siswa);
		} else {
			redirect('eror');
		}
	}

	public function edit_guru()
	{
		if ($this->input->is_ajax_request()) {
			$guru = decrypt_url($this->input->post('id_guru'));
			$data_guru = $this->db->get_where('guru', ['id_guru' => $guru])->row();
			echo json_encode($data_guru);
		} else {
			redirect('eror');
		}
	}

	public function guru_kelas()
	{
		if ($this->input->is_ajax_request()) {
			$id_guru = decrypt_url($this->input->post('id_guru'));
			$id_kelas = $this->input->post('id_kelas');


			$kelass = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
			$kelas = $kelass['nama_kelas'];



			$data = [
				'guru' => $id_guru,
				'kelas' => $id_kelas,
				'nama_kelas' => $kelas
			];

			$result = $this->db->get_where('guru_kelas', $data);

			if ($result->num_rows() < 1) {
				$this->db->insert('guru_kelas', $data);
			} else {
				$this->db->delete('guru_kelas', $data);
			}

			$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		} else {
			redirect('eror');
		}
	}

	public function guru_mapel()
	{
		if ($this->input->is_ajax_request()) {
			$id_guru = decrypt_url($this->input->post('id_guru'));
			$id_mapel = $this->input->post('id_mapel');

			$mapels = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();
			$mapel = $mapels['nama_mapel'];


			$data = [
				'guru' => $id_guru,
				'mapel' => $id_mapel,
				'nama_mapel' => $mapel
			];

			$result = $this->db->get_where('guru_mapel', $data);

			if ($result->num_rows() < 1) {
				$this->db->insert('guru_mapel', $data);
			} else {
				$this->db->delete('guru_mapel', $data);
			}

			$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		} else {
			redirect('eror');
		}
	}

	public function chat_materi()
	{
		if ($this->input->is_ajax_request()) {
			$kode_materi = $this->input->post('kode_materi');
			$chat_materi = $this->input->post('chat_materi');
			$user = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id')])->row();
			if (!$user) {
				$user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();
			}
			$data = [
				'materi' => $kode_materi,
				'nama' => $this->session->userdata('nama'),
				'gambar' => $user->avatar,
				'email' => $this->session->userdata('email'),
				'text' => $chat_materi,
				'date_created' => time()
			];

			$this->db->insert('chat_materi', $data);
		} else {
			redirect('eror');
		}
	}

	public function get_chat_materi()
	{
		if ($this->input->is_ajax_request()) {
			$kode_materi = $this->input->post('kode_materi');
			$chat_materi = $this->db->get_where('chat_materi', ['materi' => $kode_materi])->result();

			foreach ($chat_materi as $chat) {
				echo '
                    <div class="media">
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <img alt="avatar" src="' . base_url('assets/app-assets/user/') . $chat->gambar . '" class="rounded-circle" />
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading"><span class="media-title"> ' . $chat->nama . '</h5>
                        <p class="media-text" style="white-space: pre-line; margin-top: -20px;">
                            ' . $chat->text . '
                        </p>
                        <hr>
                    </div>
                </div>
            ';
			}
			exit;
		} else {
			redirect('eror');
		}
	}

	public function chat_tugas()
	{
		if ($this->input->is_ajax_request()) {
			$kode_tugas = $this->input->post('kode_tugas');
			$chat_tugas = $this->input->post('chat_tugas');
			$user = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id')])->row();
			if (!$user) {
				$user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();
			}
			$data = [
				'tugas' => $kode_tugas,
				'nama' => $this->session->userdata('nama'),
				'email' => $this->session->userdata('email'),
				'gambar' => $user->avatar,
				'text' => $chat_tugas,
				'date_created' => time()
			];

			$this->db->insert('chat_tugas', $data);
		} else {
			redirect('eror');
		}
	}

	public function get_chat_tugas()
	{
		if ($this->input->is_ajax_request()) {
			$kode_tugas = $this->input->post('kode_tugas');
			$chat_tugas = $this->db->get_where('chat_tugas', ['tugas' => $kode_tugas])->result();

			foreach ($chat_tugas as $chat) {
				echo '
                    <div class="media">
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <img alt="avatar" src="' . base_url('assets/app-assets/user/') . $chat->gambar . '" class="rounded-circle" />
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading">' . $chat->nama . '</h5>
                        <p class="media-text" style="white-space: pre-line; margin-top: -20px;">
                            ' . $chat->text . '
                        </p>
                        <hr>
                    </div>
                </div>
            ';
			}
			exit;
		} else {
			redirect('eror');
		}
	}

	public function edit_materi()
	{
		if ($this->input->is_ajax_request()) {
			$materi = decrypt_url($this->input->post('id_materi'));
			$data_materi = $this->db->get_where('materi', ['id_materi' => $materi])->row();
			echo json_encode($data_materi);
		} else {
			redirect('eror');
		}
	}

	public function edit_relasi()
	{
		if ($this->input->is_ajax_request()) {
			$relasi = decrypt_url($this->input->post('id_relasi_guru'));
			$data_relasi = $this->db->get_where('relasi_guru', ['id_relasi_guru' => $relasi])->row();
			echo json_encode($data_relasi);
		} else {
			redirect('eror');
		}
	}

	public function edit_tugas()
	{
		if ($this->input->is_ajax_request()) {
			$tugas = decrypt_url($this->input->post('id_tugas'));
			$data_tugas = $this->db->get_where('tugas', ['id_tugas' => $tugas])->row();
			echo json_encode($data_tugas);
		} else {
			redirect('eror');
		}
	}

	public function edit_mapel_detail()
	{
		if ($this->input->is_ajax_request()) {
			$mapel = decrypt_url($this->input->post('id_mapel'));
			$data_mapel = $this->db->get_where('mapel', ['id_mapel' => $mapel])->row();
			echo json_encode($data_mapel);
		} else {
			redirect('eror');
		}
	}

	public function time_now()
	{
		date_default_timezone_set('Asia/Jakarta');
		echo date('H:i:s', time());
	}

	public function cek_ujian()
	{
		if ($this->input->is_ajax_request()) {
			$kode_ujian = $this->input->post('kode_ujian');
			$waktu = $this->input->post('waktu');
			$ujian = $this->db->get_where('ujian', ['kode_ujian' => $kode_ujian])->row();

			if (strtotime($waktu) > strtotime($ujian->waktu_berakhir)) {
				echo "1";
			} else {
				echo "0";
			}
			exit;
		} else {
			redirect('eror');
		}
	}

	public function cek_no_induk()
	{
		if ($this->input->is_ajax_request()) {
			$no_induk = $this->input->post('no_induk');
			$hasil = $this->db->get_where('siswa', ['no_induk_siswa' => $no_induk])->row();
			if ($hasil) {
				echo '1';
			} else {
				echo '0';
			}
		} else {
			redirect('eror');
		}
	}

	public function upload_summernote()
	{
		$this->load->library('upload');
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = './assets/app-assets/file/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/app-assets/file/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['new_image'] = './assets/app-assets/file/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/app-assets/file/' . $data['file_name'];
			}
		}
	}

	function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}
}
