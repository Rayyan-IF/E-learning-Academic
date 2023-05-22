<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <a href="javascript:void(0);" class="btn btn-primary tambah-essay" style="position: fixed; right: -10px; top: 50%; z-index: 9999;">Tambah Soal</a>
    <div class="layout-px-spacing">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3">
                        <div class="widget-heading">
                            <h5 class="">Ujian Essay</h5>
                            <!-- <a href="javascript:void(0);" class="btn btn-primary my-2" data-toggle="modal" data-target="#excel_ujian">Import Excel</a> -->
                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nama Ujian / Quiz</label>
                                        <input type="text" name="nama_ujian" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select class="form-control" name="kelas" id="mapel_materi" required>
                                            <option value="">Pilih</option>
                                            <?php foreach ($relasi_guru as $rg) : ?>
                                                <?php foreach ($kelas as $kel) : ?>
                                                    <?php if ($rg->kelas == $kel->id_kelas) : ?>
                                                        <option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Mapel</label>
                                        <select class="form-control" name="mapel" id="mapel_materi" required>
                                            <option value="">Pilih</option>
                                            <?php foreach ($relasi_guru as $rg) : ?>
                                                <?php foreach ($mapel as $mpl) : ?>
                                                    <?php if ($rg->mapel == $mpl->id_mapel) : ?>
                                                        <option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Waktu Mulai</label>
                                        <div class="input-group">
                                            <input type="date" name="tgl_mulai" class="form-control" required>
                                            <input type="time" name="jam_mulai" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Waktu Berakhir</label>
                                        <div class="input-group">
                                            <input type="date" name="tgl_berakhir" class="form-control" required>
                                            <input type="time" name="jam_berakhir" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 layout-spacing">
                    <div class="widget shadow p-3">
                        <div class="widget-heading">
                            <h5 class="">Soal Ujian</h5>
                        </div>
                        <div id="soal_essay">
                            <div class="isi_soal">
                                <div class="form-group">
                                    <label for="">Soal No. 1</label><br>
                                    <textarea class="summernote" name="soal[]" cols="30" rows="5" wrap="hard"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary d-flex ml-auto">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<!-- Modal Tambah -->
<div class="modal fade" id="excel_ujian" tabindex="-1" role="dialog" aria-labelledby="excel_ujianLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('guru/excel_pg'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excel_ujianLabel">Import Soal via Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nama Ujian / Quiz</label>
                                <input type="text" name="e_nama_ujian" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select class="form-control" name="e_kelas" id="mapel_materi" required>
                                    <option value="">Pilih</option>
                                    <?php foreach ($relasi_guru as $rg) : ?>
                                        <?php foreach ($kelas as $kel) : ?>
                                            <?php if ($rg->kelas == $kel->id_kelas) : ?>
                                                <option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Mapel</label>
                                <select class="form-control" name="e_mapel" id="mapel_materi" required>
                                    <option value="">Pilih</option>
                                    <?php foreach ($relasi_guru as $rg) : ?>
                                        <?php foreach ($mapel as $mpl) : ?>
                                            <?php if ($rg->mapel == $mpl->id_mapel) : ?>
                                                <option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Waktu Mulai</label>
                                <div class="input-group">
                                    <input type="date" name="e_tgl_mulai" class="form-control" required>
                                    <input type="time" name="e_jam_mulai" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Waktu Berakhir</label>
                                <div class="input-group">
                                    <input type="date" name="e_tgl_berakhir" class="form-control" required>
                                    <input type="time" name="e_jam_berakhir" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">File Excel</label><br>
                                <input type="file" name="excel">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Template</label><br>
                            <a href="<?= base_url('download/excel_pg'); ?>" class="btn btn-success">Download Template</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    <?= $this->session->flashdata('pesan'); ?>
</script>