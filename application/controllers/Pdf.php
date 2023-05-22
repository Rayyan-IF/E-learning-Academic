<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Siswa_Model', 'siswa');
        $this->load->model('Kelas', 'kelas');
        $this->load->model('Presensi', 'presensi');
        date_default_timezone_set('Asia/Jakarta');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        is_admin();
    }

    public function absensi($data)
    {
        base_url('assets/img/');

        $no_event = decrypt_url($data);
        $event = $this->presensi->presensibyno($no_event);
        $presensi = $this->presensi->absensiswa($no_event);

        $nama_file = 'Absensi ' . $event->nama_event;
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="http://192.168.43.132/e-presensi-abdul/assets/img/rb.png" width="120px" style="margin-top: 20px;" alt="">
        </div>', 'O');
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="http://192.168.43.132/e-presensi-abdul/assets/img/rb.png" width="120px" style="margin-top: 20px;" alt="">
        </div>', 'E');

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic; border: none;">
            <tr border="0">
                <td width="33%" style="text-align: left; border: none;">{DATE j-m-Y}</td>
                <td width="33%" align="center" style="border: none;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right; border: none;">E-Presensi by Abduloh</td>
            </tr>
        </table>');  // Note that the second parameter is optional : default = 'O' for ODD

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr border="0">
                <td width="33%"><span style="font-weight: bold; font-style: italic;">E-Presensi By Abduloh/span></td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: left; ">{DATE j-m-Y}</td>
            </tr>
        </table>', 'E');

        $html = '
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Report</title>
                <style>
                    body{
                        font-family: sans-serif;
                    }
                    table{
                        border: 0.1px solid #708090;
                    }
                    tr td{
                        text-align: center;
                        border: 0.1px solid #708090;
                        font-weight: 20;
                    }
                    tr th{
                        border: 0.1px solid #708090;
                    }
                    input[type=text] {
                        border: none;
                        background: transparent;
                    }
                </style>
            </head>

            <body>
            <h2 style="text-align: center;">E-PRESENSI BY ABDULOH<br><small>Built With Codeignite 3 & PHP 7</small></h2>
                <p style="text-align: center;">jln. Nakula RT017 RW 005 Pasirjaya Karawang</p>
                <hr>
                <center>
                    <table width="100%" align="center" style="border: none;">
                        <tr>
                            <th style="border: none;">Nomor Absen</th>
                            <th style="border: none;">Nama Absen</th>
                            <th style="border: none;">Tanggal</th>
                            <th style="border: none;">Jam</th>
                        </tr>
                        <tr>
                            <td style="border: none; background: trasparent">' . $event->no_event . '</td>
                            <td style="border: none; background: trasparent">' . $event->nama_event . '</td>
                            <td style="border: none; background: trasparent">' . $event->tgl_event . '</td>
                            <td style="border: none; background: trasparent">' . $event->dari_jam . '-' . $event->sampai_jam . '</td>
                        </tr>
                    </table>
                </center>
                <hr>
                    <h4 style="text-align: center;">List Sudah Presensi</h4>
                <table border="0.1" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <th>NAMA SISWA</th>
                        <th>NIM</th>
                        <th>KELAS</th>
                        <th>ABSEN MASUK</th>
                        <th>KETERANGAN</th>
                        <th>ABSEN PULANG</th>
                        <th>KETERANGAN AKHIR</th>
                    </tr>';
        $kelas = $this->db->get('kelas')->result();
        foreach ($presensi as $p) {
            $html .= '<tr>';
            $html .= '<td>' . $p->nama_siswa . '</td>';
            $html .= '<td>' . $p->nim_siswa . '</td>';
            $html .= '<td>' . $p->kelas . '</td>';
            if ($p->absen_masuk == 0 && $p->izinkan == 0) {
                $html .= '<td>' . "Pending" . '</td>';
            }
            if ($p->absen_masuk == 0 && $p->izinkan == 1) {
                $html .= '<td>' . "izin" . '</td>';
            }
            if ($p->absen_masuk != 0) {
                $html .= '<td>' . date('H:i', $p->absen_masuk) . '</td>';
            }


            if ($p->absen_masuk == 0 && $p->izinkan == 0) {
                $html .= '<td>' . "Pending" . '</td>';
            }
            if ($p->absen_masuk == 0 && $p->izinkan == 1) {
                $html .= '<td>' . "Izin" . '</td>';
            }
            if ($p->is_telat != null && $p->is_telat == 0) {
                $html .= '<td>' . "Sukses" . '</td>';
            }
            if ($p->is_telat != null && $p->is_telat == 1) {
                $html .= '<td>' . "Terlambat" . '</td>';
            }

            if ($p->absen_masuk == 0 && $p->izinkan == 0) {
                $html .= '<td>' . "Pending" . '</td>';
            }
            if ($p->absen_masuk == 0 && $p->izinkan == 1) {
                $html .= '<td>' . "izin" . '</td>';
            }
            if ($p->absen_masuk != 0 && $p->absen_keluar == 0) {
                $html .= '<td>-</td>';
            }
            if ($p->absen_masuk != 0 && $p->absen_keluar != 0) {
                $html .= '<td>' . date('H:i', $p->absen_keluar) . '</td>';
            }

            if ($p->absen_masuk != 0 && $p->absen_keluar == 0) {
                $html .= '<td>Bolos</td>';
            } else {
                $html .= '<td>' . $p->keterangan . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .=
            '
            <h4 style="text-align: center;">List Belum Presensi</h4>
                <table border="0.1" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <th>NAMA SISWA</th>
                        <th>NIM</th>
                        <th>KELAS</th>
                    </tr>
        ';
        $query1 = $this->db->query("SELECT * FROM siswa WHERE nim NOT IN ( SELECT nim_siswa FROM absen WHERE no_event = '$no_event')");
        $query1_result = $query1->result();
        $belum_absen = $query1_result;

        foreach ($belum_absen as $belum) {
            $html .= '<tr>';
            $html .= '<td>' . $belum->nama_siswa . '</td>';
            $html .= '<td>' . $belum->nim . '</td>';
            foreach ($kelas as $kel) {
                if ($kel->kode_kelas == $belum->kelas_siswa) {
                    $html .= '<td>' . $kel->nama_kelas . '</td>';
                }
            }
            $html .= '</tr>';
        }
        $html .= '
                </table>
                </body>
                </html>
                ';

        $mpdf->WriteHTML($html);
        $mpdf->Output("$nama_file.pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function exportqr($data)
    {
        $no_event = decrypt_url($data);
        $event = $this->db->get_where('event', ['no_event' => $no_event])->row();

        $nama_file = 'Qr-Code-' . $event->nama_event;
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="http://192.168.43.132/e-presensi-abdul/assets/img/rb.png" width="120px" style="margin-top: 20px;" alt="">
        </div>', 'O');
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="http://192.168.43.132/e-presensi-abdul/assets/img/rb.png" width="120px" style="margin-top: 20px;" alt="">
        </div>', 'E');

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic; border: none;">
            <tr border="0">
                <td width="33%" style="text-align: left; border: none;">{DATE j-m-Y}</td>
                <td width="33%" align="center" style="border: none;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right; border: none;">E-Presensi by Abduloh</td>
            </tr>
        </table>');  // Note that the second parameter is optional : default = 'O' for ODD

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr border="0">
                <td width="33%"><span style="font-weight: bold; font-style: italic;">E-Presensi By Abduloh/span></td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: left; ">{DATE j-m-Y}</td>
            </tr>
        </table>', 'E');

        $html = '
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Report</title>
                <style>
                    body{
                        font-family: sans-serif;
                    }
                    table{
                        border: 0.1px solid #708090;
                    }
                    tr td{
                        text-align: center;
                        border: 0.1px solid #708090;
                        font-weight: 20;
                    }
                    tr th{
                        border: 0.1px solid #708090;
                    }
                    input[type=text] {
                        border: none;
                        background: transparent;
                    }
                </style>
            </head>

            <body>
                <h2 style="text-align: center;">E-PRESENSI BY ABDULOH<br><small>Built With Codeignite 3 & PHP 7</small></h2>
                <p style="text-align: center;">jln. Nakula RT017 RW 005 Pasirjaya Karawang</p>
                <hr>
                <p style="text-align: center; font-weight: bold;">QR Code Presensi ' . $event->nama_event . '</p>
                <div style="margin-left: 150px;">
                    <img src="' . 'http://192.168.43.132/e-presensi-abdul/assets/app-assets/qr/img/' . $event->qr_event . '" alt="Gambar Qr">
                </div>
            </body>
            </html>';

        $mpdf->WriteHTML($html);
        $mpdf->Output("$nama_file.pdf", \Mpdf\Output\Destination::INLINE);
    }
}
