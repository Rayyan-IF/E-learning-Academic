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
                                        <th> : <span class="text-primary"><?= count($detail_ujian); ?> Soal</span></th>
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
                                <div class="text-right mt-3">
                                    <h4 id="jam_skrng"><?= date('Y-m-d H:i:s', time()); ?></h4>
                                    <h6 id="cek_jam"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (strtotime(date('Y-m-d H:i', time())) > strtotime($ujian->waktu_mulai)) : ?>
                        <?php if ($ujian_siswa[0]->benar) : ?>
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
                            <div id="toggleAccordion" class="mt-3">
                                <div class="card">
                                    <div class="card-header" id="...">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="false" aria-controls="defaultAccordionOne">
                                                Ujian Saya
                                            </div>
                                        </section>
                                    </div>
                                    <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                        <div class="card-body" style="position: relative;">
                                            <input type="hidden" name="siswa" value="<?= $this->session->userdata('id'); ?>">
                                            <div style="margin-top: -20px;">
                                                <?php
                                                $no = 1;
                                                foreach ($detail_ujian as $soal) : ?>
                                                    <?php $jawaban_siswa = $this->db->get_where('ujian_siswa', ['ujian_id' => $soal->id_detail_ujian, 'siswa' => $this->session->userdata('id')])->row(); ?>
                                                    <p class="mt-3">
                                                        <span class="float-left"><?= $no++; ?>. </span> <?= $soal->nama_soal; ?>
                                                    </p>
                                                    <ul style="list-style: none; margin-left: -20px;">
                                                        <li><?= $soal->pg_1; ?></li>
                                                        <li><?= $soal->pg_2; ?></li>
                                                        <li><?= $soal->pg_3; ?></li>
                                                        <li><?= $soal->pg_4; ?></li>
                                                    </ul>
                                                    <?php if ($soal->jawaban == $jawaban_siswa->jawaban) : ?>
                                                        <div class="mt-2">Jawaban Kamu : <?= $jawaban_siswa->jawaban; ?> <span class="badge badge-success ml-2">benar</span></div>
                                                    <?php else : ?>
                                                        <?php if ($jawaban_siswa->jawaban == NULL) : ?>
                                                            <div class="mt-2">Jawaban Kamu :<span class="badge badge-warning ml-2">tidak dijawab</span></div>
                                                            <div class="mt-2 text-success">Jawaban Benar : <?= $soal->jawaban; ?></div>
                                                        <?php else : ?>
                                                            <div class="mt-2">Jawaban Kamu : <?= $jawaban_siswa->jawaban; ?> <span class="badge badge-danger ml-2">salah</span></div>
                                                            <div class="mt-2 text-success">Jawaban Benar : <?= $soal->jawaban; ?></div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white" style="font-weight: bold;">
                                            <span class="text-success">BENAR : <?= count($jawaban_benar); ?></span> | <span class="text-danger">SALAH : <?= count($jawaban_salah); ?></span> | <span class="text-warning">TIDAK DIJAWAB : <?= count($tidak_dijawab); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div id="toggleAccordion" class="mt-3">
                                <div class="card">
                                    <div class="card-header" id="...">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="false" aria-controls="defaultAccordionOne">
                                                Soal
                                            </div>
                                        </section>
                                    </div>
                                    <form action="<?= base_url('siswa/kirim_ujian'); ?>" method="POST">
                                        <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                            <div class="card-body" style="position: relative;">
                                                <div id="waktu_habis" style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; background: rgba(255, 255, 255, 0.9); z-index: 1;">
                                                    <h3 class="text-danger">Waktu Habis</h3>
                                                </div>
                                                <input type="hidden" name="ujian" value="<?= $ujian->kode_ujian; ?>">
                                                <input type="hidden" name="siswa" value="<?= $this->session->userdata('id'); ?>">
                                                <div style="margin-top: -20px;">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($detail_ujian as $soal) : ?>
                                                        <p class="mt-3">
                                                            <span class="float-left"><?= $no++; ?>. </span> <?= $soal->nama_soal; ?>
                                                        </p>
                                                        <ul style="list-style: none; margin-left: -20px;">
                                                            <li><input type="radio" name="<?= $soal->id_detail_ujian; ?>" value="<?= substr($soal->pg_1, 0, 1); ?>"> <?= $soal->pg_1; ?></li>
                                                            <li><input type="radio" name="<?= $soal->id_detail_ujian; ?>" value="<?= substr($soal->pg_2, 0, 1); ?>"> <?= $soal->pg_2; ?></li>
                                                            <li><input type="radio" name="<?= $soal->id_detail_ujian; ?>" value="<?= substr($soal->pg_3, 0, 1); ?>"> <?= $soal->pg_3; ?></li>
                                                            <li><input type="radio" name="<?= $soal->id_detail_ujian; ?>" value="<?= substr($soal->pg_4, 0, 1); ?>"> <?= $soal->pg_4; ?></li>
                                                        </ul>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                Jumlah Soal : <span class="text-primary"><?= count($detail_ujian); ?></span> Soal
                                                <button type="submit" class="btn btn-primary float-right mb-2">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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