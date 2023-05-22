<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-lg-12 layout-spacing">
				<div class="widget shadow p-3">
					<div class="row">
						<div class="col">
							<div class="widget-heading">
								<h5 class="">Ruangan</h5>
								<a href="javascript:void(0)" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah_ruangan">Tambah Ruangan</a>
							</div>
							<div class="table-responsive">
								<table id="datatable-table" class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<th>No</th>
											<th>Ruangan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($ruangan as $rng) : ?>

											<tr>
												<td><?= $no++; ?></td>
												<td><?= $rng->ruangan; ?></td>
												<td>
													<a href="javascript:void(0)" data-toggle="modal" data-target="#edit_ruangan" data-ruangan="<?= encrypt_url($rng->id_ruangan);  ?>" class="btn btn-primary edit_ruangan">
														<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
															<circle cx="12" cy="12" r="3"></circle>
															<path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
														</svg>
													</a>
													<a href="<?= base_url('app/hapus_ruangan/') . encrypt_url($rng->id_ruangan); ?>" class="btn btn-danger btn-hapus">
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
<div class="modal fade" id="tambah_ruangan" tabindex="-1" role="dialog" aria-labelledby="tambah_ruanganLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah_ruanganLabel">Tambah Ruangan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<a href="javascript:void(0)" class="btn btn-success mb-3 tambah-baris-ruangan">tambah baris</a>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Ruangan</th>
								<th>opsi</th>
							</tr>
						</thead>
						<tbody id="tbody-ruangan">
							<tr>
								<td><input type="text" name="ruangan[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
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
<div class="modal fade" id="edit_ruangan" tabindex="-1" role="dialog" aria-labelledby="edit_ruanganLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('app/edit_ruangan'); ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edit_ruanganLabel">Edit Ruangan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Ruangan</label>
						<input type="hidden" name="id_ruangan" id="id_ruangan" class="form-control">
						<input type="text" name="ruangan" id="ruangan" class="form-control">
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
<!-- END MODAL -->

<script>
	<?= $this->session->flashdata('pesan'); ?>
</script>