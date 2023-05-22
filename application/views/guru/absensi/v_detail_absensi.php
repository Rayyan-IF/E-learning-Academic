<script>
	function printContent(el){
		window.alert('Silahkan Klik untuk melanjutkan proses print absensi siswa');
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById('print_absensi').innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>


<div id="content" class="main-content">
	<div class="layout-px-spacing" >
		<form action="" method="POST" enctype="multipart/form-data" id="print_absensi">
			<div class="row layout-top-spacing">
				<div class="col-lg-12 layout-spacing" >
					<div class="widget shadow p-3">
						<a onclick="printContent();" class="btn btn-warning btn-sm btn-flat fa fa-chart-area">    Report</a>
						<br>
						<div class="widget-heading" >
							<br>
							<h5 class="">Form Absensi</h5>

							<div class="row mt-2">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">Pertemuan</label>
										<div class="input-group">
											<?php foreach ($detail_guru_absensi as $dg) : ?>
											<input type="text" name="pertemuan" class="form-control" value="<?= $dg->pertemuan; ?>" readonly required>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">Mapel</label>
										<input type="hidden" name="id_absensi" id="id_absensi" class="form-control" required>
										<select name="mapel" id="mapel" class="form-control" readonly>
											<?php if ($detail_guru_absensi) : ?>
												<?php foreach ($detail_guru_absensi as $dg) : ?>
													<?php foreach ($mapel as $mpl) : ?>
														<?php if ($dg->id_mapel == $mpl->id_mapel) : ?>
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
										<select name="kelas" id="kelas" class="form-control" readonly="">
											<?php if ($detail_guru_absensi) : ?>
												<?php foreach ($detail_guru_absensi as $dg) : ?>
													<?php foreach ($kelas as $kel) : ?>
														<?php if ($dg->id_kelas == $kel->id_kelas) : ?>
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
										<select class="form-control" name="hari" id="hari[]" readonly="">
											<?php foreach ($detail_guru_absensi as $dg) : ?>
											<option value="<?= $dg->hari ?>"><?= $dg->hari ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Waktu/Tanggal</label>
										<div class="input-group">
											<?php foreach ($detail_guru_absensi as $dg) : ?>
											<input type="date" name="tanggal" class="form-control" value="<?= $dg->waktu; ?>" readonly required>
											<input type="time" name="waktu" class="form-control" value="<?= $dg->jam; ?>" readonly required>
											<?php endforeach;?>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row layout-top-spacing" >
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
											<select name="p1[]" id="p1" readonly="">
												<?php if ($detail_absen) : ?>
													<?php foreach ($detail_absen as $dg) : ?>
														<?php foreach ($ket_absen as $ka) : ?>
															<?php if ($dg->p1 == $ka->id_ket_absen) : ?>
																<?php if ($dg->id_siswa == $ds->id_siswa) : ?>
																<option value="<?= $ka->id_ket_absen; ?>"><?= $ka->ket_absen; ?></option>
																<?php endif;?>
															<?php endif;?>
														<?php endforeach; ?>
													<?php endforeach; ?>
												<?php endif;?>
											</select>
										</td>
									</tr>
								<?php endforeach;  ?>
								</tbody>
							</table>
							<br>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
