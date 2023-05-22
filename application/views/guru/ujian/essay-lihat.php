<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-4 col-md-4 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading">
                        <h5 class=""><?= $ujian->nama_ujian; ?></h5>
                        <table class="mt-2">
                            <tr>
                                <th>Jumlah Soal</th>
                                <th>: <?= count($essay_detail); ?> Soal</th>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading">
                        <h5 class="">SOAL</h5>
                    </div>
                    <div id="circle-basic">
                        <?php
                        $no = 1;
                        foreach ($essay_detail as $ed) : ?>
                            <h3>No</h3>
                            <section style="border: 1px solid #eaeaea; border-left: 5px solid #304aca;">
                                <h5 style="margin-top: -25px;">No. <?= $no++; ?> - <?= count($essay_detail); ?></h5>
                                <p class="mt-2"><?= $ed->soal; ?></p>
                            </section>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="widget-heading">
                        <h5 class="">Jawaban Siswa</h5>
                    </div>
                    <?php if (strtotime(date('Y-m-d H:i', time())) > strtotime($ujian->waktu_berakhir)) : ?>
                        <ul class="list-group list-group-media mt-2">
                            <li class="list-group-item">Sudah Mengerjakan</li>
                            <?php foreach ($siswa as $s) : ?>
                                <?php

                                $this->db->select_sum('score');
                                $this->db->where('ujian', $ujian->kode_ujian);
                                $this->db->where('siswa', $s->id_siswa);
                                $total_score = $this->db->get('essay_siswa')->row();

                                ?>
                                <?php $belum_terjawab = $this->db->get_where('essay_siswa', ['ujian' => $ujian->kode_ujian, 'siswa' => $s->id_siswa, 'jawaban' => NULL])->result(); ?>
                                <a href="<?= base_url('guru/essay_siswa/') . encrypt_url($s->id_siswa) . '/' . encrypt_url($ujian->kode_ujian); ?>">
                                    <li class="list-group-item list-group-item-action">
                                        <div class="media">
                                            <div class="mr-3">
                                                <img alt="avatar" src="<?= base_url('assets/app-assets/user/') . $s->avatar; ?>" class="img-fluid rounded-circle">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="tx-inverse"><?= $s->nama_siswa; ?></h6>
                                                <p class="mg-b-0">
                                                    <span class="text-success"> Score</span> : <?= $total_score->score; ?> | <span class="text-warning">Belum Terjawab</span> : <?= count($belum_terjawab); ?>
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