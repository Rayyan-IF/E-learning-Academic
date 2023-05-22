</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/apex/apexcharts.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>assets/js/dashboard/dash_1.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/table/datatable/datatables.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/select2/select2.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/select2/custom-select2.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>assets/js/scrollspyNav.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/jquery-step/jquery.steps.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/jquery-step/custom-jquery.steps.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="<?= base_url('assets/app-assets/template/cbt-malela/'); ?>plugins/summernote/summernote-ext-resized-data-image.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script>


	$(document).ready(function() {



		<?php $kelas = $this->db->get('kelas')->result(); ?>

		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});

		// var ss = $(".select2-input").select2({
		//     tags: true,
		// });

		$('.content').css('background', 'white');
		$('.steps ul').css('display', 'none');


		$('#datatable-table').DataTable({
			"oLanguage": {
				"oPaginate": {
					"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
					"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
				},
				"sInfo": "tampilkan halaman _PAGE_ dari _PAGES_",
				"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
				"sSearchPlaceholder": "Cari Data...",
				"sLengthMenu": "Hasil :  _MENU_",
			},
			"stripeClasses": [],
			"lengthMenu": [[-1, 5, 10, 25, 50],["All", 5, 10, 25, 50]],
		});

		$('.btn-hapus').on('click', function(e) {
			e.preventDefault();
			const href = $(this).attr('href');
			swal({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Delete',
				padding: '2em'
			}).then(function(result) {
				if (result.value) {
					document.location.href = href
				}
			});
		});

		// KELAS
		$('.tambah-baris-kelas').click(function() {
			const kelas = `
                <tr>
                    <td><input type="text" name="nama_kelas[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-kelas').append(kelas)
		});

		$('#tbody-kelas').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-kelas').click(function() {
			const id_kelas = $(this).data('kelas');
			$.ajax({
				type: 'POST',
				data: {
					id_kelas: id_kelas
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_kelas') ?>",
				success: function(data) {
					$.each(data, function(id_kelas, nama_kelas) {
						$("#id_kelas").val(data.id_kelas);
						$("#nama_kelas").val(data.nama_kelas);
					});
				}
			});
		});
		// END KELAS

		// TA
		$('.tambah-baris-ta').click(function() {
			const ta = `
                <tr>
                    <td><input type="text" name="ta[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td><input type="text" name="semester[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-ta').append(ta)
		});

		$('#tbody-ta').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-ta').click(function() {
			const id_ta = $(this).data('ta');
			$.ajax({
				type: 'POST',
				data: {
					id_ta: id_ta
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_ta') ?>",
				success: function(data) {
					$.each(data, function(id_ta, ta, semester) {
						$("#id_ta").val(data.id_ta);
						$("#ta").val(data.ta);
						$("#semester").val(data.semester);
					});
				}
			});
		});
		// END TA

		// JURUSAN
		$('.tambah-baris-jurusan').click(function() {
			const jurusan = `
                <tr>
                    <td><input type="text" name="kode_jurusan[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td><input type="text" name="jurusan[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-jurusan').append(jurusan)
		});

		$('#tbody-jurusan').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit_jurusan').click(function() {
			const id_jurusan = $(this).data('jurusan');
			$.ajax({
				type: 'POST',
				data: {
					id_jurusan: id_jurusan
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_jurusan') ?>",
				success: function(data) {
					$.each(data, function(id_jurusan, kode_jurusan, nama_jurusan) {
						$("#id_jurusan").val(data.id_jurusan);
						$("#kode_jurusan").val(data.kode_jurusan);
						$("#nama_jurusan").val(data.nama_jurusan);
					});
				}
			});
		});
		// END JURUSAN

		//START RUANGAN

		$('.tambah-baris-ruangan').click(function() {
			const ruangan = `
                <tr>
                    <td><input type="text" name="ruangan[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-ruangan').append(ruangan)
		});

		$('#tbody-ruangan').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit_ruangan').click(function() {
			const id_ruangan = $(this).data('ruangan');
			$.ajax({
				type: 'POST',
				data: {
					id_ruangan: id_ruangan
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_ruangan') ?>",
				success: function(data) {
					$.each(data, function(id_ruangan, ruangan) {
						$("#id_ruangan").val(data.id_ruangan);
						$("#ruangan").val(data.ruangan);
					});
				}
			});
		});

		//END RUANGAN

		// MAPEL
		$('.tambah-baris-mapel').click(function() {
			const mapel =
					<?php $kelas = $this->db->get('kelas')->result(); ?>`
                <tr>
                    <td><input type="text" name="nama_mapel[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
									<select class="form-control" name="kelas[]">
										<option value="">Pilih</option>
										<?php foreach ($kelas as $kel) : ?>
											<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
										<?php endforeach; ?>
									</select></td>
					<td><input type="text" name="tahun_ajaran[]" required style="border: none; background: transparent; width: 100%; height: 50px;"></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-mapel').append(mapel)
		});

		$('#tbody-mapel').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-mapel').click(function() {
			const id_mapel = $(this).data('mapel');
			$.ajax({
				type: 'POST',
				data: {
					id_mapel: id_mapel
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_mapel') ?>",
				success: function(data) {
					$.each(data, function(id_mapel, nama_mapel, kelas, tahun_ajaran) {
						$("#id_mapel").val(data.id_mapel);
						$("#nama_mapel").val(data.nama_mapel);
						$("#kelas").val(data.kelas);
						$("#tahun_ajaran").val(data.tahun_ajaran);
					});
				}
			});
		});
		// END MAPEL

		//START JADWAL
		$('.btn_edit_jadwal').click(function() {
			const id_jadwal = $(this).data('jadwal');
			$.ajax({
				type: 'POST',
				data: {
					id_jadwal: id_jadwal
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_jadwal') ?>",
				success: function(data) {
					$.each(data, function(id_jadwal, id_kelas, id_mapel, id_guru, hari, waktu, id_ruangan) {
						$("input[name=id_jadwal]").val(data.id_jadwal);
						$("select[name=kelas]").val(data.id_kelas);
						$("select[name=e_mapel]").val(data.id_mapel);
						$("select[name=guru]").val(data.id_guru);
						$("select[name=hari]").val(data.hari);
						$("input[name=waktu]").val(data.waktu);
						$("select[name=ruangan]").val(data.id_ruangan);
					});
				}
			});
		});
		//END JADWAL

		// START RELASI GURU
		$('.tambah-baris-relasi').click(function() {
			const relasi = `
			<?php
			$relasi_guru = $this->db->get('relasi_guru')->result();
			$mapel = $this->db->get('mapel')->result();
			$kelas = $this->db->get('kelas')->result();
			$guru = $this->db->get('guru')->result();?>
                <tr>
                <td>
								<select class="form-control" name="guru[]">
									<option value="">Pilih</option>
									<?php foreach ($guru as $g) : ?>
										<option value="<?= $g->id_guru; ?>"><?= $g->nama_guru; ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<select class="form-control" name="mapel[]">
									<option value="">Pilih</option>
										<?php foreach ($mapel as $mpl) : ?>
												<option value="<?= $mpl->id_mapel; ?>"><?= $mpl->nama_mapel; ?></option>
										<?php endforeach; ?>
								</select>
							</td>
							<td><select class="form-control" name="kelas[]">
									<option value="">Pilih</option>
										<?php foreach ($kelas as $kel) : ?>
												<option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
									<?php endforeach; ?>
								</select></td>
                    <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                    </td>
                </tr>
           `;

			$('#tbody-relasi').append(relasi)
		});

		$('#tbody-relasi').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-relasi').click(function() {
			const id_relasi_guru = $(this).data('relasi_guru');
			$.ajax({
				type: 'POST',
				data: {
					id_relasi_guru: id_relasi_guru
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_relasi') ?>",
				success: function(data) {
					$.each(data, function(id_relasi_guru, guru, kelas, mapel) {
						$("input[name=e_id_relasi_guru]").val(data.id_relasi_guru);
						$("select[name=e_guru]").val(data.e_guru);
						$("select[name=e_mapel]").val(data.mapel);
						$("select[name=e_kelas]").val(data.kelas);
					});
				}
			});
		});
		// END RELASI GURU

		// SISWA
		$('.tambah-baris-siswa').click(function() {
			const siswa = `
            <tr>
                <td><input type="text" name="nis[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td><input type="text" name="nama_siswa[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td>
                    <select name="jenis_kelamin[]" required style="border: none; background: transparent; width: 100%; height: 100%;">
                        <option value="">pilih</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
                <td><input type="text" name="email[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td>
                    <select name="kelas[]" required style="border: none; background: transparent; width: 100%; height: 100%;">
                        <option value="">pilih</option>
                        <?php foreach ($kelas as $kel) : ?>
                            <option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </td>
            </tr>
           `;

			$('#tbody-siswa').append(siswa)
		});

		$('#tbody-siswa').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-siswa').click(function() {
			const id_siswa = $(this).data('siswa');
			$.ajax({
				type: 'POST',
				data: {
					id_siswa: id_siswa
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_siswa') ?>",
				success: function(data) {
					$.each(data, function(id_siswa, no_induk_siswa, nama_siswa, email, kelas, is_active) {
						$("#id_siswa").val(data.id_siswa);
						$("#nis").val(data.no_induk_siswa)
						$("#nama_siswa").val(data.nama_siswa);
						$("#email").val(data.email);
						$("#kelas").val(data.kelas);
						$("#active").val(data.is_active);
					});
				}
			});
		});
		// END SISWA

		// GURU
		$('.tambah-baris-guru').click(function() {
			const guru = `
            <tr>
                <td><input type="text" name="nama_guru[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td><input type="text" name="email[]" required style="border: none; background: transparent; width: 100%; height: 100%;"></td>
                <td>
                    <button class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </td>
            </tr>
           `;

			$('#tbody-guru').append(guru)
		});

		$('#tbody-guru').on('click', 'tr td button', function() {
			$(this).parents('tr').remove();
		});

		$('.edit-guru').click(function() {
			const id_guru = $(this).data('guru');
			$.ajax({
				type: 'POST',
				data: {
					id_guru: id_guru
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_guru') ?>",
				success: function(data) {
					$.each(data, function(id_guru, nama_guru, email, is_active) {
						$("#id_guru").val(data.id_guru);
						$("#nama_guru").val(data.nama_guru);
						$("#email").val(data.email);
						$("#active").val(data.is_active);
					});
				}
			});
		});
		// END GURU

		// CHECK GURU KELAS
		$('.check-kelas').on('click', function() {
			const id_guru = $(this).data('id_guru');
			const id_kelas = $(this).data('id_kelas');

			$.ajax({
				type: 'post',
				data: {
					id_guru: id_guru,
					id_kelas: id_kelas
				},
				async: true,
				url: "<?= base_url('ajax/guru_kelas') ?>",
				success: function() {
					location.reload();
				}
			});
		});
		// END CHECK GURU KELAS

		// CHECK GURU MAPEL
		$('.check-mapel').on('click', function() {
			const id_guru = $(this).data('id_guru');
			const id_mapel = $(this).data('id_mapel');

			$.ajax({
				type: 'post',
				data: {
					id_guru: id_guru,
					id_mapel: id_mapel
				},
				async: true,
				url: "<?= base_url('ajax/guru_mapel') ?>",
				success: function() {
					location.reload();
				}
			});
		});
		// END CHECK GURU MAPEL


		$('.edit_materi').click(function() {
			const id_materi = $(this).data('materi');
			$.ajax({
				type: 'POST',
				data: {
					id_materi: id_materi
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_materi') ?>",
				success: function(data) {
					$.each(data, function(id_materi, kode_materi, nama_materi, tahun_ajaran, guru, mapel, kelas, text_materi) {
						$("input[name=e_kode_materi]").val(data.kode_materi);
						$("input[name=e_nama_materi]").val(data.nama_materi);
						$("select[name=e_mapel]").val(data.mapel);
						$("input[name=e_tahun_ajaran]").val(data.tahun_ajaran);
						$("select[name=e_kelas]").val(data.kelas);
						$("textarea[name=e_text_materi]").val(data.text_materi);
					});
				}
			});
		});

		$('#chat_materi').click(function() {
			const chat_materi = $('textarea[name=text]').val();
			const kode_materi = $('input[name=kode_materi]').val();

			$.ajax({
				type: 'POST',
				data: {
					chat_materi: chat_materi,
					kode_materi: kode_materi
				},
				async: true,
				url: "<?= base_url('ajax/chat_materi') ?>",
				success: function(html) {
					$('textarea[name=text]').val('');
				}
			});
		});

		function get_chat_materi() {
			setInterval(() => {
				const kode_materi = $('input[name=kode_materi]').val();
				$.ajax({
					type: 'POST',
					data: {
						kode_materi: kode_materi
					},
					url: "<?= base_url('ajax/get_chat_materi') ?>",
					success: function(html) {
						$('.inner-chat-materi').html(html);
					}
				})
			}, 1000);
		}

		get_chat_materi();

		// START TUGAS
		$('#chat_tugas').click(function() {
			const chat_tugas = $('textarea[name=text]').val();
			const kode_tugas = $('input[name=kode_tugas]').val();

			$.ajax({
				type: 'POST',
				data: {
					chat_tugas: chat_tugas,
					kode_tugas: kode_tugas
				},
				async: true,
				url: "<?= base_url('ajax/chat_tugas') ?>",
				success: function(html) {
					$('textarea[name=text]').val('');
				}
			});
		});

		$('.btn_edit_tugas').click(function() {
			const id_tugas = $(this).data('tugas');
			$.ajax({
				type: 'POST',
				data: {
					id_tugas: id_tugas
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_tugas') ?>",
				success: function(data) {
					$.each(data, function(id_tugas, kode_tugas, kelas, mapel, tahun_ajaran, guru, nama_tugas, deskripsi, due_date) {
						$("input[name=e_kode_tugas]").val(data.kode_tugas);
						$("input[name=e_nama_tugas]").val(data.nama_tugas);
						$("select[name=e_mapel]").val(data.mapel);
						$("input[name=e_tahun_ajaran]").val(data.tahun_ajaran);
						$("select[name=e_kelas]").val(data.kelas);
						$("textarea[name=e_deskripsi]").val(data.deskripsi);
						var tgl = data.due_date.substring(0, 10);
						$("input[name=e_tgl]").val(tgl);
						var jam = data.due_date.substring(11, 16);
						$("input[name=e_jam]").val(jam);
						// alert(jam);
					});
				}
			});
		});

		//START MAPEL DETAIL


		$('.btn_edit_mapel').click(function() {
			const id_mapel = $(this).data('mapel');
			$.ajax({
				type: 'POST',
				data: {
					id_mapel: id_mapel
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_mapel_detail') ?>",
				success: function(data) {
					$.each(data, function(id_mapel, nama_mapel , tahun_ajaran) {
						$("#id_mapel").val(data.id_mapel);
						$("#nama_mapel").val(data.nama_mapel);
						$("#tahun_ajaran").val(data.tahun_ajaran);
					});
				}
			});
		});

		//END MAPEL DETAIL

		function get_chat_tugas() {
			setInterval(() => {
				const kode_tugas = $('input[name=kode_tugas]').val();
				$.ajax({
					type: 'POST',
					data: {
						kode_tugas: kode_tugas
					},
					url: "<?= base_url('ajax/get_chat_tugas') ?>",
					success: function(html) {
						$('.inner-chat-tugas').html(html);
					}
				})
			}, 1000);
		}

		get_chat_tugas();
		// END TUGAS

		// ABSENSI DETAIL

		$('.btn_absensi').click(function() {
			const id_absensi = $(this).data('absensi');
			$.ajax({
				type: 'POST',
				data: {
					id_absensi: id_absensi
				},
				dataType: 'JSON',
				async: true,
				url: "<?= base_url('ajax/edit_absensi') ?>",
				success: function(data) {
					$.each(data, function(id_absensi, id_siswa, id_kelas, id_mapel, id_guru, hari, waktu, jam,
					p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16) {
						$("input[name=id_absensi]").val(data.id_absensi);
						$("input[name=id_siswa]").val(data.id_siswa);
						$("select[name=mapel]").val(data.id_mapel);
						$("select[name=kelas]").val(data.id_kelas);
						$("select[name=guru]").val(data.id_guru);
						$("select[name=hari]").val(data.hari);
						$("input[name=tanggal]").val(data.waktu);
						$("input[name=waktu]").val(data.jam);
						$("select[name=p1]").val(data.p1);
						$("select[name=p2]").val(data.p2);
						$("select[name=p3]").val(data.p3);
						$("select[name=p4]").val(data.p4);
						$("select[name=p5]").val(data.p5);
						$("select[name=p6]").val(data.p6);
						$("select[name=p7]").val(data.p7);
						$("select[name=p8]").val(data.p8);
						$("select[name=p9]").val(data.p9);
						$("select[name=p10]").val(data.p10);
						$("select[name=p11]").val(data.p11);
						$("select[name=p12]").val(data.p12);
						$("select[name=p13]").val(data.p13);
						$("select[name=p14]").val(data.p14);
						$("select[name=p15]").val(data.p15);
						$("select[name=p16]").val(data.p16);
					});
				}
			});
		});



		// END ABSENSI DETAIL


		// TAMBAH SOAL PG
		// SISWA
		var no_soal = 2;
		$('.tambah-pg').click(function() {
			const pg = `
            <div class="isi_soal">
            <hr>
                <div class="form-group">
                    <label for="">Soal No . ` + no_soal + `</label>
                    <textarea name="nama_soal[]" cols="30" rows="2" class="summernote" wrap="hard" required></textarea>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Pilihan A</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">A</span>
                                </div>
                                <input type="text" name="pg_1[]" class="form-control" placeholder="Opsi A" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Pilihan B</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">B</span>
                                </div>
                                <input type="text" name="pg_2[]" class="form-control" placeholder="Opsi B" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Pilihan C</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">C</span>
                                </div>
                                <input type="text" name="pg_3[]" class="form-control" placeholder="Opsi C" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Pilihan D</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">D</span>
                                </div>
                                <input type="text" name="pg_4[]" class="form-control" placeholder="Opsi D" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Jawaban</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="jawaban[]" class="form-control" placeholder="Contoh : A" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-danger hapus-pg">Hapus</a>
            </div>
           `;

			$('#soal_pg').append(pg);
			no_soal++;
		});

		$('#soal_pg').on('click', '.isi_soal a', function() {
			$(this).parents('.isi_soal').remove();
		});

		$('.tambah-essay').click(function() {
			const essay = `
            <div class="isi_soal mt-2">
                <div class="form-group">
                    <label for="">Soal No. ` + no_soal + `</label><br>
                    <textarea class="summernote" name="soal[]" cols="30" rows="5" wrap="hard"></textarea>
                </div>
                <a href="javascript:void(0);" class="btn btn-danger hapus-pg">Hapus</a>
            </div>
           `;

			$('#soal_essay').append(essay);
			no_soal++;
		});
		$('#soal_essay').on('click', '.isi_soal a', function() {
			$(this).parents('.isi_soal').remove();
		});

		setInterval(() => {
			$.ajax({
				type: 'POST',
				data: {
					additional: "additional",
				},
				async: true,
				url: "<?= base_url('ajax/time_now'); ?>",
				success: function(data) {
					$('#jam_skrng').html(data);
				}
			});
		}, 1000);

		setInterval(() => {
			const waktu = $('#jam_skrng').html();
			const kode_ujian = $('#kode_ujian').val();
			$.ajax({
				type: 'POST',
				data: {
					waktu: waktu,
					kode_ujian: kode_ujian,
				},
				async: true,
				url: "<?= base_url('ajax/cek_ujian'); ?>",
				success: function(data) {
					if (data == '1') {
						$('#waktu_habis').css('display', 'flex');
					} else {
						$('#waktu_habis').css('display', 'none');
					}
				}
			});
		}, 1000);

		$("circle-basic").steps({
			cssClass: 'circle wizard'
		});

		// SUMMERNOTE
		setInterval(() => {
			$('.summernote').summernote({
				placeholder: 'Hello stand alone ui',
				tabsize: 2,
				height: 120,
				toolbar: [
					['style', ['style']],
					['font', ['bold', 'underline', 'clear']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['table', ['table']],
					['insert', ['link', 'picture']],
					['view', ['fullscreen', 'help']]
				],
				callbacks: {
					onImageUpload: function(image, which_sum = this) {
						uploadImage(image[0], which_sum);
					},
					onMediaDelete: function(target) {
						deleteImage(target[0].src);
					}
				}
			});
		}, 1000);

		function uploadImage(image, which_sum) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('ajax/upload_summernote') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$(which_sum).summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?= base_url('ajax/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

		// END TAMBAH SOAL PG

		var oneUpload = new FileUploadWithPreview('fileMateri');
		var secondUpload = new FileUploadWithPreview('videoMateri');

		var oneUpload = new FileUploadWithPreview('e_fileMateri');
		var secondUpload = new FileUploadWithPreview('e_videoMateri');

		// END MATERI
	})
</script>

</body>


</html>
