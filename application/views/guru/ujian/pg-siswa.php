<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading">
                        <h5 class=""><?= $ujian->nama_ujian; ?></h5>
                        <table class="mt-2">
                            <tr>
                                <th>Jumlah Soal</th>
                                <th>: <?= count($detail_ujian); ?> Soal</th>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>: <?= $siswa->nama_siswa; ?></th>
                            </tr>
                        </table>
                        <div id="toggleAccordion" class="mt-3">
                            <div class="card">
                                <div class="card-header" id="...">
                                    <section class="mb-0 mt-0">
                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="false" aria-controls="defaultAccordionOne">
                                            Ujian <?= $siswa->nama_siswa; ?>
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
                                                <?php $jawaban_siswa = $this->db->get_where('ujian_siswa', ['ujian_id' => $soal->id_detail_ujian, 'siswa' => $siswa->id_siswa])->row(); ?>
                                                <p class="mt-3"><?= $no++; ?>. <?= $soal->nama_soal; ?></p>
                                                <ul style="list-style: none; margin-left: -20px;">
                                                    <li><?= $soal->pg_1; ?></li>
                                                    <li><?= $soal->pg_2; ?></li>
                                                    <li><?= $soal->pg_3; ?></li>
                                                    <li><?= $soal->pg_4; ?></li>
                                                </ul>
                                                <?php if ($soal->jawaban == $jawaban_siswa->jawaban) : ?>
                                                    <div class="mt-2">Jawaban Siswa : <?= $jawaban_siswa->jawaban; ?> <span class="badge badge-success ml-2">benar</span></div>
                                                <?php else : ?>
                                                    <?php if ($jawaban_siswa->jawaban == NULL) : ?>
                                                        <div class="mt-2">Jawaban Siswa :<span class="badge badge-warning ml-2">tidak dijawab</span></div>
                                                        <div class="mt-2 text-success">Jawaban Benar : <?= $soal->jawaban; ?></div>
                                                    <?php else : ?>
                                                        <div class="mt-2">Jawaban Siswa : <?= $jawaban_siswa->jawaban; ?> <span class="badge badge-danger ml-2">salah</span></div>
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
                        <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="history.back(-1)">Kembali</a>
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

<!-- MODAL -->
<script>
    <?= $this->session->flashdata('pesan'); ?>
</script>