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
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$jadwal = $this->db->get('jadwal')->result();
										$kelas = $this->db->get('kelas')->result(); ?>
										<?php $no = 1;
										foreach ($kelas as $kel) : ?>
											<?php $jml = $this->db->get_where('jadwal', ['id_kelas' => $kel->id_kelas])->result(); ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $kel->nama_kelas; ?></td>
												<td class="text-center">
													<a href="<?= base_url('app/jadwaldetail/') . encrypt_url($kel->id_kelas); ?>" class="btn btn-success btn-sm btn-flat fa fa-calendar"> Jadwal Pelajaran</a>
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