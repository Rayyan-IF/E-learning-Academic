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
                                <a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah_ujian">Tambah</a>
                                <!-- <a href="javascript:void(0)" class="btn btn-primary mt-3 ml-2" data-toggle="modal" data-target="#import_materi">Import Exel</a> -->
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
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle btn btn-primary" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                                <line x1="3" y1="18" x2="21" y2="18"></line>
                                                            </svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                            <?php if ($u->jenis_ujian == 1) : ?>
                                                                <a class="dropdown-item" href="<?= base_url('guru/lihat_essay/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>">Lihat</a>
                                                            <?php else : ?>
                                                                <a class="dropdown-item" href="<?= base_url('guru/lihat_ujian/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>">Lihat</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item btn-hapus" href="<?= base_url('guru/hapus_ujian/') . encrypt_url($u->id_ujian) . '/' . encrypt_url($this->session->userdata('id')); ?>">Delete</a>
                                                        </div>
                                                    </div>
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

<!-- MODAL -->

<div class="modal fade" id="tambah_ujian" tabindex="-1" role="dialog" aria-labelledby="tambah_ujianLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_ujianLabel">Tambah Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body text-center">
                    <a href="<?= base_url('guru/tambah_pg'); ?>" class="btn btn-primary">Pilihan Ganda</a>
                    <a href="<?= base_url('guru/tambah_essay'); ?>" class="btn btn-primary ml-2">Essay</a>
                </div>
                <div class="modal-footer">
                    <button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END MODAL -->
<script>
    <?= $this->session->flashdata('pesan'); ?>
    <?php
    if (!empty($_GET['pesan'])) : ?>
        swal({
            title: 'Berhasil!',
            text: 'Ujian telah dibuat',
            type: 'success',
            padding: '2em'
        });
    <?php endif; ?>
</script>