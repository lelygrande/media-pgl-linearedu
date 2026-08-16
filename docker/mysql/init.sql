-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2026 at 10:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mediapgl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

CREATE TABLE `bab` (
  `id` int UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text,
  `urutan` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bab`
--

INSERT INTO `bab` (`id`, `judul`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Bentuk Umum dan Pengertian Persamaan Garis Lurus', NULL, 1, '2026-03-18 02:52:10', '2026-03-18 02:52:10'),
(2, 'Gradien (Kemiringan Garis)', NULL, 2, '2026-03-18 02:52:10', '2026-03-18 02:52:10'),
(3, 'Hubungan Gradien Garis', NULL, 3, '2026-03-18 02:52:10', '2026-03-18 02:52:10'),
(4, 'Persamaan Garis Lurus', NULL, 4, '2026-03-18 02:52:10', '2026-03-18 02:52:10'),
(5, 'Evaluasi', 'Evaluasi akhir materi', 5, '2026-04-01 10:07:46', '2026-04-01 10:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$YW5dSjFERt6N.h/07e7GbO9WSVuhrjtFHrlFNLFaK0L7TJ7styqea', '2026-01-27 23:21:55', '2026-01-27 23:21:55'),
(2, 'leli', 'leli@gmail.com', '$2y$12$cCPSGVVAo0UzpGYLX3MsNOusHACyKBnz2dWwwobiQsAjgtfMrZnaK', '2026-01-27 23:26:06', '2026-01-27 23:26:06'),
(3, 'Mahalini', 'mahalini23@gmail.com', '$2y$12$4AqjTl0bsrk3QWj.4QRRRuXb81sNi1L/QyX1Re/yw0ALft/RliesG', '2026-01-28 00:46:29', '2026-01-28 00:46:29'),
(4, 'Nurleli', 'pinkbubblelily@gmail.com', '$2y$12$LRiAqqgx9u5diH/ZMxnmOeYT2aKo9rzrcPCjjZWTXUJTQq/P/.zBO', '2026-02-10 00:58:29', '2026-02-10 00:58:29'),
(5, 'Olyvia Ika Aibina', 'oline123@gmail.com', '$2y$12$UGOAspvzN08nw4PAG.5rwu1jt5gnaQBYywyJGgi8I8FwwQCA6KBae', '2026-04-01 00:39:57', '2026-04-01 00:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int UNSIGNED NOT NULL,
  `nama_kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_kelas` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `token_kelas`, `created_at`, `updated_at`) VALUES
(1, '8C', 'E1125EF2', '2026-06-21 04:22:37', '2026-06-21 04:22:37'),
(2, '8A', '858211F9', '2026-06-21 04:22:37', '2026-06-21 04:22:37'),
(3, '8B', 'FBF5C94F', '2026-06-21 04:22:37', '2026-06-21 04:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `latihan_progress`
--

CREATE TABLE `latihan_progress` (
  `id` int UNSIGNED NOT NULL,
  `student_id` int UNSIGNED NOT NULL,
  `materi_id` int UNSIGNED NOT NULL,
  `latihan_key` varchar(100) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `jawaban_json` json DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `answered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `latihan_progress`
--

INSERT INTO `latihan_progress` (`id`, `student_id`, `materi_id`, `latihan_key`, `tipe`, `jawaban_json`, `is_correct`, `answered_at`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 'subbab-a1_L2', 'input', '{\"lat2a\": \"y=4x+6\", \"lat2b\": \"2x+5y-2=0\", \"lat2c\": \"y=-3x+1\"}', 1, '2026-07-11 23:53:59', '2026-06-13 01:48:02', '2026-07-11 23:53:59'),
(2, 19, 1, 'subbab-a1_L3', 'input', '{\"lat3a\": \"2x-y-5\", \"lat3b\": \"-3x-y+4\", \"lat3c\": \"x-2y+6\"}', 1, '2026-07-11 22:49:10', '2026-06-13 01:56:42', '2026-07-11 22:49:10'),
(3, 19, 1, 'subbab-a1_L1', 'drag_drop', '{\"selectedIds\": [\"l1_2x_y_5\", \"l1_x_3y_9\", \"l1_y_min3x_1\"]}', 1, '2026-07-11 23:53:57', '2026-06-13 02:04:04', '2026-07-11 23:53:57'),
(4, 19, 1, 'subbab-a1_L4', 'input', '{\"lat4a\": \"-3x+7\", \"lat4b\": \"1/2x+2\", \"lat4c\": \"-5/2 x+3\"}', 1, '2026-07-11 22:49:15', '2026-06-13 02:09:43', '2026-07-11 22:49:15'),
(5, 19, 2, 'subbab-a2-1_L1', 'input', '{\"lat1_y1\": \"-5\", \"lat1_y2\": \"-3\", \"lat1_y3\": \"-1\", \"lat1_y4\": \"1\", \"lat1_pair1\": \"-2,-5\", \"lat1_pair2\": \"0,-3\", \"lat1_pair3\": \"2,-1\", \"lat1_pair4\": \"4,1\"}', 1, '2026-07-12 01:02:56', '2026-06-14 04:45:55', '2026-07-12 01:02:56'),
(6, 19, 2, 'subbab-a2-1_L2_TABEL', 'input', '{\"y1\": \"-3\", \"y2\": \"1\", \"y3\": \"5\", \"y4\": \"9\", \"pairs\": [{\"x\": -4, \"y\": -3, \"label\": \"A\"}, {\"x\": -2, \"y\": 1, \"label\": \"B\"}, {\"x\": 0, \"y\": 5, \"label\": \"C\"}, {\"x\": 2, \"y\": 9, \"label\": \"D\"}]}', 1, '2026-07-12 01:06:37', '2026-06-14 04:46:25', '2026-07-12 01:06:37'),
(7, 19, 2, 'subbab-a2-1_L2', 'grafik', '{\"y1\": \"-3\", \"y2\": \"1\", \"y3\": \"5\", \"y4\": \"9\", \"pairs\": [{\"x\": -4, \"y\": -3, \"label\": \"A\"}, {\"x\": -2, \"y\": 1, \"label\": \"B\"}, {\"x\": 0, \"y\": 5, \"label\": \"C\"}, {\"x\": 2, \"y\": 9, \"label\": \"D\"}], \"titikSiswa\": [{\"x\": -4, \"y\": -3, \"nama\": \"A\"}, {\"x\": -2, \"y\": 1, \"nama\": \"B\"}, {\"x\": 0, \"y\": 5, \"nama\": \"C\"}, {\"x\": 2, \"y\": 9, \"nama\": \"D\"}], \"plottingBenar\": true}', 1, '2026-06-14 22:47:59', '2026-06-14 04:46:44', '2026-06-14 22:47:59'),
(8, 19, 3, 'subbab-a2-2_L1', 'grafik', '{\"titikA\": {\"x\": -2, \"y\": 0}, \"titikB\": {\"x\": 0, \"y\": 4}, \"l1_x_value\": \"-2\", \"l1_y_value\": \"4\", \"l1_x_point_x\": \"-2\", \"l1_x_point_y\": \"0\", \"l1_y_point_x\": \"0\", \"l1_y_point_y\": \"4\", \"plottingBenar\": true}', 1, '2026-07-13 04:41:46', '2026-06-14 14:01:37', '2026-07-13 04:41:46'),
(9, 19, 3, 'subbab-a2-2_L2_ISIAN', 'input', '{\"l2_x_value\": \"8\", \"l2_y_value\": \"6\", \"l2_x_point_x\": \"8\", \"l2_x_point_y\": \"0\", \"l2_y_point_x\": \"0\", \"l2_y_point_y\": \"6\"}', 1, '2026-07-13 04:42:20', '2026-06-14 14:01:55', '2026-07-13 04:42:20'),
(10, 19, 3, 'subbab-a2-2_L2', 'grafik', '{\"titikA\": {\"x\": 0, \"y\": 6}, \"titikB\": {\"x\": 8, \"y\": 0}, \"l2_x_value\": \"8\", \"l2_y_value\": \"6\", \"l2_x_point_x\": \"8\", \"l2_x_point_y\": \"0\", \"l2_y_point_x\": \"0\", \"l2_y_point_y\": \"6\", \"plottingBenar\": true}', 1, '2026-07-13 04:42:30', '2026-06-14 14:02:08', '2026-07-13 04:42:30'),
(11, 19, 4, 'subbab-b-gradien_L1', 'drag_drop', '{\"nol\": \"nol\", \"takdef\": \"takdef\", \"negatif\": \"negatif\", \"positif\": \"positif\"}', 1, '2026-07-13 04:44:05', '2026-06-14 17:23:45', '2026-07-13 04:44:05'),
(12, 19, 4, 'subbab-b-gradien_L2', 'pilih_kotak', '{\"lat2\": \"a\"}', 1, '2026-07-13 04:47:58', '2026-06-14 17:23:55', '2026-07-13 04:47:58'),
(13, 19, 4, 'subbab-b-gradien_L3', 'input', '{\"lat3_m\": \"-3/6\", \"lat3_dx\": \"6\", \"lat3_dy\": \"-3\"}', 1, '2026-07-13 04:48:26', '2026-06-14 17:24:15', '2026-07-13 04:48:26'),
(14, 19, 5, 'subbab-b-gradien-satu-titik_L1', 'input', '{\"subAtas_a\": \"4\", \"subAtas_b\": \"4\", \"pilihJalur\": \"A\", \"subBawah_a\": \"8\", \"subBawah_b\": \"6\", \"hasilAtas_a\": \"1\", \"hasilAtas_b\": \"2\", \"hasilBawah_a\": \"2\", \"hasilBawah_b\": \"3\"}', 1, '2026-07-13 05:19:36', '2026-06-14 17:42:15', '2026-07-13 05:19:36'),
(15, 19, 5, 'subbab-b-gradien-satu-titik_L2', 'input', '{\"moaAtas\": \"5\", \"mobAtas\": \"-2\", \"mocAtas\": \"3\", \"moaBawah\": \"3\", \"mobBawah\": \"3\", \"mocBawah\": \"4\"}', 1, '2026-07-13 04:49:01', '2026-06-14 17:43:53', '2026-07-13 04:49:01'),
(16, 19, 5, 'subbab-b-gradien-satu-titik_L3', 'input', '{\"subM_3\": \"4\", \"subP_3\": \"p\", \"subX_3\": \"6\", \"kali1_3\": \"6\", \"kali2_3\": \"4\", \"hasilP_3\": \"24\", \"koordX_3\": \"6\", \"koordY_3\": \"24\", \"nilaiP_3\": \"p\", \"nilaiX_3\": \"6\"}', 1, '2026-07-13 04:48:54', '2026-06-14 17:46:21', '2026-07-13 04:48:54'),
(17, 22, 1, 'subbab-a1_L1', 'drag_drop', '{\"selectedIds\": [\"l1_2x_y_5\", \"l1_x_3y_9\", \"l1_y_min3x_1\"]}', 1, '2026-06-14 22:28:50', '2026-06-14 22:28:40', '2026-06-14 22:28:50'),
(18, 22, 1, 'subbab-a1_L2', 'input', '{\"lat2a\": \"y=2x+1\", \"lat2b\": \"5x+8y+7=0\", \"lat2c\": \"6y=3x-7\"}', 1, '2026-06-14 22:32:23', '2026-06-14 22:32:23', '2026-06-14 22:32:23'),
(19, 19, 9, 'subbab-c-dua-garis-sejajar_L3', 'input', '{\"l3_c\": \"4\", \"l3_m2\": \"-1\", \"l3_kanan\": \"-1\", \"l3_relasi\": \"m1=m2\", \"l3_m1_atas\": \"-4\", \"l3_m1_bawah\": \"c\", \"l3_kiri_atas\": \"-4\", \"l3_kiri_bawah\": \"c\"}', 1, '2026-06-16 14:41:02', '2026-06-16 14:41:02', '2026-06-16 14:41:02'),
(20, 19, 11, 'latihan3', 'input', '{\"l3_m\": \"-3/5\", \"l3_h1\": \"-3/5\", \"l3_x1\": \"0\", \"l3_y1\": \"0\", \"l3_kiri\": \"5\", \"l3_kanan\": \"-3\", \"l3_sub_m\": \"-3/5\", \"l3_final1\": \"3\", \"l3_final2\": \"5\", \"l3_sub_x1\": \"0\", \"l3_sub_y1\": \"0\"}', 1, '2026-07-05 13:30:26', '2026-07-05 13:30:26', '2026-07-05 13:30:26'),
(21, 18, 1, 'subbab-a1_L1', 'drag_drop', '{\"selectedIds\": [\"l1_x_3y_9\", \"l1_2x_y_5\", \"l1_y_min3x_1\"]}', 1, '2026-07-07 09:39:07', '2026-07-07 09:39:07', '2026-07-07 09:39:07'),
(22, 18, 1, 'subbab-a1_L2', 'input', '{\"lat2a\": \"y=4x+6\", \"lat2b\": \"2x+5y-2=0\", \"lat2c\": \"y=-3x+1\"}', 1, '2026-07-07 09:40:41', '2026-07-07 09:40:41', '2026-07-07 09:40:41'),
(23, 18, 3, 'subbab-a2-2_L1', 'grafik', '{\"titikA\": {\"x\": -2, \"y\": 0}, \"titikB\": {\"x\": 0, \"y\": 4}, \"l1_x_value\": \"-2\", \"l1_y_value\": \"4\", \"l1_x_point_x\": \"-2\", \"l1_x_point_y\": \"0\", \"l1_y_point_x\": \"0\", \"l1_y_point_y\": \"4\", \"plottingBenar\": true}', 1, '2026-07-07 09:50:05', '2026-07-07 09:50:05', '2026-07-07 09:50:05'),
(24, 19, 1, '$ {\n                    MATERI_SLUG\n                }\n                _L1', 'drag_drop', '{\"selectedIds\": [\"l1_2x_y_5\", \"l1_x_3y_9\", \"l1_y_min3x_1\"]}', 1, '2026-07-11 22:27:46', '2026-07-11 22:27:46', '2026-07-11 22:27:46'),
(25, 19, 3, 'subbab-a2-2_L1_ISIAN', 'input', '{\"l1_x_value\": \"-2\", \"l1_y_value\": \"4\", \"l1_x_point_x\": \"-2\", \"l1_x_point_y\": \"0\", \"l1_y_point_x\": \"0\", \"l1_y_point_y\": \"4\"}', 1, '2026-07-13 04:41:24', '2026-07-13 04:41:20', '2026-07-13 04:41:24'),
(26, 19, 6, 'subbab-b-gradien-dua-titik_L1', 'input', '{\"l1x1\": \"-3\", \"l1x2\": \"5\", \"l1y1\": \"6\", \"l1y2\": \"-4\", \"l1_subX1\": \"-3\", \"l1_subX2\": \"5\", \"l1_subY1\": \"6\", \"l1_subY2\": \"-4\", \"l1_hasilAtas\": \"-10\", \"l1_hasilBawah\": \"8\", \"l1_hasilAkhirAtas\": \"-5\", \"l1_hasilAkhirBawah\": \"4\"}', 1, '2026-07-13 05:09:47', '2026-07-13 04:53:50', '2026-07-13 05:09:47'),
(27, 19, 11, 'latihan1', 'input', '{\"m_1\": \"2\", \"x1_1\": \"3\", \"y1_1\": \"-2\", \"sub_m_1\": \"2\", \"akhir1_1\": \"2\", \"akhir2_1\": \"-8\", \"hasil1_1\": \"2\", \"hasil2_1\": \"2\", \"hasil3_1\": \"-6\", \"sub_x1_1\": \"3\", \"sub_y1_1\": \"-2\"}', 1, '2026-07-13 05:00:29', '2026-07-13 05:00:29', '2026-07-13 05:00:29'),
(28, 19, 6, 'subbab-b-gradien-dua-titik_L2', 'input', '{\"m_2\": \"1\", \"x1_2\": \"1\", \"x2_2\": \"5\", \"y1_2\": \"2\", \"y2_2\": \"p\", \"kiri1_2\": \"1\", \"kiri2_2\": \"1\", \"subX1_2\": \"1\", \"subX2_2\": \"5\", \"subY1_2\": \"2\", \"subY2_2\": \"p\", \"hasilP_2\": \"6\", \"hasilAtas_2\": \"p-2\", \"pers1Kiri_2\": \"4\", \"hasilBawah_2\": \"4\", \"pers1Kanan_2\": \"p-2\"}', 1, '2026-07-13 06:36:50', '2026-07-13 06:36:50', '2026-07-13 06:36:50'),
(29, 19, 7, 'subbab-b-gradien-persamaan1_L1', 'input', '{\"lat1a\": \"-5\", \"lat1b\": \"5/2\"}', 1, '2026-07-13 06:58:10', '2026-07-13 06:58:10', '2026-07-13 06:58:10'),
(30, 19, 10, 'subbab-c-dua-garis-tegak-lurus_L1', 'input', '{\"l_m1\": \"3\", \"l_ma\": \"-1/3\", \"l_mb\": \"2/3\", \"l_kali_a\": \"-1\", \"l_kali_b\": \"2\", \"l_jawaban\": \"x+3y-6=0\"}', 1, '2026-07-13 07:00:45', '2026-07-13 07:00:45', '2026-07-13 07:00:45'),
(31, 21, 2, 'subbab-a2-1_L1', 'input', '{\"lat1_y1\": \"-5\", \"lat1_y2\": \"-3\", \"lat1_y3\": \"-1\", \"lat1_y4\": \"1\", \"lat1_pair1\": \"-2,-5\", \"lat1_pair2\": \"0,-3\", \"lat1_pair3\": \"2,-1\", \"lat1_pair4\": \"4,1\"}', 1, '2026-07-13 19:00:38', '2026-07-13 19:00:38', '2026-07-13 19:00:38'),
(32, 21, 2, 'subbab-a2-1_L2_TABEL', 'input', '{\"y1\": \"-3\", \"y2\": \"1\", \"y3\": \"5\", \"y4\": \"9\", \"pairs\": [{\"x\": -4, \"y\": -3, \"label\": \"A\"}, {\"x\": -2, \"y\": 1, \"label\": \"B\"}, {\"x\": 0, \"y\": 5, \"label\": \"C\"}, {\"x\": 2, \"y\": 9, \"label\": \"D\"}]}', 1, '2026-07-13 19:00:53', '2026-07-13 19:00:53', '2026-07-13 19:00:53'),
(33, 21, 2, 'subbab-a2-1_L2', 'grafik', '{\"y1\": \"-3\", \"y2\": \"1\", \"y3\": \"5\", \"y4\": \"9\", \"pairs\": [{\"x\": -4, \"y\": -3, \"label\": \"A\"}, {\"x\": -2, \"y\": 1, \"label\": \"B\"}, {\"x\": 0, \"y\": 5, \"label\": \"C\"}, {\"x\": 2, \"y\": 9, \"label\": \"D\"}], \"titikSiswa\": [{\"x\": -4, \"y\": -3, \"nama\": \"A\"}, {\"x\": -2, \"y\": 1, \"nama\": \"B\"}, {\"x\": 0, \"y\": 5, \"nama\": \"C\"}, {\"x\": 2, \"y\": 9, \"nama\": \"D\"}], \"plottingBenar\": true}', 1, '2026-07-13 19:01:22', '2026-07-13 19:01:22', '2026-07-13 19:01:22'),
(34, 21, 3, 'subbab-a2-2_L1_ISIAN', 'input', '{\"l1_x_value\": \"-2\", \"l1_y_value\": \"4\", \"l1_x_point_x\": \"-2\", \"l1_x_point_y\": \"0\", \"l1_y_point_x\": \"0\", \"l1_y_point_y\": \"4\"}', 1, '2026-07-13 19:01:49', '2026-07-13 19:01:49', '2026-07-13 19:01:49'),
(35, 21, 3, 'subbab-a2-2_L1', 'grafik', '{\"titikA\": {\"x\": -2, \"y\": 0}, \"titikB\": {\"x\": 0, \"y\": 4}, \"l1_x_value\": \"-2\", \"l1_y_value\": \"4\", \"l1_x_point_x\": \"-2\", \"l1_x_point_y\": \"0\", \"l1_y_point_x\": \"0\", \"l1_y_point_y\": \"4\", \"plottingBenar\": true}', 1, '2026-07-13 19:01:57', '2026-07-13 19:01:57', '2026-07-13 19:01:57'),
(36, 21, 3, 'subbab-a2-2_L2_ISIAN', 'input', '{\"l2_x_value\": \"8\", \"l2_y_value\": \"6\", \"l2_x_point_x\": \"8\", \"l2_x_point_y\": \"0\", \"l2_y_point_x\": \"0\", \"l2_y_point_y\": \"6\"}', 1, '2026-07-13 19:02:21', '2026-07-13 19:02:21', '2026-07-13 19:02:21'),
(37, 21, 3, 'subbab-a2-2_L2', 'grafik', '{\"titikA\": {\"x\": 8, \"y\": 0}, \"titikB\": {\"x\": 0, \"y\": 6}, \"l2_x_value\": \"8\", \"l2_y_value\": \"6\", \"l2_x_point_x\": \"8\", \"l2_x_point_y\": \"0\", \"l2_y_point_x\": \"0\", \"l2_y_point_y\": \"6\", \"plottingBenar\": true}', 1, '2026-07-13 19:02:50', '2026-07-13 19:02:50', '2026-07-13 19:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int UNSIGNED NOT NULL,
  `bab_id` int UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `view_path` varchar(255) NOT NULL,
  `urutan` int UNSIGNED NOT NULL,
  `has_latihan` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `bab_id`, `judul`, `slug`, `view_path`, `urutan`, `has_latihan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengertian dan Bentuk Umum', 'subbab-a1', 'siswa.subbabA1', 1, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(2, 1, 'Menggambar Grafik Persamaan Garis Lurus 1', 'subbab-a2-1', 'siswa.subbabA2_1', 2, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(3, 1, 'Menggambar Grafik Persamaan Garis Lurus 2', 'subbab-a2-2', 'siswa.subbabA2_2', 3, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(4, 2, 'Pengertian Gradien', 'subbab-b-gradien', 'siswa.subbabB_gradien', 1, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(5, 2, 'Gradien garis melalui (0,0) dan (x1,y1)', 'subbab-b-gradien-satu-titik', 'siswa.subbabB_gradien1titik', 2, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(6, 2, 'Gradien garis yang melewati dua titik', 'subbab-b-gradien-dua-titik', 'siswa.subbabB_gradienduatitik', 3, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(7, 2, 'Gradien garis dari suatu Persamaan Garis Lurus', 'subbab-b-gradien-persamaan1', 'siswa.subbabB_gradienpersamaan1', 4, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(8, 3, 'Gradien garis sejajar sumbu x dan sumbu y', 'subbab-c-garis-sejajar-sumbuxy', 'siswa.subbabC_gradien_garis_sejajar_sumbuxy', 1, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(9, 3, 'Gradien Garis-garis yang saling Sejajar', 'subbab-c-dua-garis-sejajar', 'siswa.subbabC_gradien_garisgarissejajar', 2, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(10, 3, 'Gradien Garis-garis yang saling Tegak Lurus', 'subbab-c-dua-garis-tegak-lurus', 'siswa.subbabC_gradien_garisgaristegaklurus', 3, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(11, 4, 'Persamaan Garis Melalui Satu Titik dan Gradien', 'subbab-d-pgl1', 'siswa.subbabD_persamaangarislurus1', 1, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(12, 4, 'Persamaan Garis yang Melalui Dua Titik', 'subbab-d-pgl2', 'siswa.subbabD_persamaangarislurus2', 2, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(13, 4, 'Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain', 'subbab-d-pgl-sejajar', 'siswa.subbabD_persamaangarislurus3_sejajar', 3, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45'),
(14, 4, 'Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan Garis Lain', 'subbab-d-pgl-tegak-lurus', 'siswa.subbabD_persamaangarislurus4_tegaklurus', 4, 1, '2026-04-12 15:52:45', '2026-04-12 15:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `material_progress`
--

CREATE TABLE `material_progress` (
  `id` int UNSIGNED NOT NULL,
  `student_id` int UNSIGNED NOT NULL,
  `materi_id` int UNSIGNED NOT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `opened_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `material_progress`
--

INSERT INTO `material_progress` (`id`, `student_id`, `materi_id`, `is_opened`, `is_completed`, `opened_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(9, 17, 11, 1, 0, '2026-04-12 23:52:07', NULL, '2026-04-12 23:52:07', '2026-04-12 23:52:07'),
(10, 17, 12, 1, 0, '2026-04-12 23:52:35', NULL, '2026-04-12 23:52:35', '2026-04-12 23:52:35'),
(11, 18, 1, 1, 1, '2026-07-07 09:38:59', '2026-04-26 04:45:31', '2026-04-13 19:08:20', '2026-07-07 09:38:59'),
(12, 18, 2, 1, 1, '2026-07-07 09:46:13', '2026-04-26 05:24:19', '2026-04-13 19:09:06', '2026-07-07 09:46:13'),
(13, 18, 3, 1, 1, '2026-07-13 18:59:51', NULL, '2026-04-13 19:10:39', '2026-07-13 18:59:51'),
(14, 18, 4, 1, 1, '2026-07-13 18:34:30', NULL, '2026-04-13 19:11:09', '2026-07-13 18:34:30'),
(15, 18, 5, 1, 0, '2026-07-07 09:28:01', NULL, '2026-04-13 19:12:18', '2026-07-07 09:28:01'),
(16, 18, 6, 1, 0, '2026-07-07 09:28:10', NULL, '2026-04-13 19:12:43', '2026-07-07 09:28:10'),
(17, 18, 7, 1, 0, '2026-07-07 09:28:25', NULL, '2026-04-13 19:46:14', '2026-07-07 09:28:25'),
(18, 18, 8, 1, 0, '2026-07-07 09:28:33', NULL, '2026-04-13 21:25:07', '2026-07-07 09:28:33'),
(19, 18, 11, 1, 0, '2026-07-07 09:36:35', NULL, '2026-04-15 00:11:49', '2026-07-07 09:36:35'),
(20, 18, 12, 1, 0, '2026-07-07 09:42:52', NULL, '2026-04-15 00:12:03', '2026-07-07 09:42:52'),
(21, 18, 14, 1, 0, '2026-07-07 09:56:58', NULL, '2026-04-16 08:59:09', '2026-07-07 09:56:58'),
(22, 18, 9, 1, 0, '2026-04-23 11:16:35', NULL, '2026-04-16 09:12:45', '2026-04-23 11:16:35'),
(23, 18, 10, 1, 0, '2026-04-23 11:17:46', NULL, '2026-04-18 00:19:09', '2026-04-23 11:17:46'),
(24, 18, 13, 1, 0, '2026-04-23 11:48:18', NULL, '2026-04-18 04:13:49', '2026-04-23 11:48:18'),
(25, 19, 1, 1, 1, '2026-07-26 20:30:43', '2026-07-11 22:49:15', '2026-04-21 10:47:52', '2026-07-26 20:30:43'),
(26, 19, 2, 1, 1, '2026-07-13 23:45:04', '2026-06-14 22:48:00', '2026-04-21 11:20:01', '2026-07-13 23:45:04'),
(27, 19, 3, 1, 1, '2026-07-26 20:30:32', '2026-07-13 04:42:31', '2026-04-26 05:30:10', '2026-07-26 20:30:32'),
(28, 19, 4, 1, 1, '2026-07-13 04:47:38', '2026-07-13 04:48:26', '2026-04-27 05:31:13', '2026-07-13 04:48:26'),
(29, 19, 5, 1, 1, '2026-07-13 05:27:44', '2026-07-13 04:48:55', '2026-04-27 07:35:42', '2026-07-13 05:27:44'),
(30, 19, 6, 1, 1, '2026-07-13 06:34:58', '2026-04-27 08:35:54', '2026-04-27 08:18:24', '2026-07-13 06:34:58'),
(31, 19, 7, 1, 1, '2026-07-13 06:58:27', '2026-05-24 02:59:57', '2026-04-27 08:39:54', '2026-07-13 06:58:27'),
(32, 19, 8, 1, 1, '2026-07-13 06:58:33', '2026-04-27 22:45:57', '2026-04-27 08:59:58', '2026-07-13 06:58:33'),
(33, 19, 9, 1, 1, '2026-07-13 06:58:49', '2026-06-16 14:41:02', '2026-04-27 22:46:10', '2026-07-13 06:58:49'),
(34, 19, 10, 1, 1, '2026-07-13 07:01:39', '2026-04-28 00:47:43', '2026-04-28 00:36:26', '2026-07-13 07:01:39'),
(35, 19, 11, 1, 1, '2026-07-13 05:00:34', '2026-07-05 13:30:24', '2026-04-28 00:52:25', '2026-07-13 05:00:34'),
(36, 19, 12, 1, 1, '2026-07-13 05:02:31', '2026-04-28 09:27:48', '2026-04-28 01:54:38', '2026-07-13 05:02:31'),
(37, 19, 13, 1, 1, '2026-07-05 14:25:40', NULL, '2026-04-28 09:12:12', '2026-07-05 14:25:40'),
(38, 19, 14, 1, 1, '2026-07-05 15:29:11', NULL, '2026-04-28 09:20:17', '2026-07-05 15:29:11'),
(39, 20, 1, 1, 1, '2026-05-19 08:49:46', '2026-05-19 08:19:19', '2026-04-28 10:52:03', '2026-05-19 08:49:46'),
(40, 20, 2, 1, 1, '2026-05-19 08:19:21', '2026-05-09 03:27:07', '2026-04-28 10:52:56', '2026-05-19 08:19:21'),
(41, 20, 3, 1, 1, '2026-05-19 08:37:09', '2026-05-09 04:04:48', '2026-05-09 03:27:21', '2026-05-19 08:37:09'),
(42, 20, 4, 1, 0, '2026-05-19 08:49:04', NULL, '2026-05-19 08:49:04', '2026-05-19 08:49:04'),
(43, 21, 1, 1, 1, '2026-06-11 22:51:16', '2026-06-11 22:57:38', '2026-06-11 22:51:16', '2026-06-11 22:57:38'),
(44, 21, 2, 1, 1, '2026-07-13 19:00:07', '2026-07-13 19:01:23', '2026-06-11 22:57:43', '2026-07-13 19:01:23'),
(45, 22, 1, 1, 0, '2026-06-14 22:37:03', NULL, '2026-06-14 22:26:43', '2026-06-14 22:37:03'),
(46, 21, 3, 1, 1, '2026-07-13 19:16:57', '2026-07-13 19:02:51', '2026-07-13 19:01:26', '2026-07-13 19:16:57'),
(47, 21, 4, 1, 0, '2026-07-13 19:07:02', NULL, '2026-07-13 19:07:02', '2026-07-13 19:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_28_070342_create_gurus_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int UNSIGNED NOT NULL,
  `bab_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `duration_minutes` int UNSIGNED NOT NULL,
  `total_questions` int UNSIGNED DEFAULT '0',
  `quiz_type` enum('bab','evaluasi') NOT NULL DEFAULT 'bab',
  `kkm` int DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `bab_id`, `title`, `description`, `duration_minutes`, `total_questions`, `quiz_type`, `kkm`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kuis Bab A', 'Kuis untuk materi Bentuk Umum dan Pengertian Persamaan Garis Lurus', 20, 10, 'bab', 70, 1, '2026-03-18 03:24:36', '2026-04-21 09:08:35'),
(2, 2, 'Kuis Bab B', 'Kuis untuk materi Gradien (Kemiringan Garis)', 20, 10, 'bab', 70, 1, '2026-03-18 03:24:36', '2026-04-21 09:08:58'),
(3, 3, 'Kuis Bab C', 'Kuis untuk materi Hubungan Gradien Garis', 20, 10, 'bab', 70, 1, '2026-03-18 03:24:36', '2026-04-21 09:09:08'),
(4, 4, 'Kuis Bab D', 'Kuis untuk materi Persamaan Garis Lurus', 20, 10, 'bab', 70, 1, '2026-03-18 03:24:36', '2026-04-21 09:09:18'),
(5, 5, 'Evaluasi', 'Evaluasi akhir untuk seluruh materi persamaan garis lurus', 30, 20, 'evaluasi', 70, 1, '2026-03-18 03:24:36', '2026-05-19 14:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` int UNSIGNED NOT NULL,
  `attempt_id` int UNSIGNED NOT NULL,
  `question_id` int UNSIGNED NOT NULL,
  `selected_option_id` int UNSIGNED DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT '0',
  `answered_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` int UNSIGNED NOT NULL,
  `quiz_id` int UNSIGNED NOT NULL,
  `student_id` int UNSIGNED NOT NULL,
  `started_at` datetime NOT NULL,
  `end_at` datetime DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `status` enum('in_progress','submitted','expired') DEFAULT 'in_progress',
  `is_reset` tinyint(1) NOT NULL DEFAULT '0',
  `reset_at` datetime DEFAULT NULL,
  `total_questions` int UNSIGNED DEFAULT '0',
  `correct_answers` int UNSIGNED DEFAULT '0',
  `wrong_answers` int UNSIGNED DEFAULT '0',
  `unanswered` int UNSIGNED DEFAULT '0',
  `score` decimal(5,2) DEFAULT '0.00',
  `is_passed` tinyint(1) NOT NULL DEFAULT '0',
  `passed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `quiz_id`, `student_id`, `started_at`, `end_at`, `submitted_at`, `status`, `is_reset`, `reset_at`, `total_questions`, `correct_answers`, `wrong_answers`, `unanswered`, `score`, `is_passed`, `passed_at`, `created_at`, `updated_at`) VALUES
(21, 1, 17, '2026-04-13 10:27:10', '2026-04-13 13:16:17', '2026-04-13 13:16:17', 'expired', 1, '2026-07-14 10:08:11', 10, 0, 0, 0, '0.00', 0, NULL, '2026-04-13 02:27:10', '2026-07-14 02:08:11'),
(32, 1, 18, '2026-04-15 14:38:42', '2026-04-15 14:40:05', '2026-04-15 14:40:05', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 0, NULL, '2026-04-15 06:38:42', '2026-07-14 02:08:11'),
(34, 2, 18, '2026-04-16 06:54:53', '2026-04-16 06:58:00', '2026-04-16 06:58:00', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-15 22:54:53', '2026-07-14 02:08:11'),
(35, 2, 18, '2026-04-16 06:59:38', '2026-04-16 07:06:55', '2026-04-16 07:06:55', 'submitted', 1, '2026-07-14 10:08:11', 10, 4, 6, 0, '40.00', 0, NULL, '2026-04-15 22:59:38', '2026-07-14 02:08:11'),
(36, 2, 18, '2026-04-16 07:08:34', '2026-04-16 07:08:43', '2026-04-16 07:08:43', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-15 23:08:34', '2026-07-14 02:08:11'),
(37, 1, 18, '2026-04-16 07:56:06', '2026-04-16 07:59:18', '2026-04-16 07:59:18', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-04-15 23:56:06', '2026-07-14 02:08:11'),
(38, 1, 18, '2026-04-16 07:59:22', '2026-04-16 08:00:37', '2026-04-16 08:00:37', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-15 23:59:22', '2026-07-14 02:08:11'),
(39, 2, 18, '2026-04-16 18:44:19', '2026-04-16 18:45:03', '2026-04-16 18:45:03', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 9, 0, '10.00', 0, NULL, '2026-04-16 10:44:19', '2026-07-14 02:08:11'),
(40, 2, 18, '2026-04-18 09:50:25', '2026-04-18 09:50:42', '2026-04-18 09:50:42', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 1, 9, '0.00', 0, NULL, '2026-04-18 01:50:25', '2026-07-14 02:08:11'),
(41, 1, 18, '2026-04-20 07:19:39', '2026-04-20 07:22:49', '2026-04-20 07:22:49', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 0, NULL, '2026-04-19 23:19:39', '2026-07-14 02:08:11'),
(42, 3, 18, '2026-04-20 19:13:49', '2026-04-20 19:15:00', '2026-04-20 19:15:00', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 0, 9, '10.00', 0, NULL, '2026-04-20 11:13:49', '2026-07-14 02:08:11'),
(43, 3, 18, '2026-04-20 19:48:34', '2026-04-20 19:50:48', '2026-04-20 19:50:48', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 0, NULL, '2026-04-20 11:48:34', '2026-07-14 02:08:11'),
(44, 4, 18, '2026-04-21 09:25:24', '2026-04-21 09:27:07', '2026-04-21 09:27:07', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 0, NULL, '2026-04-21 01:25:24', '2026-07-14 02:08:11'),
(45, 4, 18, '2026-04-21 09:38:20', '2026-04-21 09:38:46', '2026-04-21 09:38:46', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 0, NULL, '2026-04-21 01:38:20', '2026-07-14 02:08:11'),
(47, 5, 18, '2026-04-21 13:52:13', '2026-04-21 13:54:11', '2026-04-21 13:54:11', 'submitted', 1, '2026-07-14 10:08:11', 20, 20, 0, 0, '100.00', 0, NULL, '2026-04-21 05:52:13', '2026-07-14 02:08:11'),
(48, 5, 18, '2026-04-21 14:58:35', '2026-04-21 14:58:57', '2026-04-21 14:58:57', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-04-21 06:58:35', '2026-07-14 02:08:11'),
(49, 5, 18, '2026-04-21 15:08:03', '2026-04-21 15:08:13', '2026-04-21 15:08:13', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-04-21 07:08:03', '2026-07-14 02:08:11'),
(50, 5, 18, '2026-04-21 15:17:40', '2026-04-21 15:25:21', '2026-04-21 15:25:21', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-04-21 07:17:40', '2026-07-14 02:08:11'),
(51, 1, 18, '2026-04-21 15:35:47', '2026-04-21 15:35:53', '2026-04-21 15:35:53', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-21 07:35:47', '2026-07-14 02:08:11'),
(52, 1, 19, '2026-04-21 19:24:51', '2026-04-28 17:42:15', '2026-04-28 17:42:15', 'expired', 1, '2026-07-14 10:08:11', 10, 0, 0, 0, '0.00', 0, NULL, '2026-04-21 11:24:51', '2026-07-14 02:08:11'),
(53, 1, 18, '2026-04-21 19:50:08', '2026-04-21 19:50:15', '2026-04-21 19:50:15', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-21 11:50:08', '2026-07-14 02:08:11'),
(54, 3, 18, '2026-04-22 05:46:13', '2026-04-22 05:46:19', '2026-04-22 05:46:19', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-21 21:46:13', '2026-07-14 02:08:11'),
(55, 4, 18, '2026-04-22 06:56:33', NULL, NULL, 'in_progress', 1, '2026-07-14 10:08:11', 10, 0, 0, 0, '0.00', 0, NULL, '2026-04-21 22:56:33', '2026-07-14 02:08:11'),
(56, 1, 18, '2026-04-22 08:10:04', '2026-04-22 08:10:12', '2026-04-22 08:10:12', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-04-22 00:10:04', '2026-07-14 02:08:11'),
(57, 1, 18, '2026-04-22 08:32:08', '2026-04-22 08:33:00', '2026-04-22 08:33:00', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-04-22 00:33:00', '2026-04-22 00:32:08', '2026-07-14 02:08:11'),
(58, 2, 19, '2026-04-27 16:58:15', '2026-04-27 16:59:52', '2026-04-27 16:59:52', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 1, '2026-04-27 08:59:52', '2026-04-27 08:58:15', '2026-07-14 02:08:11'),
(59, 3, 19, '2026-04-28 08:47:46', '2026-04-28 08:51:18', '2026-04-28 08:51:18', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 9, 0, '10.00', 0, NULL, '2026-04-28 00:47:46', '2026-07-14 02:08:11'),
(60, 3, 19, '2026-04-28 08:51:31', '2026-04-28 08:52:20', '2026-04-28 08:52:20', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 1, '2026-04-28 00:52:20', '2026-04-28 00:51:31', '2026-07-14 02:08:11'),
(61, 4, 19, '2026-04-28 17:30:55', '2026-04-28 17:31:53', '2026-04-28 17:31:53', 'submitted', 1, '2026-07-14 10:08:11', 10, 3, 7, 0, '30.00', 0, NULL, '2026-04-28 09:30:55', '2026-07-14 02:08:11'),
(62, 4, 19, '2026-04-28 17:32:00', '2026-04-28 17:32:38', '2026-04-28 17:32:38', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 1, '2026-04-28 09:32:38', '2026-04-28 09:32:00', '2026-07-14 02:08:11'),
(63, 5, 19, '2026-04-28 17:32:44', '2026-04-28 17:32:51', '2026-04-28 17:32:51', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-04-28 09:32:44', '2026-07-14 02:08:11'),
(64, 1, 19, '2026-04-28 17:42:15', '2026-04-28 17:42:54', '2026-04-28 17:42:54', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-04-28 09:42:54', '2026-04-28 09:42:15', '2026-07-14 02:08:11'),
(65, 5, 19, '2026-04-28 18:50:02', '2026-04-28 18:50:10', '2026-04-28 18:50:10', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-04-28 10:50:02', '2026-07-14 02:08:11'),
(66, 4, 19, '2026-05-03 18:09:33', '2026-05-03 18:09:41', '2026-05-03 18:09:41', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-03 10:09:33', '2026-07-14 02:08:11'),
(67, 4, 19, '2026-05-03 18:11:25', '2026-05-03 18:13:01', '2026-05-03 18:13:01', 'submitted', 1, '2026-07-14 10:08:11', 10, 10, 0, 0, '100.00', 1, '2026-05-03 10:13:01', '2026-05-03 10:11:25', '2026-07-14 02:08:11'),
(68, 5, 19, '2026-05-03 18:13:11', '2026-05-03 18:13:16', '2026-05-03 18:13:16', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-05-03 10:13:11', '2026-07-14 02:08:11'),
(69, 1, 19, '2026-05-06 15:20:04', '2026-05-06 15:20:22', '2026-05-06 15:20:22', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-06 07:20:04', '2026-07-14 02:08:11'),
(70, 1, 20, '2026-05-09 12:04:50', '2026-05-09 12:04:57', '2026-05-09 12:04:57', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-09 04:04:50', '2026-07-14 02:08:11'),
(71, 1, 19, '2026-05-12 09:44:46', '2026-05-12 09:45:13', '2026-05-12 09:45:13', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-12 01:44:46', '2026-07-14 02:08:11'),
(72, 1, 19, '2026-05-12 09:45:29', '2026-05-12 09:53:10', '2026-05-12 09:53:10', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-12 01:45:29', '2026-07-14 02:08:11'),
(73, 5, 19, '2026-05-12 09:52:22', '2026-05-12 09:52:32', '2026-05-12 09:52:32', 'submitted', 1, '2026-07-14 10:08:11', 20, 0, 0, 20, '0.00', 0, NULL, '2026-05-12 01:52:22', '2026-07-14 02:08:11'),
(74, 1, 19, '2026-05-12 09:53:17', '2026-05-12 09:53:26', '2026-05-12 09:53:26', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-05-12 01:53:17', '2026-07-14 02:08:11'),
(75, 1, 20, '2026-05-19 16:47:47', '2026-05-19 16:48:54', '2026-05-19 16:48:54', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-05-19 08:48:54', '2026-05-19 08:47:47', '2026-07-14 02:08:11'),
(76, 5, 19, '2026-05-19 18:09:54', '2026-05-19 18:11:45', '2026-05-19 18:11:45', 'submitted', 1, '2026-07-14 10:08:11', 20, 20, 0, 0, '100.00', 1, '2026-05-19 10:11:45', '2026-05-19 10:09:54', '2026-07-14 02:08:11'),
(77, 1, 19, '2026-06-10 12:42:07', '2026-06-10 12:42:25', '2026-06-10 12:42:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-10 04:42:07', '2026-07-14 02:08:11'),
(78, 1, 19, '2026-06-10 12:44:49', '2026-06-10 12:59:08', '2026-06-10 12:59:08', 'submitted', 1, '2026-07-14 10:08:11', 10, 3, 0, 7, '30.00', 0, NULL, '2026-06-10 04:44:49', '2026-07-14 02:08:11'),
(79, 1, 19, '2026-06-12 06:39:59', '2026-06-12 06:41:44', '2026-06-12 06:41:44', 'submitted', 1, '2026-07-14 10:08:11', 10, 2, 0, 8, '20.00', 0, NULL, '2026-06-11 22:39:59', '2026-07-14 02:08:11'),
(80, 1, 19, '2026-06-12 07:24:55', '2026-06-12 07:26:05', '2026-06-12 07:26:05', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 3, 7, '0.00', 0, NULL, '2026-06-11 23:24:55', '2026-07-14 02:08:11'),
(81, 1, 19, '2026-06-15 01:18:19', '2026-06-15 01:18:31', '2026-06-15 01:18:31', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-14 17:18:19', '2026-07-14 02:08:11'),
(82, 1, 19, '2026-06-15 06:49:30', '2026-06-15 06:51:09', '2026-06-15 06:51:09', 'submitted', 1, '2026-07-14 10:08:11', 10, 3, 0, 7, '30.00', 0, NULL, '2026-06-14 22:49:30', '2026-07-14 02:08:11'),
(83, 1, 19, '2026-06-17 20:29:08', '2026-06-17 20:29:25', '2026-06-17 20:29:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-17 12:29:08', '2026-07-14 02:08:11'),
(84, 2, 19, '2026-06-17 20:29:35', '2026-06-17 20:29:45', '2026-06-17 20:29:45', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-17 12:29:35', '2026-07-14 02:08:11'),
(85, 1, 19, '2026-06-18 00:15:09', '2026-06-18 00:26:12', '2026-06-18 00:26:12', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-17 16:15:09', '2026-07-14 02:08:11'),
(86, 1, 18, '2026-06-18 00:29:11', '2026-06-18 00:29:22', '2026-06-18 00:29:22', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 0, 10, '0.00', 0, NULL, '2026-06-17 16:29:11', '2026-07-14 02:08:11'),
(87, 1, 18, '2026-06-18 00:35:10', '2026-06-18 00:35:17', '2026-06-18 00:35:17', 'submitted', 1, '2026-07-14 10:08:11', 10, 0, 1, 9, '0.00', 0, NULL, '2026-06-17 16:35:10', '2026-07-14 02:08:11'),
(88, 1, 18, '2026-06-18 00:37:26', '2026-06-18 00:38:20', '2026-06-18 00:38:20', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 0, 9, '10.00', 0, NULL, '2026-06-17 16:37:26', '2026-07-14 02:08:11'),
(89, 1, 18, '2026-06-18 00:46:21', '2026-06-18 00:57:22', '2026-06-18 00:57:22', 'submitted', 1, '2026-07-14 10:08:11', 10, 2, 8, 0, '20.00', 0, NULL, '2026-06-17 16:46:21', '2026-07-14 02:08:11'),
(90, 1, 19, '2026-06-18 04:21:33', '2026-06-18 04:24:29', '2026-06-18 04:24:29', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-06-17 20:24:29', '2026-06-17 20:21:33', '2026-07-14 02:08:11'),
(91, 1, 19, '2026-06-18 04:25:30', '2026-06-18 04:25:51', '2026-06-18 04:25:51', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 9, 0, '10.00', 0, NULL, '2026-06-17 20:25:30', '2026-07-14 02:08:11'),
(92, 2, 19, '2026-06-18 23:34:03', '2026-06-18 23:35:04', '2026-06-18 23:35:04', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-06-18 15:34:03', '2026-07-14 02:08:11'),
(93, 2, 19, '2026-06-18 23:40:41', '2026-06-18 23:41:28', '2026-06-18 23:41:28', 'submitted', 1, '2026-07-14 10:08:11', 10, 4, 6, 0, '40.00', 0, NULL, '2026-06-18 15:40:41', '2026-07-14 02:08:11'),
(94, 3, 19, '2026-06-18 23:48:38', '2026-06-18 23:49:53', '2026-06-18 23:49:53', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '70.00', 1, '2026-06-18 15:49:53', '2026-06-18 15:48:38', '2026-07-14 02:08:11'),
(95, 4, 19, '2026-06-18 23:55:00', '2026-06-18 23:57:12', '2026-06-18 23:57:12', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-06-18 15:55:00', '2026-07-14 02:08:11'),
(96, 4, 19, '2026-06-19 00:00:12', '2026-06-19 00:00:36', '2026-06-19 00:00:36', 'submitted', 1, '2026-07-14 10:08:11', 10, 2, 8, 0, '20.00', 0, NULL, '2026-06-18 16:00:12', '2026-07-14 02:08:11'),
(97, 4, 19, '2026-06-19 00:02:32', '2026-06-19 00:02:58', '2026-06-19 00:02:58', 'submitted', 1, '2026-07-14 10:08:11', 10, 2, 8, 0, '20.00', 0, NULL, '2026-06-18 16:02:32', '2026-07-14 02:08:11'),
(98, 4, 19, '2026-06-19 00:06:40', '2026-06-19 00:07:03', '2026-06-19 00:07:03', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 9, 0, '10.00', 0, NULL, '2026-06-18 16:06:40', '2026-07-14 02:08:11'),
(99, 4, 19, '2026-06-19 00:07:32', '2026-06-19 00:07:58', '2026-06-19 00:07:58', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-06-18 16:07:32', '2026-07-14 02:08:11'),
(100, 1, 19, '2026-06-19 03:51:27', '2026-06-19 03:52:04', '2026-06-19 03:52:04', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-06-18 19:51:27', '2026-07-14 02:08:11'),
(101, 1, 19, '2026-06-21 22:49:34', '2026-06-21 22:50:54', '2026-06-21 22:50:54', 'submitted', 1, '2026-07-14 10:08:11', 10, 6, 4, 0, '60.00', 0, NULL, '2026-06-21 14:49:34', '2026-07-14 02:08:11'),
(102, 1, 19, '2026-07-07 16:43:21', '2026-07-07 16:52:44', '2026-07-07 16:52:44', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '70.00', 1, '2026-07-07 08:52:44', '2026-07-07 08:43:21', '2026-07-14 02:08:11'),
(103, 1, 18, '2026-07-07 17:21:25', '2026-07-07 17:22:47', '2026-07-07 17:22:47', 'submitted', 1, '2026-07-14 10:08:11', 10, 1, 9, 0, '10.00', 0, NULL, '2026-07-07 09:21:25', '2026-07-14 02:08:11'),
(104, 1, 18, '2026-07-07 17:52:17', NULL, NULL, 'in_progress', 1, '2026-07-14 10:08:11', 10, 0, 0, 0, '0.00', 0, NULL, '2026-07-07 09:52:17', '2026-07-14 02:08:11'),
(105, 5, 19, '2026-07-07 18:01:03', '2026-07-07 18:03:01', '2026-07-07 18:03:01', 'submitted', 1, '2026-07-14 10:08:11', 20, 17, 3, 0, '70.00', 1, '2026-07-07 10:03:01', '2026-07-07 10:01:03', '2026-07-14 02:08:11'),
(136, 1, 34, '2026-07-08 02:44:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(137, 2, 34, '2026-07-08 02:57:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(138, 3, 34, '2026-07-08 02:49:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(139, 4, 34, '2026-07-08 02:50:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(140, 5, 34, '2026-07-08 02:55:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 17, 3, 0, '85.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(141, 1, 35, '2026-07-08 02:46:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(142, 2, 35, '2026-07-08 02:58:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(143, 3, 35, '2026-07-08 02:56:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(144, 4, 35, '2026-07-08 02:50:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(145, 5, 35, '2026-07-08 02:58:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 14, 6, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(146, 1, 36, '2026-07-08 02:54:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(147, 2, 36, '2026-07-08 02:55:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(148, 3, 36, '2026-07-08 02:49:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(149, 4, 36, '2026-07-08 02:46:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 9, 1, 0, '90.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(150, 5, 36, '2026-07-08 02:45:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 19, 1, 0, '95.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(151, 1, 37, '2026-07-08 02:57:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(152, 2, 37, '2026-07-08 02:53:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(153, 3, 37, '2026-07-08 02:50:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(154, 4, 37, '2026-07-08 02:59:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(155, 5, 37, '2026-07-08 02:45:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 13, 7, 0, '65.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(156, 1, 38, '2026-07-08 02:45:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(157, 2, 38, '2026-07-08 02:44:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(158, 3, 38, '2026-07-08 02:57:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(159, 4, 38, '2026-07-08 02:56:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 5, 5, 0, '50.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(160, 5, 38, '2026-07-08 02:55:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 11, 9, 0, '55.00', 0, NULL, '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(161, 1, 39, '2026-07-08 02:57:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(162, 2, 39, '2026-07-08 02:48:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(163, 3, 39, '2026-07-08 02:53:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 7, 3, 0, '70.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(164, 4, 39, '2026-07-08 02:47:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 10, 8, 2, 0, '80.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(165, 5, 39, '2026-07-08 02:45:25', '2026-07-08 03:04:25', '2026-07-08 03:04:25', 'submitted', 1, '2026-07-14 10:08:11', 20, 15, 5, 0, '75.00', 1, '2026-07-07 19:04:25', '2026-07-07 19:04:25', '2026-07-14 02:08:11'),
(166, 1, 18, '2026-07-14 02:29:05', '2026-07-14 02:30:17', '2026-07-14 02:30:17', 'submitted', 0, NULL, 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-13 18:29:05', '2026-07-13 18:30:17'),
(167, 1, 18, '2026-07-14 02:30:25', '2026-07-14 02:32:20', '2026-07-14 02:32:20', 'submitted', 0, NULL, 10, 10, 0, 0, '70.00', 1, '2026-07-13 18:32:20', '2026-07-13 18:30:25', '2026-07-13 18:32:20'),
(168, 1, 21, '2026-07-14 03:02:56', '2026-07-14 03:03:34', '2026-07-14 03:03:34', 'submitted', 0, NULL, 10, 6, 4, 0, '60.00', 0, NULL, '2026-07-13 19:02:56', '2026-07-13 19:03:34'),
(169, 1, 21, '2026-07-14 03:03:41', '2026-07-14 03:04:35', '2026-07-14 03:04:35', 'submitted', 0, NULL, 10, 10, 0, 0, '70.00', 1, '2026-07-13 19:04:35', '2026-07-13 19:03:41', '2026-07-13 19:04:35'),
(170, 1, 19, '2026-07-27 04:13:58', NULL, NULL, 'in_progress', 0, NULL, 10, 0, 0, 0, '0.00', 0, NULL, '2026-07-26 20:13:58', '2026-07-26 20:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` int UNSIGNED NOT NULL,
  `question_id` int UNSIGNED NOT NULL,
  `option_label` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci,
  `option_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `question_id`, `option_label`, `option_text`, `option_image`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'garis lurus', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(2, 1, 'B', 'lingkaran', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(3, 1, 'C', 'kurva tertutup', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(4, 1, 'D', 'parabola', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(5, 2, 'A', '$ax + by + c = 0$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(6, 2, 'B', '$y = mx + c$', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(7, 2, 'C', '$x = my + c$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(8, 2, 'D', '$ax - by = c$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(9, 3, 'A', '$-6$', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(10, 3, 'B', '$2$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(11, 3, 'C', '$3$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(12, 3, 'D', '$6$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(13, 4, 'A', '$x^2 + y = 4$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(14, 4, 'B', '$2x - y + 5 = 0$', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(15, 4, 'C', '$\\sqrt{y} + x = 2$', NULL, 0, '2026-03-19 15:11:21', '2026-06-17 20:28:58'),
(16, 4, 'D', '$xy = 6$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(17, 5, 'A', '$2x + y - 3 = 0$', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(18, 5, 'B', '$2x - y + 3 = 0$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(19, 5, 'C', '$x + 2y - 3 = 0$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(20, 5, 'D', '$2x + y + 3 = 0$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(21, 6, 'A', '$y = \\frac{3}{2}x - 3$', NULL, 0, '2026-03-19 15:11:21', '2026-06-17 20:28:58'),
(22, 6, 'B', '$y = -\\frac{3}{2}x + 3$', NULL, 1, '2026-03-19 15:11:21', '2026-06-17 20:28:58'),
(23, 6, 'C', '$y = -3x + 2$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(24, 6, 'D', '$y = \\frac{2}{3}x - 6$', NULL, 0, '2026-03-19 15:11:21', '2026-06-17 20:28:58'),
(25, 7, 'A', '$(0, 6)$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(26, 7, 'B', '$(0, 3)$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(27, 7, 'C', '$(3, 0)$', NULL, 1, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(28, 7, 'D', '$(6, 0)$', NULL, 0, '2026-03-19 15:11:21', '2026-06-10 11:37:30'),
(29, 8, 'A', '', '1781094804_RKWu3Lj8.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:33:24'),
(30, 8, 'B', '', '1781094831_7wMR9PXB.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:33:51'),
(31, 8, 'C', '', '1781094831_kjvA8pRw.png', 1, '2026-03-19 15:11:21', '2026-06-10 04:33:51'),
(32, 8, 'D', '', '1781094831_tbEgqxxV.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:33:51'),
(33, 9, 'A', '', '1781095099_ZszE7FsD.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:38:19'),
(34, 9, 'B', '', '1781095099_vTMUQ4fJ.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:38:19'),
(35, 9, 'C', '', '1781095099_mG7eq2rc.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:38:19'),
(36, 9, 'D', '', '1781095099_4U1P2Bve.png', 1, '2026-03-19 15:11:21', '2026-06-10 04:38:19'),
(37, 10, 'A', '', '1781095135_Jd2QyL92.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:39:12'),
(38, 10, 'B', '', '1781095135_Lqn8qEQs.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:39:12'),
(39, 10, 'C', '', '1781095135_Mcu039YW.png', 0, '2026-03-19 15:11:21', '2026-06-10 04:39:12'),
(40, 10, 'D', '', '1781095135_aYwoKaRH.png', 1, '2026-03-19 15:11:21', '2026-06-10 04:39:12'),
(85, 12, 'A', '$-\\frac{3}{2}$', NULL, 1, '2026-04-13 06:00:17', '2026-06-17 20:28:58'),
(86, 12, 'B', '$\\frac{3}{2}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:58'),
(87, 12, 'C', '$-\\frac{2}{3}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(88, 12, 'D', '$\\frac{2}{3}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(89, 13, 'A', '6', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:34:25'),
(90, 13, 'B', '8', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:34:25'),
(91, 13, 'C', '18', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:34:25'),
(92, 13, 'D', '24', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:34:25'),
(93, 14, 'A', '$\\frac{1}{2}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(94, 14, 'B', '$-\\frac{1}{2}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(95, 14, 'C', '2', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(96, 14, 'D', '-2', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(97, 15, 'A', 'Kedua garis memiliki gradien yang sama', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(98, 15, 'B', 'Garis I bergradien negatif, garis II bergradien positif', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(99, 15, 'C', 'Garis I lebih curam daripada garis II', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(100, 15, 'D', 'Garis II lebih curam daripada garis I', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(101, 16, 'A', 'Jalur A, karena gradiennya lebih besar', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(102, 16, 'B', 'Jalur A, karena gradiennya lebih kecil', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(103, 16, 'C', 'Jalur B, karena gradiennya lebih kecil', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(104, 16, 'D', 'Jalur B, karena gradiennya lebih besar', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(105, 17, 'A', '5', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(106, 17, 'B', '6', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(107, 17, 'C', '7', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(108, 17, 'D', '8', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(109, 18, 'A', 'Gradien jalan pertama lebih besar', NULL, 1, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(110, 18, 'B', 'Gradien jalan kedua lebih besar', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(111, 18, 'C', 'Kedua jalan memiliki gradien sama', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(112, 18, 'D', 'Tidak dapat dibandingkan', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(113, 19, 'A', '-1', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(114, 19, 'B', '1', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(115, 19, 'C', '$-\\frac{1}{2}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(116, 19, 'D', '$\\frac{1}{2}$', NULL, 0, '2026-04-13 06:00:17', '2026-06-17 20:28:59'),
(117, 20, 'A', '$(10,4)$', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(118, 20, 'B', '$(10,3)$', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(119, 20, 'C', '$(12,5)$', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(120, 20, 'D', '$(6,5)$', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(121, 21, 'A', '$(2,1)$ dan $(6,4)$', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(122, 21, 'B', '$(0,0)$ dan $(4,-3)$', NULL, 1, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(123, 21, 'C', '$(-1,5)$ dan $(3,3)$', NULL, 0, '2026-04-13 06:00:17', '2026-05-20 10:46:42'),
(124, 21, 'D', '$(1,-2)$ dan $(5,1)$', NULL, 0, '2026-04-13 06:00:17', '2026-04-16 10:43:08'),
(125, 22, 'A', 'sejajar sumbu-$y$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(126, 22, 'B', 'tegak lurus sumbu-$x$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(127, 22, 'C', 'tidak sejajar dengan kedua sumbu', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(128, 22, 'D', 'sejajar sumbu-$x$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(129, 23, 'A', 'gradien garis $k$ tidak terdefinisi', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(130, 23, 'B', 'garis $k$ sejajar sumbu-$x$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(131, 23, 'C', 'gradien garis $k$ adalah $0$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(132, 23, 'D', 'garis $k$ memiliki gradien $1$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(133, 24, 'A', '$y = -2x + 5$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(134, 24, 'B', '$2y = x - 4$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(135, 24, 'C', '$4x - 2y + 7 = 0$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(136, 24, 'D', '$x + 2y - 6 = 0$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(137, 25, 'A', 'sejajar sumbu-$x$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(138, 25, 'B', 'sejajar', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(139, 25, 'C', 'tegak lurus', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(140, 25, 'D', 'berpotongan tetapi tidak tegak lurus', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(141, 26, 'A', '$2$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(142, 26, 'B', '$7$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(143, 26, 'C', 'tidak ada nilai $p$ yang memenuhi', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(144, 26, 'D', 'sembarang bilangan real', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(145, 27, 'A', '$\\frac{2}{3}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(146, 27, 'B', '$-\\frac{3}{2}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(147, 27, 'C', '$\\frac{3}{2}$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(148, 27, 'D', '$-\\frac{2}{3}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(149, 28, 'A', '$-2$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(150, 28, 'B', '$2$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(151, 28, 'C', '$\\frac{1}{2}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(152, 28, 'D', '$-\\frac{1}{2}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(153, 29, 'A', 'sejajar', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 12:02:15'),
(154, 29, 'B', 'tegak lurus', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(155, 29, 'C', 'sejajar sumbu-$x$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(156, 29, 'D', 'sejajar sumbu-$y$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(157, 30, 'A', '$2$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(158, 30, 'B', '$-2$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(159, 30, 'C', '$\\frac{1}{2}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(160, 30, 'D', '$-\\frac{1}{2}$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 11:47:25'),
(161, 31, 'A', '$3$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(162, 31, 'B', '$11$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(163, 31, 'C', '$9$', NULL, 1, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(164, 31, 'D', '$5$', NULL, 0, '2026-04-20 11:12:54', '2026-04-20 12:02:16'),
(165, 32, 'A', '$y = -4x + 5$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(166, 32, 'B', '$y = 4x - 11$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(167, 32, 'C', '$y = -4x - 11$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(168, 32, 'D', '$y = 4x + 5$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(169, 33, 'A', '$y = 2x + 3$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(170, 33, 'B', '$y = -2x - 3$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(171, 33, 'C', '$y = 2x - 3$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(172, 33, 'D', '$y = -2x + 3$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(173, 34, 'A', '$3x + y - 13 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(174, 34, 'B', '$x - 3y + 1 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(175, 34, 'C', '$3x - y + 11 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(176, 34, 'D', '$3x - y - 11 = 0$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(177, 35, 'A', '$2x - 4y - 4 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(178, 35, 'B', '$x - 2y - 2 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(179, 35, 'C', '$x + 2y - 10 = 0$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(180, 35, 'D', '$2x - y - 10 = 0$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(181, 36, 'A', '$y = 3x + 6$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(182, 36, 'B', '$y = -3x + 12$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(183, 36, 'C', '$y = 3x$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(184, 36, 'D', '$y = 3x - 6$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(185, 37, 'A', '$y = 3x + 5$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(186, 37, 'B', '$y = 5x + 3$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(187, 37, 'C', '$y = 4x + 4$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(188, 37, 'D', '$y = 2x + 6$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(189, 38, 'A', '$y = -2x + 1$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(190, 38, 'B', '$y = -2x + 9$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(191, 38, 'C', '$y = 2x - 1$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(192, 38, 'D', '$y = 2x + 1$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(193, 39, 'A', '$y = -2x + 7$', NULL, 1, '2026-04-21 01:25:02', '2026-07-14 02:49:29'),
(194, 39, 'B', '$y = 2x - 9$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(195, 39, 'C', '$y = -\\frac{1}{2}x + 1$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(196, 39, 'D', '$y = -2x + 11$', NULL, 0, '2026-04-21 01:25:02', '2026-07-14 02:49:29'),
(197, 40, 'A', '$y = 3x - 11$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(198, 40, 'B', '$y = -3x + 7$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(199, 40, 'C', '$y = 3x - 7$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(200, 40, 'D', '$y = 3x + 11$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(201, 41, 'A', '$y = x + 7$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(202, 41, 'B', '$y = -x - 5$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(203, 41, 'C', '$y = x - 5$', NULL, 1, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(204, 41, 'D', '$y = -x + 7$', NULL, 0, '2026-04-21 01:25:02', '2026-04-21 05:19:28'),
(205, 42, 'A', '$3x + y - 4 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(206, 42, 'B', '$3x - y - 4 = 0$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(207, 42, 'C', '$6x - y - 8 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(208, 42, 'D', '$6x + 2y - 8 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(209, 43, 'A', '', '1781098987_7F3Wp0hC.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:43:26'),
(210, 43, 'B', '', '1781099874_MjcLwR6s.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:57:54'),
(211, 43, 'C', '', '1781098987_364vtNy9.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:43:26'),
(212, 43, 'D', '', '1781098987_IObsaO1j.png', 1, '2026-04-21 05:51:51', '2026-06-10 05:43:26'),
(213, 44, 'A', '$-\\frac{3}{2}$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(214, 44, 'B', '$\\frac{2}{3}$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(215, 44, 'C', '$\\frac{3}{2}$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(216, 44, 'D', '$-\\frac{2}{3}$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(217, 45, 'A', '', '1781099150_j31g2oUo.png', 1, '2026-04-21 05:51:51', '2026-06-10 05:46:02'),
(218, 45, 'B', '', '1781099150_stlFyJzr.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:45:50'),
(219, 45, 'C', '', '1781099150_Tv8OsPG7.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:46:02'),
(220, 45, 'D', '', '1781099150_LCV1p1Ld.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:45:50'),
(221, 46, 'A', '$y = 2x$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(222, 46, 'B', '$y = -2x + 4$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(223, 46, 'C', '$y = 2x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(224, 46, 'D', '$2x + y - 4 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(225, 47, 'A', '$y = 2x - 9$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(226, 47, 'B', '$y = -\\frac{1}{2}x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(227, 47, 'C', '$y = -2x + 7$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(228, 47, 'D', '$y = \\frac{1}{2}x - 3$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(229, 48, 'A', '$y = 2x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(230, 48, 'B', '$y = 3x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(231, 48, 'C', '$y = x + 5$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(232, 48, 'D', '$y = 2x + 3$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(233, 49, 'A', '$x - y + 6 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(234, 49, 'B', '$x + y - 6 = 0$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(235, 49, 'C', '$x - y - 4 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(236, 49, 'D', '$x + y + 6 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(237, 50, 'A', 'tegak lurus', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(238, 50, 'B', 'sejajar sumbu-$x$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(239, 50, 'C', 'sejajar', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(240, 50, 'D', 'berpotongan tetapi tidak tegak lurus', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(241, 51, 'A', '$-2$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(242, 51, 'B', '$-\\frac{1}{2}$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(243, 51, 'C', '$2$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(244, 51, 'D', '$\\frac{1}{2}$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(245, 52, 'A', '', '1781099241_jSWH1WOq.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:47:21'),
(246, 52, 'B', '', '1781099241_LrMkBfFE.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:47:21'),
(247, 52, 'C', '', '1781099241_0NJorxAt.png', 0, '2026-04-21 05:51:51', '2026-06-10 05:47:21'),
(248, 52, 'D', '', '1781099241_USwo6CVs.png', 1, '2026-04-21 05:51:51', '2026-06-10 05:47:21'),
(249, 53, 'A', '$3x - y - 7 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(250, 53, 'B', '$3x + y - 7 = 0$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(251, 53, 'C', '$x + 3y - 7 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(252, 53, 'D', '$3x + y + 7 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(253, 54, 'A', '$9$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(254, 54, 'B', '$11$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(255, 54, 'C', '$7$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(256, 54, 'D', '$5$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(257, 55, 'A', '$y = -2x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(258, 55, 'B', '$y = 2x - 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(259, 55, 'C', '$2x + y + 5 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(260, 55, 'D', '$y = \\frac{1}{2}x - 3$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(261, 56, 'A', 'Rp9.000', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(262, 56, 'B', 'Rp15.000', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(263, 56, 'C', 'Rp12.000', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(264, 56, 'D', 'Rp10.500', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(265, 57, 'A', '$3x + 4y - 1 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(266, 57, 'B', '$3x - 4y + 1 = 0$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(267, 57, 'C', '$3x + 4y + 1 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(268, 57, 'D', '$4x - 3y + 1 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(269, 58, 'A', 'tegak lurus', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(270, 58, 'B', 'sejajar', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(271, 58, 'C', 'sejajar sumbu-$x$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(272, 58, 'D', 'berpotongan tetapi tidak tegak lurus', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(273, 59, 'A', '$2x - 3y - 5 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(274, 59, 'B', '$2x + 3y + 5 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(275, 59, 'C', '$2x + 3y - 5 = 0$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(276, 59, 'D', '$3x + 2y - 5 = 0$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(277, 60, 'A', '$y = \\frac{1}{2}x$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(278, 60, 'B', '$y = 2x$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(279, 60, 'C', '$y = -\\frac{1}{2}x$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(280, 60, 'D', '$y = -2x$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(281, 61, 'A', '$y = -2x - 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(282, 61, 'B', '$y = 2x - 1$', NULL, 1, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(283, 61, 'C', '$y = -2x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51'),
(284, 61, 'D', '$y = 2x + 1$', NULL, 0, '2026-04-21 05:51:51', '2026-04-21 05:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int UNSIGNED NOT NULL,
  `quiz_id` int UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_order` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question_text`, `question_image`, `question_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Persamaan garis lurus merupakan persamaan matematika yang apabila digambar pada bidang koordinat Kartesius akan membentuk ....', NULL, 1, '2026-03-19 15:09:45', '2026-06-10 11:38:13'),
(2, 1, 'Bentuk eksplisit persamaan garis lurus dituliskan sebagai ....', NULL, 2, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(3, 1, 'Pada persamaan $3x + 2y - 6 = 0$, nilai dari konstanta $c$ adalah ....', NULL, 3, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(4, 1, 'Persamaan yang merupakan persamaan garis lurus adalah ....', NULL, 4, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(5, 1, 'Persamaan $y = -2x + 3$ jika diubah ke bentuk umum $ax + by + c = 0$ menjadi ....', NULL, 5, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(6, 1, 'Persamaan $3x + 2y - 6 = 0$ jika diubah ke bentuk eksplisit menjadi ....', NULL, 6, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(7, 1, 'Titik potong grafik $y = -2x + 6$ dengan sumbu $x$ adalah ....', NULL, 7, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(8, 1, 'Diketahui persamaan garis lurus $y = x + 2$. Jika digunakan nilai $x = -2, 0,$ dan $2$, grafik yang sesuai dengan persamaan tersebut adalah ....', NULL, 8, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(9, 1, 'Grafik yang sesuai dengan persamaan $y = -2x + 4$ adalah ....', NULL, 9, '2026-03-19 15:09:45', '2026-06-10 11:38:14'),
(10, 1, 'Yang merupakan grafik dari persamaan $3x + y - 6 = 0$ adalah ....', NULL, 10, '2026-03-19 15:09:45', '2026-06-10 05:01:29'),
(12, 2, 'Garis $l$ melalui titik $A(-2,3)$ dan $B(4,-6)$. Gradien garis $l$ adalah ....', '1776505804_bboGXhol.png', 1, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(13, 2, 'Sebuah garis melalui titik $O(0,0)$ dan titik $P(a,12)$. Jika gradien garis tersebut adalah $\\frac{3}{2}$, maka nilai $a$ adalah ....', NULL, 2, '2026-04-13 05:47:10', '2026-06-07 10:10:39'),
(14, 2, 'Diketahui persamaan garis $4x + 2y - 10 = 0$. Gradien garis tersebut adalah ....', NULL, 3, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(15, 2, 'Perhatikan dua garis berikut. Garis I melalui titik $(1,2)$ dan $(5,10)$. Garis II melalui titik $(-2,4)$ dan $(4,1)$. Pernyataan yang benar adalah ....', NULL, 4, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(16, 2, 'Seorang pendaki berangkat dari titik $O(0,0)$. Jalur A menuju pos di titik $(900,300)$, sedangkan jalur B menuju pos di titik $(600,300)$. Jalur yang lebih landai adalah ....', NULL, 5, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(17, 2, 'Garis $k$ melalui titik $P(2,-1)$ dan $Q(6,p)$. Jika gradien garis $k$ adalah $2$, maka nilai $p$ adalah ....', NULL, 6, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(18, 2, 'Suatu jalan pada peta dinyatakan oleh persamaan $3y = 2x - 12$, sedangkan jalan lain dinyatakan oleh persamaan $2x + 3y + 9 = 0$. Hubungan gradien kedua jalan tersebut adalah ....', NULL, 7, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(19, 2, 'Titik $A(-3,5)$, $B(1,1)$, dan $C(5,-3)$ terletak pada satu garis lurus. Gradien garis tersebut adalah ....', '1776505815_GuLd1lME.png', 8, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(20, 2, 'Sebuah papan dipasang dari titik $(2,1)$ ke titik $(10,5)$. Agar papan menjadi lebih curam tetapi titik awal tetap, tukang mengubah ujung papan menjadi salah satu titik berikut. Pilihan yang benar adalah ....', NULL, 9, '2026-04-13 05:47:10', '2026-05-06 10:38:21'),
(21, 2, 'Diketahui garis $m$ memiliki gradien $-\\frac{3}{4}$. Pasangan titik yang sesuai adalah ....', NULL, 10, '2026-04-13 05:47:10', '2026-06-07 10:10:39'),
(22, 3, 'Garis yang melalui titik $A(3,5)$ dan $B(-2,5)$ memiliki kedudukan ....', NULL, 1, '2026-04-20 11:12:54', '2026-05-06 10:39:02'),
(23, 3, 'Diketahui garis $k$ melalui titik $P(4,-1)$ dan $Q(4,6)$. Pernyataan yang benar adalah ....', NULL, 2, '2026-04-20 11:12:54', '2026-05-06 10:39:02'),
(24, 3, 'Diketahui garis $p$ memiliki persamaan $2x - y + 3 = 0$. Garis yang sejajar dengan garis $p$ adalah ....', NULL, 3, '2026-04-20 11:12:54', '2026-06-07 10:21:15'),
(25, 3, 'Diketahui garis $a$ melalui titik $(-1,2)$ dan $(3,10)$, sedangkan garis $b$ melalui titik $(2,-4)$ dan $(6,4)$. Hubungan kedua garis adalah ....', NULL, 4, '2026-04-20 11:12:54', '2026-05-06 10:39:02'),
(26, 3, 'Nilai $p$ agar garis yang melalui titik $A(2,p)$ dan $B(7,p)$ sejajar dengan sumbu-$x$ adalah ....', NULL, 5, '2026-04-20 11:12:54', '2026-05-06 10:39:02'),
(27, 3, 'Gradien garis yang tegak lurus dengan garis $y = -\\frac{2}{3}x + 5$ adalah ....', NULL, 6, '2026-04-20 11:12:54', '2026-07-14 02:50:03'),
(28, 3, 'Sebuah jalan lama pada peta melalui titik $A(100,250)$ dan $B(500,50)$. Jalan baru akan dibuat tegak lurus terhadap jalan lama. Gradien jalan baru adalah ....', NULL, 7, '2026-04-20 11:12:54', '2026-05-06 10:41:46'),
(29, 3, 'Perhatikan dua garis berikut. Garis I: $3x + y - 8 = 0$. Garis II: melalui titik $(1,4)$ dan $(3,-2)$. Hubungan kedua garis adalah ....', NULL, 8, '2026-04-20 11:12:54', '2026-05-06 10:41:46'),
(30, 3, 'Diketahui garis $m$ sejajar dengan garis $4x + 2y - 6 = 0$. Gradien garis $m$ adalah ....', NULL, 9, '2026-04-20 11:12:54', '2026-05-06 10:41:46'),
(31, 3, 'Seorang perencana taman membuat dua jalur lurus. Jalur I melalui titik $(0,0)$ dan $(6,3)$. Jalur II melalui titik $(2,7)$ dan $(6,p)$. Agar kedua jalur sejajar, nilai $p$ adalah ....', NULL, 10, '2026-04-20 11:12:54', '2026-05-06 10:41:46'),
(32, 4, 'Persamaan garis yang melalui titik $(2,-3)$ dan memiliki gradien $4$ adalah ....', NULL, 1, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(33, 4, 'Garis yang melalui titik $(-1,5)$ dan $(3,-3)$ memiliki persamaan ....', NULL, 2, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(34, 4, 'Persamaan garis yang melalui titik $(4,1)$ dan sejajar dengan garis $3x - y + 5 = 0$ adalah ....', NULL, 3, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(35, 4, 'Persamaan garis yang melalui titik $(6,2)$ dan tegak lurus dengan garis $2x + 4y - 8 = 0$ adalah ....', NULL, 4, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(36, 4, 'Suhu suatu ruangan berubah secara teratur. Pada pukul ke-$2$, suhu ruangan $6^{\\circ}\\mathrm{C}$, dan setiap jam suhu naik $3^{\\circ}\\mathrm{C}$. Persamaan garis yang menyatakan hubungan waktu $x$ dan suhu $y$ adalah ....', NULL, 5, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(37, 4, 'Tinggi tanaman dicatat pada dua waktu. Pada hari ke-$1$ tingginya $8$ cm dan pada hari ke-$5$ tingginya $20$ cm. Jika pertumbuhan dianggap linear, persamaan garis yang menyatakan hubungan hari $x$ dan tinggi tanaman $y$ adalah ....', NULL, 6, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(38, 4, 'Sebuah garis melalui titik $A(2,5)$ dan sejajar dengan garis yang melalui titik $B(1,1)$ dan $C(5,9)$. Persamaan garis melalui titik $A$ tersebut adalah ....', NULL, 7, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(39, 4, 'Sebuah jalan kecil pada peta harus melalui titik $(4,-1)$ dan tegak lurus terhadap jalan utama yang melalui titik $(0,2)$ dan $(6,5)$. Persamaan jalan kecil itu adalah ....', NULL, 8, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(40, 4, 'Garis $k$ melalui titik $(3,-2)$ dan $(5,4)$. Persamaan garis $k$ adalah ....', NULL, 9, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(41, 4, 'Pada denah sekolah, jalur utama melalui titik $(2,10)$ dan $(8,4)$. Akan dibuat jalur baru yang melalui titik $(6,1)$ dan tegak lurus terhadap jalur utama. Persamaan jalur baru tersebut adalah ....', NULL, 10, '2026-04-21 01:25:02', '2026-05-06 10:41:46'),
(42, 5, 'Persamaan $2y = 6x - 8$ jika diubah ke bentuk umum $Ax + By + C = 0$ menjadi ....', NULL, 1, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(43, 5, 'Sebuah jalan menurun dimodelkan dengan persamaan $y = -2x + 5$. Jika nilai $x$ berturut-turut adalah $1$, $3$, dan $5$, grafik yang sesuai adalah ....', NULL, 2, '2026-04-21 05:51:51', '2026-06-10 05:43:07'),
(44, 5, 'Gradien garis yang melalui titik $(-2,4)$ dan $(2,-2)$ adalah ....', NULL, 3, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(45, 5, 'Grafik yang sesuai dengan persamaan $y=-\\frac{1}{2}x+3$ adalah ....', NULL, 4, '2026-04-21 05:51:51', '2026-06-10 05:45:50'),
(46, 5, 'Persamaan garis yang melalui titik $(1,2)$ dan sejajar dengan garis $2x - y + 3 = 0$ adalah ....', NULL, 5, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(47, 5, 'Persamaan garis yang melalui titik $(4,-1)$ dan tegak lurus dengan garis $y = \\frac{1}{2}x + 3$ adalah ....', NULL, 6, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(48, 5, 'Tinggi tanaman pada hari ke-$2$ adalah $7$ cm dan pada hari ke-$6$ adalah $15$ cm. Jika pertumbuhan tanaman dianggap linear, persamaan garis yang menyatakan hubungan hari $x$ dan tinggi tanaman $y$ adalah ....', NULL, 7, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(49, 5, 'Persamaan garis yang melalui titik $(1,5)$ dan $(5,1)$ dalam bentuk umum adalah ....', NULL, 8, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(50, 5, 'Diketahui garis $3x - 2y + 4 = 0$ dan garis $6x - 4y - 9 = 0$. Kedudukan kedua garis tersebut adalah ....', NULL, 9, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(51, 5, 'Sebuah jalan lama pada peta melalui titik $(100,40)$ dan $(160,70)$. Jika jalan baru dibuat tegak lurus terhadap jalan lama, gradien jalan baru adalah ....', NULL, 10, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(52, 5, 'Grafik yang sesuai dengan persamaan $x+y-4=0$ adalah ....', NULL, 11, '2026-04-21 05:51:51', '2026-06-10 05:47:21'),
(53, 5, 'Persamaan garis yang melalui titik $(3,-2)$ dan memiliki gradien $-3$ dalam bentuk umum adalah ....', NULL, 12, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(54, 5, 'Nilai $p$ agar garis yang melalui titik $(2,5)$ dan $(6,p)$ sejajar dengan garis $y = x - 4$ adalah ....', NULL, 13, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(55, 5, 'Garis yang tegak lurus dengan garis $4x + 2y - 8 = 0$ adalah ....', NULL, 14, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(56, 5, 'Seorang siswa membeli buku tulis. Data pembayaran dinyatakan oleh titik $(2,9000)$ dan $(5,18000)$. Jika hubungan banyak buku dan harga membentuk garis lurus, jumlah uang yang harus dibayar untuk $3$ buku adalah ....', NULL, 15, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(57, 5, 'Pada gambar persegi panjang, diagonal $AC$ menghubungkan titik $A(1,1)$ dan $C(5,4)$. Persamaan garis diagonal $AC$ adalah ....', '1779303560_jLAtJxJ2.png', 16, '2026-04-21 05:51:51', '2026-05-20 02:59:20'),
(58, 5, 'Garis $k$ melalui titik $(-3,2)$ dan $(4,2)$, sedangkan garis $l$ melalui titik $(1,-1)$ dan $(1,5)$. Hubungan kedua garis adalah ....', NULL, 17, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(59, 5, 'Persamaan garis yang melalui titik $(-2,3)$ dan sejajar dengan garis $2x + 3y - 6 = 0$ adalah ....', NULL, 18, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(60, 5, 'Persamaan garis yang melalui titik $(0,0)$ dan tegak lurus dengan garis yang melalui titik $(2,1)$ dan $(6,3)$ adalah ....', NULL, 19, '2026-04-21 05:51:51', '2026-05-06 10:44:15'),
(61, 5, 'Pada denah sekolah, jalur utama melalui titik $(1,2)$ dan $(5,10)$. Akan dibuat jalur lain yang sejajar dengan jalur utama dan melalui titik $(0,-1)$. Persamaan jalur baru tersebut adalah ....', NULL, 20, '2026-04-21 05:51:51', '2026-05-06 10:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MZTxTFNAViLD2HEYZ7ymuGYPpWmYLEUwFbGunpNi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHZBeFlkbEJYY0haa3djb1RwZG5NSTdNZDB2OEFrSFROY3k3dVlrZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YS9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1785125543),
('W29qOlfBlXcBLYtCYirNelIE1QX1r5AbJWaNs3QU', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZlhXYkU2M1NXNENVSDZRRVEyazZsT01EZkpCdXRCQzhLczRWTmlkbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hdGVyaS9zdWJiYWItYTItMiI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWF0ZXJpL3N1YmJhYi1hMSI7czo1OiJyb3V0ZSI7czoxMToibWF0ZXJpLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9zaXN3YV81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O30=', 1785126643);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` int UNSIGNED DEFAULT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `email`, `jenis_kelamin`, `kelas_id`, `kelas`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(16, 'Nurleli', '2210131220005', '2210131220005@mhs.ulm.ac.id', 'Perempuan', 2, '8A', '$2y$12$cAtb6KPP9PcUSdlDKWIoJuffD3xl9Fg.4VJhTW9lfunIx.A9J1v8e', '2026-03-19 19:09:32', '2026-03-19 19:09:32', '1co6wGOnhgVvv1cpoDqh3gbRrEE7K2zhDGyK0BSvuD1U3I4gO6Hms0fRJxlw'),
(17, 'Olyvia Ika Aibina', '555666', 'oline33@gmail.com', 'Perempuan', 2, '8A', '$2y$12$9ifzK57Egz8e4MecDAQwBe9i/qzJXXHDNpQD5.707dJkV6s4f9W6y', '2026-03-31 22:15:18', '2026-04-13 06:08:57', NULL),
(18, 'Leli Irwan', '14042026', 'leliirwan22@gmail.com', 'Perempuan', 3, '8B', '$2y$12$z21uqFWKsTEFd3LPzg7x/OQSI7tQv492p2rbO/DueIQ7uLzK35HeG', '2026-04-13 19:07:57', '2026-04-13 19:07:57', NULL),
(19, 'Rosi', '123456', 'siswabelajar@gmail.com', 'Laki-laki', 2, '8A', '$2y$12$rcaTmxP.U9vo1uVa21waFu2PxWpmzTiCV2M3TdfxUr7vDNAM7buim', '2026-04-21 10:47:43', '2026-06-10 04:41:49', 'XSpzK2uxZDScPVrfZcoEdYI4nL137cMVOLgqqcaT9ri7EN7l1cxtl3oiGHJK'),
(20, 'Olyvia I', '13680135', 'lalaland23@gmail.com', 'Laki-laki', 2, '8A', '$2y$12$C3aFqHlNvFtWLC/V5ANWX.GDm01dkVD16vYd/mOHWZhZ/MqpYhRKa', '2026-04-28 09:45:21', '2026-06-04 22:44:28', NULL),
(21, 'Juhai', '555555', 'juhai123@gmail.com', 'Perempuan', 3, '8B', '$2y$12$vrEI1gcNla3ybkt3F57uE.B5zN3a0ASrhJ/9E/orQZzE2clMTFA1q', '2026-06-11 22:51:08', '2026-06-11 22:51:08', NULL),
(22, 'Mahalini', '123446666', 'mm123@gmail.com', 'Perempuan', 1, '8C', '$2y$12$JEXFtNrlNo0sRrl5q092JuHzVo1hFYOYcJB1o2sYOrogzKMcr83Ri', '2026-06-14 22:20:41', '2026-06-14 22:20:41', NULL),
(23, 'Siswa 1', '8B001', 'siswa1@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$qUJLjXZ8I/K1A4W8ftTIC.qHSBscMLUOZZAYFzO6DqGuZFRQXAygi', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(24, 'Siswa 2', '8B002', 'siswa2@gmail.com', 'Perempuan', 3, '8B', '$2y$12$U8.h/iWs.cs78vdbG19CO.3k.5Jh8xHnBLViMypPn/JmWSoWThT3y', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(25, 'Siswa 3', '8B003', 'siswa3@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$RK9WFc0p9URktQl3r.4UQeDYyioBfTGDeSOwBnsdjb4UEhmamuOGe', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(26, 'Siswa 4', '8B004', 'siswa4@gmail.com', 'Perempuan', 3, '8B', '$2y$12$AcKBWhh3VJAyGx6g8MpBWOTMCB6FIpIwZYawzkOFqf4Off0UvCu6y', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(27, 'Siswa 5', '8B005', 'siswa5@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$qXWZxj037EwuUGVPdk49GerBuEmdrM0wn9gXZR1mdDe6mDUOp/Ic6', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(28, 'Siswa 6', '8B006', 'siswa6@gmail.com', 'Perempuan', 3, '8B', '$2y$12$KiarxRZDsx6DZzEdLwGbHeltM81ThgnzbfJV5ofYPKL/nvVLiIB.2', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(29, 'Siswa 7', '8B007', 'siswa7@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$3VlwkpL2moClWqJ267r3kOrHy/JVx/UXUYjEnWkWtlSE7OZ.mC6/u', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(30, 'Siswa 8', '8B008', 'siswa8@gmail.com', 'Perempuan', 3, '8B', '$2y$12$ZpZ/wNBrHO1Ns095CBBlmO4DPSGYk6YWdvPvaOHunSoY5CmAdUfuO', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(31, 'Siswa 9', '8B009', 'siswa9@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$rPPl0/rOaLv39qzJ0L8YbebQheza4nPknTftmqCMxCXoaV/77x6we', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(32, 'Siswa 10', '8B010', 'siswa10@gmail.com', 'Perempuan', 3, '8B', '$2y$12$DbeDGdQq51moNG9EKkb8a.aguOhE4/89MssVcOLLw4EgbfmU90F7i', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(33, 'Siswa 11', '8B011', 'siswa11@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$a8Rk.0mUQYrMUjZmOkFw/e6/WpJsIc1CHXa5cNs3J30uPvoq5FMiK', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(34, 'Siswa 12', '8B012', 'siswa12@gmail.com', 'Perempuan', 3, '8B', '$2y$12$9DwSIp21cvT7ABunH3/F5OnT/TyA35aCceyrDA5VosUWf6PZCkBM6', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(35, 'Siswa 13', '8B013', 'siswa13@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$5w.WGHF9zTNixut3JpRBN.kQqdP/KFeVBBE/.eCOEULZ.w.DZqk6O', '2026-06-18 16:15:38', '2026-06-18 16:15:38', NULL),
(36, 'Siswa 14', '8B014', 'siswa14@gmail.com', 'Perempuan', 3, '8B', '$2y$12$1oZccFC3mSw6y9pjRq2Rn.fDJ5A9GMgnchgPb94tI.seLlUu.zUfW', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(37, 'Siswa 15', '8B015', 'siswa15@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$2iB0YC.HUg7UPHCU4hkdQuA52Vmf675UHE8JwNCxb96sMp56Twf9O', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(38, 'Siswa 16', '8B016', 'siswa16@gmail.com', 'Perempuan', 3, '8B', '$2y$12$tG36TCJtiIz0lrnyG6FIRuRzzkWPrEMkA9VL56wzBsYEgjpUyMCWG', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(39, 'Siswa 17', '8B017', 'siswa17@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$jqlwaLkI8Vwjl.WEIKRW4eJZbHs/gxWdoxo9zXfbOeUDFTrhpBsUa', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(40, 'Siswa 18', '8B018', 'siswa18@gmail.com', 'Perempuan', 3, '8B', '$2y$12$sYkDVEWTU7RV3oa9sPwnI.GXagKJRSDrRNds4NgwBvBE0axQPeGSS', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(41, 'Siswa 19', '8B019', 'siswa19@gmail.com', 'Laki-laki', 3, '8B', '$2y$12$Bq16NbauuwA6h8BDDZX2CuWey6awDk5UHOqtMSf03.Y.FjWeZbEjm', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(42, 'Siswa 20', '8B020', 'siswa20@gmail.com', 'Perempuan', 3, '8B', '$2y$12$ACEL3001dZiOn1hQDgCfbObHke1Vil3omTsCh5BTe0506JdsAlZiy', '2026-06-18 16:15:39', '2026-06-18 16:15:39', NULL),
(43, 'Siswa Test', '112233445', 'siswatest@gmail.com', 'Laki-laki', 1, NULL, '$2y$12$qSKeqdMRKZebafTEKy7/GOek1tMnmRpnOwA2m4dr8yQFAvkrJ.7py', '2026-06-20 21:27:13', '2026-06-20 21:27:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nama_kelas` (`nama_kelas`),
  ADD UNIQUE KEY `unique_token_kelas` (`token_kelas`);

--
-- Indexes for table `latihan_progress`
--
ALTER TABLE `latihan_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_materi_latihan` (`student_id`,`materi_id`,`latihan_key`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_materi_bab` (`bab_id`);

--
-- Indexes for table `material_progress`
--
ALTER TABLE `material_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_materi` (`student_id`,`materi_id`),
  ADD KEY `fk_material_progress_materi` (`materi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quizzes_bab` (`bab_id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_attempt_question` (`attempt_id`,`question_id`),
  ADD KEY `fk_quiz_answers_question` (`question_id`),
  ADD KEY `fk_quiz_answers_option` (`selected_option_id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz_attempts_student` (`student_id`),
  ADD KEY `idx_attempt_periode` (`quiz_id`,`student_id`,`is_reset`,`status`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_question_option_label` (`question_id`,`option_label`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_quiz_question_order` (`quiz_id`,`question_order`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `siswa_kelas_id_index` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bab`
--
ALTER TABLE `bab`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `latihan_progress`
--
ALTER TABLE `latihan_progress`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `material_progress`
--
ALTER TABLE `material_progress`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_materi_bab` FOREIGN KEY (`bab_id`) REFERENCES `bab` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_progress`
--
ALTER TABLE `material_progress`
  ADD CONSTRAINT `fk_material_progress_materi` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_quizzes_bab` FOREIGN KEY (`bab_id`) REFERENCES `bab` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `fk_quiz_answers_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `quiz_attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_quiz_answers_option` FOREIGN KEY (`selected_option_id`) REFERENCES `quiz_options` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_quiz_answers_question` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `fk_quiz_attempts_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_quiz_attempts_student` FOREIGN KEY (`student_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
