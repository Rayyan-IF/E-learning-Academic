<?php
function check_kelas($id_guru, $id_kelas)
{
    $ci = get_instance();
    $guru = decrypt_url($id_guru);

    $ci->db->where('guru', $guru);
    $ci->db->where('kelas', $id_kelas);
    $result = $ci->db->get('guru_kelas');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_mapel($id_guru, $id_mapel)
{
    $ci = get_instance();
    $guru = decrypt_url($id_guru);

    $ci->db->where('guru', $guru);
    $ci->db->where('mapel', $id_mapel);
    $result = $ci->db->get('guru_mapel');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function ukuran_file($path)
{
    $bytes = sprintf('%u', filesize($path));

    if ($bytes > 0) {
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true) {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }

    return $bytes;
}

function is_admin()
{
    $ci = get_instance();

    $data = [
        'email' => $ci->session->userdata('email'),
        'role' => $ci->session->userdata('role'),
    ];

    if ($data['email']) {
        if ($data['role'] != 1) {
            redirect('eror');
        }
    } else {
        redirect('auth');
    }
}

function is_guru()
{
    $ci = get_instance();

    $data = [
        'email' => $ci->session->userdata('email'),
        'role' => $ci->session->userdata('role'),
    ];

    if ($data['email']) {
        if ($data['role'] != 3) {
            redirect('eror');
        }
    } else {
        redirect('auth');
    }
}

function is_siswa()
{
    $ci = get_instance();

    $data = [
        'email' => $ci->session->userdata('email'),
        'role' => $ci->session->userdata('role'),
    ];

    if ($data['email']) {
        if ($data['role'] != 2) {
            redirect('eror');
        }
    } else {
        redirect('auth');
    }
}

function is_guest()
{
	$ci = get_instance();

	$data = [
		'email' => $ci->session->userdata('email'),
		'role' => $ci->session->userdata('role'),
	];

	if ($data['email']) {
		if ($data['role'] != 4) {
			redirect('eror');
		}
	} else {
		redirect('auth');
	}
}
