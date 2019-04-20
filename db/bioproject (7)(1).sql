-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14 Apr 2019 pada 20.54
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri`
--

CREATE TABLE `industri` (
  `id_industri` varchar(5) NOT NULL,
  `nama_industri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_perusahaan`
--

CREATE TABLE `jenis_perusahaan` (
  `id_jenis_perusahaan` varchar(50) NOT NULL,
  `nama_jenis_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `id_prov` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kab` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `id_prov`, `nama_kab`) VALUES
('1101', '11', 'Kabupaten Simeulue'),
('1102', '11', 'Kabupaten Aceh Singkil'),
('1103', '11', 'Kabupaten Aceh Selatan'),
('1104', '11', 'Kabupaten Aceh Tenggara'),
('1105', '11', 'Kabupaten Aceh Timur'),
('1106', '11', 'Kabupaten Aceh Tengah'),
('1107', '11', 'Kabupaten Aceh Barat'),
('1108', '11', 'Kabupaten Aceh Besar'),
('1109', '11', 'Kabupaten Pidie'),
('1110', '11', 'Kabupaten Bireuen'),
('1111', '11', 'Kabupaten Aceh Utara'),
('1112', '11', 'Kabupaten Aceh Barat Daya'),
('1113', '11', 'Kabupaten Gayo Lues'),
('1114', '11', 'Kabupaten Aceh Tamiang'),
('1115', '11', 'Kabupaten Nagan Raya'),
('1116', '11', 'Kabupaten Aceh Jaya'),
('1117', '11', 'Kabupaten Bener Meriah'),
('1118', '11', 'Kabupaten Pidie Jaya'),
('1171', '11', 'Kota Banda Aceh'),
('1172', '11', 'Kota Sabang'),
('1173', '11', 'Kota Langsa'),
('1174', '11', 'Kota Lhokseumawe'),
('1175', '11', 'Kota Subulussalam'),
('1201', '12', 'Kabupaten Nias'),
('1202', '12', 'Kabupaten Mandailing Natal'),
('1203', '12', 'Kabupaten Tapanuli Selatan'),
('1204', '12', 'Kabupaten Tapanuli Tengah'),
('1205', '12', 'Kabupaten Tapanuli Utara'),
('1206', '12', 'Kabupaten Toba Samosir'),
('1207', '12', 'Kabupaten Labuhan Batu'),
('1208', '12', 'Kabupaten Asahan'),
('1209', '12', 'Kabupaten Simalungun'),
('1210', '12', 'Kabupaten Dairi'),
('1211', '12', 'Kabupaten Karo'),
('1212', '12', 'Kabupaten Deli Serdang'),
('1213', '12', 'Kabupaten Langkat'),
('1214', '12', 'Kabupaten Nias Selatan'),
('1215', '12', 'Kabupaten Humbang Hasundutan'),
('1216', '12', 'Kabupaten Pakpak Bharat'),
('1217', '12', 'Kabupaten Samosir'),
('1218', '12', 'Kabupaten Serdang Bedagai'),
('1219', '12', 'Kabupaten Batu Bara'),
('1220', '12', 'Kabupaten Padang Lawas Utara'),
('1221', '12', 'Kabupaten Padang Lawas'),
('1222', '12', 'Kabupaten Labuhan Batu Selatan'),
('1223', '12', 'Kabupaten Labuhan Batu Utara'),
('1224', '12', 'Kabupaten Nias Utara'),
('1225', '12', 'Kabupaten Nias Barat'),
('1271', '12', 'Kota Sibolga'),
('1272', '12', 'Kota Tanjung Balai'),
('1273', '12', 'Kota Pematang Siantar'),
('1274', '12', 'Kota Tebing Tinggi'),
('1275', '12', 'Kota Medan'),
('1276', '12', 'Kota Binjai'),
('1277', '12', 'Kota Padangsidimpuan'),
('1278', '12', 'Kota Gunungsitoli'),
('1301', '13', 'Kabupaten Kepulauan Mentawai'),
('1302', '13', 'Kabupaten Pesisir Selatan'),
('1303', '13', 'Kabupaten Solok'),
('1304', '13', 'Kabupaten Sijunjung'),
('1305', '13', 'Kabupaten Tanah Datar'),
('1306', '13', 'Kabupaten Padang Pariaman'),
('1307', '13', 'Kabupaten Agam'),
('1308', '13', 'Kabupaten Lima Puluh Kota'),
('1309', '13', 'Kabupaten Pasaman'),
('1310', '13', 'Kabupaten Solok Selatan'),
('1311', '13', 'Kabupaten Dharmasraya'),
('1312', '13', 'Kabupaten Pasaman Barat'),
('1371', '13', 'Kota Padang'),
('1372', '13', 'Kota Solok'),
('1373', '13', 'Kota Sawah Lunto'),
('1374', '13', 'Kota Padang Panjang'),
('1375', '13', 'Kota Bukittinggi'),
('1376', '13', 'Kota Payakumbuh'),
('1377', '13', 'Kota Pariaman'),
('1401', '14', 'Kabupaten Kuantan Singingi'),
('1402', '14', 'Kabupaten Indragiri Hulu'),
('1403', '14', 'Kabupaten Indragiri Hilir'),
('1404', '14', 'Kabupaten Pelalawan'),
('1405', '14', 'Kabupaten S I A K'),
('1406', '14', 'Kabupaten Kampar'),
('1407', '14', 'Kabupaten Rokan Hulu'),
('1408', '14', 'Kabupaten Bengkalis'),
('1409', '14', 'Kabupaten Rokan Hilir'),
('1410', '14', 'Kabupaten Kepulauan Meranti'),
('1471', '14', 'Kota Pekanbaru'),
('1473', '14', 'Kota D U M A I'),
('1501', '15', 'Kabupaten Kerinci'),
('1502', '15', 'Kabupaten Merangin'),
('1503', '15', 'Kabupaten Sarolangun'),
('1504', '15', 'Kabupaten Batang Hari'),
('1505', '15', 'Kabupaten Muaro Jambi'),
('1506', '15', 'Kabupaten Tanjung Jabung Timur'),
('1507', '15', 'Kabupaten Tanjung Jabung Barat'),
('1508', '15', 'Kabupaten Tebo'),
('1509', '15', 'Kabupaten Bungo'),
('1571', '15', 'Kota Jambi'),
('1572', '15', 'Kota Sungai Penuh'),
('1601', '16', 'Kabupaten Ogan Komering Ulu'),
('1602', '16', 'Kabupaten Ogan Komering Ilir'),
('1603', '16', 'Kabupaten Muara Enim'),
('1604', '16', 'Kabupaten Lahat'),
('1605', '16', 'Kabupaten Musi Rawas'),
('1606', '16', 'Kabupaten Musi Banyuasin'),
('1607', '16', 'Kabupaten Banyu Asin'),
('1608', '16', 'Kabupaten Ogan Komering Ulu Selatan'),
('1609', '16', 'Kabupaten Ogan Komering Ulu Timur'),
('1610', '16', 'Kabupaten Ogan Ilir'),
('1611', '16', 'Kabupaten Empat Lawang'),
('1612', '16', 'Kabupaten Penukal Abab Lematang Ilir'),
('1613', '16', 'Kabupaten Musi Rawas Utara'),
('1671', '16', 'Kota Palembang'),
('1672', '16', 'Kota Prabumulih'),
('1673', '16', 'Kota Pagar Alam'),
('1674', '16', 'Kota Lubuklinggau'),
('1701', '17', 'Kabupaten Bengkulu Selatan'),
('1702', '17', 'Kabupaten Rejang Lebong'),
('1703', '17', 'Kabupaten Bengkulu Utara'),
('1704', '17', 'Kabupaten Kaur'),
('1705', '17', 'Kabupaten Seluma'),
('1706', '17', 'Kabupaten Mukomuko'),
('1707', '17', 'Kabupaten Lebong'),
('1708', '17', 'Kabupaten Kepahiang'),
('1709', '17', 'Kabupaten Bengkulu Tengah'),
('1771', '17', 'Kota Bengkulu'),
('1801', '18', 'Kabupaten Lampung Barat'),
('1802', '18', 'Kabupaten Tanggamus'),
('1803', '18', 'Kabupaten Lampung Selatan'),
('1804', '18', 'Kabupaten Lampung Timur'),
('1805', '18', 'Kabupaten Lampung Tengah'),
('1806', '18', 'Kabupaten Lampung Utara'),
('1807', '18', 'Kabupaten Way Kanan'),
('1808', '18', 'Kabupaten Tulangbawang'),
('1809', '18', 'Kabupaten Pesawaran'),
('1810', '18', 'Kabupaten Pringsewu'),
('1811', '18', 'Kabupaten Mesuji'),
('1812', '18', 'Kabupaten Tulang Bawang Barat'),
('1813', '18', 'Kabupaten Pesisir Barat'),
('1871', '18', 'Kota Bandar Lampung'),
('1872', '18', 'Kota Metro'),
('1901', '19', 'Kabupaten Bangka'),
('1902', '19', 'Kabupaten Belitung'),
('1903', '19', 'Kabupaten Bangka Barat'),
('1904', '19', 'Kabupaten Bangka Tengah'),
('1905', '19', 'Kabupaten Bangka Selatan'),
('1906', '19', 'Kabupaten Belitung Timur'),
('1971', '19', 'Kota Pangkal Pinang'),
('2101', '21', 'Kabupaten Karimun'),
('2102', '21', 'Kabupaten Bintan'),
('2103', '21', 'Kabupaten Natuna'),
('2104', '21', 'Kabupaten Lingga'),
('2105', '21', 'Kabupaten Kepulauan Anambas'),
('2171', '21', 'Kota B A T A M'),
('2172', '21', 'Kota Tanjung Pinang'),
('3101', '31', 'Kabupaten Kepulauan Seribu'),
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3174', '31', 'Kota Jakarta Barat'),
('3175', '31', 'Kota Jakarta Utara'),
('3201', '32', 'Kabupaten Bogor'),
('3202', '32', 'Kabupaten Sukabumi'),
('3203', '32', 'Kabupaten Cianjur'),
('3204', '32', 'Kabupaten Bandung'),
('3205', '32', 'Kabupaten Garut'),
('3206', '32', 'Kabupaten Tasikmalaya'),
('3207', '32', 'Kabupaten Ciamis'),
('3208', '32', 'Kabupaten Kuningan'),
('3209', '32', 'Kabupaten Cirebon'),
('3210', '32', 'Kabupaten Majalengka'),
('3211', '32', 'Kabupaten Sumedang'),
('3212', '32', 'Kabupaten Indramayu'),
('3213', '32', 'Kabupaten Subang'),
('3214', '32', 'Kabupaten Purwakarta'),
('3215', '32', 'Kabupaten Karawang'),
('3216', '32', 'Kabupaten Bekasi'),
('3217', '32', 'Kabupaten Bandung Barat'),
('3218', '32', 'Kabupaten Pangandaran'),
('3271', '32', 'Kota Bogor'),
('3272', '32', 'Kota Sukabumi'),
('3273', '32', 'Kota Bandung'),
('3274', '32', 'Kota Cirebon'),
('3275', '32', 'Kota Bekasi'),
('3276', '32', 'Kota Depok'),
('3277', '32', 'Kota Cimahi'),
('3278', '32', 'Kota Tasikmalaya'),
('3279', '32', 'Kota Banjar'),
('3301', '33', 'Kabupaten Cilacap'),
('3302', '33', 'Kabupaten Banyumas'),
('3303', '33', 'Kabupaten Purbalingga'),
('3304', '33', 'Kabupaten Banjarnegara'),
('3305', '33', 'Kabupaten Kebumen'),
('3306', '33', 'Kabupaten Purworejo'),
('3307', '33', 'Kabupaten Wonosobo'),
('3308', '33', 'Kabupaten Magelang'),
('3309', '33', 'Kabupaten Boyolali'),
('3310', '33', 'Kabupaten Klaten'),
('3311', '33', 'Kabupaten Sukoharjo'),
('3312', '33', 'Kabupaten Wonogiri'),
('3313', '33', 'Kabupaten Karanganyar'),
('3314', '33', 'Kabupaten Sragen'),
('3315', '33', 'Kabupaten Grobogan'),
('3316', '33', 'Kabupaten Blora'),
('3317', '33', 'Kabupaten Rembang'),
('3318', '33', 'Kabupaten Pati'),
('3319', '33', 'Kabupaten Kudus'),
('3320', '33', 'Kabupaten Jepara'),
('3321', '33', 'Kabupaten Demak'),
('3322', '33', 'Kabupaten Semarang'),
('3323', '33', 'Kabupaten Temanggung'),
('3324', '33', 'Kabupaten Kendal'),
('3325', '33', 'Kabupaten Batang'),
('3326', '33', 'Kabupaten Pekalongan'),
('3327', '33', 'Kabupaten Pemalang'),
('3328', '33', 'Kabupaten Tegal'),
('3329', '33', 'Kabupaten Brebes'),
('3371', '33', 'Kota Magelang'),
('3372', '33', 'Kota Surakarta'),
('3373', '33', 'Kota Salatiga'),
('3374', '33', 'Kota Semarang'),
('3375', '33', 'Kota Pekalongan'),
('3376', '33', 'Kota Tegal'),
('3401', '34', 'Kabupaten Kulon Progo'),
('3402', '34', 'Kabupaten Bantul'),
('3403', '34', 'Kabupaten Gunung Kidul'),
('3404', '34', 'Kabupaten Sleman'),
('3471', '34', 'Kota Yogyakarta'),
('3501', '35', 'Kabupaten Pacitan'),
('3502', '35', 'Kabupaten Ponorogo'),
('3503', '35', 'Kabupaten Trenggalek'),
('3504', '35', 'Kabupaten Tulungagung'),
('3505', '35', 'Kabupaten Blitar'),
('3506', '35', 'Kabupaten Kediri'),
('3507', '35', 'Kabupaten Malang'),
('3508', '35', 'Kabupaten Lumajang'),
('3509', '35', 'Kabupaten Jember'),
('3510', '35', 'Kabupaten Banyuwangi'),
('3511', '35', 'Kabupaten Bondowoso'),
('3512', '35', 'Kabupaten Situbondo'),
('3513', '35', 'Kabupaten Probolinggo'),
('3514', '35', 'Kabupaten Pasuruan'),
('3515', '35', 'Kabupaten Sidoarjo'),
('3516', '35', 'Kabupaten Mojokerto'),
('3517', '35', 'Kabupaten Jombang'),
('3518', '35', 'Kabupaten Nganjuk'),
('3519', '35', 'Kabupaten Madiun'),
('3520', '35', 'Kabupaten Magetan'),
('3521', '35', 'Kabupaten Ngawi'),
('3522', '35', 'Kabupaten Bojonegoro'),
('3523', '35', 'Kabupaten Tuban'),
('3524', '35', 'Kabupaten Lamongan'),
('3525', '35', 'Kabupaten Gresik'),
('3526', '35', 'Kabupaten Bangkalan'),
('3527', '35', 'Kabupaten Sampang'),
('3528', '35', 'Kabupaten Pamekasan'),
('3529', '35', 'Kabupaten Sumenep'),
('3571', '35', 'Kota Kediri'),
('3572', '35', 'Kota Blitar'),
('3573', '35', 'Kota Malang'),
('3574', '35', 'Kota Probolinggo'),
('3575', '35', 'Kota Pasuruan'),
('3576', '35', 'Kota Mojokerto'),
('3577', '35', 'Kota Madiun'),
('3578', '35', 'Kota Surabaya'),
('3579', '35', 'Kota Batu'),
('3601', '36', 'Kabupaten Pandeglang'),
('3602', '36', 'Kabupaten Lebak'),
('3603', '36', 'Kabupaten Tangerang'),
('3604', '36', 'Kabupaten Serang'),
('3671', '36', 'Kota Tangerang'),
('3672', '36', 'Kota Cilegon'),
('3673', '36', 'Kota Serang'),
('3674', '36', 'Kota Tangerang Selatan'),
('5101', '51', 'Kabupaten Jembrana'),
('5102', '51', 'Kabupaten Tabanan'),
('5103', '51', 'Kabupaten Badung'),
('5104', '51', 'Kabupaten Gianyar'),
('5105', '51', 'Kabupaten Klungkung'),
('5106', '51', 'Kabupaten Bangli'),
('5107', '51', 'Kabupaten Karang Asem'),
('5108', '51', 'Kabupaten Buleleng'),
('5171', '51', 'Kota Denpasar'),
('5201', '52', 'Kabupaten Lombok Barat'),
('5202', '52', 'Kabupaten Lombok Tengah'),
('5203', '52', 'Kabupaten Lombok Timur'),
('5204', '52', 'Kabupaten Sumbawa'),
('5205', '52', 'Kabupaten Dompu'),
('5206', '52', 'Kabupaten Bima'),
('5207', '52', 'Kabupaten Sumbawa Barat'),
('5208', '52', 'Kabupaten Lombok Utara'),
('5271', '52', 'Kota Mataram'),
('5272', '52', 'Kota Bima'),
('5301', '53', 'Kabupaten Sumba Barat'),
('5302', '53', 'Kabupaten Sumba Timur'),
('5303', '53', 'Kabupaten Kupang'),
('5304', '53', 'Kabupaten Timor Tengah Selatan'),
('5305', '53', 'Kabupaten Timor Tengah Utara'),
('5306', '53', 'Kabupaten Belu'),
('5307', '53', 'Kabupaten Alor'),
('5308', '53', 'Kabupaten Lembata'),
('5309', '53', 'Kabupaten Flores Timur'),
('5310', '53', 'Kabupaten Sikka'),
('5311', '53', 'Kabupaten Ende'),
('5312', '53', 'Kabupaten Ngada'),
('5313', '53', 'Kabupaten Manggarai'),
('5314', '53', 'Kabupaten Rote Ndao'),
('5315', '53', 'Kabupaten Manggarai Barat'),
('5316', '53', 'Kabupaten Sumba Tengah'),
('5317', '53', 'Kabupaten Sumba Barat Daya'),
('5318', '53', 'Kabupaten Nagekeo'),
('5319', '53', 'Kabupaten Manggarai Timur'),
('5320', '53', 'Kabupaten Sabu Raijua'),
('5321', '53', 'Kabupaten Malaka'),
('5371', '53', 'Kota Kupang'),
('6101', '61', 'Kabupaten Sambas'),
('6102', '61', 'Kabupaten Bengkayang'),
('6103', '61', 'Kabupaten Landak'),
('6104', '61', 'Kabupaten Mempawah'),
('6105', '61', 'Kabupaten Sanggau'),
('6106', '61', 'Kabupaten Ketapang'),
('6107', '61', 'Kabupaten Sintang'),
('6108', '61', 'Kabupaten Kapuas Hulu'),
('6109', '61', 'Kabupaten Sekadau'),
('6110', '61', 'Kabupaten Melawi'),
('6111', '61', 'Kabupaten Kayong Utara'),
('6112', '61', 'Kabupaten Kubu Raya'),
('6171', '61', 'Kota Pontianak'),
('6172', '61', 'Kota Singkawang'),
('6201', '62', 'Kabupaten Kotawaringin Barat'),
('6202', '62', 'Kabupaten Kotawaringin Timur'),
('6203', '62', 'Kabupaten Kapuas'),
('6204', '62', 'Kabupaten Barito Selatan'),
('6205', '62', 'Kabupaten Barito Utara'),
('6206', '62', 'Kabupaten Sukamara'),
('6207', '62', 'Kabupaten Lamandau'),
('6208', '62', 'Kabupaten Seruyan'),
('6209', '62', 'Kabupaten Katingan'),
('6210', '62', 'Kabupaten Pulang Pisau'),
('6211', '62', 'Kabupaten Gunung Mas'),
('6212', '62', 'Kabupaten Barito Timur'),
('6213', '62', 'Kabupaten Murung Raya'),
('6271', '62', 'Kota Palangka Raya'),
('6301', '63', 'Kabupaten Tanah Laut'),
('6302', '63', 'Kabupaten Kota Baru'),
('6303', '63', 'Kabupaten Banjar'),
('6304', '63', 'Kabupaten Barito Kuala'),
('6305', '63', 'Kabupaten Tapin'),
('6306', '63', 'Kabupaten Hulu Sungai Selatan'),
('6307', '63', 'Kabupaten Hulu Sungai Tengah'),
('6308', '63', 'Kabupaten Hulu Sungai Utara'),
('6309', '63', 'Kabupaten Tabalong'),
('6310', '63', 'Kabupaten Tanah Bumbu'),
('6311', '63', 'Kabupaten Balangan'),
('6371', '63', 'Kota Banjarmasin'),
('6372', '63', 'Kota Banjar Baru'),
('6401', '64', 'Kabupaten Paser'),
('6402', '64', 'Kabupaten Kutai Barat'),
('6403', '64', 'Kabupaten Kutai Kartanegara'),
('6404', '64', 'Kabupaten Kutai Timur'),
('6405', '64', 'Kabupaten Berau'),
('6409', '64', 'Kabupaten Penajam Paser Utara'),
('6411', '64', 'Kabupaten Mahakam Hulu'),
('6471', '64', 'Kota Balikpapan'),
('6472', '64', 'Kota Samarinda'),
('6474', '64', 'Kota Bontang'),
('6501', '65', 'Kabupaten Malinau'),
('6502', '65', 'Kabupaten Bulungan'),
('6503', '65', 'Kabupaten Tana Tidung'),
('6504', '65', 'Kabupaten Nunukan'),
('6571', '65', 'Kota Tarakan'),
('7101', '71', 'Kabupaten Bolaang Mongondow'),
('7102', '71', 'Kabupaten Minahasa'),
('7103', '71', 'Kabupaten Kepulauan Sangihe'),
('7104', '71', 'Kabupaten Kepulauan Talaud'),
('7105', '71', 'Kabupaten Minahasa Selatan'),
('7106', '71', 'Kabupaten Minahasa Utara'),
('7107', '71', 'Kabupaten Bolaang Mongondow Utara'),
('7108', '71', 'Kabupaten Siau Tagulandang Biaro'),
('7109', '71', 'Kabupaten Minahasa Tenggara'),
('7110', '71', 'Kabupaten Bolaang Mongondow Selatan'),
('7111', '71', 'Kabupaten Bolaang Mongondow Timur'),
('7171', '71', 'Kota Manado'),
('7172', '71', 'Kota Bitung'),
('7173', '71', 'Kota Tomohon'),
('7174', '71', 'Kota Kotamobagu'),
('7201', '72', 'Kabupaten Banggai Kepulauan'),
('7202', '72', 'Kabupaten Banggai'),
('7203', '72', 'Kabupaten Morowali'),
('7204', '72', 'Kabupaten Poso'),
('7205', '72', 'Kabupaten Donggala'),
('7206', '72', 'Kabupaten Toli-Toli'),
('7207', '72', 'Kabupaten Buol'),
('7208', '72', 'Kabupaten Parigi Moutong'),
('7209', '72', 'Kabupaten Tojo Una-Una'),
('7210', '72', 'Kabupaten Sigi'),
('7211', '72', 'Kabupaten Banggai Laut'),
('7212', '72', 'Kabupaten Morowali Utara'),
('7271', '72', 'Kota Palu'),
('7301', '73', 'Kabupaten Kepulauan Selayar'),
('7302', '73', 'Kabupaten Bulukumba'),
('7303', '73', 'Kabupaten Bantaeng'),
('7304', '73', 'Kabupaten Jeneponto'),
('7305', '73', 'Kabupaten Takalar'),
('7306', '73', 'Kabupaten Gowa'),
('7307', '73', 'Kabupaten Sinjai'),
('7308', '73', 'Kabupaten Maros'),
('7309', '73', 'Kabupaten Pangkajene Dan Kepulauan'),
('7310', '73', 'Kabupaten Barru'),
('7311', '73', 'Kabupaten Bone'),
('7312', '73', 'Kabupaten Soppeng'),
('7313', '73', 'Kabupaten Wajo'),
('7314', '73', 'Kabupaten Sidenreng Rappang'),
('7315', '73', 'Kabupaten Pinrang'),
('7316', '73', 'Kabupaten Enrekang'),
('7317', '73', 'Kabupaten Luwu'),
('7318', '73', 'Kabupaten Tana Toraja'),
('7322', '73', 'Kabupaten Luwu Utara'),
('7325', '73', 'Kabupaten Luwu Timur'),
('7326', '73', 'Kabupaten Toraja Utara'),
('7371', '73', 'Kota Makassar'),
('7372', '73', 'Kota Parepare'),
('7373', '73', 'Kota Palopo'),
('7401', '74', 'Kabupaten Buton'),
('7402', '74', 'Kabupaten Muna'),
('7403', '74', 'Kabupaten Konawe'),
('7404', '74', 'Kabupaten Kolaka'),
('7405', '74', 'Kabupaten Konawe Selatan'),
('7406', '74', 'Kabupaten Bombana'),
('7407', '74', 'Kabupaten Wakatobi'),
('7408', '74', 'Kabupaten Kolaka Utara'),
('7409', '74', 'Kabupaten Buton Utara'),
('7410', '74', 'Kabupaten Konawe Utara'),
('7411', '74', 'Kabupaten Kolaka Timur'),
('7412', '74', 'Kabupaten Konawe Kepulauan'),
('7413', '74', 'Kabupaten Muna Barat'),
('7414', '74', 'Kabupaten Buton Tengah'),
('7415', '74', 'Kabupaten Buton Selatan'),
('7471', '74', 'Kota Kendari'),
('7472', '74', 'Kota Baubau'),
('7501', '75', 'Kabupaten Boalemo'),
('7502', '75', 'Kabupaten Gorontalo'),
('7503', '75', 'Kabupaten Pohuwato'),
('7504', '75', 'Kabupaten Bone Bolango'),
('7505', '75', 'Kabupaten Gorontalo Utara'),
('7571', '75', 'Kota Gorontalo'),
('7601', '76', 'Kabupaten Majene'),
('7602', '76', 'Kabupaten Polewali Mandar'),
('7603', '76', 'Kabupaten Mamasa'),
('7604', '76', 'Kabupaten Mamuju'),
('7605', '76', 'Kabupaten Mamuju Utara'),
('7606', '76', 'Kabupaten Mamuju Tengah'),
('8101', '81', 'Kabupaten Maluku Tenggara Barat'),
('8102', '81', 'Kabupaten Maluku Tenggara'),
('8103', '81', 'Kabupaten Maluku Tengah'),
('8104', '81', 'Kabupaten Buru'),
('8105', '81', 'Kabupaten Kepulauan Aru'),
('8106', '81', 'Kabupaten Seram Bagian Barat'),
('8107', '81', 'Kabupaten Seram Bagian Timur'),
('8108', '81', 'Kabupaten Maluku Barat Daya'),
('8109', '81', 'Kabupaten Buru Selatan'),
('8171', '81', 'Kota Ambon'),
('8172', '81', 'Kota Tual'),
('8201', '82', 'Kabupaten Halmahera Barat'),
('8202', '82', 'Kabupaten Halmahera Tengah'),
('8203', '82', 'Kabupaten Kepulauan Sula'),
('8204', '82', 'Kabupaten Halmahera Selatan'),
('8205', '82', 'Kabupaten Halmahera Utara'),
('8206', '82', 'Kabupaten Halmahera Timur'),
('8207', '82', 'Kabupaten Pulau Morotai'),
('8208', '82', 'Kabupaten Pulau Taliabu'),
('8271', '82', 'Kota Ternate'),
('8272', '82', 'Kota Tidore Kepulauan'),
('9101', '91', 'Kabupaten Fakfak'),
('9102', '91', 'Kabupaten Kaimana'),
('9103', '91', 'Kabupaten Teluk Wondama'),
('9104', '91', 'Kabupaten Teluk Bintuni'),
('9105', '91', 'Kabupaten Manokwari'),
('9106', '91', 'Kabupaten Sorong Selatan'),
('9107', '91', 'Kabupaten Sorong'),
('9108', '91', 'Kabupaten Raja Ampat'),
('9109', '91', 'Kabupaten Tambrauw'),
('9110', '91', 'Kabupaten Maybrat'),
('9111', '91', 'Kabupaten Manokwari Selatan'),
('9112', '91', 'Kabupaten Pegunungan Arfak'),
('9171', '91', 'Kota Sorong'),
('9401', '94', 'Kabupaten Merauke'),
('9402', '94', 'Kabupaten Jayawijaya'),
('9403', '94', 'Kabupaten Jayapura'),
('9404', '94', 'Kabupaten Nabire'),
('9408', '94', 'Kabupaten Kepulauan Yapen'),
('9409', '94', 'Kabupaten Biak Numfor'),
('9410', '94', 'Kabupaten Paniai'),
('9411', '94', 'Kabupaten Puncak Jaya'),
('9412', '94', 'Kabupaten Mimika'),
('9413', '94', 'Kabupaten Boven Digoel'),
('9414', '94', 'Kabupaten Mappi'),
('9415', '94', 'Kabupaten Asmat'),
('9416', '94', 'Kabupaten Yahukimo'),
('9417', '94', 'Kabupaten Pegunungan Bintang'),
('9418', '94', 'Kabupaten Tolikara'),
('9419', '94', 'Kabupaten Sarmi'),
('9420', '94', 'Kabupaten Keerom'),
('9426', '94', 'Kabupaten Waropen'),
('9427', '94', 'Kabupaten Supiori'),
('9428', '94', 'Kabupaten Mamberamo Raya'),
('9429', '94', 'Kabupaten Nduga'),
('9430', '94', 'Kabupaten Lanny Jaya'),
('9431', '94', 'Kabupaten Mamberamo Tengah'),
('9432', '94', 'Kabupaten Yalimo'),
('9433', '94', 'Kabupaten Puncak'),
('9434', '94', 'Kabupaten Dogiyai'),
('9435', '94', 'Kabupaten Intan Jaya'),
('9436', '94', 'Kabupaten Deiyai'),
('9471', '94', 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_keahlian`
--

CREATE TABLE `kategori_keahlian` (
  `id_kategori` varchar(8) NOT NULL,
  `nama_kategori_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_keahlian`
--

INSERT INTO `kategori_keahlian` (`id_kategori`, `nama_kategori_keahlian`) VALUES
('1', 'Websites, IT & Software'),
('2', 'Mobile Phone & Computing'),
('3', 'Design, Media & Architecture'),
('4', 'Data Entry & Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` varchar(10) NOT NULL,
  `id_kategori` varchar(8) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `id_kategori`, `id_user`) VALUES
('', '1', '1'),
('', '2', '1'),
('', '3', '1'),
('', '2', '1'),
('', '3', '1'),
('', '4', '1');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_keahlian`
--

CREATE TABLE `list_keahlian` (
  `id_list_keahlian` varchar(8) NOT NULL,
  `nama_keahlian` varchar(30) NOT NULL,
  `id_kategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_keahlian`
--

INSERT INTO `list_keahlian` (`id_list_keahlian`, `nama_keahlian`, `id_kategori`) VALUES
('1', 'Frontend', '1'),
('2', 'Backend', '1'),
('3', 'ui design', '2'),
('4', 'architecture', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_user` varchar(10) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `gender_member` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `phone_member` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_kel` char(10) NOT NULL,
  `id_kec` char(7) NOT NULL,
  `id_kab` char(4) NOT NULL,
  `id_prov` char(2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi_member` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_user`, `nama_member`, `gender_member`, `tempat_lahir`, `tanggal_lahir`, `phone_member`, `alamat`, `id_kel`, `id_kec`, `id_kab`, `id_prov`, `foto`, `deskripsi_member`, `created_at`, `modified_at`) VALUES
('1', 'Ahmad Ardiyanto', 'Laki-laki', 'Magelang', '1996-12-22', '087834284756', '     Dusun Macanan RT 01/ RW 01     ', '', '3214081', '3214', '32', '', 'Aku hanyalah bukan adalah', '2019-04-14 13:14:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_univ` varchar(5) NOT NULL,
  `gelar` varchar(5) NOT NULL,
  `id_program_studi` varchar(5) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id_pengalaman` varchar(10) NOT NULL,
  `jabatan_kerja` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `lokasi` char(2) NOT NULL,
  `bulan_mulai` int(2) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `bulan_selesai` int(2) NOT NULL,
  `tahun_selesai` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_user` varchar(10) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `website_perusahaan` varchar(40) NOT NULL,
  `id_industri` int(3) NOT NULL,
  `ukuran_perusahaan` int(3) NOT NULL,
  `id_jenis_perusahaan` varchar(5) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `id_kel` char(10) NOT NULL,
  `id_kec` char(7) NOT NULL,
  `id_kab` char(4) NOT NULL,
  `id_prov` char(2) NOT NULL,
  `logo_perusahaan` varchar(255) NOT NULL,
  `tagline` text NOT NULL,
  `deskripsi_perusahaan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id_portofolio` varchar(13) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `id_user`, `judul`, `deskripsi`, `foto`, `created_at`, `modified_at`) VALUES
('PRT1903280', '1', 'Ini Judul', 'dfsfds', '5c9c54eda63cb.jpg', '2019-03-28 05:00:29', NULL),
('PRT1903280001', '1', 'fike2', 'revisi', '5c9f94acf2107.png', '2019-03-28 05:02:00', NULL),
('PRT1904050001', '1', 'baru', 'ini', '5ca72670b0da2.png', '2019-04-05 09:57:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program_studi` varchar(5) NOT NULL,
  `nama_program_studi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `nama_prov` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_prov`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'Dki Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Di Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('94', 'Papua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id_universitas` varchar(5) NOT NULL,
  `nama_universitas` varchar(50) NOT NULL,
  `lokasi_universitas` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `code`, `active`) VALUES
(64, 'Erizta', 'Alifa', 'eriztaalifad@gmail.com', '009900', 'wNCBtvgcOR2o', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `regencies_province_id_index` (`id_prov`);

--
-- Indexes for table `kategori_keahlian`
--
ALTER TABLE `kategori_keahlian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `districts_id_index` (`id_kab`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`),
  ADD KEY `villages_district_id_index` (`id_kec`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_portofolio`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
