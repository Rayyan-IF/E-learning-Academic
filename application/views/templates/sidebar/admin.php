        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="profile-info">
                    <figure class="user-cover-image"></figure>
                    <div class="user-info">
                        <?php $admin = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row(); ?>
                        <img src="<?= base_url('assets/app-assets/user/') . $admin->avatar; ?>" alt="avatar" class="bg-white">
                        <h6 class=""><?= $admin->nama_admin; ?></h6>
                        <p class="">Admin E-Learning</p>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu <?= $dashboard['menu']; ?>">
                        <a href="<?= base_url('app'); ?>" aria-expanded="<?= $dashboard['expanded']; ?>" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                    <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>MASTER DATA</span></div>
                    </li>
                    <li class="menu <?= $master['menu']; ?>">
                        <a href="#components" data-toggle="collapse" aria-expanded="<?= $master['expanded']; ?>" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>User</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled <?= $master['collapse']; ?>" id="components" data-parent="#accordionExample">
                            <li class="<?= $sub_master['siswa']; ?>">
                                <a href="<?= base_url('app/siswa'); ?>"> Siswa </a>
                            </li>
                            <li class="<?= $sub_master['guru']; ?>">
                                <a href="<?= base_url('app/guru'); ?>"> Guru </a>
                            </li>
                        </ul>
                    </li>
					<li class="menu <?= $menu_jurusan['menu']; ?>">
						<a href="<?= base_url('app/jurusan'); ?>" aria-expanded="<?= $menu_jurusan['expanded']; ?>" class="dropdown-toggle">
							<div class="">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
									<polyline points="9 22 9 12 15 12 15 22"></polyline>
								</svg>
								<span>Jurusan</span>
							</div>
						</a>
					</li>
					<li class="menu <?= $menu_ruangan['menu']; ?>">
						<a href="<?= base_url('app/ruangan'); ?>" aria-expanded="<?= $menu_ruangan['expanded']; ?>" class="dropdown-toggle">
							<div class="">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
									<polyline points="9 22 9 12 15 12 15 22"></polyline>
								</svg>
								<span>Ruangan</span>
							</div>
						</a>
					</li>
                    <li class="menu <?= $menu_kelas['menu']; ?>">
                        <a href="<?= base_url('app/kelas'); ?>" aria-expanded="<?= $menu_kelas['expanded']; ?>" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Kelas</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu <?= $menu_mapel['menu']; ?>">
                        <a href="<?= base_url('app/mapel'); ?>" aria-expanded="<?= $menu_mapel['expanded']; ?>" class="dropdown-toggle">
                            <div class="">

                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                                <span>Mapel</span>
                            </div>
                        </a>
                    </li>
					<li class="menu <?= $menu_jadwal['menu']; ?>">
						<a href="<?= base_url('app/jadwal'); ?>" aria-expanded="<?= $menu_jadwal['expanded']; ?>" class="dropdown-toggle">
							<div class="">

								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
									<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
									<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
								</svg>
								<span>Jadwal Pelajaran</span>
							</div>
						</a>
					</li>
                    <li class="menu <?= $menu_relasi['menu']; ?>">
                        <a href="<?= base_url('app/relasi'); ?>" aria-expanded="<?= $menu_relasi['expanded']; ?>" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <line x1="6" y1="3" x2="6" y2="15"></line>
                                    <circle cx="18" cy="6" r="3"></circle>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M18 9a9 9 0 0 1-9 9"></path>
                                </svg>
                                <span>Daftar Pengajaran</span>
                            </div>
                        </a>
                    </li>
<!--					<li class="menu --><?//= $menu_tahunajaran['menu']; ?><!--">-->
<!--						<a href="--><?//= base_url('app/ta'); ?><!--" aria-expanded="--><?//= $menu_tahunajaran['expanded']; ?><!--" class="dropdown-toggle">-->
<!--							<div class="">-->
<!--								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">-->
<!--									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>-->
<!--									<polyline points="9 22 9 12 15 12 15 22"></polyline>-->
<!--								</svg>-->
<!--								<span>Tahun Ajaran</span>-->
<!--							</div>-->
<!--						</a>-->
<!--					</li>-->
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>USER MENU</span></div>
                    </li>
                    <li class="menu <?= $menu_profile['menu']; ?>">
                        <a href="<?= base_url('admin'); ?>" aria-expanded="<?= $menu_profile['expanded']; ?>" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Profile</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?= base_url('auth/logout'); ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->
