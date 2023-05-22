<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-lg-12 layout-spacing">
				<div class="widget shadow p-3">
					<div class="row">
						<div class="col">
							<div class="widget-heading">
								<h5 class="">Jadwal Pelajaran</h5>
								<a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah_jadwal">Tambah Jadwal</a>
							</div>
							<div class="table-responsive">
								<table id="datatable-table" class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<th>No</th>
											<th>Mata Pelajaran</th>
											<th>Kelas</th>
											<th>Guru</th>
											<th>Hari</th>
											<th>Waktu</th>
											<th>Ruangan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										$jadwal = $this->db->get('jadwal')->result();
										foreach ($detail_jadwal as $dj) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?php foreach ($mapel as $mpl) : ?>
														<?php if ($mpl->id_mapel == $dj->id_mapel) {
															echo $mpl->nama_mapel;
														} ?>
													<?php endforeach; ?></td>
												<td>
													<?php foreach ($kelas as $kel) : ?>
														<?php if ($kel->id_kelas == $dj->id_kelas) {
															echo $kel->nama_kelas;
														} ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($guru as $g) : ?>
														<?php if ($g->id_guru == $dj->id_guru) {
															echo $g->nama_guru;
														} ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?= $dj->hari; ?>
												</td>
												<td><?= $dj->waktu; ?></td>
												<td><?php foreach ($ruangan as $rng) : ?>
														<?php if ($rng->id_ruangan == $dj->id_ruangan) {
															echo $rng->ruangan;
														} ?>
													<?php endforeach; ?></td>
												<td>
													<a href="javascript:void(0);" data-jadwal="<?= encrypt_url($dj->id_jadwal); ?>" data-toggle="modal" data-target="#edit_jadwal" class="btn btn-primary btn_edit_jadwal">Edit
														<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
															<circle cx="12" cy="12" r="3"></circle>
															<path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
														</svg>
													</a>
													<a class="btn btn-danger btn-hapus" href="<?= base_url('app/hapus_jadwal/') . encrypt_url($dj->id_jadwal); ?>">Delete
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
<div class="modal fade" id="tambah_jadwal" tabindex="-1" role="dialog" aria-labelledby="tambah_jadwalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah_jadwalLabel">Tambah Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_jadwal" class="form-control" required>
					<div class="row">
						<div class="col">
							<?php $jadwal = $this->db->get('jadwal')->result(); ?>
							<div class="form-group">
								<label for="">Nama Mapel</label>
								<select class="form-control" name="mapel[]">
									<option value="">Pilih</option>
									<?php foreach ($mapel as $mpl) : ?>
										<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Kelas</label>
								<select class="form-control" name="kelas[]">
									<option value="">Pilih</option>
									<?php foreach ($kelas as $kel) : ?>
										<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Guru</label>
								<select class="form-control" name="guru[]">
									<option value="">Pilih</option>
									<?php foreach ($guru as $g) : ?>
										<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Ruangan</label>
								<select class="form-control" name="ruangan[]">
									<option value="">Pilih</option>
									<?php foreach ($ruangan as $rng) : ?>
										<option value="<?= $rng->id_ruangan; ?>"><?= $rng->ruangan; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Hari</label>
								<select class="form-control" name="hari[]">
									<option value="">Pilih</option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Waktu</label>
								<input type="text" name="waktu[]" class="form-control" required>
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
<!-- Modal Edit -->
<div class="modal fade" id="edit_jadwal" tabindex="-1" role="dialog" aria-labelledby="edit_jadwalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="<?= base_url('app/edit_jadwal'); ?>" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edit_jadwalLabel">Edit Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Mapel</label>
								<input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" required>
								<select name="mapel" id="mapel" class="form-control">
									<?php foreach ($mapel as $mpl) : ?>
										<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Kelas</label>
								<select name="kelas" id="kelas" class="form-control">
									<option value="">pilih</option>
									<?php foreach ($kelas as $kel) : ?>
										<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Guru</label>
								<select name="guru" id="guru" class="form-control">
									<option value="">pilih</option>
									<?php foreach ($guru as $g) : ?>
										<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Ruangan</label>
								<select name="ruangan" id="ruangan" class="form-control">
									<option value="">pilih</option>
									<?php foreach ($ruangan as $rng) : ?>
										<option value="<?= $rng->id_ruangan; ?>"><?= $rng->ruangan; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Hari</label>
								<select class="form-control" name="hari" id="hari">
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Waktu</label>
								<input class="form-control" name="waktu" id="waktu" cols="30" rows="5" wrap="hard"></input>
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
</script>