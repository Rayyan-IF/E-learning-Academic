<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-lg-12 layout-spacing">
				<div class="widget shadow p-3">
					<div class="row">
						<div class="col">
							<div class="widget-heading">
								<h5 class="">Data Kelas</h5>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<th>No</th>
											<th>Kelas</th>
											<th>Jumlah Mata Pelajaran</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$mapel = $this->db->get('mapel')->result();
										$kelas = $this->db->get('kelas')->result(); ?>
										<?php $no = 1;
										foreach ($kelas as $kel) : ?>
											<?php $jml = $this->db->get_where('mapel', ['kelas' => $kel->id_kelas])->result(); ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $kel->nama_kelas; ?></td>
												<td class="text-center">
													<p><?= count($jml) ?></p>
												</td>
												<td class="text-center">
													<a href="<?= base_url('app/mapeldetail/') . encrypt_url($kel->id_kelas); ?>" class="btn btn-warning btn-sm btn-flat fa fa-list"> Mata Pelajaran</a>
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
<div class="modal fade" id="tambah_mapel" tabindex="-1" role="dialog" aria-labelledby="tambah_mapelLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah_mapelLabel">Tambah Mapel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<a href="javascript:void(0)" class="btn btn-success mb-3 tambah-baris-mapel">tambah baris</a>
					<table id class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Mapel</th>
								<th>Tahun Ajaran</th>
								<th>opsi</th>
							</tr>
						</thead>
						<tbody id="tbody-mapel">
							<tr>
								<td><input type="text" name="nama_mapel[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
								<td><input type="text" name="tahun_ajaran[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
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
<div class="modal fade" id="edit_mapel" tabindex="-1" role="dialog" aria-labelledby="edit_mapelLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('app/edit_mapel'); ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edit_mapelLabel">Edit Mapel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Mapel</label>
						<input type="hidden" name="id_mapel" id="id_mapel" class="form-control">
						<input type="text" name="nama_mapel" id="nama_mapel" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Tahun Ajaran</label>
						<input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control">
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