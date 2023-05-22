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
											<th>Mapel</th>
											<th>Guru</th>
											<th>Hari</th>
											<th>Tanggal</th>
											<th>Jam</th>
											<th>Pertemuan</th>
											<th>Opsi </th>
										</tr>
									</thead>
									<tbody>
										<?php

										$detail_siswa_absensi = $this->db->select("*")->from("absensi")->where('id_siswa', $this->session->userdata('id'))
											->group_by("jam")
											->get()
											->result();

										$kelas = $this->db->get('kelas')->result();
										$no = 1; ?>
										<?php foreach ($detail_siswa_absensi as $ab) : ?>
											<tr>
												<td><?= $no++; ?></td>
												<td>
													<?php foreach ($kelas as $kel) : ?>
														<?php if ($ab->id_kelas == $kel->id_kelas) : ?>
															<?= $kel->nama_kelas; ?>
														<?php endif; ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($mapel as $mpl) : ?>
														<?php if ($ab->id_mapel == $mpl->id_mapel) : ?>
															<?= $mpl->nama_mapel; ?>
														<?php endif; ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?php foreach ($guru as $g) : ?>
														<?php if ($ab->id_guru == $g->id_guru) : ?>
															<?= $g->nama_guru; ?>
														<?php endif; ?>
													<?php endforeach; ?>
												</td>
												<td>
													<?= $ab->hari; ?>
												</td>
												<td>
													<?= $ab->waktu; ?>
												</td>
												<td>
													<?= $ab->jam; ?>
												</td>
												<td>
													<?= $ab->pertemuan; ?>
												</td>
												<td>
													<a href="<?= base_url('siswa/absensi/')  .  encrypt_url($ab->pertemuan . ',' . $ab->id_kelas); ?>" class="btn btn-warning btn-sm btn-flat fa fa-check-square">Detail</a>
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
<script>
	<?= $this->session->flashdata('pesan'); ?>
</script>