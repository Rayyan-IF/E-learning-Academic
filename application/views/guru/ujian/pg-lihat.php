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
                                <th>Waktu Mulai</th>
                                <th>: <?= $ujian->waktu_mulai; ?></th>
                            </tr>
                            <tr>
                                <th>Waktu Selesai</th>
                                <th>: <?= $ujian->waktu_berakhir; ?></th>
                            </tr>
                        </table>
                        <div id="toggleAccordion" class="mt-3">
                            <div class="card">
                                <div class="card-header" id="...">
                                    <section class="mb-0 mt-0">
                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="true" aria-controls="defaultAccordionOne">
                                            Lihat Soal <div class="icons"><svg> ... </svg></div>
                                        </div>
                                    </section>
                                </div>
                                <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                    <div class="card-body" style="height: 250px; overflow-y: scroll;">
                                        <div style="margin-top: -20px;">
                                            <?php
                                            $no = 1;
                                            foreach ($detail_ujian as $soal) : ?>
                                                <span class="float-left"><?= $no++; ?>. </span> <?= $soal->nama_soal; ?>
                                                <ul style="list-style: none; margin-left: -25px;">
                                                    <li><?= $soal->pg_1; ?></li>
                                                    <li><?= $soal->pg_2; ?></li>
                                                    <li><?= $soal->pg_3; ?></li>
                                                    <li><?= $soal->pg_4; ?></li>
                                                </ul>
                                                <div class="mt-2 text-success">Jawaban : <?= $soal->jawaban; ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        Jumlah Soal : <span class="text-primary"><?= count($detail_ujian); ?></span> Soal
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (strtotime(date('Y-m-d H:i', time())) > strtotime($ujian->waktu_berakhir)) : ?>
                            <ul class="list-group list-group-media mt-2">
                                <li class="list-group-item">Sudah Mengerjakan</li>
                                <?php foreach ($siswa as $s) : ?>
                                    <?php $belum_terjawab = $this->db->get_where('ujian_siswa', ['ujian' => $ujian->kode_ujian, 'siswa' => $s->id_siswa, 'jawaban' => NULL])->result(); ?>
                                    <?php $benar = $this->db->get_where('ujian_siswa', ['ujian' => $ujian->kode_ujian, 'siswa' => $s->id_siswa, 'benar' => 1])->result(); ?>
                                    <?php $salah = $this->db->get_where('ujian_siswa', ['ujian' => $ujian->kode_ujian, 'siswa' => $s->id_siswa, 'benar' => 0])->result(); ?>
                                    <a href="<?= base_url('guru/pg_siswa/') . encrypt_url($s->id_siswa) . '/' . encrypt_url($ujian->kode_ujian); ?>">
                                        <li class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <div class="mr-3">
                                                    <img alt="avatar" src="<?= base_url('assets/app-assets/user/') . $s->avatar; ?>" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="tx-inverse"><?= $s->nama_siswa; ?></h6>
                                                    <p class="mg-b-0">
                                                        <span class="text-success"> Benar</span> : <?= count($benar); ?> | <span class="text-danger">Salah</span> : <?= count($salah); ?> | <span class="text-warning">Belum Terjawab</span> : <?= count($belum_terjawab); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <div class="alert alert-danger mt-3">Ujian Belum Selesai</div>
                        <?php endif; ?>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="history.back(-1)">Kembali</a>
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