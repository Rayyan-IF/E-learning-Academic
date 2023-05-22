<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row layout-top-spacing">
				<div class="col-lg-12 layout-spacing">
					<div class="widget shadow p-3">
						<div class="widget-heading">
							<h5 class="">Form Absensi</h5>
							<div class="row mt-2">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">Pertemuan</label>
										<div class="input-group">
											<input type="text" name="pertemuan" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">Mapel</label>
										<input type="hidden" name="id_absensi" id="id_absensi" class="form-control" required>
										<select name="mapel" id="mapel" class="form-control" >
											<?php if ($relasi_guru) : ?>
												<?php foreach ($relasi_guru as $rg) : ?>
													<?php foreach ($mapel as $mpl) : ?>
														<?php if ($rg->mapel == $mpl->id_mapel) : ?>
															<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
														<?php endif;?>
													<?php endforeach; ?>
												<?php endforeach; ?>
											<?php endif;?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">Kelas</label>
										<select name="kelas" id="kelas" class="form-control">
											<option value="">pilih</option>
												<?php if ($relasi_guru) : ?>
													<?php foreach ($relasi_guru as $rg) : ?>
														<?php foreach ($kelas as $kel) : ?>
															<?php if ($rg->kelas == $kel->id_kelas) : ?>
																<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
															<?php endif;?>
														<?php endforeach; ?>
													<?php endforeach; ?>
												<?php endif;?>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Hari</label>
										<select class="form-control" name="hari" id="hari[]">
											<option value="Senin">pilih</option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Waktu/Tanggal</label>
										<div class="input-group">
											<input type="date" name="tanggal" class="form-control" required>
											<input type="time" name="waktu" class="form-control" required>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row layout-top-spacing">
				<div class="col-lg-12 layout-spacing">
					<div class="widget shadow p-3">
						<div class="widget-heading">
							<h5 class="">Data Siswa</h5>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-striped text-center">
								<tr class="label-success">
									<th rowspan="2" class="text-center">#</th>
									<th rowspan="2" class="text-center">NIS</th>
									<th rowspan="2" class="text-center">Siswa</th>
									<th colspan="18" class="text-center">Keterangan Hadir</th>
								</tr>
								<tbody>
								<?php $no = 1;
								$siswa = $this->db->get('siswa')->result();
								foreach ($detail_siswa as $ds) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td class="text-center">
											<?php foreach ($siswa as $s) :?>
												<?php if ($s->id_siswa == $ds->id_siswa)
												echo $s->no_induk_siswa;
											?>
											<?php endforeach;?>

											<input type="hidden" name="id_siswa[]" class="form-control" value="<?= $ds->id_siswa; ?>" required>
										</td>
										<td>
											<?php foreach ($siswa as $s) :?>
											<?php if ($s->id_siswa == $ds->id_siswa)
												echo $s->nama_siswa;
											?>
											<?php endforeach;?>
										</td>
										<td>
											<select name="p1[]" id="p1">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
									</tr>
								<?php endforeach;  ?>
								</tbody>
							</table>
							<br>
							<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i>  Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
