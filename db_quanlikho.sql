-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2020 lúc 12:58 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_quanlikho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatluong`
--

CREATE TABLE `chatluong` (
  `id` int(10) UNSIGNED NOT NULL,
  `cl_ma` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cl_ten` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chatluong`
--

INSERT INTO `chatluong` (`id`, `cl_ma`, `cl_ten`, `created_at`, `updated_at`) VALUES
(1, 'T01', 'Tốt', NULL, NULL),
(2, 'TB01', 'Trung bình', NULL, NULL),
(3, 'K01', 'Kém', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnhapkho`
--

CREATE TABLE `chitietnhapkho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ctnk_soluong` int(11) NOT NULL,
  `ctnk_thanhtien` double NOT NULL,
  `vt_id` int(10) UNSIGNED NOT NULL,
  `pnk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietnhapkho`
--

INSERT INTO `chitietnhapkho` (`id`, `ctnk_soluong`, `ctnk_thanhtien`, `vt_id`, `pnk_id`, `created_at`, `updated_at`) VALUES
(6, 8, 81480, 11, 8, '2020-11-09 08:56:00', '2020-11-09 08:56:00'),
(8, 2, 187000, 12, 10, '2020-11-09 08:57:53', '2020-11-09 08:57:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietxuatkho`
--

CREATE TABLE `chitietxuatkho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ctxk_soluong` int(11) NOT NULL,
  `ctxk_thanhtien` float NOT NULL,
  `vattu_id` int(10) UNSIGNED NOT NULL,
  `phieuxuatkho_id` bigint(20) UNSIGNED NOT NULL,
  `kho_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietxuatkho`
--

INSERT INTO `chitietxuatkho` (`id`, `ctxk_soluong`, `ctxk_thanhtien`, `vattu_id`, `phieuxuatkho_id`, `kho_id`, `created_at`, `updated_at`) VALUES
(5, 2, 20370, 11, 5, 2, '2020-12-01 01:15:54', '2020-12-01 01:15:54'),
(6, 23, 5865000, 5, 6, 1, '2020-12-01 20:06:30', '2020-12-01 20:06:30'),
(7, 2, 20370, 8, 6, 2, '2020-12-01 20:06:30', '2020-12-01 20:06:30'),
(8, 2, 20370, 11, 7, 2, '2020-12-02 09:22:11', '2020-12-02 09:22:11'),
(9, 2, 20370, 9, 7, 2, '2020-12-02 09:22:11', '2020-12-02 09:22:11'),
(18, 2, 500000, 6, 16, 1, '2020-12-20 03:14:20', '2020-12-20 03:14:20'),
(19, 2, 500000, 6, 17, 1, '2020-12-20 03:14:37', '2020-12-20 03:14:37'),
(20, 2, 170000, 13, 18, 1, '2020-12-20 03:15:13', '2020-12-20 03:15:13'),
(21, 2, 540000, 4, 19, 1, '2020-12-20 03:16:16', '2020-12-20 03:16:16'),
(22, 2, 540000, 4, 20, 1, '2020-12-20 03:17:34', '2020-12-20 03:17:34'),
(23, 2, 20370, 10, 21, 2, '2020-12-20 03:19:58', '2020-12-20 03:19:58'),
(24, 3, 30105, 7, 22, 2, '2020-12-20 03:27:55', '2020-12-20 03:27:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtrinh`
--

CREATE TABLE `congtrinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congtrinh`
--

INSERT INTO `congtrinh` (`id`, `ten`, `diachi`, `created_at`, `updated_at`) VALUES
(1, 'Xây dựng nhà', '180 Võ Thị Sáu, quận 3, Hồ Chí Minh', NULL, NULL),
(2, 'Xây dựng nhà', '146/37/16 Vũ Tùng, phường 2, quận Bình Thạnh, Hồ Chí Minh', NULL, NULL),
(3, 'Xây dựng quán cafe', '182 Pasteur, phường Bến Nghé, quận 1, Hồ Chí Minh', NULL, NULL),
(4, 'Xậy dựng quán ăn', '442 Phan Xích Long, phường 2, quận Phú Nhuận, Hồ Chí Minh', NULL, NULL),
(5, 'Thi công UBND', '501 Lê Quang Định, phường 1, quận Gò Vấp, Hồ Chí Minh', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `dvt_ma` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dvt_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`id`, `dvt_ma`, `dvt_ten`, `created_at`, `updated_at`) VALUES
(2, 'DVT02', '1 Cây(11.7m)', '2020-12-05 13:38:16', NULL),
(3, 'DVT03', 'M3(Mét khối)', '2020-12-05 13:38:20', NULL),
(4, 'DVT04', 'Bao(50kg)', '2020-12-05 13:38:24', NULL),
(5, 'DVT05', 'Viên', '2020-12-05 13:38:28', NULL),
(6, 'DVT06', '1L', '2020-12-05 13:38:32', NULL),
(7, 'DVT07', '5L', '2020-12-05 13:38:35', NULL),
(8, 'DVT08', '18L', '2020-12-05 13:38:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khovt`
--

CREATE TABLE `khovt` (
  `id` int(11) NOT NULL,
  `kho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kho_sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kho_lienhe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kv_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khovt`
--

INSERT INTO `khovt` (`id`, `kho_ten`, `kho_sdt`, `k_diachi`, `kho_lienhe`, `kv_id`, `created_at`, `updated_at`) VALUES
(1, 'Kho TP HCM', '0918693003', 'TP Hồ Chí Minh', 'Nguyễn Văn A', 1, '2020-11-14 13:56:13', '2020-12-05 07:14:08'),
(2, 'Kho TP HCM 2', '036785966', 'Q1 HCM', 'Nguyễn Văn B ', 1, '2020-11-14 13:58:03', '2020-11-14 13:58:03'),
(3, 'Kho Bình Dương', '032655566', 'Bình Dương', 'Nguyễn Văn C', 3, '2020-11-14 13:58:27', '2020-11-14 13:58:27'),
(4, 'Kho Đồng Nai', '0919839903', 'Đồng Nai', 'Nguyễn Văn D', 2, '2020-11-14 13:58:48', '2020-11-14 13:58:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `kv_ma` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kv_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`id`, `kv_ma`, `kv_ten`, `created_at`, `updated_at`) VALUES
(1, 'KV01', 'Khu vực TP. Hồ Chí Minh', NULL, NULL),
(2, 'Kv02', 'Khu vực Đồng Nai', NULL, NULL),
(3, 'KV03', 'Khu vực Bình Dương', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(81, '2014_10_12_000000_create_users_table', 1),
(82, '2014_10_12_100000_create_password_resets_table', 1),
(83, '2019_06_10_140658_create_khuvuc_table', 1),
(84, '2019_06_10_141114_create_nhasanxuat_table', 1),
(85, '2019_06_10_141629_create_nhaphanphoi_table', 1),
(86, '2019_06_10_143233_create_kho_table', 1),
(87, '2019_06_10_143657_create_chatluong_table', 1),
(88, '2019_06_10_143855_create_nhomvattu_table', 1),
(89, '2019_06_10_143946_create_donvitinh_table', 1),
(90, '2019_06_10_143959_create_vattu_table', 1),
(91, '2019_06_10_144218_create_congtrinh_table', 1),
(92, '2019_06_10_144402_create_phieunhapkho_table', 1),
(93, '2019_06_10_144819_create_chitietnhapkho_table', 1),
(94, '2019_06_10_145418_create_phieuxuatkho_table', 1),
(95, '2019_06_10_145728_create_chitietxuatkho_table', 1),
(96, '2019_06_10_152120_create_vattukho_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_ten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nv_sdt` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GioiTinh` int(10) DEFAULT NULL,
  `CMND` int(10) DEFAULT NULL,
  `nv_diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `email`, `nv_ten`, `nv_sdt`, `GioiTinh`, `CMND`, `nv_diachi`, `created_at`, `updated_at`) VALUES
(1, 'vtdkhoa@gmail.com', 'Phan Khương', '0919839903', 1, 197416451, 'Quảng Trị', '2020-11-09 15:40:53', '2020-12-20 20:52:43'),
(3, 'pkhkhuong.18i@cit.udn.vn', 'Phan Khương', NULL, 1, NULL, NULL, '2020-11-13 06:50:41', '2020-11-13 06:50:41'),
(4, 'hieu12@gmail.com', 'hieu', NULL, 1, NULL, NULL, '2020-11-13 07:35:55', '2020-11-13 07:35:55'),
(7, 'khuonghstvk@gmail.com', 'Khương', '0334956419', 1, 197416451, 'Hải Lăng, Quảng Trị', '2020-12-17 02:32:08', '2020-12-17 02:32:08'),
(8, 'lhphu.18i@cit.udn.vn', 'Lê Hồng Phú', '0335678942', 1, 123789654, 'Quảng TRị', '2020-12-23 00:01:56', '2020-12-23 00:03:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphanphoi`
--

CREATE TABLE `nhaphanphoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `npp_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khuvuc_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaphanphoi`
--

INSERT INTO `nhaphanphoi` (`id`, `npp_ten`, `diachi`, `sodienthoai`, `email`, `khuvuc_id`, `created_at`, `updated_at`) VALUES
(1, 'Cty TNHH Tân Thành Trung', '2 Hoàng Diệu, phường Linh Trung, Thủ Đức, Hồ Chí Minh', '02899899638', 'tanthanhtrung@hotmail.com', 1, NULL, NULL),
(2, 'Cty phân phối vật liệu xây dựng Tâm Amaz', '28 Đường số 2, An Bình, Dĩ An, Bình Dương', '02810102356', 'tam.amaz@gmail.com', 3, NULL, NULL),
(3, 'Nhà phân phối Nile River', '18 Trần Hưng Đạo, Trảng Bom, Đồng Nai', '02836925874', 'nileriver@cty.mail', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nsx_ma` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsx_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kv_id` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id`, `nsx_ma`, `nsx_ten`, `kv_id`, `created_at`, `updated_at`) VALUES
(1, 'HP', 'Thép Hòa Phát', 1, NULL, NULL),
(2, 'HS', 'Tập đoàn Hoa Sen', 2, NULL, NULL),
(3, 'TP', 'Thép Pomina', 2, NULL, NULL),
(4, 'TDA', 'Tôn Đông Á', 1, NULL, NULL),
(5, 'XM_HT', 'Xi măng Hà Tiên', 1, NULL, NULL),
(6, 'XM_H', 'Xi măng Holcim', 2, NULL, NULL),
(7, 'DT', 'Đồng Tâm', 3, NULL, NULL),
(8, 'DL', 'Dulux', 2, NULL, NULL),
(9, 'TOA', 'TOA', 1, NULL, NULL),
(10, 'HL', 'Khai thác đá Hồng Liên', 3, NULL, NULL),
(11, 'NTV', 'Nam Thành Vinh', 1, NULL, NULL),
(12, 'DC', 'Đại Cát', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomvattu`
--

CREATE TABLE `nhomvattu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nvt_ma` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nvt_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomvattu`
--

INSERT INTO `nhomvattu` (`id`, `nvt_ma`, `nvt_ten`, `created_at`, `updated_at`) VALUES
(1, 'G_01', 'Gạch xây nhà', NULL, NULL),
(2, 'G_02', 'Gạch lát tường', NULL, NULL),
(3, 'G_03', 'Gạch lát sàn', NULL, NULL),
(4, 'D_01', 'Đá xây dựng', NULL, NULL),
(5, 'C_01', 'Cát xây dựng', NULL, NULL),
(6, 'XM_01', 'Xi măng xây dựng', NULL, NULL),
(7, 'S_01', 'Sơn tường', NULL, NULL),
(8, 'T_01', 'Thép xây dựng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhapkho`
--

CREATE TABLE `phieunhapkho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lydo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` float NOT NULL,
  `npp_id` int(11) UNSIGNED NOT NULL,
  `nv_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhapkho`
--

INSERT INTO `phieunhapkho` (`id`, `ma`, `lydo`, `ngaylap`, `tongtien`, `npp_id`, `nv_id`, `created_at`, `updated_at`) VALUES
(8, 'PNK09112020031131', '123456', '2020-11-09', 81480, 1, 1, '2020-11-09 08:56:00', '2020-11-09 08:56:00'),
(10, 'PNK09112020031148', 'kkl', '2020-11-09', 187000, 2, 1, '2020-11-09 08:57:53', '2020-11-09 08:57:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuatkho`
--

CREATE TABLE `phieuxuatkho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `xk_ma` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xk_lydo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xk_ngaylap` date NOT NULL,
  `xk_tongtien` double NOT NULL,
  `congtrinh_id` int(10) UNSIGNED NOT NULL,
  `nv_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuatkho`
--

INSERT INTO `phieuxuatkho` (`id`, `xk_ma`, `xk_lydo`, `xk_ngaylap`, `xk_tongtien`, `congtrinh_id`, `nv_id`, `created_at`, `updated_at`) VALUES
(5, 'PXK01122020081246', 'thieu do', '2020-12-01', 20370, 5, 1, '2020-12-01 01:15:54', '2020-12-01 01:15:54'),
(6, 'PXK02122020031222', 'kkl', '2020-12-02', 5885370, 3, 1, '2020-12-01 20:06:30', '2020-12-01 20:06:30'),
(7, 'PXK02122020041202', '1234', '2020-12-02', 40740, 1, 1, '2020-12-02 09:22:11', '2020-12-02 09:22:11'),
(16, 'PXK20122020101219', 'thieu do', '2020-12-20', 500000, 2, 1, '2020-12-20 03:14:20', '2020-12-20 03:14:20'),
(17, 'PXK20122020101219', 'thieu do', '2020-12-20', 500000, 2, 1, '2020-12-20 03:14:37', '2020-12-20 03:14:37'),
(18, 'PXK20122020101210', 'kkl', '2020-12-20', 170000, 1, 1, '2020-12-20 03:15:13', '2020-12-20 03:15:13'),
(19, 'PXK20122020101213', 'kkl', '2020-12-20', 540000, 2, 1, '2020-12-20 03:16:16', '2020-12-20 03:16:16'),
(20, 'PXK20122020101213', 'kkl', '2020-12-20', 540000, 2, 1, '2020-12-20 03:17:34', '2020-12-20 03:17:34'),
(21, 'PXK20122020101254', 'kkl', '2020-12-20', 20370, 2, 1, '2020-12-20 03:19:58', '2020-12-20 03:19:58'),
(22, 'PXK20122020101212', 'kkjlklk', '2020-12-20', 30105, 2, 1, '2020-12-20 03:27:55', '2020-12-20 03:27:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id_statistical` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(1, '2020-11-08', '20000000', '7000000', 90, 10),
(2, '2020-11-07', '68000000', '9000000', 60, 8),
(3, '2020-11-06', '30000000', '3000000', 45, 7),
(4, '2020-11-05', '45000000', '3800000', 30, 9),
(5, '2020-11-04', '30000000', '1500000', 15, 12),
(6, '2020-11-03', '8000000', '700000', 65, 30),
(7, '2020-11-02', '28000000', '23000000', 32, 20),
(8, '2020-11-01', '25000000', '20000000', 7, 6),
(9, '2020-10-31', '36000000', '28000000', 40, 15),
(10, '2020-10-30', '50000000', '13000000', 89, 19),
(11, '2020-10-29', '20000000', '15000000', 63, 11),
(12, '2020-10-28', '25000000', '16000000', 94, 14),
(13, '2020-10-27', '32000000', '17000000', 16, 10),
(14, '2020-10-26', '33000000', '19000000', 14, 5),
(15, '2020-10-25', '36000000', '18000000', 22, 12),
(16, '2020-10-24', '34000000', '20000000', 33, 20),
(17, '2020-10-23', '25000000', '16000000', 94, 14),
(18, '2020-10-22', '12000000', '7000000', 16, 10),
(19, '2020-10-21', '63000000', '19000000', 14, 5),
(20, '2020-10-20', '66000000', '18000000', 22, 12),
(21, '2020-10-19', '74000000', '20000000', 33, 20),
(22, '2020-10-18', '63000000', '19000000', 14, 5),
(23, '2020-10-17', '66000000', '18000000', 23, 12),
(24, '2020-10-16', '74000000', '20000000', 32, 20),
(25, '2020-10-15', '63000000', '19000000', 14, 5),
(26, '2020-10-14', '66000000', '18000000', 23, 12),
(27, '2020-10-13', '74000000', '20000000', 33, 20),
(28, '2020-10-12', '66000000', '18000000', 23, 12),
(29, '2020-10-11', '74000000', '20000000', 10, 20),
(30, '2020-10-10', '63000000', '19000000', 14, 5),
(31, '2020-10-09', '66000000', '18000000', 23, 12),
(32, '2020-10-08', '74000000', '20000000', 15, 20),
(33, '2020-10-07', '66000000', '18000000', 23, 12),
(34, '2020-10-06', '74000000', '20000000', 30, 22),
(35, '2020-10-05', '66000000', '18000000', 23, 12),
(36, '2020-10-04', '74000000', '20000000', 32, 20),
(37, '2020-10-03', '63000000', '19000000', 14, 5),
(38, '2020-10-02', '66000000', '18000000', 23, 12),
(39, '2020-10-01', '74000000', '20000000', 32, 20),
(40, '2020-09-30', '63000000', '19000000', 14, 5),
(41, '2020-09-29', '66000000', '18000000', 23, 12),
(42, '2020-09-28', '74000000', '20000000', 15, 20),
(43, '2020-09-27', '66000000', '18000000', 23, 12),
(44, '2020-09-26', '74000000', '20000000', 30, 22),
(45, '2020-09-25', '66000000', '18000000', 23, 12),
(46, '2020-09-24', '74000000', '20000000', 32, 20),
(47, '2020-09-23', '63000000', '19000000', 14, 5),
(48, '2020-09-22', '66000000', '18000000', 23, 12),
(49, '2020-09-21', '74000000', '20000000', 32, 20),
(50, '2020-09-20', '63000000', '19000000', 14, 5),
(51, '2020-09-19', '66000000', '18000000', 23, 12),
(52, '2020-09-18', '74000000', '20000000', 15, 20),
(53, '2020-09-17', '66000000', '18000000', 23, 12),
(54, '2020-09-16', '74000000', '20000000', 30, 22),
(55, '2020-09-15', '66000000', '18000000', 23, 12),
(56, '2020-09-14', '74000000', '20000000', 32, 20),
(57, '2020-09-13', '63000000', '19000000', 14, 5),
(58, '2020-09-12', '66000000', '18000000', 23, 12),
(59, '2020-09-11', '74000000', '20000000', 32, 20),
(60, '2020-09-10', '63000000', '19000000', 14, 5),
(61, '2020-09-09', '66000000', '18000000', 23, 12),
(62, '2020-09-08', '74000000', '20000000', 15, 20),
(63, '2020-09-07', '66000000', '18000000', 23, 12),
(64, '2020-09-06', '74000000', '20000000', 30, 22),
(65, '2020-09-05', '66000000', '18000000', 23, 12),
(66, '2020-09-04', '74000000', '20000000', 32, 20),
(67, '2020-09-03', '63000000', '19000000', 14, 5),
(68, '2020-09-02', '66000000', '18000000', 23, 12),
(69, '2020-09-01', '74000000', '20000000', 32, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `id` int(11) NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` float NOT NULL,
  `SoDon` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`id`, `date`, `SoLuong`, `TongTien`, `SoDon`, `created_at`, `updated_at`) VALUES
(4, '2020-12-20', 5, 50475, 2, '2020-12-20 03:19:58', '2020-12-20 03:19:58'),
(5, '2020-12-01', 10, 100000, 12, '2020-12-21 08:48:49', '2020-12-21 08:48:49'),
(6, '2020-12-02', 5, 560000, 7, '2020-12-21 08:49:27', '2020-12-21 08:49:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT current_timestamp(),
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `code`, `time_code`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phan Khương', '', '2020-11-14 03:54:04', 'vtdkhoa@gmail.com', '$2y$10$UvhboVD1nTh9yKsF4WsfbOCwlD8Kv7MKdYgnk9Hkrl0KxsEOrFJzS', 0, 'CH3mweQtMl07zxfZvMEf8NTBgtJFndh34S4o3vvz1SzWweFkG4rq2Fo1Qhdw', NULL, '2020-12-20 20:54:31'),
(3, 'Phan Khương', '', '2020-11-14 03:54:04', 'pkhkhuong.18i@cit.udn.vn', '$2y$10$kSH0CVclVF01Ka8zn/WFQenySS.D6kOddNsfA8ZL5H7G43AoUQjTG', 2, NULL, '2020-11-13 06:50:41', '2020-11-13 06:50:41'),
(4, 'hieu', '', '2020-11-14 03:54:04', 'hieu12@gmail.com', '$2y$10$Ufx/0tRkkspeill5tfumTeRWJFXX2ODN1M3nb198HXMB/bGUE6IBC', 2, NULL, '2020-11-13 07:35:55', '2020-11-13 07:35:55'),
(7, 'Khương', NULL, '2020-12-17 09:32:08', 'khuonghstvk@gmail.com', '$2y$10$ZbXMhl0FvwlYfujTVFk3SOHCXRp.JUByXqtMv2w8MSbrXqNOqVkey', 1, NULL, '2020-12-17 02:32:08', '2020-12-17 02:32:08'),
(8, 'Lê Hồng Phú', NULL, '2020-12-23 07:01:56', 'lhphu.18i@cit.udn.vn', '$2y$10$c2DPXnpgPK1gixyh6g1xPeH7aMdJpCEyAXyK0D8zTS0MzVt4pg6OO', 2, NULL, '2020-12-23 00:01:56', '2020-12-23 00:03:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vattu`
--

CREATE TABLE `vattu` (
  `id` int(10) UNSIGNED NOT NULL,
  `vt_ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatien` float NOT NULL,
  `gianhap` float NOT NULL,
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `nhomvattu_id` int(10) UNSIGNED NOT NULL,
  `chatluong_id` int(10) UNSIGNED NOT NULL,
  `nhaphanphoi_id` int(10) UNSIGNED NOT NULL,
  `nhasanxuat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vattu`
--

INSERT INTO `vattu` (`id`, `vt_ten`, `giatien`, `gianhap`, `donvitinh_id`, `nhomvattu_id`, `chatluong_id`, `nhaphanphoi_id`, `nhasanxuat_id`, `created_at`, `updated_at`) VALUES
(1, 'Cát san lấp', 135000, 100000, 3, 5, 1, 1, 12, NULL, NULL),
(2, 'Cát bê tông loại 1', 200000, 180000, 3, 5, 1, 1, 12, NULL, NULL),
(3, 'Cát bê tông loại 2', 180000, 160000, 3, 5, 2, 1, 12, NULL, NULL),
(4, 'Đá xây dựng 5x7', 270000, 250000, 3, 4, 1, 2, 12, NULL, NULL),
(5, 'Đá mi bụi', 255000, 235000, 3, 4, 1, 2, 12, NULL, NULL),
(6, 'Đá mi sàng', 250000, 230000, 3, 4, 2, 2, 12, NULL, NULL),
(7, 'Thép Pomina phi 10', 10035, 6035, 2, 8, 1, 3, 3, NULL, NULL),
(8, 'Thép Pomina phi 12', 10185, 7185, 2, 8, 1, 3, 3, NULL, NULL),
(9, 'Thép Pomina phi 14', 10185, 7185, 2, 8, 1, 3, 3, NULL, NULL),
(10, 'Thép Pomina phi 16', 10185, 7185, 2, 8, 1, 3, 3, NULL, NULL),
(11, 'Thép Pomina phi 18', 10185, 7185, 2, 8, 1, 3, 3, NULL, NULL),
(12, 'Xi măng Holcim xây tô', 93500, 83500, 4, 6, 1, 2, 6, NULL, NULL),
(13, 'Xi măng Holcim đa dụng', 85000, 70000, 4, 6, 2, 2, 6, NULL, NULL),
(14, 'Xi măng Hà Tiên đa dụng', 87500, 80500, 4, 6, 1, 2, 5, NULL, NULL),
(15, 'Xi măng Hà Tiên xây tô', 75000, 60000, 4, 6, 2, 2, 5, NULL, NULL),
(16, 'Thép Pomina phi 20', 10185, 7185, 2, 8, 3, 3, 3, '2019-08-05 16:45:25', '2019-08-05 16:45:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vattukho`
--

CREATE TABLE `vattukho` (
  `id` int(10) UNSIGNED NOT NULL,
  `soluong_nhap` int(11) NOT NULL,
  `soluong_xuat` int(11) NOT NULL,
  `soluong_ton` int(11) NOT NULL,
  `kho_id` int(10) NOT NULL,
  `vattu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vattukho`
--

INSERT INTO `vattukho` (`id`, `soluong_nhap`, `soluong_xuat`, `soluong_ton`, `kho_id`, `vattu_id`, `created_at`, `updated_at`) VALUES
(1, 100, 5, 95, 1, 2, NULL, '2019-08-06 02:30:08'),
(2, 120, 35, 85, 1, 3, NULL, '2019-08-05 10:56:05'),
(3, 100, 0, 100, 1, 1, '0000-00-00 00:00:00', '2020-12-14 02:58:57'),
(4, 1200, 203, 997, 2, 7, NULL, '2020-12-20 03:27:55'),
(5, 1000, 2, 998, 2, 8, NULL, '2020-12-01 20:06:30'),
(6, 1000, 2, 998, 2, 9, NULL, '2020-12-02 09:22:11'),
(7, 1102, 102, 1000, 2, 10, NULL, '2020-12-20 03:19:58'),
(8, 100, 25, 75, 2, 11, NULL, '2020-12-20 03:05:16'),
(9, 2, 0, 2, 1, 12, NULL, '2019-08-04 17:30:56'),
(10, 550, 52, 498, 1, 13, NULL, '2020-12-20 03:15:13'),
(11, 600, 100, 500, 1, 15, NULL, NULL),
(12, 720, 220, 500, 1, 14, NULL, NULL),
(13, 530, 453, 77, 1, 5, NULL, '2020-12-01 20:06:30'),
(14, 120, 26, 94, 1, 6, NULL, '2020-12-20 03:14:37'),
(15, 200, 104, 96, 1, 4, '0000-00-00 00:00:00', '2020-12-20 03:17:34'),
(18, 100, 0, 100, 1, 1, '2019-08-05 16:32:56', '2020-12-14 02:58:57'),
(19, 2, 0, 2, 1, 7, '2020-11-09 08:56:00', '2020-11-09 08:56:00'),
(20, 4, 0, 4, 4, 7, '2020-11-11 07:38:56', '2020-11-11 07:38:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chatluong`
--
ALTER TABLE `chatluong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietnhapkho`
--
ALTER TABLE `chitietnhapkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietnhapkho_vattu_id_foreign` (`vt_id`),
  ADD KEY `chitietnhapkho_phieunhapkho_id_foreign` (`pnk_id`);

--
-- Chỉ mục cho bảng `chitietxuatkho`
--
ALTER TABLE `chitietxuatkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietxuatkho_vattu_id_foreign` (`vattu_id`),
  ADD KEY `chitietxuatkho_phieuxuatkho_id_foreign` (`phieuxuatkho_id`),
  ADD KEY `kho_ctxk` (`kho_id`);

--
-- Chỉ mục cho bảng `congtrinh`
--
ALTER TABLE `congtrinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khovt`
--
ALTER TABLE `khovt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhaphanphoi_khuvuc_id_foreign` (`khuvuc_id`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nsx_kv` (`kv_id`);

--
-- Chỉ mục cho bảng `nhomvattu`
--
ALTER TABLE `nhomvattu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phieunhapkho`
--
ALTER TABLE `phieunhapkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pxk_npp` (`npp_id`),
  ADD KEY `pxk_nv` (`nv_id`);

--
-- Chỉ mục cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieuxuatkho_congtrinh_id_foreign` (`congtrinh_id`),
  ADD KEY `nv_id` (`nv_id`);

--
-- Chỉ mục cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vattu`
--
ALTER TABLE `vattu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vattu_donvitinh_id_foreign` (`donvitinh_id`),
  ADD KEY `vattu_nhomvattu_id_foreign` (`nhomvattu_id`),
  ADD KEY `vattu_chatluong_id_foreign` (`chatluong_id`),
  ADD KEY `vattu_nhaphanphoi_id_foreign` (`nhaphanphoi_id`),
  ADD KEY `vattu_nhasanxuat_id_foreign` (`nhasanxuat_id`);

--
-- Chỉ mục cho bảng `vattukho`
--
ALTER TABLE `vattukho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vattukho_kho_id_foreign` (`kho_id`),
  ADD KEY `vattukho_vattu_id_foreign` (`vattu_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chatluong`
--
ALTER TABLE `chatluong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chitietnhapkho`
--
ALTER TABLE `chitietnhapkho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chitietxuatkho`
--
ALTER TABLE `chitietxuatkho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `congtrinh`
--
ALTER TABLE `congtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `khovt`
--
ALTER TABLE `khovt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhomvattu`
--
ALTER TABLE `nhomvattu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phieunhapkho`
--
ALTER TABLE `phieunhapkho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id_statistical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vattu`
--
ALTER TABLE `vattu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `vattukho`
--
ALTER TABLE `vattukho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietnhapkho`
--
ALTER TABLE `chitietnhapkho`
  ADD CONSTRAINT `chitietnhapkho_phieunhapkho_id_foreign` FOREIGN KEY (`pnk_id`) REFERENCES `phieunhapkho` (`id`),
  ADD CONSTRAINT `chitietnhapkho_vattu_id_foreign` FOREIGN KEY (`vt_id`) REFERENCES `vattu` (`id`);

--
-- Các ràng buộc cho bảng `chitietxuatkho`
--
ALTER TABLE `chitietxuatkho`
  ADD CONSTRAINT `chitietxuatkho_phieuxuatkho_id_foreign` FOREIGN KEY (`phieuxuatkho_id`) REFERENCES `phieuxuatkho` (`id`),
  ADD CONSTRAINT `chitietxuatkho_vattu_id_foreign` FOREIGN KEY (`vattu_id`) REFERENCES `vattu` (`id`),
  ADD CONSTRAINT `kho_ctxk` FOREIGN KEY (`kho_id`) REFERENCES `khovt` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nv` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD CONSTRAINT `nhaphanphoi_khuvuc_id_foreign` FOREIGN KEY (`khuvuc_id`) REFERENCES `khuvuc` (`id`);

--
-- Các ràng buộc cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD CONSTRAINT `nsx_kv` FOREIGN KEY (`kv_id`) REFERENCES `khuvuc` (`id`);

--
-- Các ràng buộc cho bảng `phieunhapkho`
--
ALTER TABLE `phieunhapkho`
  ADD CONSTRAINT `pxk_npp` FOREIGN KEY (`npp_id`) REFERENCES `nhaphanphoi` (`id`),
  ADD CONSTRAINT `pxk_nv` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  ADD CONSTRAINT `phieuxuatkho_congtrinh_id_foreign` FOREIGN KEY (`congtrinh_id`) REFERENCES `congtrinh` (`id`),
  ADD CONSTRAINT `phieuxuatkho_ibfk_1` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `vattu`
--
ALTER TABLE `vattu`
  ADD CONSTRAINT `vattu_chatluong_id_foreign` FOREIGN KEY (`chatluong_id`) REFERENCES `chatluong` (`id`),
  ADD CONSTRAINT `vattu_donvitinh_id_foreign` FOREIGN KEY (`donvitinh_id`) REFERENCES `donvitinh` (`id`),
  ADD CONSTRAINT `vattu_nhaphanphoi_id_foreign` FOREIGN KEY (`nhaphanphoi_id`) REFERENCES `nhaphanphoi` (`id`),
  ADD CONSTRAINT `vattu_nhasanxuat_id_foreign` FOREIGN KEY (`nhasanxuat_id`) REFERENCES `nhasanxuat` (`id`),
  ADD CONSTRAINT `vattu_nhomvattu_id_foreign` FOREIGN KEY (`nhomvattu_id`) REFERENCES `nhomvattu` (`id`);

--
-- Các ràng buộc cho bảng `vattukho`
--
ALTER TABLE `vattukho`
  ADD CONSTRAINT `vattukho_vattu_id_foreign` FOREIGN KEY (`vattu_id`) REFERENCES `vattu` (`id`),
  ADD CONSTRAINT `vtk_k` FOREIGN KEY (`kho_id`) REFERENCES `khovt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
