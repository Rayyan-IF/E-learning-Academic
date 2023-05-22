<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one p-3">
                    <div class="widget-heading">
                        <h5 class="">Notifikasi Tugas</h5>
                    </div>

                    <div class="widget-content">
                        <?php if ($tugas_siswa) : ?>
                            <?php foreach ($tugas_siswa as $ts) : ?>
                                <?php $tugas = $this->db->get_where('tugas', ['kode_tugas' => $ts->tugas])->row(); ?>
                                <?php $mapel = $this->db->get_where('mapel', ['id_mapel' => $tugas->mapel])->row(); ?>
                                <a href="<?= base_url('siswa/lihat_tugas/') . encrypt_url($tugas->id_tugas); ?>">
                                    <div class="transactions-list mt-1">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-icon">
                                                    <div class="icon">
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="t-name">
                                                    <h4><?= $tugas->nama_tugas; ?></h4>
                                                    <p class="meta-date"><?= $mapel->nama_mapel; ?></p>
                                                </div>
                                            </div>
                                            <div class="t-rate rate-dec">
                                                <p>
                                                    <span>Due Date</span><br>
                                                    <span><?= $tugas->due_date; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="transactions-list" style="background: #b9eabb; border: 2px dashed #45c849;">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-name">
                                            <h4 style="color: blue;">Belum Ada Tugas
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                </svg>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one p-3">
                    <div class="widget-heading">
                        <h5 class="">Notifikasi Materi</h5>
                    </div>

                    <div class="widget-content">
                        <?php if ($materi_siswa) : ?>
                            <?php foreach ($materi_siswa as $ms) : ?>
                                <?php $materi = $this->db->get_where('materi', ['kode_materi' => $ms->materi])->row(); ?>
                                <?php $mapel = $this->db->get_where('mapel', ['id_mapel' => $materi->mapel])->row(); ?>
                                <a href="<?= base_url('siswa/lihat_materi/') . encrypt_url($materi->id_materi); ?>">
                                    <div class="transactions-list mt-1">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-icon">
                                                    <div class="icon">
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="t-name">
                                                    <h4><?= $materi->nama_materi; ?></h4>
                                                    <p class="meta-date"><?= $mapel->nama_mapel; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="transactions-list" style="background: #ffeccb; border: 2px dashed #e2a03f;">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-name">
                                            <h4 style="color: blue;">Belum Ada Materi
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="8" y1="15" x2="16" y2="15"></line>
                                                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                </svg>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one p-3">
                    <div class="widget-heading">
                        <h5 class="">Notifikasi Ujian</h5>
                    </div>

                    <div class="widget-content">
                        <?php

                        $waktuskrng = date('Y-m-d H:i', time());
                        $aku = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row();
                        $ujian = $this->db->query("SELECT * FROM ujian WHERE kelas = '$aku->kelas' AND waktu_berakhir > '$waktuskrng'")->result();

                        ?>
                        <?php if ($ujian) : ?>
                            <?php foreach ($ujian as $u) : ?>
                                <?php $mapel = $this->db->get_where('mapel', ['id_mapel' => $u->mapel])->row(); ?>
                                <?php if ($u->jenis_ujian == 1) : ?>
                                    <a href="<?= base_url('siswa/lihat_essay/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>">
                                    <?php else : ?>
                                        <a href="<?= base_url('siswa/lihat_pg/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>">
                                        <?php endif; ?>
                                        <div class="transactions-list mt-1">
                                            <div class="t-item">
                                                <div class="t-company-name">
                                                    <div class="t-icon">
                                                        <div class="icon">
                                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                <polyline points="10 9 9 9 8 9"></polyline>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="t-name">
                                                        <h4><?= $u->nama_ujian; ?></h4>
                                                        <p class="meta-date"><?= $mapel->nama_mapel; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="transactions-list" style="background: #ffeccb; border: 2px dashed #e2a03f;">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-name">
                                                    <h4 style="color: blue;">Tidak ada ujian
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                        </svg>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">
                        <div class="header">
                            <div class="header-body">
                                <h6>Total Tugas</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="">
                                <p class="task-left">
                                    <?php $jumlah_tugas_siswa = $this->db->get_where('tugas_siswa', ['siswa' => $this->session->userdata('id')])->result(); ?>
                                    <?= count($jumlah_tugas_siswa); ?>
                                </p>
                                <?php $jumlah_tugas_siswa_selesai = $this->db->get_where('tugas_siswa', ['siswa' => $this->session->userdata('id'), 'is_telat' => 0])->result(); ?>
                                <p class="task-completed"><span><?= count($jumlah_tugas_siswa_selesai); ?> Tugas Sukses Dikerjakan</span></p>
                                <?php $jumlah_tugas_siswa_telat = $this->db->get_where('tugas_siswa', ['siswa' => $this->session->userdata('id'), 'is_telat' => 1])->result(); ?>
                                <p class="task-hight-priority"><span><?= count($jumlah_tugas_siswa_telat); ?> Tugas</span> Terlambat Dikerjakan</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">
                        <div class="header">
                            <div class="header-body">
                                <h6>Total Materi</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="">
                                <p class="task-left">
                                    <?php $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row(); ?>
                                    <?php $jumlah_materi_siswa = $this->db->get_where('materi', ['kelas' => $siswa->kelas])->result(); ?>
                                    <?= count($jumlah_materi_siswa); ?>
                                </p>
                                <p class="task-completed"><span>Ada <?= count($jumlah_materi_siswa); ?> Materi Dikelas Kamu</span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">
                        <div class="header">
                            <div class="header-body">
                                <h6>Nilai Rata-Rata Tugas</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="">
                                <p class="task-left">
                                    <?php $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id')])->row(); ?>
                                    <?php
                                    $this->db->select_avg('nilai');
                                    $this->db->where('siswa', $siswa->id_siswa);
                                    $rata_rata = $this->db->get('tugas_siswa')->row();
                                    ?>
                                    <?= ($rata_rata->nilai / 10); ?>
                                </p>
                                <p class="task-completed"><span><?= ($rata_rata->nilai / 10); ?> Adalah Nilai Rata-Rata Kamu</span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2022 <a target="_blank" href="http://bit.ly/demo-abdul">Pejuang Rupiah Team</a>, All rights reserved. <a href="https://freepik.com" target="_blank" class="text-primary"></a></p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Pejuang Rupiah Team v 1.1</p>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
<script>
    <?= $this->session->flashdata('pesan'); ?>
</script>