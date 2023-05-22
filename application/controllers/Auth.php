<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->library('form_validation');
		$data['admin'] = $this->db->get('admin')->result();
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth', $data);
		} else {

			$email = $this->input->post('email');

			// Cek Siswa
			$siswa = $this->db->get_where('siswa', ['email' => $email])->row();
			if ($siswa) {
				$this->_login_siswa();
			} else {
				$guru = $this->db->get_where('guru', ['email' => $email])->row();
				// Cek Guru
				if ($guru) {
					$this->_login_guru();
				} else {
					$admin = $this->db->get_where('admin', ['email' => $email])->row();
					if ($admin) {
						$this->_login_admin();
					} else {
						$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak ditemukan',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
						redirect('auth');
					}
				}
			}
		}
	}

	private function _login_admin()
	{
		// Jika Lolos Validasi
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Ambil Data user berdasarkan data diatas
		$admin = $this->db->get_where('admin', ['email' => $email])->row();

		// Cek apakah Ada admin dengan email yg di inputkan
		if ($admin) {
			// Jika adminnya ada
			// Cek Password
			if (password_verify($password, $admin->password)) {
				// Jika Password Benar
				if ($admin->is_active == 1) {
					$data = [
						'id' => $admin->id_admin,
						'email' => $admin->email,
						'nama' => $admin->nama_admin,
						'role' => $admin->role,
					];
					$this->session->set_userdata($data);
					// Arahkan Ke halaman admin
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Login Berhasil',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
					redirect('app');
				} else {
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak aktif',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Password salah',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak terdaftar',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
			redirect('auth');
		}
	}
	private function _login_guru()
	{
		// Jika Lolos Validasi
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Ambil Data user berdasarkan data diatas
		$guru = $this->db->get_where('guru', ['email' => $email])->row();

		// Cek apakah Ada guru dengan email yg di inputkan
		if ($guru) {
			// Jika gurunya ada
			// Cek Password
			if (password_verify($password, $guru->password)) {
				// Jika Password Benar
				if ($guru->is_active == 1) {
					$data = [
						'id' => $guru->id_guru,
						'email' => $guru->email,
						'nama' => $guru->nama_guru,
						'role' => $guru->role,
					];
					$this->session->set_userdata($data);
					// Arahkan Ke halaman guru
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Login Berhasil',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
					redirect('guru');
				} else {
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak aktif',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Password salah',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak terdaftar',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
			redirect('auth');
		}
	}

	private function _login_siswa()
	{
		// Jika Lolos Validasi
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Ambil Data user berdasarkan data diatas
		$siswa = $this->db->get_where('siswa', ['email' => $email])->row();

		// Cek apakah Ada siswa dengan email yg di inputkan
		if ($siswa) {
			// Jika siswanya ada
			// Cek Password
			if (password_verify($password, $siswa->password)) {
				// Jika Password Benar
				if ($siswa->is_active == 1) {
					$data = [
						'id' => $siswa->id_siswa,
						'email' => $siswa->email,
						'nama' => $siswa->nama_siswa,
						'role' => $siswa->role,
					];
					$this->session->set_userdata($data);
					// Arahkan Ke halaman siswa
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Login Berhasil',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
					redirect('siswa');
				} else {
					$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak aktif',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Password salah',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Login Gagal, Akun tidak terdaftar',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
			redirect('auth');
		}
	}

	public function install()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_admin', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('install');
		} else {

			// CEK EMAIL
			$email = $this->input->post('email');

			$siswa = $this->db->get_where('siswa', ['email' => $email])->row();
			if ($siswa) {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Gagal Disimpan, email sudah dipakai Siswa lain',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth/install');
			}

			$guru = $this->db->get_where('guru', ['email' => $email])->row();
			if ($guru) {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Gagal Disimpan, email sudah dipakai Guru lain',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth/install');
			}

			$admin = $this->db->get_where('admin', ['email' => $email])->row();
			if ($admin) {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Oops!',
                            text: 'Gagal Disimpan, email sudah dipakai Admin lain',
                            type: 'error',
                            padding: '2em'
                            })
                        ");
				redirect('auth/install');
			}

			$data_admin = [
				'nama_admin' => $this->input->post('nama_admin'),
				'email' => $email,
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_active' => 1,
				'date_created' => time(),
				'avatar' => 'default.jpg',
				'role' => 1,
				'pm' => $this->input->post('password')
			];

			$this->db->insert('admin', $data_admin);
			$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Admin Disimpan, Silahkan Login',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
			redirect(base_url());
		}
	}

	public function forgotPassword()
	{
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->helper('string');
			$this->load->view('forgot_password');
		} else {
			$email = $this->input->post('email');

			// Cek Siswa
			$siswa = $this->db->get_where('siswa', ['email' => $email])->row();

			if ($siswa) {
				$this->forgotPasswordSiswa();
			}
			$guru = $this->db->get_where('guru', ['email' => $email])->row();
			// Cek Guru
			if ($guru) {
				$this->forgotPasswordGuru();
			}
		}
	}

	public function forgotPasswordSiswa()
	{
		$email = $this->input->post('email');
		$token = random_string('alnum', 32);
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('user_token', $user_token);

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
		// $this->email->to($email);

		// $this->email->subject('Forgot Password');
		// $this->email->message('
		//             <div style="color: #000; padding: 10px;">
		//                 <div style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color: #1C3FAA; font-weight: bold;">
		//                     E-Learning
		//                 </div>
		//                 <small style="color: #000;">V 1.0 by Pejuang Rupiah Team</small>
		//                 <br>
		//                 <p style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">Hallo ' . $this->input->post('nama') . ' <br>
		//                     <span style="color: #000;">Anda telah Melakukan Pergantian Password. Silahkan lakukan pergantian password dengan cara mengklik tombol reset</span><br>
		//                     </p>
		//                 <a href="' . base_url() . 'auth/resetPassword?email=' . $email . '&token=' . $token .  '" style="display: inline-block; width: 100px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;">
		//                     Reset        
		//                 </a>
		//             </div>
		//         ');

		// if (!$this->email->send()) {
		// 	$this->db->delete('user_token', ['email' => $email]);
		// 	echo $this->email->print_debugger();
		// 	die();
		// } else {
		$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Permintaan Reset Berhasil, Silahkan Lakukan verifikasi via email',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
		redirect(base_url());
		// }
	}



	public function forgotPasswordGuru()
	{

		$email = $this->input->post('email');
		$token = random_string('alnum', 32);
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('user_token', $user_token);

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
		// $this->email->to($email);

		// $this->email->subject('Forgot Password');
		// $this->email->message('
		//             <div style="color: #000; padding: 10px;">
		//                 <div style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color: #1C3FAA; font-weight: bold;">
		//                     E-Learning
		//                 </div>
		//                 <small style="color: #000;">V 1.0 by Pejuang Rupiah Team</small>
		//                 <br>
		//                 <p style="font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif; color: #000;">Hallo ' . $this->input->post('nama') . ' <br>
		//                     <span style="color: #000;">Anda telah Melakukan Pergantian Password. Silahkan lakukan pergantian password dengan cara mengklik tombol reset</span><br>
		//                     </p>
		//                 <a href="' . base_url() . 'auth/resetPassword?email=' . $email . '&token=' . $token .  '" style="display: inline-block; width: 100px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;">
		//                     Reset        
		//                 </a>
		//             </div>
		//         ');

		// if (!$this->email->send()) {
		// 	$this->db->delete('user_token', ['email' => $email]);
		// 	echo $this->email->print_debugger();
		// 	die();
		// } else {
		$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Permintaan Reset Berhasil, Silahkan Lakukan verifikasi via email',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
		redirect(base_url());
		// }
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user_token', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Gagal!',
                            text: 'Reset Password Failed tidak ada token',
                            padding: '2em'
                            })
                        ");
			}
		} else {
			$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Gagal!',
                            text: 'Reset Password Failed tidak ada email',
                            padding: '2em'
                            })
                        ");
			redirect('auth');
		}
	}

	public function changePassword()
	{

		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->helper('string');
			$this->load->view('change_password');
		} else {
			$email = $this->session->userdata('reset_email');

			// Cek Siswa Guru
			$siswa = $this->db->get_where('siswa', ['email' => $email])->row();
			$guru = $this->db->get_where('guru', ['email' => $email])->row();

			if ($siswa) {
				$this->changePasswordSiswa();
			} elseif ($guru) {
				$this->changePasswordGuru();
			}
		}
	}

	public function changePasswordSiswa()
	{
		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
		$email = $this->session->userdata('reset_email');

		$this->db->set('password', $password);
		$this->db->where('email', $email);
		$this->db->update('siswa');

		$this->db->delete('user_token', ['email' => $email]);

		$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Sukses!',
                            text: 'Password Berhasil di Reset silahkan login !',
                            padding: '2em',
                            type:'success'
                            })
                        ");
		redirect('auth');
	}



	public function changePasswordGuru()
	{
		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
		$email = $this->session->userdata('reset_email');

		$this->db->set('password', $password);
		$this->db->where('email', $email);
		$this->db->update('guru');

		$this->db->delete('user_token', ['email' => $email]);

		$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Sukses!',
                            text: 'Password Berhasil di Reset silahkan login !',
                            padding: '2em',
                            type:'success'
                            })
                        ");
		redirect('auth');
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$akun = $this->db->get_where('siswa', ['email' => $email])->row();

		if ($akun) {
			$user = $this->db->get_where('siswa', ['email' => $email])->row();
		}
		if (!$akun) {
			$user = $this->db->get_where('guru', ['email' => $email])->row();
		}

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row();
			if ($user_token) {
				if (time() - $user_token->date_created < (60 * 60 * 24)) {
					if ($user->role == 2) {
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('siswa');
						$this->db->delete('user_token', ['email' => $email]);
						$this->session->set_flashdata(
							'pesan',
							"swal({
                                title: 'Berhasil!',
                                text: '" . $email . " Sudah aktif',
                                type: 'success',
                                padding: '2em'
                            })"
						);
						redirect('auth');
					} else {
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('guru');
						$this->db->delete('user_token', ['email' => $email]);
						$this->session->set_flashdata(
							'pesan',
							"swal({
                                title: 'Berhasil!',
                                text: '" . $email . " Sudah aktif',
                                type: 'success',
                                padding: '2em'
                            })"
						);
						redirect('auth');
					}
				} else {

					if ($user['role_id'] == 4) {
						$this->db->delete('siswa', ['email' => $email]);
					} else {
						$this->db->delete('guru', ['email' => $email]);
					}
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata(
						'pesan',
						"swal({
                            title: 'Oops!',
                            text: 'Aktivasi gagal, Token Kadaluarsa!',
                            type: 'error',
                            padding: '2em'
                        })"
					);
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					"swal({
                        title: 'Oops!',
                        text: 'Aktivasi gagal, Token salah!',
                        type: 'error',
                        padding: '2em'
                    })"
				);
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata(
				'pesan',
				"swal({
                    title: 'Oops!',
                    text: 'Aktivasi gagal, email salah!',
                    type: 'error',
                    padding: '2em'
                })"
			);
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('pesan', "
                        swal({
                            title: 'Berhasil!',
                            text: 'Anda Sudah Logout',
                            type: 'success',
                            padding: '2em'
                            })
                        ");
		redirect('auth');
	}
}
