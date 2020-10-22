-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2020 pada 06.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode` varchar(7) NOT NULL,
  `kategori` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `khasiat` text DEFAULT NULL,
  `efek` text DEFAULT NULL,
  `garansi` int(11) DEFAULT NULL,
  `merk` varchar(25) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode`, `kategori`, `supplier`, `nama`, `satuan`, `khasiat`, `efek`, `garansi`, `merk`, `harga`, `updated_at`, `created_at`) VALUES
(1, 'AM79334', 1, 1, 'Amoxicilin Kap Supramox', 'Box', 'Antibiotik,saluran nafas', 'alergi', 30, 'Supramox', 237600, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(2, 'AM14767', 1, 4, 'Amoxicilin Kap Opimox', 'Box', 'Antibiotik', 'alergi', 30, 'Opimox', 283500, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(3, 'AM69025', 1, 1, 'Amoxcilin Sir Supramox', 'Botol', 'Antibiotik', 'alergi', 30, 'Supramox', 21000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(4, 'AM57494', 1, 4, 'Amoxcilin Sir Opimox', 'Botol', 'Antibiotik', 'alergi', 30, 'Opimox', 19800, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(5, 'AM62471', 1, 1, 'Amoxcilin Drop Supramox', 'Botol', 'Antibiotik', 'alergi', 30, 'Supramox', 21000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(6, 'CI62969', 1, 2, 'Ciprofoxacin Tab Floxside', 'Box', 'Antibiotik', 'alergi', 30, 'Floxside', 272520, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(7, 'CI64717', 1, 1, 'Ciprofoxacin Tab Mensifox', 'Box', 'Antibiotik', 'alergi', 30, 'Mensifox', 371250, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(8, 'CE64265', 1, 2, 'Cefadroxil Kap Vroxil', 'Box', 'Antibiotik', 'alergi', 30, 'Vroxil', 307980, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(9, 'CE24204', 1, 7, 'Cefadroxil Kap Widoxil ', 'Box', 'Antibiotik', 'alergi', 30, 'Widoxil', 9918, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(10, 'CE65305', 1, 4, 'Cefadroxil Sir Opicef', 'Botol', 'Antibiotik', 'alergi', 30, 'Opicef', 40500, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(11, 'CE57564', 1, 7, 'Cefadroxil Sir Widoxil', 'Botol', 'Antibiotik', 'alergi', 30, 'Widoxil', 44000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(12, 'CE89674', 1, 1, 'Cefixime Kap Maxpro', 'Box', 'Antibiotik', 'alergi', 30, 'Maxpro', 281330, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(13, 'CE33663', 1, 3, 'Cefixime Kap Nucef', 'Box', 'Antibiotik', 'alergi', 30, 'Nucef', 54800, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(14, 'CE93423', 1, 7, 'Cefixime Kap Inbacef', 'Box', 'Antibiotik', 'alergi', 30, 'Inbacef', 510000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(15, 'CE14406', 1, 11, 'Cefixime sir Simfix', 'Botol', 'Antibiotik', 'alergi', 30, 'Simfix', 70400, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(16, 'CE27384', 1, 7, 'Cefixime Sir Inbacef', 'Botol', 'Antibiotik', 'alergi', 30, 'Inbacef', 82500, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(17, 'CE38601', 1, 2, 'Ceftriaxone Vial Foricef', 'Box', 'Antibiotik', 'alergi', 30, 'Foricef', 273493, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(18, 'CE84054', 1, 12, 'Ceftriaxone Vial Cexfon', 'Box', 'Antibiotik', 'alergi', 30, 'Cexfon', 110000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(19, 'CE62797', 1, 7, 'Cefotaxime  Vial Cefofion', 'Box', 'Antibiotik', 'alergi', 30, 'Cefofion', 135850, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(20, 'CE41621', 1, 12, 'Cefotaxime Vial Lapixime', 'Box', 'Antibiotik', 'alergi', 30, 'Lapixime', 300000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(21, 'TH74750', 1, 1, 'Thiamphenicol Kap Nikolam', 'Box', 'Antibiotik', 'alergi', 30, 'Nikolam', 42000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(22, 'TH62334', 1, 3, 'Thiamphenicol Kap Genicol', 'Box', 'Antibiotik', 'alergi', 30, 'Genicol', 32500, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(23, 'TH48026', 1, 1, 'Thiamphenicol Sir Nikolam', 'Botol', 'Antibiotik', 'alergi', 30, 'Nikolam', 24, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(24, 'ME68664', 1, 4, 'Metronidazole Tab Trogyl', 'Box', 'Antibiotik', 'alergi', 30, 'Trogyl', 55540, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(25, 'ME29069', 1, 7, 'Metronidazole Inf Fiondazole', 'Box', 'Antibiotik', 'alergi', 30, 'Fiondazole', 75900, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(26, 'ME88353', 1, 2, 'Metronidazole Sir Progyl', 'Botol', 'Antibiotik', 'alergi', 30, 'Progyl', 23100, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(27, 'ME62144', 1, 4, 'Metronidazole Sir Trogyl', 'Botol', 'Antibiotik', 'alergi', 30, 'Trogyl', 34200, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(28, 'AM41686', 1, 1, 'Amoxcilin Clavulanat Kap Ancla', 'Box', 'Antibiotik', 'alergi', 30, 'Ancla', 150000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(29, 'AM79291', 1, 1, 'Amoxcilin Clavulanat Sir Ancla', 'Botol', 'Antibiotik', 'alergi', 30, 'Ancla', 97846, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(30, 'LE36792', 1, 1, 'Levofloxacin Tab Prolevox', 'Box', 'Antibiotik', 'alergi', 30, 'Prolevox', 290950, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(31, 'LE75586', 1, 9, 'Levofloxacin Tab Voxatic', 'Box', 'Antibiotik', 'alergi', 30, 'Voxatic', 36000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(32, 'LE33536', 1, 7, 'Levofloxacin inf Evofion', 'Box', 'Antibiotik', 'alergi', 30, 'Evofion', 144210, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(33, 'CL38899', 1, 1, 'Clindamicin Kap Clinjoss', 'Box', 'Antibiotik', 'alergi', 30, 'Clinjoss', 166286, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(34, 'PA17074', 2, 1, 'Paracetamol Tab Pyrexin', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Pyrexin', 70000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(35, 'PA35212', 2, 9, 'Paracetamol Sir Paraco', 'Botol', 'Analgetik,Antipreutik', 'alergi', 30, 'Paraco', 31200, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(36, 'PA99077', 2, 4, 'Paracetamol Drop Otopain', 'Botol', 'Analgetik,Antipreutik', 'alergi', 30, 'Otopain', 75000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(37, 'PA92293', 2, 7, 'Paracetamol inf Fioramol', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Fioramol', 57500, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(38, 'IB41235', 2, 2, 'Ibu profen Tab Fenatic', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Fenatic', 10000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(39, 'IB26782', 2, 2, 'Ibu profen Sir Fenatic ', 'Botol', 'Analgetik,Antipreutik', 'alergi', 30, 'Fenatic', 10000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(40, 'ME58531', 2, 1, 'Metamizole Amp Norages', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Norages', 41400, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(41, 'NA49576', 2, 2, 'Natrium Diclofenac Tab Volten', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Volten', 46750, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(42, 'PO94405', 2, 3, 'Potasium Diklofenac Tab Exaflam', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Exaflam', 4000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(43, 'DE29980', 2, 6, 'Dexketoprofen Tab Keren', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Keren', 8851, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(44, 'DE95572', 2, 11, 'Dexketoprofen Tab simprofen', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Simprofen', 60000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(45, 'DE98072', 2, 6, 'Dexketoprofen inj Keren', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Keren', 10000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(46, 'DE70880', 2, 12, 'Dexketoprofen inj Topedex', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Topedex', 85000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(47, 'KE25247', 2, 12, 'Ketorolac inj Lactopain', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Lactopain', 46000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(48, 'KE97865', 2, 7, 'Ketorolac inj Etofion', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Etofion', 39880, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(49, 'TR96993', 2, 6, 'Tramadol Tab Tracedol', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Tracedol', 35000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(50, 'TR37639', 2, 2, 'Tramadol Tab Dolaltram', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Dolaltram', 40000, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(51, 'ME15000', 2, 2, 'Meloxicam Tab Arimed', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Arimed', 9993, '2020-10-21 11:22:29', '0000-00-00 00:00:00'),
(52, 'BE42217', 2, 3, 'Betahistine Tab Rotaver', 'Box', 'Analgetik,Antipreutik', 'alergi', 30, 'Rotaver', 3442, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(53, 'AS47268', 3, 1, 'Asam mefenamat Tab Mefix', 'Box', 'Saluran cerna', 'alergi', 30, 'Mefix', 95000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(54, 'AS40843', 3, 11, 'Asam mefenamat Tab Maxtan', 'Box', 'Saluran cerna', 'alergi', 30, 'Maxtan', 22900, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(55, 'LA45844', 3, 2, 'Lansoprazole Kap Lagas', 'Box', 'Saluran cerna', 'alergi', 30, 'Lagas', 12700, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(56, 'LA76701', 3, 6, 'Lansoprazole Kap Nuxole', 'Box', 'Saluran cerna', 'alergi', 30, 'Nuxole', 22000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(57, 'AN67981', 3, 3, 'Antasida Tab Stromag', 'Box', 'Saluran cerna', 'alergi', 30, 'Stromag', 13375, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(58, 'AN22273', 3, 1, 'Antasida Sir Gastrinal', 'Botol', 'Saluran cerna', 'alergi', 30, 'Gastrinal', 34840, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(59, 'RA94367', 3, 2, 'Ranitidin Tab Fordin', 'Box', 'Saluran cerna', 'alergi', 30, 'Fordin', 39848, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(60, 'RA76180', 3, 2, 'Ranitidin inj Fordin', 'Box', 'Saluran cerna', 'alergi', 30, 'Fordin', 39848, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(61, 'SU10138', 3, 1, 'Sucralfat Sir Mucifat', 'Botol', 'Saluran cerna', 'alergi', 30, 'Mucifat', 64751, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(62, 'SU21743', 3, 3, 'Sucralfat Sir Nucral', 'Botol', 'Saluran cerna', 'alergi', 30, 'Nucral', 74540, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(63, 'ME71168', 3, 1, 'Metocoplamide Tab Gastival', 'Box', 'Saluran cerna', 'alergi', 30, 'Gastival', 62800, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(64, 'ME32556', 3, 1, 'Metocoplamide inj Gastival', 'Box', 'Saluran cerna', 'alergi', 30, 'Gastival', 64000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(65, 'ON71473', 3, 3, 'Ondancetron Sir Ondane', 'Botol', 'Saluran cerna', 'alergi', 30, 'Ondane', 45000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(66, 'ON80248', 3, 3, 'Ondancetron inj Ondane', 'Box', 'Saluran cerna', 'alergi', 30, 'Ondane', 47150, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(67, 'ON73803', 3, 2, 'Ondancentron inj Mefoz', 'Box', 'Saluran cerna', 'alergi', 30, 'Mefoz', 55000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(68, 'LA45570', 3, 4, 'Lactulosa Sir Opilac', 'Botol', 'Saluran cerna', 'alergi', 30, 'Opilac', 60000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(69, 'LA92997', 3, 12, 'Lactulosa Sach L-Bio', 'Box', 'Saluran cerna', 'alergi', 30, 'L-Bio', 11000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(70, 'LA49345', 3, 12, 'Lactulosa Kap L-Bio', 'Box', 'Saluran cerna', 'alergi', 30, 'L-Bio', 11000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(71, 'PA87306', 3, 2, 'Pantoprazole inj Propanzole', 'Box', 'Saluran cerna', 'alergi', 30, 'Propanzole', 27000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(72, 'PA74499', 3, 7, 'Pantoprazole inj Fiopzral', 'Box', 'Saluran cerna', 'alergi', 30, 'Fiopzral', 24000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(73, 'AT13961', 3, 1, 'Attapulgit Pectin Tab Arcapec', 'Box', 'Saluran cerna', 'alergi', 30, 'Arcapec', 15500, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(74, 'AT67695', 3, 1, 'Attapulgit Pectin Sir Arcapec', 'Botol', 'Saluran cerna', 'alergi', 30, 'Arcapec', 18000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(75, 'LO71861', 3, 1, 'Loperamid Tab Loremid', 'Box', 'Saluran cerna', 'alergi', 30, 'Loremid', 23000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(76, 'DE26415', 4, 1, 'Dexametasone Tab Prodexon', 'Box', 'Kostikosteroid', 'alergi', 30, 'Proxedon', 50000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(77, 'ME38601', 4, 2, 'Metylprednisolon Tab prolon', 'Box', 'Kostikosteroid', 'alergi', 30, 'Prolon', 82800, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(78, 'ME33212', 4, 4, 'Metylprednisolon Tab Prednicort', 'Box', 'Kostikosteroid', 'alergi', 30, 'Prednicort', 12000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(79, 'ME94233', 4, 4, 'Metylprednisolon inj Prednicort', 'Box', 'Kostikosteroid', 'alergi', 30, 'Prednicort', 15000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(80, 'ME29951', 4, 12, 'Metylprednisolon inj Lameson', 'Box', 'Kostikosteroid', 'alergi', 30, 'Lameson', 75000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(81, 'BE34959', 4, 1, 'Betamethasone Tab Proceles', 'Box', 'Kostikosteroid', 'alergi', 30, 'Proceles', 74250, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(82, 'BE12898', 4, 6, 'Betamethasone Tab BDM', 'Box', 'Kostikosteroid', 'alergi', 30, 'BDM', 114400, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(83, 'BE36591', 4, 1, 'Betamethasone Sir Proceles', 'Botol', 'Kostikosteroid', 'alergi', 30, 'Proceles', 60000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(84, 'BE94012', 4, 6, 'Betamethasone Sir BDM', 'Botol', 'Kostikosteroid', 'alergi', 30, 'BDM', 32500, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(85, 'GL25203', 6, 3, 'Glimepride tab Glamarol', 'Box', 'Saluran Nafas', 'alergi', 30, 'Glamarol', 155000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(86, 'PR29198', 6, 12, 'Preparasion Sir Lacoldin', 'Botol', 'Saluran Nafas', 'alergi', 30, 'Lacoldin', 36000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(87, 'TR98783', 6, 1, 'Tripnolidine Tab Eflin', 'Box', 'Saluran Nafas', 'alergi', 30, 'Eflin', 137500, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(88, 'AM55447', 6, 2, 'Ambroxol Tab Profect', 'Box', 'Saluran Nafas', 'alergi', 30, 'Profect', 16000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(89, 'AM76232', 6, 1, 'Ambroxol Tab Mucos', 'Box', 'Saluran Nafas', 'alergi', 30, 'Mucos', 67500, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(90, 'AM85590', 6, 1, 'Ambroxol sir Mucos', 'Botol', 'Saluran Nafas', 'alergi', 30, 'Mucos', 25000, '2020-10-21 13:43:36', '0000-00-00 00:00:00'),
(91, 'AM97082', 6, 2, 'Ambroxol Sir Profect', 'Botol', 'Saluran Nafas', 'alergi', 30, 'Profect', 14000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(92, 'ER30566', 6, 1, 'Erdostein Sir Dosivec', 'Botol', 'Saluran Nafas', 'alergi', 30, 'Dosivec', 71800, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(93, 'TE57921', 6, 3, 'Terbutalin Tab Suprasma', 'Box', 'Saluran Nafas', 'alergi', 30, 'Suprasma', 44000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(94, 'TE99999', 6, 1, 'Terbutalin Tab Tabas', 'Box', 'Saluran Nafas', 'alergi', 30, 'Tabas', 105000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(95, 'SA16097', 6, 12, 'Salbutamol Sir Lasal', 'Botol', 'Saluran Nafas', 'alergi', 30, 'Lasal', 50000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(96, 'CI91703', 6, 6, 'Cinarizina Tab Goron', 'Box', 'Saluran Nafas', 'alergi', 30, 'Goron', 250000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(97, 'LU54125', 13, 6, 'Lutein Tab Coxafit', 'Box', 'Multivitamin', 'alergi', 30, 'Coxafit', 35000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(98, 'ZI89299', 13, 10, 'Zinc Tab Provital', 'Box', 'Multivitamin', 'alergi', 30, 'Provital', 248000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(99, 'ZI90490', 13, 10, 'Zinc Tab lycoxi', 'Box', 'Multivitamin', 'alergi', 30, 'Lycoxi', 145000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(100, 'EC85113', 13, 1, 'Echinachea Tab Proimbus', 'Box', 'Multivitamin', 'alergi', 30, 'Proimbus', 155010, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(101, 'EC21252', 13, 12, 'Echinachea Tab Imunos', 'Box', 'Multivitamin', 'alergi', 30, 'Imunos', 37400, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(102, 'EC66884', 13, 2, 'Echinachea Sir Ezygar', 'Botol', 'Multivitamin', 'alergi', 30, 'Ezygar', 48510, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(103, 'EC13327', 13, 3, 'Echinachea Sir Nufit', 'Botol', 'Multivitamin', 'alergi', 30, 'Nufit', 58000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(104, 'MA69614', 13, 11, 'Materna Tab HB-Vit', 'Box', 'Multivitamin', 'alergi', 30, 'HB-Vit', 100000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(105, 'MA73634', 13, 1, 'Materna Tab Procalma', 'Box', 'Multivitamin', 'alergi', 30, 'Procalma', 125400, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(106, 'IR25033', 13, 1, 'Iron Tab Maltiron', 'Box', 'Multivitamin', 'alergi', 30, 'Maltiron', 200000, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(107, 'IR18485', 13, 3, 'Iron Tab Ironil', 'Box', 'Multivitamin', 'alergi', 30, 'Ironil', 237600, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(108, 'CU13310', 13, 11, 'Curcuma Sir Apecur', 'Botol', 'Multivitamin,suplemen', 'alergi', 30, 'Apecur', 50562, '2020-10-21 11:22:30', '0000-00-00 00:00:00'),
(109, 'CU60098', 13, 2, 'Curcuma Sir Prolisin', 'Botol', 'Multivitamin,suplemen', 'alergi', 30, 'Prolisin', 25000, '2020-10-21 11:22:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Antibiotik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Analgetik, Antipreutik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Saluran Cerna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Kostikosteroid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Antidiabetik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Saluran Nafas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Antikoagulasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Anti Kolesterol', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Antipertansi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Gagal Jantung', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Hormon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Antihistamin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Multivitamin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Topical', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Wasir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Ginjal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'OAT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Saraf', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `bobot` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `bobot`, `updated_at`, `created_at`) VALUES
(2, 'C001', 'Khasiat Obat', 4, '2020-10-21 16:27:40', '2020-10-20 19:39:03'),
(3, 'C002', 'Efek Samping', 3, '2020-10-21 16:27:45', '2020-10-20 19:39:16'),
(4, 'C003', 'Garansi', 2, '2020-10-22 04:31:55', '2020-10-20 19:39:53'),
(5, 'C004', 'Merk Obat', 2, '2020-10-21 16:28:11', '2020-10-20 19:40:03'),
(6, 'C005', 'Harga', 5, '2020-10-21 16:27:52', '2020-10-20 19:40:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `bulan` varchar(10) NOT NULL,
  `kode` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `dokter` varchar(20) NOT NULL,
  `supplier` varchar(20) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `khasiat` int(11) DEFAULT NULL,
  `efek` int(11) DEFAULT NULL,
  `garansi` int(11) DEFAULT NULL,
  `merk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `id_alternatif`, `khasiat`, `efek`, `garansi`, `merk`, `harga`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 5, 5, 5, 2, '2020-10-22 04:32:45', '2020-10-21 12:00:18'),
(2, 2, 3, 5, 5, 5, 2, '2020-10-22 04:32:45', '2020-10-21 12:00:18'),
(3, 3, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(4, 4, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(5, 5, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(6, 6, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(7, 7, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(8, 8, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(9, 9, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(10, 10, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(11, 11, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(12, 12, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(13, 13, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(14, 14, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(15, 15, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(16, 16, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(17, 17, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(18, 18, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(19, 19, 3, 5, 5, 5, 4, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(20, 20, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(21, 21, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(22, 22, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(23, 23, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(24, 24, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(25, 25, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(26, 26, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(27, 27, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(28, 28, 3, 5, 5, 5, 3, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(29, 29, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(30, 30, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(31, 31, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(32, 32, 3, 5, 5, 5, 3, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(33, 33, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(34, 34, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(35, 35, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(36, 36, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(37, 37, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(38, 38, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(39, 39, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(40, 40, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(41, 41, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(42, 42, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(43, 43, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(44, 44, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(45, 45, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(46, 46, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(47, 47, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(48, 48, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(49, 49, 4, 5, 5, 5, 4, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(50, 50, 4, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(51, 51, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(52, 52, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(53, 53, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(54, 54, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(55, 55, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(56, 56, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(57, 57, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(58, 58, 3, 5, 5, 5, 4, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(59, 59, 3, 5, 5, 5, 3, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(60, 60, 3, 5, 5, 5, 3, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(61, 61, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(62, 62, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(63, 63, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(64, 64, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(65, 65, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(66, 66, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(67, 67, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(68, 68, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(69, 69, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(70, 70, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(71, 71, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(72, 72, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(73, 73, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(74, 74, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(75, 75, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(76, 76, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(77, 77, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(78, 78, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(79, 79, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(80, 80, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(81, 81, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(82, 82, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(83, 83, 3, 5, 5, 5, 3, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(84, 84, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(85, 85, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(86, 86, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(87, 87, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(88, 88, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(89, 89, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(90, 90, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(91, 91, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(92, 92, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(93, 93, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(94, 94, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(95, 95, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(96, 96, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(97, 97, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(98, 98, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(99, 99, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(100, 100, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(101, 101, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(102, 102, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(103, 103, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(104, 104, 3, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(105, 105, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(106, 106, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(107, 107, 3, 5, 5, 5, 2, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(108, 108, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18'),
(109, 109, 4, 5, 5, 5, 5, '2020-10-22 04:32:46', '2020-10-21 12:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `no_hp`, `updated_at`, `created_at`) VALUES
(1, 'MEPRO', 'Cinambo, Bandung', '6287812348722', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'PROMED', 'Sukabumi, Jawa Barat', '6287818178182', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'GUARDIAN', 'Citeureup, Bogor', '6285891722171', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'OTTO', 'Jakarta Selatan', '6285253456474', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'SDM', 'Senen, Jakarta', '6284293143199', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'NULAB', 'Tangerang, Banten', '6283332829923', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'INFION', 'Pasuruan, Jawa Timur', '6282372516648', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'PYRIDAM', 'Cianjur, Jawa Barat', '6281412203372', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'CORONET', 'Sidoarjo, Jawa Timur', '6280451890097', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'LANSOND', 'Cikarang, Bekasi', '6279491576821', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'SIMEX', 'Jakarta Utara', '6285145326617', '2020-10-21 13:37:50', '2020-10-21 13:37:50'),
(12, 'LAPI', 'Tangerang, Banten', '6285616221266', '2020-10-21 13:38:18', '2020-10-21 13:38:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(36) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'master', 'f74651e4e017e48be987bebfe348d965', 'master', '2020-10-20 12:42:39', '2020-10-20 12:42:39'),
(14, 'Amul', 'e67b5767c18d38b0459b5a3eb2a7d720', 'dokter', '2020-10-21 06:40:16', '2020-10-21 06:40:16'),
(15, 'Junaedi', '50bdccdd00ebcff640846a1d8f89b22b', 'admin', '2020-10-21 06:41:14', '2020-10-21 06:41:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `fk_foreign_key_kategori` (`kategori`),
  ADD KEY `fk_foreign_key_supplier` (`supplier`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_alternatif` (`id_alternatif`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `fk_foreign_key_kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `fk_foreign_key_supplier` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_foreign_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
