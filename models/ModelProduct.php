<?php

include_once "./models/connect.php";

function getProductByCate($maDanhMuc, $offset = 0)
{
    global $conn;
    $sql = "SELECT * FROM SANPHAM inner join DANHMUC ON SANPHAM.MaDanhMuc = DANHMUC.MaDanhMuc Where SANPHAM.MaDanhMuc = :MaDanhMuc LIMIT :Offset ,12";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaDanhMuc", $maDanhMuc, PDO::PARAM_INT);
    $stmt->bindValue(":Offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function showAllCate()
{
    global $conn;
    $sql = "SELECT * FROM DANHMUC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getCateByID($id)
{
    global $conn;
    $sql = "SELECT * FROM DANHMUC Where MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaDanhMuc", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function getProductByID($id)
{
    global $conn;
    $sql = "SELECT * FROM SANPHAM inner join DANHMUC ON SANPHAM.MaDanhMuc = DANHMUC.MaDanhMuc Where MaSanPham = :MaSanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function getAllProduct($offset = 0)
{
    global $conn;
    $sql = "SELECT * FROM SANPHAM inner join DANHMUC ON SANPHAM.MaDanhMuc = DANHMUC.MaDanhMuc ORDER BY MaSanPham ASC limit :offset , 12 ";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getAllCmt($masp)
{
    global $conn;
    $sql = "SELECT * FROM BINHLUAN inner join TAIKHOAN on BINHLUAN.MaTaiKhoan = TAIKHOAN.MaTaiKhoan WHERE MaSanPham = :MaSanPham ORDER BY ThoiGianBinhLuan DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $masp, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function addCmt($masp, $matk, $nd)
{
    global $conn;
    $sql = "INSERT INTO BINHLUAN(MaSanPham , MaTaiKhoan , NoiDung) values(:MaSanPham , :MaTaiKhoan , :NoiDung)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $masp, PDO::PARAM_INT);
    $stmt->bindValue(":MaTaiKhoan", $matk, PDO::PARAM_INT);
    $stmt->bindValue(":NoiDung", $nd, PDO::PARAM_STR);
    return $stmt->execute();
}

function getAllProductInCate($maDM)
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM SANPHAM WHERE MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaDanhMuc", $maDM, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function search($key)
{
    global $conn;
    $sql = "SELECT * FROM SANPHAM WHERE TenSanPham LIKE :Key";
    $newkey = '%' . $key . '%';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Key", $newkey, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function searchQuantity($key)
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM SANPHAM WHERE TenSanPham LIKE :Key";
    $newkey = '%' . $key . '%';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Key", $newkey, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function productQuantity()
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM SANPHAM ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function addProduct($anh, $ten, $gia, $moTa, $danhMuc, $giaGiam = null)
{
    global $conn;
    $sql = "INSERT INTO SANPHAM(TenSanPham , MoTa, Gia , GiaGiam  ,Anh , MaDanhMuc) value(:TenSanPham ,:MoTa, :Gia , :GiaGiam , :Anh ,:MaDanhMuc)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenSanPham", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":MoTa", $moTa, PDO::PARAM_STR);
    $stmt->bindValue(":Gia", $gia, PDO::PARAM_INT);
    $stmt->bindValue(":GiaGiam", $giaGiam, PDO::PARAM_INT);
    $stmt->bindValue(":Anh", $anh, PDO::PARAM_STR);
    $stmt->bindValue(":MaDanhMuc", $danhMuc, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateProduct($id, $ten, $gia, $moTa, $danhMuc, $giaGiam = null)
{
    global $conn;
    $sql = "UPDATE SANPHAM set TenSanPham = :TenSanPham , MoTa =:MoTa, Gia=:Gia , GiaGiam= :GiaGiam,  MaDanhMuc= :MaDanhMuc WHERE MaSanPham = :MaSanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenSanPham", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":MoTa", $moTa, PDO::PARAM_STR);
    $stmt->bindValue(":Gia", $gia, PDO::PARAM_INT);
    $stmt->bindValue(":GiaGiam", $giaGiam, PDO::PARAM_INT);
    $stmt->bindValue(":MaDanhMuc", $danhMuc, PDO::PARAM_INT);
    $stmt->bindValue(":MaSanPham", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateProductImage($id, $anh)
{
    global $conn;
    $sql = "UPDATE SANPHAM set Anh = :Anh WHERE MaSanPham = :MaSanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Anh", $anh, PDO::PARAM_STR);
    $stmt->bindValue(":MaSanPham", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteProductByID($id)
{
    global $conn;
    $sql = "DELETE FROM SANPHAM WHERE MaSanPham = :MaSanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function getAllCategory()
{
    global $conn;
    $sql = "SELECT * FROM DANHMUC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function addCategory($ten, $anh)
{
    global $conn;
    $sql = "INSERT INTO DANHMUC(TenDanhMuc, AnhDanhMuc) value(:TenDanhMuc ,:AnhDanhMuc)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenDanhMuc", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":AnhDanhMuc", $anh, PDO::PARAM_STR);
    return $stmt->execute();
}

function getCategoryByID($id)
{
    global $conn;
    $sql = "SELECT * FROM DANHMUC Where MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaDanhMuc", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function updateCategory($id, $ten)
{
    global $conn;
    $sql = "UPDATE DANHMUC set TenDanhMuc = :TenDanhMuc  WHERE MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenDanhMuc", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":MaDanhMuc", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateCategoryImage($id, $anh)
{
    global $conn;
    $sql = "UPDATE DANHMUC set AnhDanhMuc = :AnhDanhMuc WHERE MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":AnhDanhMuc", $anh, PDO::PARAM_STR);
    $stmt->bindValue(":MaDanhMuc", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteCategoryByID($id)
{
    global $conn;
    $sql = "DELETE FROM DANHMUC WHERE MaDanhMuc = :MaDanhMuc";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaDanhMuc", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function addOrder($phiVanChuyen, $trangThai, $thanhTienHoaDon, $tongTienHoaDon, $maTaiKhoan, $ten, $sdt, $diaChi, $hinhThucTT)
{
    global $conn;
    $sql = "INSERT INTO HOADON(PhiVanChuyen, TrangThai , ThanhTienHoaDon , TongTienHoaDon , MaTaiKhoan , TenNguoiNhan , SDTNguoiNhan , DiaChiNhanHang , HinhThucTT)
            value(:PhiVanChuyen ,:TrangThai , :ThanhTienHoaDon , :TongTienHoaDon , :MaTaiKhoan , :TenNguoiNhan , :SDTNguoiNhan , :DiaChiNhanHang , :HinhThucTT)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":PhiVanChuyen", $phiVanChuyen, PDO::PARAM_INT);
    $stmt->bindValue(":TrangThai", $trangThai, PDO::PARAM_INT);
    $stmt->bindValue(":ThanhTienHoaDon", $thanhTienHoaDon, PDO::PARAM_INT);
    $stmt->bindValue(":TongTienHoaDon", $tongTienHoaDon, PDO::PARAM_INT);
    $stmt->bindValue(":MaTaiKhoan", $maTaiKhoan, PDO::PARAM_INT);
    $stmt->bindValue(":TenNguoiNhan", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":SDTNguoiNhan", $sdt, PDO::PARAM_STR);
    $stmt->bindValue(":DiaChiNhanHang", $diaChi, PDO::PARAM_STR);
    $stmt->bindValue(":HinhThucTT", $hinhThucTT, PDO::PARAM_INT);
    return $stmt->execute();
}

function getMaDonHang($maTk)
{
    global $conn;
    $sql = "SELECT SoHoaDon FROM HOADON WHERE MaTaiKhoan = :MaTaiKhoan ORDER BY SoHoaDon DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaTaiKhoan", $maTk, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function addOrderDetail($soHoaDon, $maSp, $soLuong, $gia)
{
    global $conn;
    $sql = "INSERT INTO CT_HOADON(MaSanPham , SoHoaDon , SoLuongMua , ThanhTien) value(:MaSanPham ,:SoHoaDon , :SoLuongMua , :ThanhTien)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $maSp, PDO::PARAM_INT);
    $stmt->bindValue(":SoHoaDon", $soHoaDon, PDO::PARAM_INT);
    $stmt->bindValue(":SoLuongMua", $soLuong, PDO::PARAM_INT);
    $stmt->bindValue(":ThanhTien", $gia, PDO::PARAM_INT);
    return $stmt->execute();
}

function getOrdersByUserID($id)
{
    global $conn;
    $sql = "SELECT * FROM (CT_HOADON inner join HOADON on CT_HOADON.SoHoaDon = HOADON.SoHoaDon) inner join SANPHAM on CT_HOADON.MaSanPham = SANPHAM.MaSanPham  WHERE MaTaiKhoan = :MaTaiKhoan ORDER BY ThoiGianDatHang DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaTaiKhoan", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function deleteDetailOrder($maSP, $soHoaDon)
{
    global $conn;
    $sql = "DELETE CT_HOADON 
            FROM CT_HOADON 
            INNER JOIN HOADON ON CT_HOADON.SoHoaDon = HOADON.SoHoaDon 
            WHERE CT_HOADON.MaSanPham = :MaSanPham AND CT_HOADON.SoHoaDon = :SoHoaDon AND HOADON.TinhTrang = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $maSP, PDO::PARAM_INT);
    $stmt->bindValue(":SoHoaDon", $soHoaDon, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function deleteOrder($maTaiKhoan)
{
    global $conn;
    $sql = "DELETE FROM `hoadon` where SoHoaDon not in (SELECT SoHoaDon FROM ct_hoadon) and MaTaiKhoan = :MaTaiKhoan";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaTaiKhoan", $maTaiKhoan, PDO::PARAM_INT);
    return $stmt->execute();
}

function getAllOrder()
{
    global $conn;
    $sql = "SELECT * FROM HOADON inner join TAIKHOAN on HOADON.MaTaiKhoan = TAIKHOAN.MaTaiKhoan ORDER BY ThoiGianDatHang DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getOrderDetailByID($id)
{
    global $conn;
    $sql = "SELECT * FROM ((HOADON inner join TAIKHOAN on HOADON.MaTaiKhoan = TAIKHOAN.MaTaiKhoan) 
            inner join CT_HOADON on HOADON.SoHoaDon = CT_HOADON.SoHoaDon) inner join SANPHAM on SANPHAM.MaSanPham = CT_HOADON.MaSanPham 
            WHERE HOADON.SoHoaDon = :SoHoaDon";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":SoHoaDon", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function updateOrderStatus($id, $status)
{
    global $conn;
    $sql = "UPDATE HOADON set TinhTrang = :TinhTrang WHERE SoHoaDon = :SoHoaDon";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TinhTrang", $status, PDO::PARAM_INT);
    $stmt->bindValue(":SoHoaDon", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateOrderPay($id)
{
    global $conn;
    $sql = "UPDATE HOADON set TrangThai = 1 WHERE SoHoaDon = :SoHoaDon";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":SoHoaDon", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteOrderAdmin($id)
{
    global $conn;
    $sql = "DELETE FROM HOADON WHERE SoHoaDon = :SoHoaDon";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":SoHoaDon", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function checkInvoice($soHoaDon)
{
    global $conn;
    $sql = "SELECT * FROM CT_HOADON WHERE SoHoaDon = :SoHoaDon";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":SoHoaDon", $soHoaDon, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function getProductByMonth($year)
{
    global $conn;
    $sql = "SELECT MONTH(ThoiGianDatHang) as Thang , count(*) as SL FROM HOADON inner join CT_HOADON on HOADON.SoHoaDon = CT_HOADON.SoHoaDon
            WHERE YEAR(ThoiGianDatHang) = :Year GROUP BY MONTH(ThoiGianDatHang)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Year", $year, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getPriceByMonth($year)
{
    global $conn;
    $sql = "SELECT MONTH(ThoiGianDatHang) as Thang , sum(TongTienHoaDon) as TongTien FROM HOADON 
            WHERE YEAR(ThoiGianDatHang) = :Year GROUP BY MONTH(ThoiGianDatHang)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Year", $year, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getUserRegisterByMonth($year)
{
    global $conn;
    $sql = "SELECT MONTH(NgayTaoTaiKhoan) as Thang , count(*) as SL FROM TAIKHOAN 
            WHERE YEAR(NgayTaoTaiKhoan) = :Year GROUP BY MONTH(NgayTaoTaiKhoan)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Year", $year, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function addRating($maSP, $maTk, $sao, $noiDung)
{
    global $conn;
    $sql = "INSERT INTO DANHGIA(MaSanPham , MaTaiKhoan , SoSao , NoiDungDanhGia) value(:MaSanPham ,:MaTaiKhoan , :SoSao , :NoiDungDanhGia)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $maSP, PDO::PARAM_INT);
    $stmt->bindValue(":MaTaiKhoan", $maTk, PDO::PARAM_INT);
    $stmt->bindValue(":SoSao", $sao, PDO::PARAM_INT);
    $stmt->bindValue(":NoiDungDanhGia", $noiDung, PDO::PARAM_STR);
    return $stmt->execute();
}

function getRating($maSP)
{
    global $conn;
    $sql = "SELECT * FROM DANHGIA inner join TAIKHOAN on DANHGIA.MaTaiKhoan = TAIKHOAN.MaTaiKhoan WHERE MaSanPham = :MaSanPham ORDER BY ThoiGianDanhGia DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaSanPham", $maSP, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getSumPrice()
{
    global $conn;
    $sql = "SELECT sum(TongTienHoaDon) as TongTien FROM HOADON";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function getQuantityProduct()
{
    global $conn;
    $sql = "SELECT count(*) as SL FROM SANPHAM";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
