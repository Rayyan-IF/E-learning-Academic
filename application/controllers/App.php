<?php
defined('BASEPATH') or exit('No direct script access allowed');


class App extends CI_Controller
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
			'menu' => 'active',
			'expanded' => 'true'
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
		$data['menu_ruangan'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_jurusan'] = [
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
			'menu' => '',
			'expanded' => 'false',
		];

		$data['guru'] = $this->db->get('guru')->result();
		$data['guru_aktif'] = $this->db->get_where('guru', ['is_active' => 1])->result();
		$data['guru_tidak_aktif'] = $this->db->get_where('guru', ['is_active' => 0])->result();

		$data['siswa'] = $this->db->get('siswa')->result();
		$data['siswa_aktif'] = $this->db->get_where('siswa', ['is_active' => 1])->result();
		$data['siswa_tidak_aktif'] = $this->db->get_where('siswa', ['is_active' => 0])->result();

		$data['kelas'] = $this->db->get('kelas')->result();
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['ruangan'] = $this->db->get('ruangan')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/admin');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	//START TA

	public function ta()
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
			'menu' => 'active',
			'expanded' => 'true',
		];
		$data['menu_profile'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['ta'] = $this->db->get('ta')->result();

		$this->form_validation->set_rules('ta[]', 'Tahun Ajaran', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/ta/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$ta = $this->input->post('ta');
			$data_ta = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($ta as $nama_ta) { // Kita buat perulangan berdasarkan nama_kelas sampai data terakhir
				array_push($data_ta, array(
					'ta' => $nama_ta,
					'semester' => $this->input->post('semester')[$index],
				));

				$index++;
			}

			$sql = $this->db->insert_batch('ta', $data_ta);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/ta');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/ta');
			}
		}
	}

	public function hapus_ta($id = '')
	{
		$id_ta = decrypt_url($id);
		$this->db->delete('ta', ['id_ta' => $id_ta]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/ta');
	}

	public function edit_ta()
	{
		$id_ta = $this->input->post('id_ta');
		$nama_ta = $this->input->post('ta');

		$this->db->set('ta', $nama_ta);
		$this->db->where('id_ta', $id_ta);
		$this->db->update('ta');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'tahun akademik diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/ta');
	}
	//END TA


	//START JURUSAN

	public function jurusan()
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['jurusan'] = $this->db->get('jurusan')->result();

		$this->form_validation->set_rules('nama_jurusan[]', 'Nama Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/jurusan/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$jurusan = $this->input->post('nama_jurusan');
			$data_jurusan = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($jurusan as $nama_jurusan) { // Kita buat perulangan berdasarkan nama_kelas sampai data terakhir
				array_push($data_jurusan, array(
					'id_jurusan' => $this->input->post('id_jurusan')[$index],
					'kode_jurusan' => $this->input->post('kode_jurusan')[$index],
					'nama_jurusan' => $nama_jurusan,
				));

				$index++;
			}

			$sql = $this->db->insert_batch('jurusan', $data_jurusan);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/jurusan');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/jurusan');
			}
		}
	}

	public function hapus_jurusan($id = '')
	{
		$id_jurusan = decrypt_url($id);
		$this->db->delete('jurusan', ['id_jurusan' => $id_jurusan]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/jurusan');
	}

	public function edit_jurusan()
	{
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');

		$this->db->set('nama_jurusan', $nama_jurusan);
		$this->db->set('kode_jurusan', $kode_jurusan);
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->update('jurusan');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'nama jurusan diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/jurusan');
	}

	//END JURUSAN


	//START RUANGAN

	public function ruangan()
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
			'menu' => 'active',
			'expanded' => 'true',
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
		$data['menu_tahunajaran'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_relasi'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_profile'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['ruangan'] = $this->db->get('ruangan')->result();

		$this->form_validation->set_rules('ruangan[]', 'Ruangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/ruangan/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$ruangan = $this->input->post('ruangan');
			$data_ruangan = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($ruangan as $nama_ruang) { // Kita buat perulangan berdasarkan nama_kelas sampai data terakhir
				array_push($data_ruangan, array(
					'ruangan' => $nama_ruang,
				));

				$index++;
			}

			$sql = $this->db->insert_batch('ruangan', $data_ruangan);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/ruangan');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/ruangan');
			}
		}
	}

	public function hapus_ruangan($id = '')
	{
		$id_ruangan = decrypt_url($id);
		$this->db->delete('ruangan', ['id_ruangan' => $id_ruangan]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/ruangan');
	}

	public function edit_ruangan()
	{
		$id_ruangan = $this->input->post('id_ruangan');
		$nama_ruang = $this->input->post('ruangan');

		$this->db->set('ruangan', $nama_ruang);
		$this->db->where('id_ruangan', $id_ruangan);
		$this->db->update('ruangan');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'nama ruangan diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/ruangan');
	}

	//END RUANGAN


	// START KELAS
	public function kelas()
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['kelas'] = $this->db->get('kelas')->result();

		$this->form_validation->set_rules('nama_kelas[]', 'Nama Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/kelas/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$nama_kelas = $this->input->post('nama_kelas');
			$data_kelas = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($nama_kelas as $nama) { // Kita buat perulangan berdasarkan nama_kelas sampai data terakhir
				array_push($data_kelas, array(
					'nama_kelas' => $nama,
				));

				$index++;
			}

			$sql = $this->db->insert_batch('kelas', $data_kelas);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/kelas');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/kelas');
			}
		}
	}

	public function hapus_kelas($id = '')
	{
		$id_kelas = decrypt_url($id);
		$this->db->delete('kelas', ['id_kelas' => $id_kelas]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/kelas');
	}

	public function edit_kelas()
	{
		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');

		$this->db->set('nama_kelas', $nama_kelas);
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('kelas');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'nama kelas diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/kelas');
	}
	// END KELAS

	// START MAPEL DETAIL
	public function mapeldetail($id = '')
	{
		$id_kelas = decrypt_url($id);
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
			'nrp' => '',
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA

		$data['kelas_detail'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row();
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['kelas'] = $this->db->get('kelas')->result();

		$data['detailmapel'] = $this->db->get_where('mapel', ['kelas' => $id_kelas])->result();

		$this->form_validation->set_rules('nama_mapel[]', 'Nama Mapel', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/mapel/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$data_mapel = [];


			$data['kelas_detail'] = $this->db->get('kelas')->result();

			$nama_mapel = $this->input->post('nama_mapel');

			$index = 0; // Set index array awal dengan 0
			foreach ($nama_mapel as $nama) {

				// Kita buat perulangan berdasarkan nama_mapel sampai data terakhir
				array_push($data_mapel, array(
					'nama_mapel' => $nama,
					'id_mapel' => $this->input->post('id_mapel')[$index],
					'kelas' => $this->input->post('kelas')[$index],
					'tahun_ajaran' => $this->input->post('tahun_ajaran')[$index]
				));

				$index++;
			}


			$sql = $this->db->insert_batch('mapel', $data_mapel);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/mapel');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/mapel');
			}
		}
	}

	public function edit_mapel()
	{
		$id_mapel = $this->input->post('id_mapel');
		$nama_mapel = $this->input->post('nama_mapel');
		$tahun_ajaran = $this->input->post('tahun_ajaran');

		$this->db->set('nama_mapel', $nama_mapel);
		$this->db->set('tahun_ajaran', $tahun_ajaran);
		$this->db->where('id_mapel', $id_mapel);
		$this->db->update('mapel');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'nama mapel diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/mapel');
	}

	public function hapus_mapel($id = '')
	{
		$id_mapel = decrypt_url($id);
		$this->db->delete('mapel', ['id_mapel' => $id_mapel]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/mapel');
	}
	// END MAPEL DETAIL

	// START MAPEL
	public function mapel()
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
			'nrp' => '',
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['kelas'] = $this->db->get('kelas')->result();


		$this->form_validation->set_rules('nama_mapel[]', 'Nama Mapel', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/mapel/v_mapel', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$nama_mapel = $this->input->post('nama_mapel');
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$data_mapel = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($nama_mapel as $nama) { // Kita buat perulangan berdasarkan nama_mapel sampai data terakhir
				array_push($data_mapel, array(
					'nama_mapel' => $nama,
					'tahun_ajaran' => $this->input->post('tahun_ajaran')[$index],
				));

				$index++;
			}

			$sql = $this->db->insert_batch('mapel', $data_mapel);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/mapel');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/mapel');
			}
		}
	}
	// END MAPEL

	//START JADWAL DETAIL

	public function jadwaldetail($id = '')
	{
		$id_jadwal = decrypt_url($id);
		$id_kelas = decrypt_url($id);
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
			'nrp' => '',
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA

		$data['kelas_detail'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row();
		$data['detail_jadwal'] = $this->db->get_where('jadwal', ['id_kelas' => $id_kelas])->result();


		$data['mapel'] = $this->db->get('mapel')->result();
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['ruangan'] = $this->db->get('ruangan')->result();
		$data['guru'] = $this->db->get('guru')->result();
		$data['jadwal'] = $this->db->get('jadwal')->result();


		$this->form_validation->set_rules('hari[]', 'Hari', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/jadwal/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$data_jadwal = [];


			$data['jadwal_detail'] = $this->db->get('kelas')->result();

			$hari = $this->input->post('hari');

			$index = 0; // Set index array awal dengan 0
			foreach ($hari as $hr) {

				// Kita buat perulangan berdasarkan nama_mapel sampai data terakhir
				array_push($data_jadwal, array(
					'id_jadwal' => $this->input->post('id_jadwal')[$index],
					'id_mapel' => $this->input->post('mapel')[$index],
					'id_kelas' => $this->input->post('kelas')[$index],
					'id_guru' => $this->input->post('guru')[$index],
					'id_ruangan' => $this->input->post('ruangan')[$index],
					'hari' => $hr,
					'waktu' => $this->input->post('waktu')[$index]
				));

				$index++;
			}

			$sql = $this->db->insert_batch('jadwal', $data_jadwal);
			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/jadwal');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/jadwal');
			}
		}
	}

	public function edit_jadwal()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$mapel = $this->input->post('mapel');
		$kelas = $this->input->post('kelas');
		$guru = $this->input->post('guru');
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');
		$ruangan = $this->input->post('ruangan');

		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->set('id_mapel', $mapel);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('id_guru', $guru);
		$this->db->set('hari', $hari);
		$this->db->set('waktu', $waktu);
		$this->db->set('id_ruangan', $ruangan);
		$this->db->update('jadwal');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'Jadwal diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/jadwal');
	}

	public function hapus_jadwal($id = '')
	{
		$id_jadwal = decrypt_url($id);
		$this->db->delete('jadwal', ['id_jadwal' => $id_jadwal]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/jadwal');
	}
	// END JADWAL DETAIL

	// START JADWAL
	public function jadwal()
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
			'nrp' => '',
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
			'menu' => 'active',
			'expanded' => 'true',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['jadwal'] = $this->db->get('jadwal')->result();
		$data['kelas'] = $this->db->get('kelas')->result();


		$this->form_validation->set_rules('hari[]', 'Hari', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/jadwal/v_jadwal', $data);
			$this->load->view('templates/footer');
		}
	}
	//END JADWAL


	// START SISWA
	public function siswa()
	{
		// MENU DATA
		$data['dashboard'] = [
			'menu' => '',
			'expanded' => 'false'
		];
		$data['master'] = [
			'menu' => 'active',
			'expanded' => 'true',
			'collapse' => 'show'
		];
		$data['sub_master'] = [
			'siswa' => 'active',
			'nrp' => '',
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['siswa'] = $this->db->get('siswa')->result();
		$data['kelas'] = $this->db->get('kelas')->result();

		$this->form_validation->set_rules('nis[]', 'Nomor Induk', 'required');
		$this->form_validation->set_rules('nama_siswa[]', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('email[]', 'email', 'required|valid_email');
		$this->form_validation->set_rules('jenis_kelamin[]', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kelas[]', 'Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/siswa/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$nama_siswa = $this->input->post('nama_siswa');
			$data_siswa = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($nama_siswa as $nama) { // Kita buat perulangan berdasarkan nama_siswa sampai data terakhir
				$kelas = $this->db->get_where('kelas', ['id_kelas' => $this->input->post('kelas')[$index]])->row();
				array_push($data_siswa, array(
					'no_induk_siswa' => $this->input->post('nis')[$index],
					'nama_siswa' => $nama,
					'email' => $this->input->post('email')[$index],
					'password' => password_hash($this->input->post('nis')[$index], PASSWORD_DEFAULT),
					'jenis_kelamin' => $this->input->post('jenis_kelamin')[$index],
					'kelas' => $this->input->post('kelas')[$index],
					'role' => 2,
					'is_active' => 1,
					'date_created' => time(),
					'avatar' => 'default.jpg'
				));

				// 	// KIRIM EMAIL
				// 	$email_app = $this->db->get('admin')->row();
				// 	$config = [
				// 		'protocol' => 'smtp',
				// 		'smtp_host' => 'ssl://smtp.googlemail.com',
				// 		'smtp_user' => "$email_app->email",
				// 		'smtp_pass' => "$email_app->pm",
				// 		'smtp_port' => 465,
				// 		'mailtype' => 'html',
				// 		'charset' => 'utf-8',
				// 		'newline' => "\r\n"
				// 	];
				// 	$this->email->initialize($config);

				// 	$this->email->set_newline("\r\n");

				// 	$this->load->library('email', $config);

				// 	$this->email->from("$email_app->email", 'E-Learning');
				// 	$this->email->to($this->input->post('email')[$index]);

				// 	$this->email->subject('Akun E-Learning');
				// 	$this->email->message('
				//         <div style="color: #000; padding: 10px;">
				//             <div
				//                 style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color: #1C3FAA; font-weight: bold;">
				//                 E-Learning</div>
				//             <small style="color: #000;">V 1.0 by Pejuang Rupiah Team</small>
				//             <br>
				//             <p style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">Hallo ' . $nama . ' <br>
				//                 <span style="color: #000;">Admin telah menambahkan anda kedalam aplikasi E-Learning</span></p>
				//             <table style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">
				//                 <tr>
				//                     <td>NAMA</td>
				//                     <td> : ' . $nama . '</td>
				//                 </tr>
				//                 <tr>
				//                     <td>EMAIL</td>
				//                     <td> : ' . $this->input->post('email')[$index] . '</td>
				//                 </tr>
				//                 <tr>
				//                     <td>KELAS</td>
				//                     <td> : ' . $kelas->nama_kelas . '</td>
				//                 </tr>
				//                 <tr>
				//                     <td>PASSWORD</td>
				//                     <td> : ' . $this->input->post('nis')[$index] . '</td>
				//                 </tr>
				//             </table>
				//             <br>
				//             <a href="' . base_url('auth') . '"
				//                 style="display: inline-block; width: 100px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;">Sign
				//                 In
				//                 Now!</a>
				//             </div>
				//     ');

				// 	if (!$this->email->send()) {
				// 		echo $this->email->print_debugger();
				// 		die();
				// 	}

				$index++;
			}


			$sql = $this->db->insert_batch('siswa', $data_siswa);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/siswa?pesan=success');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/siswa?pesan=success');
			}
		}
	}

	public function edit_siswa()
	{
		$id_siswa = $this->input->post('id_siswa');
		$no_induk_siswa = $this->input->post('nis');
		$email = $this->input->post('email');
		$nama_siswa = $this->input->post('nama_siswa');
		$kelas = $this->input->post('kelas');
		$active = $this->input->post('active');

		$this->db->set('no_induk_siswa', $no_induk_siswa);
		$this->db->set('nama_siswa', $nama_siswa);
		$this->db->set('email', $email);
		$this->db->set('kelas', $kelas);
		$this->db->set('is_active', $active);
		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data siswa diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/siswa');
	}

	public function hapus_siswa($id = '')
	{
		$id_siswa = decrypt_url($id);
		$this->db->delete('siswa', ['id_siswa' => $id_siswa]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/siswa');
	}
	// END SISWA

	// START GURU
	public function guru()
	{
		// MENU DATA
		$data['dashboard'] = [
			'menu' => '',
			'expanded' => 'false'
		];
		$data['master'] = [
			'menu' => 'active',
			'expanded' => 'true',
			'collapse' => 'show'
		];
		$data['sub_master'] = [
			'siswa' => '',

			'guru' => 'active'
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
			'menu' => '',
			'expanded' => 'false',
		];
		// END MENU DATA
		// ================================================

		// MASTER DATA
		$data['siswa'] = $this->db->get('siswa')->result();
		$data['guru'] = $this->db->get('guru')->result();
		$data['kelas'] = $this->db->get('kelas')->result();

		$this->form_validation->set_rules('nama_guru[]', 'Nama Guru', 'required');
		$this->form_validation->set_rules('email[]', 'email', 'required|valid_email');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/guru/list', $data);
			$this->load->view('templates/footer');
		} else {
			// Ambil data yang dikirim dari form
			$nama_guru = $this->input->post('nama_guru');
			$data_guru = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($nama_guru as $nama) { // Kita buat perulangan berdasarkan nama_guru sampai data terakhir
				array_push($data_guru, array(
					'nama_guru' => $nama,
					'email' => $this->input->post('email')[$index],
					'password' => password_hash('123', PASSWORD_DEFAULT),
					'role' => 3,
					'is_active' => 1,
					'date_created' => time(),
					'avatar' => 'default.jpg'
				));

				// // KIRIM EMAIL
				// $email_app = $this->db->get('admin')->row();
				// $config = [
				// 	'protocol' => 'smtp',
				// 	'smtp_host' => 'ssl://smtp.googlemail.com',
				// 	'smtp_user' => "$email_app->email",
				// 	'smtp_pass' => "$email_app->pm",
				// 	'smtp_port' => 465,
				// 	'mailtype' => 'html',
				// 	'charset' => 'utf-8',
				// 	'newline' => "\r\n"
				// ];
				// $this->email->initialize($config);

				// $this->email->set_newline("\r\n");

				// $this->load->library('email', $config);

				// $this->email->from("$email_app->email", 'E-Learning');
				// $this->email->to($this->input->post('email')[$index]);

				// $this->email->subject('Akun E-Learning');
				// $this->email->message('
				//     <div style="color: #000; padding: 10px;">
				//         <div
				//             style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color: #1C3FAA; font-weight: bold;">
				//             E-Learning</div>
				//         <small style="color: #000;">V 1.0 by Pejuang Rupiah Team</small>
				//         <br>
				//         <p style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">Hallo ' . $nama . ' <br>
				//             <span style="color: #000;">Admin telah menambahkan anda kedalam aplikasi E-Learning</span></p>
				//         <table style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">
				//             <tr>
				//                 <td>NAMA</td>
				//                 <td style="text-transform: uppercase;"> : ' . $nama . '</td>
				//             </tr>
				//             <tr>
				//                 <td>EMAIL</td>
				//                 <td> : ' . $this->input->post('email')[$index] . '</td>
				//             </tr>
				//             <tr>
				//                 <td>ROLE</td>
				//                 <td> : GURU</td>
				//             </tr>
				//             <tr>
				//                 <td>PASSWORD</td>
				//                 <td> : 123</td>
				//             </tr>
				//             <tr>
				//                 <td>STATUS AKUN</td>
				//                 <td> : AKTIF</td>
				//             </tr>
				//         </table>
				//         <br>
				//         <a href="' . base_url('auth') . '"
				//             style="display: inline-block; width: 100px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;">Sign
				//             In
				//             Now!</a>
				//         </div>
				// ');

				// if (!$this->email->send()) {
				// 	echo $this->email->print_debugger();
				// 	die();
				// }

				$index++;
			}

			$sql = $this->db->insert_batch('guru', $data_guru);

			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/guru?pesan=success');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/guru?pesan=success');
			}
		}
	}

	public function edit_guru()
	{
		$id_guru = $this->input->post('id_guru');
		$nama_guru = $this->input->post('nama_guru');
		$email = $this->input->post('email');
		$active = $this->input->post('active');

		$this->db->set('nama_guru', $nama_guru);
		$this->db->set('email', $email);
		$this->db->set('is_active', $active);
		$this->db->where('id_guru', $id_guru);
		$this->db->update('guru');

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data guru diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/guru');
	}

	public function hapus_guru($id = '')
	{
		$id_guru = decrypt_url($id);
		$this->db->delete('guru', ['id_guru' => $id_guru]);
		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/guru');
	}
	// END GURU

	// START RELASI
	public function relasi()
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
			'menu' => 'active',
			'expanded' => 'true',
		];
		$data['menu_tahunajaran'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_profile'] = [
			'menu' => '',
			'expanded' => 'false',
		];

		$data['kelas'] = $this->db->get('kelas')->result();
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['guru'] = $this->db->get('guru')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/admin', $data);
		$this->load->view('admin/guru/relasi-index', $data);
		$this->load->view('templates/footer');
	}

	public function relasi_mapel()
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
			'menu' => 'active',
			'expanded' => 'true',
		];
		$data['menu_tahunajaran'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_profile'] = [
			'menu' => '',
			'expanded' => 'false',
		];

		$data['kelas'] = $this->db->get('kelas')->result();
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['guru'] = $this->db->get('guru')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/admin', $data);
		$this->load->view('admin/guru/relasi-index-mapel', $data);
		$this->load->view('templates/footer');
	}

	public function atur_relasi($id = '')
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
			'menu' => 'active',
			'expanded' => 'true',
		];
		$data['menu_tahunajaran'] = [
			'menu' => '',
			'expanded' => 'false',
		];
		$data['menu_profile'] = [
			'menu' => '',
			'expanded' => 'false',
		];

		$id_guru = decrypt_url($id);
		$id_mapel = decrypt_url($id);

		$data['guru_detail'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row();
		$data['detail_relasi'] = $this->db->get_where('relasi_guru', ['guru' => $id_guru])->result();


		$data['kelas'] = $this->db->get('kelas')->result();
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['relasi_guru'] = $this->db->get('relasi_guru')->result();

		$data['guru'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row();

		$data['mapel_detail'] = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row();

		$this->form_validation->set_rules('guru[]', 'Guru', 'required');
		$this->form_validation->set_rules('mapel[]', 'Mapel', 'required');
		$this->form_validation->set_rules('kelas[]', 'Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar/admin', $data);
			$this->load->view('admin/guru/relasi', $data);
			$this->load->view('templates/footer');
		} else {
			$guru = $this->input->post('guru[]');
			$data_relasi = array();

			$index = 0; // Set index array awal dengan 0
			foreach ($guru as $g) { // Kita buat perulangan berdasarkan nama_siswa sampai data terakhir
				array_push($data_relasi, array(
					'guru' => $g,
					'mapel' => $this->input->post('mapel')[$index],
					'kelas' => $this->input->post('kelas')[$index],
				));
				$index++;
			}

			$sql = $this->db->insert_batch('relasi_guru', $data_relasi);
			// Cek apakah query insert nya sukses atau gagal
			if ($sql) { // Jika sukses
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data disimpan',
                    type: 'success',
                    padding: '2em'
                    })
                ");
				redirect('app/relasi');
			} else { // Jika gagal
				$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Error!',
                    text: 'gagal disimpan',
                    type: 'error',
                    padding: '2em'
                    })
                ");
				redirect('app/relasi');
			}
		}
	}
	public function hapus_relasi($id = '')
	{
		$id_relasi_guru = decrypt_url($id);
		$this->db->delete('relasi_guru', ['id_relasi_guru' => $id_relasi_guru]);

		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'data dihapus',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/relasi');
	}

	public function edit_relasi()
	{
		$id_relasi_guru = $this->input->post('e_id_relasi_guru');

		$data = [
			'guru' => $this->input->post('e_guru'),
			'mapel' => $this->input->post('e_mapel'),
			'kelas' => $this->input->post('e_kelas'),
		];

		$this->db->where('id_relasi_guru', $id_relasi_guru);
		$this->db->update('relasi_guru', $data);


		$this->session->set_flashdata('pesan', "
                swal({
                    title: 'Berhasil!',
                    text: 'Relasi guru diubah',
                    type: 'success',
                    padding: '2em'
                    })
                ");
		redirect('app/atur_relasi');
	}

	// END RELASI

}
