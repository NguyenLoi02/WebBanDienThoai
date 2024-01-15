-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2024 lúc 01:11 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Ql_BanDienThoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhs`
--

CREATE TABLE `anhs` (
  `MaAnh` varchar(255) NOT NULL,
  `TenAnh` varchar(255) NOT NULL,
  `AnhLienQuan` varchar(255) NOT NULL,
  `MaCTSP` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `anhs`
--

INSERT INTO `anhs` (`MaAnh`, `TenAnh`, `AnhLienQuan`, `MaCTSP`, `created_at`, `updated_at`, `deleted_at`) VALUES
('A01', 'Ảnh Sản phẩm 1', 'iphone_15_pro_max_1.jfif', 'CTSP01', NULL, NULL, NULL),
('A02', 'Ảnh Sản phẩm 2', 'iphone_15_pro_max_2.jfif', 'CTSP02', NULL, NULL, NULL),
('A03', 'Ảnh Sản phẩm 3', 'iphone_15_pro_max_3.jfif', 'CTSP03', NULL, NULL, NULL),
('A04', 'Ảnh Sản phẩm 4', 'samsung_galaxy_s22_ultra_1.jpg', 'CTSP04', NULL, NULL, NULL),
('A05', 'Ảnh Sản phẩm 5', 'samsung_galaxy_s22_ultra_2.jfif', 'CTSP05', NULL, NULL, NULL),
('A06', 'Ảnh Sản phẩm 6', 'samsung_galaxy_s22_ultra_3.jfif', 'CTSP06', NULL, NULL, NULL),
('A07', 'Ảnh Sản phẩm 7', 'iphone_15_pro_max_4.jfif', 'CTSP07', NULL, NULL, NULL),
('A08', 'Ảnh Sản phẩm 8', 'xiaomi_mi_12_1.jfif', 'CTSP08', NULL, NULL, NULL),
('A09', 'Ảnh Sản phẩm 9', 'xiaomi_mi_12_2.jfif', 'CTSP09', NULL, NULL, NULL),
('A10', 'Ảnh Sản phẩm 10', 'xiaomi_mi_12_3.jfif', 'CTSP10', NULL, NULL, NULL),
('A11', 'Ảnh Sản phẩm 11', 'samsung_s21_plus_1.jfif', 'CTSP11', NULL, NULL, NULL),
('A12', 'Ảnh Sản phẩm 12', 'samsung_s21_plus_2.jfif', 'CTSP12', NULL, NULL, NULL),
('A13', 'Ảnh Sản phẩm 13', 'samsung_s21_plus_3.jfif', 'CTSP13', NULL, NULL, NULL),
('A14', 'Ảnh Sản phẩm 14', 'iphone_11_1.jfif', 'CTSP14', NULL, NULL, NULL),
('A15', 'Ảnh Sản phẩm 15', 'iphone_11_2.jfif', 'CTSP15', NULL, NULL, NULL),
('A16', 'Ảnh Sản phẩm 16', 'iphone_11_3.jfif', 'CTSP16', NULL, NULL, NULL),
('A17', 'Ảnh Sản phẩm 17', 'iphone_15_pro_max_5.jfif', 'CTSP17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinh_sach_bao_hanhs`
--

CREATE TABLE `chinh_sach_bao_hanhs` (
  `MaCSBH` varchar(255) NOT NULL,
  `ThoiGianBH` tinyint(4) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chinh_sach_bao_hanhs`
--

INSERT INTO `chinh_sach_bao_hanhs` (`MaCSBH`, `ThoiGianBH`, `NoiDung`, `created_at`, `updated_at`, `deleted_at`) VALUES
('CSBH01', 12, 'Bảo hành màn hình và pin cho điện thoại dòng Iphone.', NULL, NULL, NULL),
('CSBH02', 24, 'Bảo hành phần cứng và phần mềm cho điện thoại dòng SamSung.', NULL, NULL, NULL),
('CSBH03', 18, 'Bảo hành phần mềm cho điện thoại dòng Oppo.', NULL, NULL, NULL),
('CSBH04', 36, 'Bảo hành toàn bộ sản phẩm cho điện thoại dòng Xiaomi.', NULL, NULL, NULL),
('CSBH05', 24, 'Bảo hành màn hình cao cấp.', NULL, NULL, NULL),
('CSBH06', 12, 'Bảo hành pin cao cấp.', NULL, NULL, NULL),
('CSBH07', 12, 'Bảo hành toàn bộ.', NULL, NULL, NULL),
('CSBH08', 36, 'Bảo hành máy ảnh.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_h_d_b_s`
--

CREATE TABLE `chi_tiet_h_d_b_s` (
  `MaHDB` varchar(255) NOT NULL,
  `maCTSP` varchar(255) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_h_d_b_s`
--

INSERT INTO `chi_tiet_h_d_b_s` (`MaHDB`, `maCTSP`, `SoLuong`, `created_at`, `updated_at`, `deleted_at`) VALUES
('HDB01', 'CTSP01', 2, NULL, NULL, NULL),
('HDB01', 'CTSP02', 3, NULL, NULL, NULL),
('HDB02', 'CTSP03', 1, NULL, NULL, NULL),
('HDB02', 'CTSP04', 2, NULL, NULL, NULL),
('HDB03', 'CTSP05', 1, NULL, NULL, NULL),
('HDB04', 'CTSP06', 3, NULL, NULL, NULL),
('HDB04', 'CTSP07', 2, NULL, NULL, NULL),
('HDB06', 'CTSP09', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_h_d_n_s`
--

CREATE TABLE `chi_tiet_h_d_n_s` (
  `MaHDN` varchar(255) NOT NULL,
  `MaCTSP` varchar(255) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_h_d_n_s`
--

INSERT INTO `chi_tiet_h_d_n_s` (`MaHDN`, `MaCTSP`, `SoLuong`, `created_at`, `updated_at`, `deleted_at`) VALUES
('HDN01', 'CTSP01', 50, NULL, NULL, NULL),
('HDN01', 'CTSP02', 30, NULL, NULL, NULL),
('HDN02', 'CTSP03', 20, NULL, NULL, NULL),
('HDN02', 'CTSP04', 40, NULL, NULL, NULL),
('HDN03', 'CTSP05', 30, NULL, NULL, NULL),
('HDN04', 'CTSP06', 50, NULL, NULL, NULL),
('HDN04', 'CTSP07', 20, NULL, NULL, NULL),
('HDN05', 'CTSP08', 60, NULL, NULL, NULL),
('HDN05', 'CTSP09', 40, NULL, NULL, NULL),
('HDN05', 'CTSP10', 10, NULL, NULL, NULL),
('HDN06', 'CTSP17', 2, NULL, NULL, NULL),
('HDN05', 'CTSP01', 2, NULL, NULL, NULL),
('HDN07', 'CTSP01', 2, NULL, NULL, NULL),
('HDN03', 'CTSP03', 2, NULL, NULL, NULL);

--
-- Bẫy `chi_tiet_h_d_n_s`
--
DELIMITER $$
CREATE TRIGGER `tong_tien_hdns` AFTER INSERT ON `chi_tiet_h_d_n_s` FOR EACH ROW BEGIN
    DECLARE total DECIMAL(10, 2);
    
    -- Tính tổng tiền cho mã hóa đơn vừa thêm vào hoặc cập nhật
    SELECT SUM(chi_tiet_h_d_n_s.SoLuong * chi_tiet_san_phams.DonGiaNhap) INTO total
    FROM chi_tiet_h_d_n_s
    JOIN chi_tiet_san_phams ON chi_tiet_h_d_n_s.MaCTSP = chi_tiet_san_phams.MaCTSP
    WHERE chi_tiet_h_d_n_s.MaHDN = NEW.MaHDN;
    
    -- Cập nhật tổng tiền cho hóa đơn bán
    UPDATE hoa_don_nhaps
    SET TongTien = total
    WHERE MaHDN = NEW.MaHDN;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_san_phams`
--

CREATE TABLE `chi_tiet_san_phams` (
  `MaCTSP` varchar(255) NOT NULL,
  `DonGiaNhap` double NOT NULL,
  `DonGiaBan` double NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL,
  `MaSP` varchar(255) NOT NULL,
  `MaMau` varchar(255) NOT NULL,
  `MaDL` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_san_phams`
--

INSERT INTO `chi_tiet_san_phams` (`MaCTSP`, `DonGiaNhap`, `DonGiaBan`, `SoLuong`, `MoTa`, `TrangThai`, `MaSP`, `MaMau`, `MaDL`, `created_at`, `updated_at`, `deleted_at`) VALUES
('CTSP01', 799.99, 1099.99, 100, 'Mô tả sản phẩm 1', 'Còn hàng', 'SP01', 'MS01', 'DL01', NULL, NULL, NULL),
('CTSP02', 899.99, 1299.99, 50, 'Mô tả sản phẩm 2', 'Còn hàng', 'SP01', 'MS02', 'DL02', NULL, NULL, NULL),
('CTSP03', 699.99, 999.99, 75, 'Mô tả sản phẩm 3', 'Còn hàng', 'SP01', 'MS03', 'DL03', NULL, NULL, NULL),
('CTSP04', 999.99, 1499.99, 60, 'Mô tả sản phẩm 4', 'Còn hàng', 'SP02', 'MS04', 'DL04', NULL, NULL, NULL),
('CTSP05', 599.99, 899.99, 120, 'Mô tả sản phẩm 5', 'Còn hàng', 'SP02', 'MS05', 'DL05', NULL, NULL, NULL),
('CTSP06', 699.99, 1099.99, 85, 'Mô tả sản phẩm 6', 'Còn hàng', 'SP02', 'MS06', 'DL04', NULL, NULL, NULL),
('CTSP07', 799.99, 1199.99, 110, 'Mô tả sản phẩm 7', 'Còn hàng', 'SP01', 'MS07', 'DL03', NULL, NULL, NULL),
('CTSP08', 749.99, 999.99, 65, 'Mô tả sản phẩm 8', 'Còn hàng', 'SP05', 'MS08', 'DL04', NULL, NULL, NULL),
('CTSP09', 599.99, 899.99, 80, 'Mô tả sản phẩm 9', 'Còn hàng', 'SP05', 'MS09', 'DL05', NULL, NULL, NULL),
('CTSP10', 899.99, 1299.99, 45, 'Mô tả sản phẩm 10', 'Còn hàng', 'SP05', 'MS10', 'DL02', NULL, NULL, NULL),
('CTSP11', 749.99, 999.99, 70, 'Mô tả sản phẩm 11', 'Còn hàng', 'SP17', 'MS01', 'DL01', NULL, NULL, NULL),
('CTSP12', 699.99, 1099.99, 95, 'Mô tả sản phẩm 12', 'Còn hàng', 'SP17', 'MS02', 'DL02', NULL, NULL, NULL),
('CTSP13', 599.99, 899.99, 55, 'Mô tả sản phẩm 13', 'Còn hàng', 'SP17', 'MS03', 'DL03', NULL, NULL, NULL),
('CTSP14', 899.99, 1299.99, 100, 'Mô tả sản phẩm 14', 'Còn hàng', 'SP15', 'MS04', 'DL04', NULL, NULL, NULL),
('CTSP15', 799.99, 1199.99, 90, 'Mô tả sản phẩm 15', 'Còn hàng', 'SP15', 'MS05', 'DL05', NULL, NULL, NULL),
('CTSP16', 999.99, 1499.99, 120, 'Mô tả sản phẩm 16', 'Còn hàng', 'SP15', 'MS06', 'DL04', NULL, NULL, NULL),
('CTSP17', 749.99, 999.99, 65, 'Mô tả sản phẩm 17', 'Còn hàng', 'SP01', 'MS07', 'DL01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `MaDM` varchar(255) NOT NULL,
  `TenDM` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`MaDM`, `TenDM`, `created_at`, `updated_at`, `deleted_at`) VALUES
('DM01', 'Samsung Mobiles', NULL, NULL, NULL),
('DM02', 'Apple iPhones', NULL, NULL, NULL),
('DM03', 'Google Pixel', NULL, NULL, NULL),
('DM04', 'Huawei Phones', NULL, NULL, NULL),
('DM05', 'Sony Xperia', NULL, NULL, NULL),
('DM06', 'Nokia Phones', NULL, NULL, NULL),
('DM07', 'LG Mobiles', NULL, NULL, NULL),
('DM08', 'Xiaomi Smartphones', NULL, NULL, NULL),
('DM09', 'OnePlus Phones', NULL, NULL, NULL),
('DM10', 'Motorola Moto', NULL, NULL, NULL),
('DM11', 'Oppo SmartPhone', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dung_luongs`
--

CREATE TABLE `dung_luongs` (
  `MaDL` varchar(255) NOT NULL,
  `SoDL` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dung_luongs`
--

INSERT INTO `dung_luongs` (`MaDL`, `SoDL`, `created_at`, `updated_at`, `deleted_at`) VALUES
('DL01', 32, NULL, NULL, NULL),
('DL02', 64, NULL, NULL, NULL),
('DL03', 128, NULL, NULL, NULL),
('DL04', 256, NULL, NULL, NULL),
('DL05', 512, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `MaFB` varchar(255) NOT NULL,
  `Hoten` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`MaFB`, `Hoten`, `Email`, `SoDienThoai`, `NoiDung`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PB01', 'Người dùng 1', 'email1@example.com', '0123456789', 'Nội dung phản hồi 1', NULL, NULL, NULL),
('PB02', 'Người dùng 2', 'email2@example.com', '0987654321', 'Nội dung phản hồi 2', NULL, NULL, NULL),
('PB03', 'Người dùng 3', 'email3@example.com', '0369841257', 'Nội dung phản hồi 3', NULL, NULL, NULL),
('PB04', 'Người dùng 4', 'email4@example.com', '0247896531', 'Nội dung phản hồi 4', NULL, NULL, NULL),
('PB05', 'Người dùng 5', 'email5@example.com', '0382647951', 'Nội dung phản hồi 5', NULL, NULL, NULL),
('PB06', 'Người dùng 6', 'email6@example.com', '0765432190', 'Nội dung phản hồi 6', NULL, NULL, NULL),
('PB07', 'Người dùng 7', 'email7@example.com', '0321654987', 'Nội dung phản hồi 7', NULL, NULL, NULL),
('PB08', 'Người dùng 8', 'email8@example.com', '0852147963', 'Nội dung phản hồi 8', NULL, NULL, NULL),
('PB09', 'Người dùng 9', 'email9@example.com', '0975318642', 'Nội dung phản hồi 9', NULL, NULL, NULL),
('PB10', 'Người dùng 10', 'email10@example.com', '0909090909', 'Nội dung phản hồi 10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangs`
--

CREATE TABLE `hangs` (
  `MaHang` varchar(255) NOT NULL,
  `TenHang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangs`
--

INSERT INTO `hangs` (`MaHang`, `TenHang`, `created_at`, `updated_at`, `deleted_at`) VALUES
('MH01', 'Samsung', NULL, NULL, NULL),
('MH02', 'Apple', NULL, NULL, NULL),
('MH03', 'Google', NULL, NULL, NULL),
('MH04', 'Huawei', NULL, NULL, NULL),
('MH05', 'Sony', NULL, NULL, NULL),
('MH06', 'Nokia', NULL, NULL, NULL),
('MH07', 'LG', NULL, NULL, NULL),
('MH08', 'Xiaomi', NULL, NULL, NULL),
('MH09', 'OnePlus', NULL, NULL, NULL),
('MH10', 'Motorola', NULL, NULL, NULL),
('MH11', 'Oppo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_bans`
--

CREATE TABLE `hoa_don_bans` (
  `MaHDB` varchar(255) NOT NULL,
  `NgayBan` date NOT NULL,
  `TrangThaiHoaDon` varchar(255) NOT NULL,
  `DiaChiGiaoHang` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `TongTien` double NOT NULL,
  `TinhTrangDonHang` varchar(255) NOT NULL,
  `MaNV` varchar(255) NOT NULL,
  `MaKH` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_bans`
--

INSERT INTO `hoa_don_bans` (`MaHDB`, `NgayBan`, `TrangThaiHoaDon`, `DiaChiGiaoHang`, `SoDienThoai`, `GhiChu`, `TongTien`, `TinhTrangDonHang`, `MaNV`, `MaKH`, `created_at`, `updated_at`, `deleted_at`) VALUES
('HDB01', '2023-10-29', 'Đã thanh toán', '123 Đường A, Quận 1, TP.HCM', '0123456789', 'Giao hàng vào buổi sáng', 1999.99, 'Đã xác nhận', 'NV01', 'KH01', NULL, NULL, NULL),
('HDB02', '2023-10-30', 'Chưa thanh toán', '456 Đường B, Quận 2, TP.HCM', '0987654321', 'Giao hàng vào buổi chiều', 1499.99, 'Chờ xác nhận', 'NV01', 'KH02', NULL, NULL, NULL),
('HDB03', '2023-10-31', 'Đã thanh toán', '789 Đường C, Quận 3, TP.HCM', '0369841257', 'Giao hàng vào buổi tối', 2499.99, 'Giao thành công', 'NV01', 'KH03', NULL, NULL, NULL),
('HDB04', '2023-11-01', 'Đã thanh toán', '101 Đường D, Quận 4, TP.HCM', '0247896531', 'Giao hàng vào buổi sáng', 1799.99, 'Đã xác nhận', 'NV01', 'KH04', NULL, NULL, NULL),
('HDB05', '2023-11-02', 'Chưa thanh toán', '202 Đường E, Quận 5, TP.HCM', '0382647951', 'nguyenloi', 1599.99, 'Chờ xác nhận', 'NV01', 'KH05', NULL, NULL, NULL),
('HDB06', '2023-11-03', 'Đã thanh toán', '303 Đường F, Quận 6, TP.HCM', '0765432190', 'Giao hàng vào buổi tối', 2199.99, 'Giao thành công', 'NV01', 'KH06', NULL, NULL, NULL),
('HDB07', '2023-11-05', 'Chưa thanh toán', '505 Đường H, Quận 8, TP.HCM', '0852147963', 'Giao hàng vào buổi chiều', 1699.99, 'Chờ xác nhận', 'NV01', 'KH08', NULL, NULL, NULL),
('HDB08', '2023-11-05', 'Đã thanh toán', '505 Đường H, Quận 8, TP.HCM', '0852147963', 'Giao hàng vào buổi chiều', 1699.99, 'Đã xác nhận', 'NV01', 'KH08', NULL, NULL, NULL),
('HDB09', '2023-11-05', 'Chưa thanh toán', '505 Đường H, Quận 8, TP.HCM', '0852147963', 'Tôi muốn thêm/thay đổi mã giảm giám.', 1699.99, 'Đã hủy', 'NV01', 'KH08', NULL, NULL, NULL),
('HDB10', '2023-11-05', 'Chưa thanh toán', '505 Đường H, Quận 8, TP.HCM', '0852147963', 'Tôi tìm thấy chỗ mua khác tốt hơn(rẻ hơn,uy tín hơn..).', 1699.99, 'Đã hủy', 'NV01', 'KH08', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_nhaps`
--

CREATE TABLE `hoa_don_nhaps` (
  `MaHDN` varchar(255) NOT NULL,
  `NgayNhap` date NOT NULL,
  `TongTien` double NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `MaNV` varchar(255) NOT NULL,
  `MaNCC` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_nhaps`
--

INSERT INTO `hoa_don_nhaps` (`MaHDN`, `NgayNhap`, `TongTien`, `GhiChu`, `MaNV`, `MaNCC`, `created_at`, `updated_at`, `deleted_at`) VALUES
('HDN01', '2023-11-20', 66999.2, 'Nhập hàng từ nhà cung cấp A', 'NV01', 'NCC01', NULL, NULL, NULL),
('HDN02', '2023-11-21', 53999.4, 'Nhập hàng từ nhà cung cấp B', 'NV01', 'NCC02', NULL, NULL, NULL),
('HDN03', '2023-11-22', 19399.68, 'Nhập hàng từ nhà cung cấp C', 'NV01', 'NCC03', NULL, NULL, NULL),
('HDN04', '2023-11-23', 50999.3, 'Nhập hàng từ nhà cung cấp D', 'NV01', 'NCC04', NULL, NULL, NULL),
('HDN05', '2023-11-24', 79598.88, 'Nhập hàng từ nhà cung cấp E', 'NV01', 'NCC05', NULL, NULL, NULL),
('HDN06', '2023-11-18', 1499.98, 'ugthg', 'NV01', 'NCC05', NULL, NULL, NULL),
('HDN07', '2023-11-23', 1599.98, 'sadasd', 'NV01', 'NCC03', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hangs`
--

CREATE TABLE `khach_hangs` (
  `MaKH` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `GioiTinh` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hangs`
--

INSERT INTO `khach_hangs` (`MaKH`, `HoTen`, `NgaySinh`, `SoDienThoai`, `DiaChi`, `Email`, `GioiTinh`, `Username`, `created_at`, `updated_at`, `deleted_at`) VALUES
('KH01', 'Nguyễn Văn A', '1990-01-01', '0123456789', 'Địa chỉ 1', 'user1@example.com', 'Nam', 'TK02', NULL, NULL, NULL),
('KH02', 'Trần Thị B', '1985-02-15', '0987654321', 'Địa chỉ 2', 'user2@example.com', 'Nữ', 'TK03', NULL, NULL, NULL),
('KH03', 'Lê Hồng C', '1998-05-20', '0369841257', 'Địa chỉ 3', 'user3@example.com', 'Nam', 'TK04', NULL, NULL, NULL),
('KH04', 'Phạm Thị D', '1992-08-10', '0247896531', 'Địa chỉ 4', 'user4@example.com', 'Nữ', 'TK05', NULL, NULL, NULL),
('KH05', 'Nguyễn Văn E', '1995-11-30', '0382647951', 'Địa chỉ 5', 'user5@example.com', 'Nam', 'TK06', NULL, NULL, NULL),
('KH06', 'Trần Thị F', '1991-07-21', '0765432190', 'Địa chỉ 6', 'user6@example.com', 'Nữ', 'TK07', NULL, NULL, NULL),
('KH07', 'Lê Hồng G', '1994-04-12', '0321654987', 'Địa chỉ 7', 'user7@example.com', 'Nam', 'TK08', NULL, NULL, NULL),
('KH08', 'Phạm Thị H', '1989-09-09', '0852147963', 'Địa chỉ 8', 'user8@example.com', 'Nữ', 'TK09', NULL, NULL, NULL),
('KH09', 'Nguyễn Văn I', '1987-12-05', '0975318642', 'Địa chỉ 9', 'user9@example.com', 'Nam', 'TK10', NULL, NULL, NULL),
('KH10', NULL, NULL, NULL, NULL, 'loi111@gmail.com', NULL, 'loi111', '2023-11-23 02:18:14', '2023-11-23 02:18:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `MaMau` varchar(255) NOT NULL,
  `TenMau` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mau_sacs`
--

INSERT INTO `mau_sacs` (`MaMau`, `TenMau`, `created_at`, `updated_at`, `deleted_at`) VALUES
('MS01', 'Màu Đen', NULL, NULL, NULL),
('MS02', 'Màu Trắng', NULL, NULL, NULL),
('MS03', 'Màu Xanh', NULL, NULL, NULL),
('MS04', 'Màu Đỏ', NULL, NULL, NULL),
('MS05', 'Màu Vàng', NULL, NULL, NULL),
('MS06', 'Màu Hồng', NULL, NULL, NULL),
('MS07', 'Màu Xám', NULL, NULL, NULL),
('MS08', 'Màu Cam', NULL, NULL, NULL),
('MS09', 'Màu Tím', NULL, NULL, NULL),
('MS10', 'Màu Nâu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(58, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(59, '2023_10_26_014430_create_tai_khoans_table', 1),
(60, '2023_10_26_015443_create_feedback_table', 1),
(61, '2023_10_26_015950_create_danh_mucs_table', 1),
(62, '2023_10_26_020053_create_hangs_table', 1),
(63, '2023_10_26_020238_create_nha_cung_caps_table', 1),
(64, '2023_10_26_020430_create_mau_sacs_table', 1),
(65, '2023_10_26_020548_create_dung_luongs_table', 1),
(66, '2023_10_26_020841_create_khach_hangs_table', 1),
(67, '2023_10_26_021704_create_nhan_viens_table', 1),
(68, '2023_10_28_004828_create_chinh_sach_bao_hanhs_table', 1),
(69, '2023_10_28_005505_create_san_phams_table', 1),
(70, '2023_10_28_005603_create_chi_tiet_san_phams_table', 1),
(71, '2023_10_28_005855_create_anhs_table', 1),
(72, '2023_10_28_005952_create_hoa_don_bans_table', 1),
(73, '2023_10_28_010054_create_chi_tiet_h_d_b_s_table', 1),
(74, '2023_10_28_010132_create_phieu_bao_hanhs_table', 1),
(75, '2023_10_28_012605_create_hoa_don_nhaps_table', 1),
(76, '2023_10_28_012659_create_chi_tiet_h_d_n_s_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_viens`
--

CREATE TABLE `nhan_viens` (
  `MaNV` varchar(255) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `GioiTinh` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_viens`
--

INSERT INTO `nhan_viens` (`MaNV`, `HoTen`, `DiaChi`, `NgaySinh`, `Email`, `SoDienThoai`, `GioiTinh`, `Username`, `created_at`, `updated_at`, `deleted_at`) VALUES
('NV01', 'Nguyễn Tấn Lực', 'Ninh Bình', '2002-10-07', 'lucnguyen@example.com', '0765432190', 'Nam', 'TK01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_caps`
--

CREATE TABLE `nha_cung_caps` (
  `MaNCC` varchar(255) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_caps`
--

INSERT INTO `nha_cung_caps` (`MaNCC`, `TenNCC`, `DiaChi`, `SoDienThoai`, `created_at`, `updated_at`, `deleted_at`) VALUES
('NCC01', 'Nhà cung cấp A', 'Hà Nội', '0123456789', NULL, NULL, NULL),
('NCC02', 'Nhà cung cấp B', 'Hồ Chí Minh', '0987654321', NULL, NULL, NULL),
('NCC03', 'Nhà cung cấp C', 'Đà Nẵng', '0369841257', NULL, NULL, NULL),
('NCC04', 'Nhà cung cấp D', 'Cần Thơ', '0247896531', NULL, NULL, NULL),
('NCC05', 'Nhà cung cấp E', 'Hải Phòng', '0382647951', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_bao_hanhs`
--

CREATE TABLE `phieu_bao_hanhs` (
  `MaPBH` varchar(255) NOT NULL,
  `NgayBH` date NOT NULL,
  `TinhTrangBH` varchar(255) NOT NULL,
  `NVBH` varchar(255) NOT NULL,
  `NgayHoanThanh` varchar(255) NOT NULL,
  `MaHDB` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_bao_hanhs`
--

INSERT INTO `phieu_bao_hanhs` (`MaPBH`, `NgayBH`, `TinhTrangBH`, `NVBH`, `NgayHoanThanh`, `MaHDB`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PBH01', '2023-11-10', 'Đang xử lý', 'Nguyễn Tấn Lực', '2023-11-12', 'HDB01', NULL, NULL, NULL),
('PBH02', '2023-11-12', 'Đang xử lý', 'Nguyễn Tấn Lực', '2023-11-14', 'HDB02', NULL, NULL, NULL),
('PBH03', '2023-11-14', 'Đã xử lý', 'Nguyễn Tấn Lực', '2023-11-15', 'HDB03', NULL, NULL, NULL),
('PBH04', '2023-11-15', 'Đã xử lý', 'Nguyễn Tấn Lực', '2023-11-17', 'HDB04', NULL, NULL, NULL),
('PBH05', '2023-11-17', 'Đang xử lý', 'Nguyễn Tấn Lực', '2023-11-20', 'HDB05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `MaSP` varchar(255) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `NamSX` double NOT NULL,
  `MaCSBH` varchar(255) NOT NULL,
  `MaDM` varchar(255) NOT NULL,
  `MaHang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`MaSP`, `TenSP`, `AnhDaiDien`, `NamSX`, `MaCSBH`, `MaDM`, `MaHang`, `created_at`, `updated_at`, `deleted_at`) VALUES
('SP01', 'iPhone 15 Pro Max', 'iphone_15_pro_max.jfif', 2023, 'CSBH01', 'DM02', 'MH02', NULL, NULL, NULL),
('SP02', 'Samsung Galaxy S22 Ultra', 'samsung_galaxy_s22_ultra.jpg', 2023, 'CSBH02', 'DM01', 'MH01', NULL, NULL, NULL),
('SP03', 'Google Pixel 7 Pro', 'google_pixel_7_pro.jpg', 2022, 'CSBH05', 'DM03', 'MH03', NULL, NULL, NULL),
('SP04', 'OnePlus 10 Pro', 'oneplus_10_pro.jpg', 2023, 'CSBH06', 'DM09', 'MH09', NULL, NULL, NULL),
('SP05', 'Xiaomi Mi 12', 'xiaomi_mi_12.jfif', 2022, 'CSBH04', 'DM08', 'MH08', NULL, NULL, NULL),
('SP06', 'Oppo Find X5', 'oppo_find_x5.jpg', 2022, 'CSBH03', 'DM11', 'MH11', NULL, NULL, NULL),
('SP07', 'Sony Xperia 3', 'sony_xperia_3.jpg', 2023, 'CSBH07', 'DM05', 'MH05', NULL, NULL, NULL),
('SP08', 'LG G9', 'lg_g9.jpg', 2023, 'CSBH07', 'DM07', 'MH07', NULL, NULL, NULL),
('SP09', 'Nokia 9.3', 'nokia_9_3.jpg', 2022, 'CSBH07', 'DM06', 'MH06', NULL, NULL, NULL),
('SP10', 'Huawei Mate 50', 'huawei_mate_50.jfif\r\n', 2023, 'CSBH08', 'DM04', 'MH04', NULL, NULL, NULL),
('SP11', 'Motorola Edge 4', 'motorola_edge_4.jpg', 2023, 'CSBH05', 'DM10', 'MH10', NULL, NULL, NULL),
('SP12', 'Oppo Reno 8', 'oppo_reno_8.jfif\r\n', 2022, 'CSBH03', 'DM11', 'MH11', NULL, NULL, NULL),
('SP13', 'SamSung A34', 'samsung_a34.jfif', 2023, 'CSBH02', 'DM01', 'MH01', NULL, NULL, NULL),
('SP14', 'Oppo 10', 'oppo_10.jpg', 2022, 'CSBH06', 'DM11', 'MH11', NULL, NULL, NULL),
('SP15', 'IPhone 11', 'iphone_11.jfif', 2022, 'CSBH01', 'DM02', 'MH02', NULL, NULL, NULL),
('SP16', 'Iphone XS Max', 'iphone_xs_max.jfif', 2018, 'CSBH01', 'DM02', 'MH02', NULL, NULL, NULL),
('SP17', 'SamSung S21 Plus', 'samsung_s21_plus.jpg', 2021, 'CSBH02', 'DM01', 'MH01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LoaiTaiKhoan` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoans`
--

INSERT INTO `tai_khoans` (`Username`, `Password`, `LoaiTaiKhoan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('admin', '$2y$10$lpmzBHgvPoPSMhaMpbtL9.kSM2hQpQu07Ck6yhWELZHESBxpa9Jey', 1, '2023-11-23 01:56:32', '2023-11-23 01:56:32', NULL),
('admin1', '$2y$10$I0WKOSsLTZQIpSdARNs92uF4/UG.jlxXdL8XT8fR5LBVg1kNPqLsy', 1, '2023-11-23 01:56:49', '2023-11-23 01:56:49', NULL),
('admin123', '$2y$10$vDO5TydMzLpV9wtRfcJr3ent9Bun0BGBRggMq9T4qfiFlIIMsn.V2', 1, '2023-11-23 02:00:33', '2023-11-23 02:00:33', NULL),
('chuloi123', '$2y$10$wd56UlmtBE0ekPKZpKyXEekUjC/18zH.j5r7ZaQnP3/qk3uxE.11u', 1, '2023-11-23 02:02:55', '2023-11-23 02:02:55', NULL),
('client', '$2y$10$GZTOXhUm5589c.tRDk6ok.vjQxrXq77cutsLk4BFJ6idHW6wMqr6q', 1, '2023-11-23 01:53:54', '2023-11-23 01:53:54', NULL),
('loi111', '$2y$10$Un0lBZRojFDrrtppD96mXeHhZZAEWsiHs9qS9CDVIZVwlgCzGNWEO', 1, '2023-11-23 02:18:14', '2023-11-23 02:18:14', NULL),
('loi12345', '$2y$10$5U0wNAFBhneu2CfgJuZlMuT/CHvc9qNcikrg8hJpjqt.UIuMOSfpS', 1, '2023-11-23 02:07:12', '2023-11-23 02:07:12', NULL),
('TK01', '1', 2, NULL, NULL, NULL),
('TK02', '2', 1, NULL, NULL, NULL),
('TK03', '3', 1, NULL, NULL, NULL),
('TK04', '4', 1, NULL, NULL, NULL),
('TK05', '5', 1, NULL, NULL, NULL),
('TK06', '6', 1, NULL, NULL, NULL),
('TK07', '7', 1, NULL, NULL, NULL),
('TK08', '8', 1, NULL, NULL, NULL),
('TK09', '9', 1, NULL, NULL, NULL),
('TK10', '10', 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhs`
--
ALTER TABLE `anhs`
  ADD PRIMARY KEY (`MaAnh`),
  ADD KEY `anhs_mactsp_foreign` (`MaCTSP`);

--
-- Chỉ mục cho bảng `chinh_sach_bao_hanhs`
--
ALTER TABLE `chinh_sach_bao_hanhs`
  ADD PRIMARY KEY (`MaCSBH`);

--
-- Chỉ mục cho bảng `chi_tiet_h_d_b_s`
--
ALTER TABLE `chi_tiet_h_d_b_s`
  ADD KEY `chi_tiet_h_d_b_s_mahdb_foreign` (`MaHDB`),
  ADD KEY `chi_tiet_h_d_b_s_mactsp_foreign` (`maCTSP`);

--
-- Chỉ mục cho bảng `chi_tiet_h_d_n_s`
--
ALTER TABLE `chi_tiet_h_d_n_s`
  ADD KEY `chi_tiet_h_d_n_s_mahdn_foreign` (`MaHDN`),
  ADD KEY `chi_tiet_h_d_n_s_mactsp_foreign` (`MaCTSP`);

--
-- Chỉ mục cho bảng `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  ADD PRIMARY KEY (`MaCTSP`),
  ADD KEY `chi_tiet_san_phams_masp_foreign` (`MaSP`),
  ADD KEY `chi_tiet_san_phams_mamau_foreign` (`MaMau`),
  ADD KEY `chi_tiet_san_phams_madl_foreign` (`MaDL`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `dung_luongs`
--
ALTER TABLE `dung_luongs`
  ADD PRIMARY KEY (`MaDL`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`MaFB`);

--
-- Chỉ mục cho bảng `hangs`
--
ALTER TABLE `hangs`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `hoa_don_bans`
--
ALTER TABLE `hoa_don_bans`
  ADD PRIMARY KEY (`MaHDB`),
  ADD KEY `hoa_don_bans_manv_foreign` (`MaNV`),
  ADD KEY `hoa_don_bans_makh_foreign` (`MaKH`);

--
-- Chỉ mục cho bảng `hoa_don_nhaps`
--
ALTER TABLE `hoa_don_nhaps`
  ADD PRIMARY KEY (`MaHDN`),
  ADD KEY `hoa_don_nhaps_manv_foreign` (`MaNV`),
  ADD KEY `hoa_don_nhaps_mancc_foreign` (`MaNCC`);

--
-- Chỉ mục cho bảng `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `khach_hangs_username_foreign` (`Username`);

--
-- Chỉ mục cho bảng `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`MaMau`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `nhan_viens_username_foreign` (`Username`);

--
-- Chỉ mục cho bảng `nha_cung_caps`
--
ALTER TABLE `nha_cung_caps`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phieu_bao_hanhs`
--
ALTER TABLE `phieu_bao_hanhs`
  ADD PRIMARY KEY (`MaPBH`),
  ADD KEY `phieu_bao_hanhs_mahdb_foreign` (`MaHDB`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `san_phams_macsbh_foreign` (`MaCSBH`),
  ADD KEY `san_phams_madm_foreign` (`MaDM`),
  ADD KEY `san_phams_mahang_foreign` (`MaHang`);

--
-- Chỉ mục cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhs`
--
ALTER TABLE `anhs`
  ADD CONSTRAINT `anhs_mactsp_foreign` FOREIGN KEY (`MaCTSP`) REFERENCES `chi_tiet_san_phams` (`MaCTSP`);

--
-- Các ràng buộc cho bảng `chi_tiet_h_d_b_s`
--
ALTER TABLE `chi_tiet_h_d_b_s`
  ADD CONSTRAINT `chi_tiet_h_d_b_s_mactsp_foreign` FOREIGN KEY (`maCTSP`) REFERENCES `chi_tiet_san_phams` (`MaCTSP`),
  ADD CONSTRAINT `chi_tiet_h_d_b_s_mahdb_foreign` FOREIGN KEY (`MaHDB`) REFERENCES `hoa_don_bans` (`MaHDB`);

--
-- Các ràng buộc cho bảng `chi_tiet_h_d_n_s`
--
ALTER TABLE `chi_tiet_h_d_n_s`
  ADD CONSTRAINT `chi_tiet_h_d_n_s_mactsp_foreign` FOREIGN KEY (`MaCTSP`) REFERENCES `chi_tiet_san_phams` (`MaCTSP`),
  ADD CONSTRAINT `chi_tiet_h_d_n_s_mahdn_foreign` FOREIGN KEY (`MaHDN`) REFERENCES `hoa_don_nhaps` (`MaHDN`);

--
-- Các ràng buộc cho bảng `chi_tiet_san_phams`
--
ALTER TABLE `chi_tiet_san_phams`
  ADD CONSTRAINT `chi_tiet_san_phams_madl_foreign` FOREIGN KEY (`MaDL`) REFERENCES `dung_luongs` (`MaDL`),
  ADD CONSTRAINT `chi_tiet_san_phams_mamau_foreign` FOREIGN KEY (`MaMau`) REFERENCES `mau_sacs` (`MaMau`),
  ADD CONSTRAINT `chi_tiet_san_phams_masp_foreign` FOREIGN KEY (`MaSP`) REFERENCES `san_phams` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoa_don_bans`
--
ALTER TABLE `hoa_don_bans`
  ADD CONSTRAINT `hoa_don_bans_makh_foreign` FOREIGN KEY (`MaKH`) REFERENCES `khach_hangs` (`MaKH`),
  ADD CONSTRAINT `hoa_don_bans_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `nhan_viens` (`MaNV`);

--
-- Các ràng buộc cho bảng `hoa_don_nhaps`
--
ALTER TABLE `hoa_don_nhaps`
  ADD CONSTRAINT `hoa_don_nhaps_mancc_foreign` FOREIGN KEY (`MaNCC`) REFERENCES `nha_cung_caps` (`MaNCC`),
  ADD CONSTRAINT `hoa_don_nhaps_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `nhan_viens` (`MaNV`);

--
-- Các ràng buộc cho bảng `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD CONSTRAINT `khach_hangs_username_foreign` FOREIGN KEY (`Username`) REFERENCES `tai_khoans` (`Username`);

--
-- Các ràng buộc cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  ADD CONSTRAINT `nhan_viens_username_foreign` FOREIGN KEY (`Username`) REFERENCES `tai_khoans` (`Username`);

--
-- Các ràng buộc cho bảng `phieu_bao_hanhs`
--
ALTER TABLE `phieu_bao_hanhs`
  ADD CONSTRAINT `phieu_bao_hanhs_mahdb_foreign` FOREIGN KEY (`MaHDB`) REFERENCES `hoa_don_bans` (`MaHDB`);

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_macsbh_foreign` FOREIGN KEY (`MaCSBH`) REFERENCES `chinh_sach_bao_hanhs` (`MaCSBH`),
  ADD CONSTRAINT `san_phams_madm_foreign` FOREIGN KEY (`MaDM`) REFERENCES `danh_mucs` (`MaDM`),
  ADD CONSTRAINT `san_phams_mahang_foreign` FOREIGN KEY (`MaHang`) REFERENCES `hangs` (`MaHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
