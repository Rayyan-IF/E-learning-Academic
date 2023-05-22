<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('string');
        is_siswa();
    }

    // Dashboard
    public function index()
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => 'active',
            'expanded' => 'true'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $tugas_siswa_where = [
            'siswa' => $this->session->userdata('id'),
            'date_send' => null
        ];
        $data['tugas_siswa'] = $this->db->get_where('tugas_siswa', $tugas_siswa_where)->result();
        $data['materi_siswa'] = $this->db->get_where('materi_siswa', ['siswa' => $this->session->userdata('id')])->result();
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['mapel'] = $this->db->get('mapel')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];

        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar/siswa', $data);
            $this->load->view('siswa/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('nama_siswa', htmlspecialchars($this->input->post('nama_siswa')));

            if ($_FILES['avatar']['name']) {

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5048';
                $config['upload_path'] = './assets/app-assets/user/';
                $config['remove_spaces'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('avatar')) {
                    $this->db->set('avatar', $this->upload->data('file_name'));
                    $old_image = $data['siswa']->avatar;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/app-assets/user/' . $old_image);
                    }
                }
            }

            $this->db->where('id_siswa', $this->session->userdata('id'));
            $this->db->update('siswa');

            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Profile telah diubah',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
            redirect('siswa/profile');
        }
    }

    public function update_password()
    {
        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        if (password_verify($this->input->post('current_password'), $siswa->password)) {
            $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
            $this->db->where('id_siswa', $siswa->id_siswa);
            $this->db->update('siswa');
            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Password telah diubah',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
            redirect('siswa/profile');
        } else {
            $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops..',
                            text: 'Current Password Salah',
                            type: 'error',
                            padding: '2em'
                            });
                        ");
            redirect('siswa/profile');
        }
    }

    public function absensi($id = '')
    {
        $id_kelas = explode(',', decrypt_url($id));

        //		print_r($id_kelas[0]);
        //		print_r("\n");
        //		print_r($id_kelas[1]);
        //		die();
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $data['kelas_detail'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas[1]])->row();
        $data['detail_siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->result();
        $data['detail_absensi'] = $this->db->get_where('absensi', ['id_kelas' => $id_kelas[1]])->result();


        $data['relasi_guru'] = $this->db->get_where('relasi_guru', ['guru' => $this->session->userdata('id')])->result();
        $data['guru_detail'] = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id')])->row();

        $data['detail_guru_absen'] = $this->db->select("*")->from("absensi")->where('id_siswa', $this->session->userdata('id'))
            ->group_by("jam")
            ->get()
            ->result();

        $data['detail_guru_absensi'] = $this->db->select("*")->from("absensi")->where('id_siswa', $this->session->userdata('id'))
            ->where('pertemuan', $id_kelas[0])
            ->group_by("waktu")
            ->get()
            ->result();

        $data['detail_absen'] = $this->db->select("*")->from("absensi")->where('id_siswa', $this->session->userdata('id'))
            ->where('pertemuan', $id_kelas[0])
            ->get()
            ->result();


        $data['mapel'] = $this->db->get('mapel')->result();
        $data['guru'] = $this->db->get('guru')->result();
        $data['siswa'] = $this->db->get('siswa')->result();
        $data['ket_absen'] = $this->db->get('ket_absen')->result();
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['ruangan'] = $this->db->get('ruangan')->result();
        $data['absensi'] = $this->db->get('absensi')->result();

        //
        //		print_r($data['detail_absen']);
        //		die();

        $this->form_validation->set_rules('hari[]', 'Hari', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar/siswa', $data);
            $this->load->view('siswa/absensi/list', $data);
            $this->load->view('templates/footer');
        }
    }

    public function absensi_depan($id = '')
    {

        $id_kelas = decrypt_url($id);

        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $data['kelas_detail'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row();
        $data['detail_siswa'] = $this->db->get_where('siswa', ['kelas' => $id_kelas])->result();

        $data['detail_siswa_absensi'] = $this->db->select("*")->from("absensi")->where('id_siswa', $this->session->userdata('id'))
            ->where('pertemuan', $id_kelas)
            ->group_by("waktu")
            ->get()
            ->result();

        $data['relasi_guru'] = $this->db->get_where('relasi_guru', ['guru' => $this->session->userdata('id')])->result();
        $data['guru_detail'] = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id')])->row();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['guru'] = $this->db->get('guru')->result();
        $data['siswa'] = $this->db->get('siswa')->result();
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['ruangan'] = $this->db->get('ruangan')->result();
        $data['absensi'] = $this->db->get('absensi')->result();


        //
        //		print_r($data['detail_absen']);
        //		die();

        $this->form_validation->set_rules('hari[]', 'Hari', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar/siswa', $data);
            $this->load->view('siswa/absensi/v_absensi_depan', $data);
            $this->load->view('templates/footer');
        }
    }


    public function materi()
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['materi'] = $this->db->get_where('materi', ['kelas' => $siswa->kelas])->result();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['kelas'] = $this->db->get('kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/materi/list', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_materi($data_id_materi = '')
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];


        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();
        $data['materi'] = $this->db->get_where('materi', ['id_materi' => decrypt_url($data_id_materi), 'kelas' => $siswa->kelas])->row();
        $data['guru'] = $this->db->get_where('guru', ['id_guru' => $data['materi']->guru])->row();
        $data['file'] = $this->db->get_where('file', ['kode_file' => $data['materi']->kode_materi])->result();

        $siswa_materi_where = [
            'materi' => $data['materi']->kode_materi,
            'siswa' => $this->session->userdata('id')
        ];

        $siswa_materi = $this->db->get_where('materi_siswa', $siswa_materi_where)->row();
        if ($siswa_materi) {
            $this->db->delete('materi_siswa', $siswa_materi_where);
        }

        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $data['materi']->mapel])->row();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $data['materi']->kelas])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/materi/lihat-materi', $data);
        $this->load->view('templates/footer');
    }

    public function tugas()
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['tugas'] = $this->db->get_where('tugas', ['kelas' => $siswa->kelas])->result();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['kelas'] = $this->db->get('kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/tugas/list', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_tugas($data_id_tugas = '')
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['tugas'] = $this->db->get_where('tugas', ['id_tugas' => decrypt_url($data_id_tugas), 'kelas' => $siswa->kelas])->row();
        $data['tugas_siswa'] = $this->db->get_where('tugas_siswa', ['tugas' => $data['tugas']->kode_tugas, 'siswa' => $this->session->userdata('id')])->row();
        $data['guru'] = $this->db->get_where('guru', ['id_guru' => $data['tugas']->guru])->row();
        $data['file'] = $this->db->get_where('file', ['kode_file' => $data['tugas']->kode_tugas])->result();

        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $data['tugas']->mapel])->row();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $data['tugas']->kelas])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/tugas/lihat-tugas', $data);
        $this->load->view('templates/footer');
    }

    public function kerjakan_tugas($data_id_tugas = '', $data_id_siswa = '')
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_ujian'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['tugas'] = $this->db->get_where('tugas', ['id_tugas' => decrypt_url($data_id_tugas), 'kelas' => $siswa->kelas])->row();
        $data['guru'] = $this->db->get_where('guru', ['id_guru' => $data['tugas']->guru])->row();
        $data['file'] = $this->db->get_where('file', ['kode_file' => $data['tugas']->kode_tugas])->result();

        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $data['tugas']->mapel])->row();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $data['tugas']->kelas])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/tugas/kerjakan-tugas', $data);
        $this->load->view('templates/footer');
    }

    public function kumpulkan()
    {

        $kode_tugas = $this->input->post('kode_tugas');
        $tugas = $this->db->get_where('tugas', ['kode_tugas' => $kode_tugas])->row();
        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();
        $tugas_siswa = $this->db->get_where('tugas_siswa', ['tugas' => $kode_tugas, 'siswa' => $siswa->id_siswa])->row();

        $file_siswa = null;
        if ($tugas_siswa->file_siswa === null) {
            $file_siswa = random_string('alnum', 8);
        } else {
            $file_siswa = $tugas_siswa->file_siswa;
        }
        // Cek Tugas Telat
        $telat = '';
        $waktu =  date('Y-m-d H:i', time());
        $batas = date($tugas->due_date);
        if (strtotime($waktu) > strtotime($batas)) {
            echo "<b>Batas waktu sudah berakhir</b><br>";
            $telat = 1;
        } else {
            echo "<b>Masih dalam jangka waktu</b><br>";
            $telat = 0;
        }

        $data_tugas = [
            'text_siswa' => htmlspecialchars($this->input->post('text_siswa')),
            'date_send' => time(),
            'is_telat' => $telat,
        ];


        $this->db->where('tugas', $kode_tugas);
        $this->db->where('siswa', $this->input->post('id_siswa'));
        $this->db->update('tugas_siswa', $data_tugas);

        if ($_FILES['file_siswa']) {

            // Hitung Jumlah File/Gambar yang dipilih
            $jumlahData = count($_FILES['file_siswa']['name']);

            // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
            for ($i = 0; $i < $jumlahData; $i++) :

                // Inisialisasi Nama,Tipe,Dll.
                $_FILES['file']['name']     = $_FILES['file_siswa']['name'][$i];
                $_FILES['file']['type']     = $_FILES['file_siswa']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['file_siswa']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['file_siswa']['size'][$i];

                // Konfigurasi Upload
                $config['upload_path']          = './assets/app-assets/file/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|ppt|pptx|rar|zip|xlsx|php|js|html|css|txt|iso|mp4|MP4|3gp|3GP|avi|AVI|mkv|MKV|mpeg|MPEG|wmp|WMP';

                // Memanggil Library Upload dan Setting Konfigurasi
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

                    $fileData = $this->upload->data(); // Lakukan Upload Data

                    // Membuat Variable untuk dimasukkan ke Database
                    $uploadData[$i]['kode_file'] = $file_siswa;
                    $uploadData[$i]['nama_file'] = $fileData['file_name'];
                }

            endfor; // Penutup For

            if ($uploadData !== null) { // Jika Berhasil Upload
                $this->db->insert_batch('file', $uploadData);
            }
            //
            $this->db->set('file_siswa', $file_siswa);
        }

        $this->db->where('tugas', $kode_tugas);
        $this->db->where('siswa', $this->input->post('id_siswa'));
        $this->db->update('tugas_siswa');

        $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Tugas telah dikerjakan',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
        redirect('siswa/lihat_tugas/' . encrypt_url($tugas->id_tugas));
    }

    // UJIAN PG

    public function ujian()
    {
        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['ujian'] = $this->db->get_where('ujian', ['kelas' => $siswa->kelas])->result();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['kelas'] = $this->db->get('kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/ujian/list', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_pg($data_id_ujian, $data_id_siswa)
    {
        $id_ujian = decrypt_url($data_id_ujian);
        $id_siswa = decrypt_url($data_id_siswa);

        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['ujian'] = $this->db->get_where('ujian', ['id_ujian' => $id_ujian])->row();
        $data['detail_ujian'] = $this->db->get_where('ujian_detail', ['kode_ujian' => $data['ujian']->kode_ujian])->result();

        $data['ujian_siswa'] = $this->db->get_where('ujian_siswa', ['ujian' => $data['ujian']->kode_ujian, 'siswa' => $siswa->id_siswa])->result();
        $data['jawaban_benar'] = $this->db->get_where('ujian_siswa', ['ujian' => $data['ujian']->kode_ujian, 'siswa' => $siswa->id_siswa, 'benar' => 1])->result();
        $data['jawaban_salah'] = $this->db->get_where('ujian_siswa', ['ujian' => $data['ujian']->kode_ujian, 'siswa' => $siswa->id_siswa, 'benar' => 0])->result();
        $data['tidak_dijawab'] = $this->db->get_where('ujian_siswa', ['ujian' => $data['ujian']->kode_ujian, 'siswa' => $siswa->id_siswa, 'benar' => 2])->result();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['kelas'] = $this->db->get('kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/ujian/pg-lihat', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_ujian()
    {
        $kode_ujian = $this->input->post('ujian');
        $siswa = $this->input->post('siswa');

        $detail_ujian = $this->db->get_where('ujian_detail', ['kode_ujian' => $kode_ujian])->result();

        foreach ($detail_ujian as $du) {
            if ($this->input->post("$du->id_detail_ujian") == $du->jawaban) {
                $this->db->set('jawaban', $this->input->post("$du->id_detail_ujian"));
                $this->db->set('benar', 1);
                $this->db->where('ujian_id', $du->id_detail_ujian);
                $this->db->where('siswa', $siswa);
                $this->db->update('ujian_siswa');
            } else {
                if ($this->input->post("$du->id_detail_ujian") == NULL) {
                    $this->db->set('jawaban', $this->input->post("$du->id_detail_ujian"));
                    $this->db->set('benar', 2);
                    $this->db->where('ujian_id', $du->id_detail_ujian);
                    $this->db->where('siswa', $siswa);
                    $this->db->update('ujian_siswa');
                } else {
                    $this->db->set('jawaban', $this->input->post("$du->id_detail_ujian"));
                    $this->db->set('benar', 0);
                    $this->db->where('ujian_id', $du->id_detail_ujian);
                    $this->db->where('siswa', $siswa);
                    $this->db->update('ujian_siswa');
                }
            }
        }

        $ujian = $this->db->get_where('ujian', ['kode_ujian' => $kode_ujian])->row();

        $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Ujian telah dikerjakan',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
        redirect('siswa/lihat_pg/' . encrypt_url($ujian->id_ujian) . '/' . encrypt_url($siswa));
    }

    // END UJIAN PG

    // UJIAN ESSAY

    public function lihat_essay($data_id_ujian, $data_id_siswa)
    {
        $id_ujian = decrypt_url($data_id_ujian);
        $id_siswa = decrypt_url($data_id_siswa);

        // MENU DATA
        $data['dashboard'] = [
            'menu' => '',
            'expanded' => 'false'
        ];
        $data['menu_materi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_tugas'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_ujian'] = [
            'menu' => 'active',
            'expanded' => 'true',
        ];
        $data['menu_absensi'] = [
            'menu' => '',
            'expanded' => 'false',
        ];
        $data['menu_profile'] = [
            'menu' => '',
            'expanded' => 'false',
        ];

        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();

        $data['ujian'] = $this->db->get_where('ujian', ['id_ujian' => $id_ujian])->row();
        $data['essay_detail'] = $this->db->get_where('essay_detail', ['kode_ujian' => $data['ujian']->kode_ujian])->result();

        $data['essay_siswa'] = $this->db->get_where('essay_siswa', ['ujian' => $data['ujian']->kode_ujian, 'siswa' => $siswa->id_siswa])->result();

        $data['mapel'] = $this->db->get('mapel')->result();
        $data['kelas'] = $this->db->get('kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/siswa', $data);
        $this->load->view('siswa/ujian/essay-lihat', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_essay()
    {
        $kode_ujian = $this->input->post('ujian');
        $siswa = $this->input->post('siswa');

        $essay_detail = $this->db->get_where('essay_detail', ['kode_ujian' => $kode_ujian])->result();

        foreach ($essay_detail as $du) {
            if ($this->input->post("$du->id_essay_detail")) {
                $this->db->set('jawaban', $this->input->post("$du->id_essay_detail"));
                $this->db->set('sudah_dikerjakan', 1);
                $this->db->where('essay_id', $du->id_essay_detail);
                $this->db->where('siswa', $siswa);
                $this->db->update('essay_siswa');
            } else {
                $this->db->set('jawaban', NULL);
                $this->db->set('sudah_dikerjakan', 1);
                $this->db->where('essay_id', $du->id_essay_detail);
                $this->db->where('siswa', $siswa);
                $this->db->update('essay_siswa');
            }
        }

        $ujian = $this->db->get_where('ujian', ['kode_ujian' => $kode_ujian])->row();

        $this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Ujian telah dikerjakan',
                            type: 'success',
                            padding: '2em'
                            });
                        ");
        redirect('siswa/lihat_essay/' . encrypt_url($ujian->id_ujian) . '/' . encrypt_url($siswa));
    }
    // END UJIAN ESSAY
}
