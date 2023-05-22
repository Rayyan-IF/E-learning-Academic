<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <input type="hidden" id="kode_ujian" value="<?= $ujian->kode_ujian; ?>">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading">
                        <h5 class=""><?= $ujian->nama_ujian; ?></h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="mt-2">
                                    <tr>
                                        <th>Jumlah Soal</th>
                                        <th> : <span class="text-primary"><?= count($essay_detail); ?> Soal</span></th>
                                    </tr>
                                    <tr>
                                        <th>Waktu Mulai</th>
                                        <th> : <?= $ujian->waktu_mulai; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Waktu Selesai</th>
                                        <th> : <?= $ujian->waktu_berakhir; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
                    </div>
                    <?php if (strtotime(date('Y-m-d H:i', time())) > strtotime($ujian->waktu_mulai)) : ?>
                        <?php if ($essay_siswa[0]->sudah_dikerjakan == 1) : ?>
                            <div class="transactions-list" style="background: #b9eabb; border: 2px dashed #45c849; border-radius: 5px;">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-name p-2 text-center">
                                            <h6 style="color: #45c849; margin-top: 7px;">Kamu sudah mengerjakan ujian
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                </svg>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div id="circle-basic">
                                    <?php
                                    $no = 1;
                                    foreach ($essay_detail as $soal) : ?>
                                        <?php

                                        $this->db->select_sum('score');
                                        $this->db->where('ujian', $ujian->kode_ujian);
                                        $this->db->where('siswa', $this->session->userdata('id'));
                                        $total_score = $this->db->get('essay_siswa')->row();

                                        ?>
                                        <?php $jawaban_siswa = $this->db->get_where('essay_siswa', ['essay_id' => $soal->id_essay_detail, 'siswa' => $this->session->userdata('id')])->row(); ?>
                                        <h3>no</h3>
                                        <section style="border: 1px solid #eaeaea; border-left: 5px solid #304aca;">
                                            <h5 style="margin-top: -25px;">No. <?= $no++; ?> - <?= count($essay_detail); ?></h5>
                                            <p class="mt-2"><?= $soal->soal; ?></p>
                                            <p><strong>Jawaban Saya : </strong></p>
                                            <div class="mt-2 rounded p-3" style="border: 1px solid #304aca;">
                                                <?php if ($jawaban_siswa->jawaban) : ?>
                                                    <?= $jawaban_siswa->jawaban; ?>
                                                <?php else : ?>
                                                    TIDAK DIJAWAB
                                                <?php endif; ?>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="text-primary">Score : <?= $jawaban_siswa->score; ?></h6>
                                            </div>
                                        </section>
                                    <?php endforeach; ?>
                                    <div class="mt-4 rounded" style="border: 1px solid #eaeaea; border-left: 5px solid #304aca;">
                                        <h6 class="text-primary p-4">Total Score : <?= $total_score->score; ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <form action="<?= base_url('siswa/kirim_essay'); ?>" method="POST">
                                <div class="card-body" style="position: relative;">
                                    <div id="waktu_habis" style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; background: rgba(255, 255, 255, 0.9); z-index: 1;">
                                        <h3 class="text-danger">Waktu Habis</h3>
                                    </div>
                                    <input type="hidden" name="ujian" value="<?= $ujian->kode_ujian; ?>">
                                    <input type="hidden" name="siswa" value="<?= $this->session->userdata('id'); ?>">
                                    <div style="margin-top: -20px;">
                                        <div id="circle-basic">
                                            <?php
                                            $no = 1;
                                            foreach ($essay_detail as $ed) : ?>
                                                <h3>no</h3>
                                                <section style="border: 1px solid #eaeaea; border-left: 5px solid #304aca;">
                                                    <h5 style="margin-top: -25px;">No. <?= $no++; ?> - <?= count($essay_detail); ?></h5>
                                                    <p class="mt-2"><?= $ed->soal; ?></p>
                                                    <textarea class="form-control" name="<?= $ed->id_essay_detail; ?>" cols="30" rows="5" placeholder="Jawaban Kamu"></textarea>
                                                </section>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    Jumlah Soal : <span class="text-primary"><?= count($essay_detail); ?></span> Soal
                                    <button type="submit" class="btn btn-primary float-right mb-2">Kirim</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    <?php else :  ?>
                        <div class="alert alert-danger mt-3">Belum Waktunya Ujian</div>
                    <?php endif; ?>
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

<!-- MODAL -->
<script>
    <?= $this->session->flashdata('pesan'); ?>
</script>