<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="widget-heading">
                                <h5 class="">Ujian / Quiz</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-table" class="table text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Mapel</th>
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ujian as $u) : ?>
                                            <tr>
                                                <td><?= $u->nama_ujian; ?></td>
                                                <td>
                                                    <?php foreach ($mapel as $mpl) : ?>
                                                        <?php if ($mpl->id_mapel == $u->mapel) {
                                                            echo $mpl->nama_mapel;
                                                        } ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($kelas as $kel) : ?>
                                                        <?php if ($kel->id_kelas == $u->kelas) {
                                                            echo $kel->nama_kelas;
                                                        } ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php if ($u->jenis_ujian == 1) : ?>
                                                        <a href="<?= base_url('siswa/lihat_essay/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>" class="btn btn-primary">Kerjakan</a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('siswa/lihat_pg/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>" class="btn btn-primary">Kerjakan</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <img src="<?= base_url('assets/app-assets/img/'); ?>ujian.svg" class="align-middle" style="vertical-align: middle;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div style="position: absolute; right: 10px; bottom: -10px; width: 400px;">
        <img src="<?= base_url('assets/app-assets/img/'); ?>kelas.svg" alt="">
    </div> -->
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
    <?php if (!empty($this->input->get('pesan'))) : ?>
        swal({
            title: 'Berhasil!',
            text: 'Ujian telah dikerjakan',
            type: 'success',
            padding: '2em'
        });
    <?php endif; ?>
</script>