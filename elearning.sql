-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2021 pada 16.11
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `p1` int(1) NOT NULL,
  `p2` int(1) NOT NULL,
  `p3` int(1) NOT NULL,
  `p4` int(1) NOT NULL,
  `p5` int(1) NOT NULL,
  `p6` int(1) NOT NULL,
  `p7` int(1) NOT NULL,
  `p8` int(1) NOT NULL,
  `p9` int(1) NOT NULL,
  `p10` int(1) NOT NULL,
  `p11` int(1) NOT NULL,
  `p12` int(1) NOT NULL,
  `p13` int(1) NOT NULL,
  `p14` int(1) NOT NULL,
  `p15` int(1) NOT NULL,
  `p16` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `id_kelas`, `id_mapel`, `id_guru`, `hari`, `waktu`, `jam`, `pertemuan`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`) VALUES
(279, 21, 5, 6, 22, 'Senin', '2021-05-18', '23:18', 'Pertemuan 1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(280, 22, 5, 6, 22, 'Senin', '2021-05-18', '23:18', 'Pertemuan 1', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(281, 21, 5, 6, 22, 'Senin', '2021-05-18', '23:18', 'Pertemuan 2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(283, 21, 5, 6, 22, 'Senin', '2021-05-18', '23:19', 'Pertemuan 2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(284, 22, 5, 6, 22, 'Senin', '2021-05-18', '23:19', 'Pertemuan 2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(285, 21, 5, 6, 22, 'Senin', '2021-05-18', '23:20', 'Pertemuan 3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(286, 22, 5, 6, 22, 'Senin', '2021-05-18', '23:20', 'Pertemuan 3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(287, 20, 7, 7, 23, 'Selasa', '2021-05-19', '00:07', 'Pertemuan 1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(288, 42, 7, 7, 23, 'Selasa', '2021-05-19', '00:07', 'Pertemuan 1', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(289, 43, 7, 7, 23, 'Selasa', '2021-05-19', '00:07', 'Pertemuan 1', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(293, 20, 7, 7, 23, 'Senin', '2021-05-19', '00:08', 'Pertemuan 3', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(294, 42, 7, 7, 23, 'Senin', '2021-05-19', '00:08', 'Pertemuan 3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(295, 43, 7, 7, 23, 'Senin', '2021-05-19', '00:08', 'Pertemuan 3', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(296, 20, 7, 7, 23, 'Selasa', '2021-05-19', '00:09', 'Pertemuan 2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(297, 42, 7, 7, 23, 'Selasa', '2021-05-19', '00:09', 'Pertemuan 2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(298, 43, 7, 7, 23, 'Selasa', '2021-05-19', '00:09', 'Pertemuan 2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `pm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `is_active`, `date_created`, `avatar`, `role`, `pm`) VALUES
(15, 'Elearning Assafir', 'elearningassafir@gmail.com', '$2y$10$dqg7gIPGq0ixog.SzmTv9ekigv0pn08gueS2xRWZQEbSRFP6Ysf3q', 1, 1621739795, 'default.jpg', 1, 'Elearning123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_materi`
--

CREATE TABLE `chat_materi` (
  `id_chat_materi` int(11) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat_materi`
--

INSERT INTO `chat_materi` (`id_chat_materi`, `materi`, `nama`, `gambar`, `email`, `text`, `date_created`) VALUES
(84, 'KCgwOEcU', 'Muhammad FIkri Haekal S.Kom. MT', 'default.jpg', 'haekal221199@gmail.com', 'haii selamat mengerjakan', 1621353590),
(85, 'KCgwOEcU', 'Akram Muhammad MN', 'default.jpg', 'waferfire17@gmail.com', 'iya pak okey saya kerjakan', 1621353599),
(86, 'KCgwOEcU', 'Muhammad FIkri Haekal S.Kom. MT', 'default.jpg', 'haekal221199@gmail.com', 'ada yang mau di tanyakan \n', 1621353606),
(87, 'KCgwOEcU', 'Akram Muhammad MN', 'default.jpg', 'waferfire17@gmail.com', 'cukup pak terimakasih', 1621353616);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_tugas`
--

CREATE TABLE `chat_tugas` (
  `id_chat_tugas` int(11) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `essay_detail`
--

CREATE TABLE `essay_detail` (
  `id_essay_detail` int(11) NOT NULL,
  `kode_ujian` varchar(100) NOT NULL,
  `soal` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `essay_siswa`
--

CREATE TABLE `essay_siswa` (
  `id_essay_siswa` int(11) NOT NULL,
  `essay_id` int(11) NOT NULL,
  `ujian` varchar(100) NOT NULL,
  `siswa` int(11) NOT NULL,
  `jawaban` longtext DEFAULT NULL,
  `score` int(11) NOT NULL,
  `sudah_dikerjakan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `kode_file` varchar(100) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `kode_file`, `nama_file`) VALUES
(182, 'KCgwOEcU', '113090067_resume.pdf'),
(183, 'KCgwOEcU', 'Action_4-26-2021_5-40-55_PM.mp4'),
(184, 'EN4K6nvZ', '113090067_resume1.pdf'),
(185, 'EN4K6nvZ', 'Action_4-26-2021_5-40-55_PM1.mp4'),
(186, '4CsLjFqf', 'Revisi_Brosur.docx'),
(187, 'GFJiw6We', 'Revisi_Brosur4.docx'),
(188, 'GFJiw6We', 'Action_4-26-2021_5-40-55_PM2.mp4'),
(189, 'ON4YTAud', 'Cover.docx'),
(190, 'eJha8Q1m', 'Cover1.docx'),
(191, 'eJha8Q1m', 'Action_4-26-2021_5-40-55_PM3.mp4'),
(192, 'jflvMC82', 'Cover2.docx'),
(193, '3nkU89Ze', 'Cover3.docx'),
(194, '3nkU89Ze', 'Action_4-26-2021_5-40-55_PM4.mp4'),
(195, 'c3k46diG', 'Cover4.docx'),
(196, 'W0HDVTjP', 'TugasMgg-2-IFA310-152018085-C.docx'),
(197, 'v74IwlVN', '152018085_C_Tugas2_Ifling.pdf'),
(198, 'UO0MC6DE', 'TugasMgg-2-IFA310-152018085-C.pdf'),
(199, 'b4JhU1sH', 'UTS_Menpro_Final_Amiin.pdf'),
(200, 'b4JhU1sH', 'PM_Life_Cycle1.ppt'),
(201, 'b4JhU1sH', 'Soal_12_MATEMATIKA_UTS.xlsx'),
(202, 'bUpLZld7', 'KTP_EKAL.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `guru_kelas` varchar(255) DEFAULT NULL,
  `guru_mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `email`, `password`, `role`, `is_active`, `date_created`, `avatar`, `guru_kelas`, `guru_mapel`) VALUES
(22, 'Muhammad FIkri Haekal S.Kom. MT', 'haekal221199@gmail.com', '$2y$10$hPZf/U7fgLag4imsGG2bmuh9NcC4Zl0vyBaDREkwUvMYBN5xThmoK', 3, 1, 1621350408, 'haekal1.jpg', NULL, NULL),
(23, 'Alisha Rainita SAg,MAg', 'aliha162299@gmail.com', '$2y$10$3vk0GMaRoQwaGArCKax9TOfB.mNfSAUWHUrlOLf3.FZL3eC/IuD.S', 3, 1, 1621350411, '1609809156_f749a0be6ac38433ae0b1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(1) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `id_ruangan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_ta`, `id_mapel`, `id_guru`, `hari`, `waktu`, `id_ruangan`) VALUES
(15, 6, 0, 8, 22, 'Selasa', '09.00 - 10.00', 3),
(16, 5, 0, 6, 22, 'Senin', '09.00 - 10.00', 3),
(17, 7, 0, 7, 23, 'Selasa', '09.00 - 10.00', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'IPS', 'Ilmu Penggetahuan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(5, 'Kelas 12'),
(6, 'Kelas 11'),
(7, 'Kelas 10'),
(8, 'Kelas 9'),
(27, 'Kelas 8'),
(29, 'Kelas 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_absen`
--

CREATE TABLE `ket_absen` (
  `id_ket_absen` int(11) NOT NULL,
  `ket_absen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ket_absen`
--

INSERT INTO `ket_absen` (`id_ket_absen`, `ket_absen`) VALUES
(0, 'A'),
(1, 'I'),
(2, 'H');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kelas` int(2) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `smt` int(1) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kelas`, `tahun_ajaran`, `smt`, `semester`) VALUES
(6, 'IPS', 6, '2020/2021', 0, ''),
(7, 'Bahasa Indonesia', 6, '2020/2021', 0, ''),
(8, 'Matematika', 6, '2020/2021', 0, ''),
(9, 'Fiqih Wanita', 7, '2020/2021', 0, ''),
(10, 'Faraidh/Ilmu Warits', 7, '2020/2021', 0, ''),
(128, 'Kecerdasan Buatan', 6, '2020/2021', 0, ''),
(129, 'Seni Budayaa', 5, '2020/2021', 0, ''),
(130, 'Kecerdasan Buatan', 8, '2020/2021', 0, ''),
(135, 'Sistem Pakar', 5, '2020/2021', 0, ''),
(136, 'Bahasa Alamiah', 5, '2020/2021', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `kode_materi` varchar(100) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `guru` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `text_materi` longtext NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `kode_materi`, `nama_materi`, `guru`, `mapel`, `tahun_ajaran`, `kelas`, `text_materi`, `date_created`) VALUES
(50, 'KCgwOEcU', 'ANN', 22, 6, '2020/2021', 5, 'Silahkan Pelajari Materi ini ', 1621353458),
(51, 'bUpLZld7', 'AND', 22, 6, '2020/2021', 5, 'qqweqweq', 1623054423);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_siswa`
--

CREATE TABLE `materi_siswa` (
  `id_materi_siswa` int(11) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `kelas` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi_siswa`
--

INSERT INTO `materi_siswa` (`id_materi_siswa`, `materi`, `kelas`, `mapel`, `tahun_ajaran`, `siswa`, `dilihat`) VALUES
(45, 'KCgwOEcU', 5, 6, '2020/2021', 22, 0),
(46, 'bUpLZld7', 5, 6, '2020/2021', 21, 0),
(47, 'bUpLZld7', 5, 6, '2020/2021', 44, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_guru`
--

CREATE TABLE `relasi_guru` (
  `id_relasi_guru` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `relasi_guru`
--

INSERT INTO `relasi_guru` (`id_relasi_guru`, `guru`, `kelas`, `mapel`) VALUES
(28, 22, 5, 6),
(31, 22, 6, 8),
(32, 23, 7, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(2) NOT NULL,
  `ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `ruangan`) VALUES
(2, 'Ruang 001'),
(3, 'Ruang 002'),
(4, 'Ruang 003'),
(5, 'Ruang 004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_induk_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `kelas` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `no_induk_siswa`, `nama_siswa`, `email`, `password`, `jenis_kelamin`, `kelas`, `role`, `is_active`, `date_created`, `avatar`) VALUES
(20, '152018091', 'Muhammad Ammar Nugraha', 'ammarcoolz3@gmail.com', '$2y$10$PcEV2Blm2UslE.Dn/aDI5eHHX3ScSoEBaa.l07eIIxikEYJwxeCkK', 'Laki - Laki', 7, 2, 1, 1613466541, 'default.jpg'),
(21, '152018095', 'Akram Muhammad MN', 'waferfire17@gmail.com', '$2y$10$e.Q1NxX/0IMBo14bxaTI.ujZMx5B2S/r.bmwv0Gps4JkzuDiY.Oiu', 'Laki - Laki', 5, 2, 1, 1614085946, '1608089903_c3cd1f5f982caf733fb9.jpg'),
(22, '152018099', 'Alisha Rainita', 'alishaarainita@gmail.com', '$2y$10$leMUG2lvbVWmDqi23M0Z2eGc5yIFynABzq8vwgDFzKGDbuWrW0YO6', 'Perempuan', 6, 2, 1, 1614096671, 'default.jpg'),
(39, '152018104', 'Rijal Rais', 'raisrijal2@gmail.com', '$2y$10$BzuIjDmavqF/1951nGS6yel.hGr/0jTFaFNL.4qG1kAMoMZfII5cq', 'Laki - Laki', 6, 2, 1, 1614872718, 'default.jpg'),
(42, '152018086', 'Razhaldy Ihza', 'okumurayuu25@gmail.com', '$2y$10$nXudzNO1e3qiPC53rOkGkuvppR3zfwEH3vbGm70/YZkGPhaBQ.Ygi', 'Laki - Laki', 7, 2, 1, 1621350269, 'foto3.jpg'),
(44, '152018084', 'Annisa Olga Zerlinda', 'olgazerlindaa@gmail.com', '$2y$10$SqHV.o2C.G1sUFjxdOf3De7AWGHO1OlIFygxZaR6aKZD22yNsdly6', 'Perempuan', 5, 2, 1, 1622737679, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta`
--

CREATE TABLE `ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ta`
--

INSERT INTO `ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(5, '2020/2021', 'Ganjil', 0),
(6, '2020/2021', 'Genap', 0),
(7, '2021/2022', 'Ganjil', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `kode_tugas` varchar(100) NOT NULL,
  `kelas` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `date_created` int(11) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `date_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `kelas`, `mapel`, `tahun_ajaran`, `guru`, `nama_tugas`, `deskripsi`, `date_created`, `due_date`, `date_updated`) VALUES
(21, 'EN4K6nvZ', 5, 6, '2020/2021', 22, 'Model representasi pengetahuan', 'silahkan di kerjakan !', 1621355601, '2021-05-18 23:33', NULL),
(22, 'GFJiw6We', 5, 6, '2020/2021', 22, 'Latihan Uji Pemahaman 1', 'aaaa', 1621739491, '2021-05-23 10:13', NULL),
(23, 'eJha8Q1m', 5, 6, '2020/2021', 22, 'Latihan Uji Pemahaman 2', 'testttt', 1621739866, '2021-05-23 10:19', NULL),
(24, '3nkU89Ze', 5, 6, '2020/2021', 22, 'Latihan Uji Pemahaman 3', 'test', 1621743598, '2021-05-23 11:23', NULL),
(25, 'W0HDVTjP', 5, 6, '2021/2022', 22, 'TUgas 1 Pandemi IPS', 'test', 1621873745, '2021-05-24 23:33', NULL),
(26, 'UO0MC6DE', 5, 6, '2021/2022', 22, 'TUgas 1 Pandemi IPSa', 'ssss', 1621925659, '2021-05-25 13:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id_tugas_siswa` int(11) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `siswa` int(11) NOT NULL,
  `text_siswa` longtext DEFAULT NULL,
  `file_siswa` varchar(100) DEFAULT NULL,
  `date_send` int(11) DEFAULT NULL,
  `is_telat` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `catatan_guru` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_siswa`
--

INSERT INTO `tugas_siswa` (`id_tugas_siswa`, `tugas`, `siswa`, `text_siswa`, `file_siswa`, `date_send`, `is_telat`, `nilai`, `catatan_guru`) VALUES
(41, 'EN4K6nvZ', 21, 'testwwww', '4CsLjFqf', 1621739310, 1, NULL, NULL),
(42, 'EN4K6nvZ', 22, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'GFJiw6We', 21, 'aaaa', 'ON4YTAud', 1621873602, 1, 85, 'bagus '),
(44, 'GFJiw6We', 22, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'eJha8Q1m', 21, 'ssss', 'jflvMC82', 1621739941, 0, 75, 'good'),
(46, '3nkU89Ze', 21, 'tteestt', 'c3k46diG', 1621743641, 0, 100, 'goodd'),
(47, 'W0HDVTjP', 21, 'tugas di kumpulkan', 'v74IwlVN', 1621873875, 0, NULL, NULL),
(48, 'UO0MC6DE', 21, 'aaaassssdddd', 'b4JhU1sH', 1621929454, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `kode_ujian` varchar(100) NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `guru` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `waktu_mulai` varchar(100) NOT NULL,
  `waktu_berakhir` varchar(100) NOT NULL,
  `jenis_ujian` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `kode_ujian`, `nama_ujian`, `guru`, `kelas`, `mapel`, `date_created`, `waktu_mulai`, `waktu_berakhir`, `jenis_ujian`) VALUES
(29, 'pmSjqJV8LQ', 'uts1', 22, 5, 6, 1621929592, '2021-05-25 14:58', '2021-05-25 15:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_detail`
--

CREATE TABLE `ujian_detail` (
  `id_detail_ujian` int(11) NOT NULL,
  `kode_ujian` varchar(100) NOT NULL,
  `nama_soal` longtext NOT NULL,
  `pg_1` varchar(100) NOT NULL,
  `pg_2` varchar(100) NOT NULL,
  `pg_3` varchar(100) NOT NULL,
  `pg_4` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_detail`
--

INSERT INTO `ujian_detail` (`id_detail_ujian`, `kode_ujian`, `nama_soal`, `pg_1`, `pg_2`, `pg_3`, `pg_4`, `jawaban`) VALUES
(124, 'pmSjqJV8LQ', 'Apa yang dimaksud dengan ilmu penggetahuan sosial ? ', 'A. Ilmu Sosial', 'B. Ilmu IPA', 'C. Ilmu Ngoding', 'D. Ilmu Matematika', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_siswa`
--

CREATE TABLE `ujian_siswa` (
  `id_ujian_siswa` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `ujian` varchar(100) NOT NULL,
  `siswa` int(11) NOT NULL,
  `jawaban` varchar(100) DEFAULT NULL,
  `benar` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_siswa`
--

INSERT INTO `ujian_siswa` (`id_ujian_siswa`, `ujian_id`, `ujian`, `siswa`, `jawaban`, `benar`) VALUES
(219, 124, 'pmSjqJV8LQ', 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_user_token` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `chat_materi`
--
ALTER TABLE `chat_materi`
  ADD PRIMARY KEY (`id_chat_materi`);

--
-- Indeks untuk tabel `chat_tugas`
--
ALTER TABLE `chat_tugas`
  ADD PRIMARY KEY (`id_chat_tugas`);

--
-- Indeks untuk tabel `essay_detail`
--
ALTER TABLE `essay_detail`
  ADD PRIMARY KEY (`id_essay_detail`);

--
-- Indeks untuk tabel `essay_siswa`
--
ALTER TABLE `essay_siswa`
  ADD PRIMARY KEY (`id_essay_siswa`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `ket_absen`
--
ALTER TABLE `ket_absen`
  ADD PRIMARY KEY (`id_ket_absen`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `materi_siswa`
--
ALTER TABLE `materi_siswa`
  ADD PRIMARY KEY (`id_materi_siswa`);

--
-- Indeks untuk tabel `relasi_guru`
--
ALTER TABLE `relasi_guru`
  ADD PRIMARY KEY (`id_relasi_guru`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id_tugas_siswa`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD PRIMARY KEY (`id_detail_ujian`);

--
-- Indeks untuk tabel `ujian_siswa`
--
ALTER TABLE `ujian_siswa`
  ADD PRIMARY KEY (`id_ujian_siswa`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `chat_materi`
--
ALTER TABLE `chat_materi`
  MODIFY `id_chat_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `chat_tugas`
--
ALTER TABLE `chat_tugas`
  MODIFY `id_chat_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `essay_detail`
--
ALTER TABLE `essay_detail`
  MODIFY `id_essay_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `essay_siswa`
--
ALTER TABLE `essay_siswa`
  MODIFY `id_essay_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `ket_absen`
--
ALTER TABLE `ket_absen`
  MODIFY `id_ket_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `materi_siswa`
--
ALTER TABLE `materi_siswa`
  MODIFY `id_materi_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `relasi_guru`
--
ALTER TABLE `relasi_guru`
  MODIFY `id_relasi_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `ta`
--
ALTER TABLE `ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id_tugas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  MODIFY `id_detail_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `ujian_siswa`
--
ALTER TABLE `ujian_siswa`
  MODIFY `id_ujian_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_user_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
