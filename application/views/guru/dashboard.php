<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">

		<div class="row layout-top-spacing">
			<div class="col-lg-6">
				<div class="infobox-3 bg-white" style="width: 100%;">
					<div class="info-icon">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
							<path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
							<polygon points="12 15 17 21 7 21 12 15"></polygon>
						</svg>
					</div>
					<h5 class="info-heading">Nama Guru : <?= $guru->nama_guru; ?></h5>
					<p class="info-text">data ini diatur oleh administrator., jika ada perubahan bisa hubungi admin</p>
					<div class="row">
						<div class="col-lg-6">
							<ul class="list-group">
								<li class="list-group-item bg-primary light text-center">Kelas Mengajar</li>
								<?php if ($relasi_guru) : ?>
									<?php foreach ($relasi_guru as $rg) : ?>
										<?php foreach ($kelas as $kel) : ?>
											<?php if ($rg->kelas == $kel->id_kelas) : ?>
												<li class="list-group-item"><?= $kel->nama_kelas; ?></li>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endforeach; ?>
								<?php else : ?>
									<li class="list-group-item">Tidak Ada</li>
								<?php endif; ?>
							</ul>
						</div>
						<div class="col-lg-6">
							<ul class="list-group">
								<li class="list-group-item bg-primary light text-center">Mata Pelajaran</li>
								<?php if ($relasi_guru) : ?>
									<?php foreach ($relasi_guru as $rg) : ?>
										<?php foreach ($mapel as $mpl) : ?>
											<?php if ($rg->mapel == $mpl->id_mapel) : ?>
												<li class="list-group-item"><?= $mpl->nama_mapel; ?></li>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endforeach; ?>
								<?php else : ?>
									<li class="list-group-item">Tidak Ada</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row layout-top-spacing">
			<?php if ($relasi_guru) : ?>
				<?php foreach ($relasi_guru as $rg) : ?>
					<?php foreach ($kelas as $kel) : ?>
						<?php foreach ($mapel as $mpl) : ?>
							<?php if ($rg->kelas == $kel->id_kelas and $rg->mapel == $mpl->id_mapel) : ?>
								<div class="col-lg-4 layout-spacing">
									<div class="widget widget-five infobox-3" style="width: 100%; padding: 10px;">
										<div class="info-icon">
											<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
												<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
												<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
											</svg>
										</div>
										<h5 class="info-heading mt-4 text-center">Siswa <br><?= $kel->nama_kelas; ?></h5>
										<h5 class="info-heading mt-4 text-center"><?= $mpl->nama_mapel; ?></h5>
										<div class="widget-content">
											<div class="w-content" style="padding: 0;">
												<div class="">
													<?php $jumlahsiswa_perkelas = $this->db->get_where('siswa', ['kelas' => $kel->id_kelas])->result(); ?>
													<p class="task-left"><?= count($jumlahsiswa_perkelas); ?></p>
													<p class="task-completed"><span><?= count($jumlahsiswa_perkelas); ?> Siswa</span> Aktif</p>
													<a class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah_pilihan">Tambah Materi/Tugas/Ujian</a>


												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<h2>Anda belum menambahkan kelas</h2>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- MODAL -->

<div class="modal fade" id="tambah_pilihan" tabindex="-1" role="dialog" aria-labelledby="tambah_pilihanLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah_pilihanLabel">Tambah Tugas/Ujian/Materi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						x
					</button>
				</div>
				<div class="modal-body text-center">
					<a href="<?= base_url('guru/materi'); ?>" class="btn btn-primary">Materi</a>
					<a href="<?= base_url('guru/tugas'); ?>" class="btn btn-primary">Tugas</a>
					<a href="<?= base_url('guru/ujian'); ?>" class="btn btn-primary ml-2">Ujian/Quiz</a>
				</div>
				<div class="modal-footer">
					<button type="reset" value="reset" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->

<div class="footer-wrapper">
	<div class="footer-section f-section-1">
		<p class="">Copyright © 2022 <a target="_blank" href="">Pejuang Rupiah Team</a>, All rights reserved. <a href="https://freepik.com" target="_blank" class="text-primary"></a></p>
	</div>
	<div class="footer-section f-section-2">
		<p class="">E-Learning</p>
	</div>
</div>

<!--  END CONTENT AREA  -->
<script>
	<?= $this->session->flashdata('pesan'); ?>
</script>