<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="widget shadow p-3">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="widget-heading">
                                <h5 class="">Materi</h5>
                                <a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah_materi">Tambah Materi</a>
                                <!-- <a href="javascript:void(0)" class="btn btn-primary mt-3 ml-2" data-toggle="modal" data-target="#import_materi">Import Exel</a> -->
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-table" class="table text-center text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Mapel</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($materi as $m) : ?>
                                            <tr>
                                                <td><?= $m->nama_materi; ?></td>
                                                <td>
                                                    <?php foreach ($mapel as $mpl) : ?>
                                                        <?php if ($mpl->id_mapel == $m->mapel) {
                                                            echo $mpl->nama_mapel;
                                                        } ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?= $m->tahun_ajaran; ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($kelas as $kel) : ?>
                                                        <?php if ($kel->id_kelas == $m->kelas) {
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
                                                            <a class="dropdown-item" href="<?= base_url('guru/lihat_materi/') . encrypt_url($m->id_materi) . '/' . encrypt_url($this->session->userdata('id')); ?>">Lihat</a>
                                                            <a class="dropdown-item edit_materi" href="javascript:void(0);" data-materi="<?= encrypt_url($m->id_materi); ?>" data-toggle="modal" data-target="#edit_materi">Edit</a>
                                                            <a class="dropdown-item btn-hapus" href="<?= base_url('guru/hapus_materi/') . encrypt_url($m->id_materi) . '/' . encrypt_url($this->session->userdata('id')); ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <img src="<?= base_url('assets/app-assets/img/'); ?>materi.svg" class="align-middle" alt="">
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
<!-- Modal Tambah -->
<div class="modal fade" id="tambah_materi" tabindex="-1" role="dialog" aria-labelledby="tambah_materiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_materiLabel">Tambah materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="kode_materi" value="<?= random_string('alnum', 8); ?>" class="form-control" required>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Materi</label>
                                <input type="text" name="nama_materi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Mapel</label>
                                <select class="form-control" name="mapel" id="mapel_materi">
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
                        <div class="col">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select class="form-control" name="kelas" id="mapel_materi">
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
                    </div>
                    <div class="form-group">
                        <label for="">Text</label>
                        <textarea class="form-control" name="text_materi" id="text_materi" cols="30" rows="5" wrap="hard"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="custom-file-container" data-upload-id="fileMateri">
                                <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file file_materi">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="file_materi[]" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="custom-file-container" data-upload-id="videoMateri">
                                <label>Upload Video <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file file_materi">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="video_materi[]" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
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

<!-- Modal edit -->
<div class="modal fade" id="edit_materi" tabindex="-1" role="dialog" aria-labelledby="edit_materiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('guru/edit_materi'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_materiLabel">Edit materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="e_kode_materi" class="form-control" required>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Materi</label>
                                <input type="text" name="e_nama_materi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun ajaran</label>
                                <input type="text" name="e_tahun_ajaran" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Mapel</label>
                                <select class="form-control" name="e_mapel" id="e_mapel">
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
                        <div class="col">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select class="form-control" name="e_kelas" id="e_mape">
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
                    </div>
                    <div class="form-group">
                        <label for="">Text</label>
                        <textarea class="form-control" name="e_text_materi" id="e_text_materi" cols="30" rows="5" wrap="hard"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="custom-file-container" data-upload-id="e_fileMateri">
                                <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file file_materi">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="e_file_materi[]" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="custom-file-container" data-upload-id="e_videoMateri">
                                <label>Upload Video <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file file_materi">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="e_video_materi[]" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
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
    <?php
    if (!empty($_GET['pesan'])) : ?>
        swal({
            title: 'Berhasil!',
            text: 'Materi telah dibuat',
            type: 'success',
            padding: '2em'
        });
    <?php endif; ?>
</script>