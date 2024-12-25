<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'category':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_GET['id'])) {
                $id = (int)htmlspecialchars($_GET['id'], ENT_QUOTES);
                $spById = getProductByCate($id);
                $tenDm = getCateByID($id);

                $sl = floor(getAllProductInCate($id)['SL'] / 12);
                if (isset($_GET['page'])) {
                    $page = (int)htmlspecialchars($_GET['id'], ENT_QUOTES);
                    $spById = getProductByCate($id, $page * 12);
                }
            } else {
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                exit;
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewCategory.php";
            include_once "./views/templates/footer.php";
            break;
        case 'detail':
            // model
            include_once "./models/ModelProduct.php";

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['cmt'])) {
                    $content = htmlspecialchars($_GET['cmt'], ENT_QUOTES);
                    $maSpCmt = (int)htmlspecialchars($_GET['masp']);
                    $checkBl = addCmt($maSpCmt, $_SESSION['user']['MaTaiKhoan'], $content);
                    exit;
                }
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['sl'])) {
                    $sl = (int)htmlspecialchars($_GET['sl'], ENT_QUOTES);
                    $index = (int)htmlspecialchars($_GET['index'], ENT_QUOTES);
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $hasSP = true;
                    foreach ($_SESSION['cart'] as &$value) {
                        if ($value['MaSanPham'] === $index) {
                            $value['SoLuong'] += $sl;
                            $hasSP = false;
                            break;
                        }
                    }
                    if ($hasSP) {
                        array_push($_SESSION['cart'], [
                            'MaSanPham' => $index,
                            'SoLuong' => $sl
                        ]);
                    }
                    echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                    exit;
                }
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['rating'])) {
                    $sao = (int) htmlspecialchars($_GET['sao']);
                    $noiDung = htmlspecialchars($_GET['rating'], ENT_QUOTES);
                    $maTK = $_SESSION['user']['MaTaiKhoan'];
                    $maSP = (int) htmlspecialchars($_GET['masp']);
                    addRating($maSP, $maTK, $sao, $noiDung);
                    exit;
                }
            }

            if (isset($_GET['id']) && isset($_GET['category']) && !empty($_GET['id']) && !empty($_GET['category'])) {
                $id = (int) htmlspecialchars($_GET['id'], ENT_QUOTES);
                $sp = getProductByID($id);
                $cate = (int)htmlspecialchars($_GET['category'], ENT_QUOTES);

                $bl = getAllCmt($id);

                $rating = getRating($id);
            } else {
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                exit;
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewDetail.php";
            include_once "./views/templates/footer.php";
            break;
        case 'cart':
            // model
            include_once "./models/ModelProduct.php";

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as &$value) {
                    $tmp = getProductByID($value['MaSanPham']);
                    $value['Anh'] = $tmp['Anh'];
                    $value['TenSanPham'] = $tmp['TenSanPham'];
                    $value['Gia'] = $tmp['Gia'];
                    $value['GiaGiam'] = $tmp['GiaGiam'];
                    unset($tmp);
                    unset($value);
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['sl'])) {
                    $sl = (int)htmlspecialchars($_GET['sl'], ENT_QUOTES);
                    $index = (int)htmlspecialchars($_GET['index'], ENT_QUOTES);
                    foreach ($_SESSION['cart'] as &$value) {
                        if ($value['MaSanPham'] === $index) {
                            $value['SoLuong'] = $sl;
                            break;
                        }
                    }
                    exit;
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['sl'])) {
                    $sl = (int)htmlspecialchars($_GET['sl'], ENT_QUOTES);
                    $index = (int)htmlspecialchars($_GET['index'], ENT_QUOTES);
                    foreach ($_SESSION['cart'] as &$value) {
                        if ($value['MaSanPham'] === $index) {
                            $value['SoLuong'] = $sl;
                            break;
                        }
                    }
                    exit;
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['action']) && isset($_GET['index'])) {
                    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                        if ($_SESSION['cart'][$i]['MaSanPham'] === (int)htmlspecialchars($_GET['index'], ENT_QUOTES)) {
                            array_splice($_SESSION['cart'], $i, 1);
                            if (count($_SESSION['cart']) === 0) {
                                unset($_SESSION['cart']);
                            }
                            break;
                        }
                    }
                }
            }


            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewCart.php";
            include_once "./views/templates/footer.php";
            break;
        case 'search':
            // model
            include_once "./models/ModelProduct.php";
            $sp = null;
            if (isset($_GET['key']) and !empty($_GET['key'])) {
                $key = htmlspecialchars($_GET['key'], ENT_QUOTES);
                $sp = search($key);
                $quantity = searchQuantity($key)['SL'];
            } else {
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                exit;
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewSearch.php";
            include_once "./views/templates/footer.php";
            break;
        case 'checkout':
            // model
            include_once "./models/ModelProduct.php";
            if (isset($_POST['dathang'])) {
                if (isset($_SESSION['cart'])) {
                    $hoTen = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                    $sdt = htmlspecialchars($_POST['sdt'], ENT_QUOTES);
                    $sonha = htmlspecialchars($_POST['sonha'], ENT_QUOTES);
                    $quan = htmlspecialchars($_POST['quan'], ENT_QUOTES);
                    $phuong = htmlspecialchars($_POST['phuong'], ENT_QUOTES);
                    $hinhthuc = htmlspecialchars($_POST['pay-method'], ENT_QUOTES);
                    $thanhtienhd = 0;
                    $diaChi = $sonha . ', ' . $phuong . ', ' . $quan;
                    foreach ($_SESSION['cart'] as $value) {
                        if (empty($value['giaGiam'])) {
                            $thanhtienhd += $value['SoLuong'] * $value['Gia'];
                        } else {
                            $thanhtienhd += $value['SoLuong'] * $value['GiaGiam'];
                        }
                    }
                    $vanchuyen = $_POST['vanchuyen'];
                    $tongTien = $thanhtienhd + $vanchuyen;
                    $maTk = $_SESSION['user']['MaTaiKhoan'];
                    $trangThai = 0;
                    if ($hinhthuc == 'cod') {
                        $hinhthuc = 0;
                        $check = addOrder($vanchuyen, $trangThai, $thanhtienhd, tongTienHoaDon: $tongTien, maTaiKhoan: $maTk, ten: $hoTen, sdt: $sdt, diaChi: $diaChi, hinhThucTT: $hinhthuc);
                        $soHoaDon = getMaDonHang($maTk)['SoHoaDon'];
                        foreach ($_SESSION['cart'] as $value) {
                            $maSp = $value['MaSanPham'];
                            $soLuong = $value['SoLuong'];
                            if (empty($value['giaGiam'])) {
                                $gia = $soLuong * $value['Gia'];
                            } else {
                                $gia = $soLuong * $value['GiaGiam'];
                            }
                            addOrderDetail($soHoaDon, $maSp, $soLuong, $gia);
                        }
                    } else {
                        $trangThai = 1;
                        $hinhthuc = 1;
                        $_SESSION['mess'] = "Chức năng đang phát triển!";
                    }
                    if (isset($check) && $check) {
                        unset($_SESSION['cart']);
                        header("Location: index.php?ctrl=user&view=profile");
                        exit;
                    } else {
                        echo "<script>alert('Đặt hàng thất bại!');</script>";
                    }
                }
            }
            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewCheckout.php";
            include_once "./views/templates/footer.php";
            break;
        default:
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/View404.php";
            include_once "./views/templates/admin/footer.php";
            break;
    }
} else {
    include_once "./views/templates/admin/head.php";
    include_once "./views/templates/admin/header.php";
    include_once "./views/View404.php";
    include_once "./views/templates/admin/footer.php";
}
