<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-lg-12 layout-spacing">
				<div class="widget shadow p-3">
					<div class="row">
						<div class="col">
							<div class="widget-heading">
								<h5 class="">Data Absensi</h5>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<th>No</th>
											<th>Kelas</th>
											<th>Jumlah Siswa</th>
											<th>Absensi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$kelas = $this->db->get('kelas')->result();
										$no = 1 ?>

										<?php if ($relasi_guru) : ?>
											<?php foreach ($relasi_guru as $rg) : ?>
												<?php foreach ($kelas as $kel) : ?>
													<?php if ($rg->kelas == $kel->id_kelas) : ?>
														<?php $jml = $this->db->get_where('siswa', ['kelas' => $kel->id_kelas])->result(); ?>
														<tr>
															<td><?= $no++; ?></td>
															<td><?= $kel->nama_kelas; ?></td>
															<td><?= count($jml); ?></td>
															<td class="text-center">
																<a href="<?= base_url('guru/absensidetail/') . encrypt_url($kel->id_kelas); ?>" class="btn btn-success btn-sm btn-flat fa fa-check-square"> Absensi</a>
															</td>
														</tr>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Edit -->
	<div class="modal fade" id="edit_absensi" tabindex="-1" role="dialog" aria-labelledby="edit_absensiLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<form action="<?= base_url('guru/edit_absensi'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="edit_absensiLabel">Ubah Tambah Absensi Siswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							x
						</button>
					</div>
					<div class="modal-body">
						<div class="row layout-top-spacing">
							<div class="col-lg-12 layout-spacing">
								<div class="widget shadow p-3">
									<div class="widget-heading">
										<h5 class="">Form Absensi</h5>
										<div class="row mt-2">
											<div class="col-lg-4">
												<div class="form-group">
													<label for="">Mapel</label>
													<input type="hidden" name="id_absensi" id="id_absensi" class="form-control" required>
													<select name="mapel" id="mapel" class="form-control" readonly="">
														<option value="">pilih</option>
														<?php foreach ($absensi as $ab) : ?>
															<?php foreach ($mapel as $mpl) : ?>
																<?php if ($ab->id_mapel == $mpl->id_mapel) : ?>
																	<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="">Kelas</label>
													<select name="kelas" id="kelas" class="form-control" readonly="">
														<option value="">pilih</option>
														<?php foreach ($absensi as $ab) : ?>
															<?php foreach ($kelas as $kel) : ?>
																<?php if ($ab->id_kelas == $kel->id_kelas) : ?>
																	<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="">Guru</label>
													<select name="guru" id="guru" class="form-control" readonly="">
														<option value="">pilih</option>
														<?php foreach ($absensi as $ab) : ?>
															<?php foreach ($guru as $g) : ?>
																<?php if ($ab->id_guru == $g->id_guru) : ?>
																	<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="">Hari</label>
													<select class="form-control" name="hari" id="hari" readonly="">
														<?php foreach ($absensi as $ab) : ?>
															<option value="<?= $ab->hari; ?>"><?= $ab->hari; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">Waktu/Tanggal</label>
													<div class="input-group">
														<?php foreach ($absensi as $ab) : ?>
															<input type="date" name="tanggal" class="form-control" value="<?= $ab->waktu; ?>" required readonly>
															<input type="time" name="waktu" class="form-control" value="<?= $ab->waktu; ?>" required readonly>
														<?php endforeach; ?>
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
												<th colspan="18" class="text-center">Pertemuan</th>
											</tr>
											<tr class="label-success">
												<td class="text-center">1</td>
												<td class="text-center">2</td>
												<td class="text-center">3</td>
												<td class="text-center">4</td>
												<td class="text-center">5</td>
												<td class="text-center">6</td>
												<td class="text-center">7</td>
												<td class="text-center">8</td>
												<td class="text-center">9</td>
												<td class="text-center">10</td>
												<td class="text-center">11</td>
												<td class="text-center">12</td>
												<td class="text-center">13</td>
												<td class="text-center">14</td>
												<td class="text-center">15</td>
												<td class="text-center">16</td>
											</tr>
											<tbody>
												<?php $absensii = $this->db->get('absensi')->result(); ?>
												<?php $siswa = $this->db->get('siswa')->result(); ?>

												<tr>
													<td></td>
													<td class="text-center">
														<?php foreach ($detail_absensi as $ab) : ?>
															<?php foreach ($siswa as $s) : ?>
																<?php if ($ab->id_siswa == $s->id_siswa)
																	echo $s->no_induk_siswa;
																?>
															<?php endforeach; ?>
														<?php endforeach; ?>
														<input type="text" name="id_siswa" class="form-control" required>
													</td>
													<td>
													</td>
													<td>
														<select name="p1" id="p1">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p2" id="p2">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p3" id="p3">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p4" id="p4">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p5" id="p5">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p6" id="p6">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p7" id="p7">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p8" id="p8">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p9" id="p9">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p10" id="p10">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p11" id="p11">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p12" id="p12">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p13" id="p13">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p14" id="p14">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p15" id="p15">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
													<td>
														<select name="p16" id="p16">
															<option value="0">A</option>
															<option value="1">I</option>>I</option>
															<option value="2">H</option>>H</option>
														</select>
													</td>
												</tr>
											</tbody>
										</table>
										<br>
									</div>
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
</script>