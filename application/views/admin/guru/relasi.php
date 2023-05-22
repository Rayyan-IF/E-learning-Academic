<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-lg-12 layout-spacing">
				<div class="widget shadow p-3">
					<div class="row">
						<div class="col">
							<div class="widget-heading">
								<h5 class="">Daftar Pengajaran Kelas dan Mata Pelajaran</h5>
								<a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah-relasi">Tambah Daftar</a>
							</div>
							<div class="table-responsive">
								<table id="datatable-table" class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<th>No</th>
											<th>Guru</th>
											<th>Kelas</th>
											<th>Mapel</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										$relasi_guru = $this->db->get('relasi_guru')->result();
										$mapel = $this->db->get('mapel')->result();
										$guru = $this->db->get('guru')->result();
										$kelas = $this->db->get('kelas')->result();
										foreach ($detail_relasi as $dr) : ?>
											<tr>
												<td><?= $no++; ?></td>
												<td>
													<?php foreach ($guru as $g) : ?>
														<?php if ($g->id_guru == $dr->guru) {
															echo $g->nama_guru;
														} ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($mapel as $mpl) : ?>
														<?php if ($mpl->id_mapel == $dr->mapel) {
															echo $mpl->nama_mapel;
														} ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($kelas as $kls) : ?>
														<?php if ($kls->id_kelas == $dr->kelas) {
															echo $kls->nama_kelas;
														} ?>
													<?php endforeach; ?>
												</td>
												<td>
													<a href="<?= base_url('app/hapus_relasi/') . encrypt_url($dr->id_relasi_guru); ?>" class="btn btn-danger btn-hapus">
														<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
															<circle cx="12" cy="12" r="10"></circle>
															<line x1="15" y1="9" x2="9" y2="15"></line>
															<line x1="9" y1="9" x2="15" y2="15"></line>
														</svg>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
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
			<p class="">Copyright © 2022 <a target="_blank" href="">Pejuang Rupiah Team</a>, All rights reserved. <a href="" target="_blank" class="text-primary"></a></p>
		</div>
		<div class="footer-section f-section-2">
			<p class="">Pejuang Rupiah Team v 1.1</p>
		</div>
	</div>
</div>
<!--  END CONTENT AREA  -->

<!-- MODAL -->
<!-- Modal Tambah -->
<div class="modal fade" id="tambah-relasi" tabindex="-1" role="dialog" aria-labelledby="tambah_relasiLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah_relasiLabel">Tambah Daftar Pengajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<a href="javascript:void(0)" class="btn btn-success mb-3 tambah-baris-relasi">tambah baris</a>
					<table id class="table table-bordered">
						<thead>
							<tr>
								<th>
									Nama Guru
								</th>
								<th>
									Mapel
								</th>
								<th>
									Kelas
								</th>
								<th>opsi</th>
							</tr>
						</thead>
						<tbody id="tbody-relasi">
							<tr>
								<td>
									<select class="form-control" name="guru[]">
										<option value="">Pilih</option>
										<?php foreach ($guru as $g) : ?>
											<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td>
									<select class="form-control" name="mapel[]">
										<option value="">Pilih</option>
										<?php foreach ($mapel as $mpl) : ?>
											<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td><select class="form-control" name="kelas[]">
										<option value="">Pilih</option>
										<?php foreach ($kelas as $kel) : ?>
											<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
										<?php endforeach; ?>
									</select></td>
								<td></td>
							</tr>
						</tbody>
					</table>
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
<div class="modal fade" id="edit-relasi" tabindex="-1" role="dialog" aria-labelledby="edit-relasiLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="<?= base_url('app/edit_relasi'); ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edit-relasiLabel">Edit Relasi Guru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="e_id_relasi_guru" class="form-control" required>
					<table id class="table table-bordered">
						<thead>
							<tr>
								<th>
									Nama Guru
								</th>
								<th>
									Mapel
								</th>
								<th>
									Kelas
								</th>
								<th>opsi</th>
							</tr>
						</thead>
						<tbody id="tbody-relasi">
							<tr>
								<td>


									<select class="form-control" name="e_guru" id="e_guru">
										<option value="">Pilih</option>
										<?php foreach ($relasi_guru as $rg) : ?>
											<?php foreach ($guru as $g) : ?>
												<?php if ($rg->guru == $g->id_guru) : ?>
													<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endforeach; ?>
									</select>
								</td>
								<td>
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
								</td>
								<td>
									<select class="form-control" name="e_kelas" id="e_kelas">
										<option value="">Pilih</option>
										<?php foreach ($relasi_guru as $rg) : ?>
											<?php foreach ($kelas as $kel) : ?>
												<?php if ($rg->kelas == $kel->id_kelas) : ?>
													<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->
<script>
	<?= $this->session->flashdata('pesan'); ?>
</script>