<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<form action="<?= base_url(). 'guru/absensi_edit'; ?>" method="POST" enctype="multipart/form-data">
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
										<select name="id_mapel" id="id_mapel" class="form-control" readonly="">
											<?php foreach ($detail_absensi as $ab) : ?>
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
										<label for="">Guru</label>
										<select name="guru" id="guru" class="form-control" readonly="">
											<?php foreach ($detail_absensi as $ab) : ?>
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
										<label for="">Kelas</label>
										<select name="id_kelas" id="id_kelas" class="form-control" readonly="">
											<?php foreach ($detail_absensi as $ab) : ?>
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
										<label for="">Hari</label>
										<select class="form-control" name="hari" id="hari" readonly="">
											<?php foreach ($detail_absensi as $ab) : ?>
												<option value="<?= $ab->hari; ?>"><?= $ab->hari; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Waktu/Tanggal</label>
										<div class="input-group">
											<?php foreach ($detail_absensi as $ab) : ?>
											<?php endforeach; ?>
											<input type="date" name="waktu" class="form-control" value="<?= $ab->waktu; ?>" required readonly>
											<input type="time" name="jam" class="form-control"  value="<?= $ab->jam; ?>" required readonly>
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
								<?php $no = 1;
								$siswa = $this->db->get('siswa')->result();
								foreach ($detail_absensi as $ds) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td class="text-center">
											<?php foreach ($siswa as $s) :?>
												<?php if ($s->id_siswa == $ds->id_siswa)
													echo $s->no_induk_siswa;
//													edit_data($s->id_siswa);
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


												<? print_r($p_detail,0) ?>

<!--												<option value="0" >A</option>-->
<!--												<option value="1" >I</option>>I</option>-->
<!--												<option value="2" >H</option>>H</option>-->
											</select>
										</td>
										<td>
											<select name="p2[]" id="p2">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p3[]" id="p3">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p4[]" id="p4">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p5[]" id="p5">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p6[]" id="p6">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p7[]" id="p7">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p8[]" id="p8">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p9[]" id="p9">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p10[]" id="p10">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p11[]" id="p11">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p12[]" id="p12">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p13[]" id="p13">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p14[]" id="p14">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p15[]" id="p15">
												<option value="0" >A</option>
												<option value="1" >I</option>>I</option>
												<option value="2" >H</option>>H</option>
											</select>
										</td>
										<td>
											<select name="p16[]" id="p16">
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
