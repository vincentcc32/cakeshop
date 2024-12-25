<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'listproduct':
            // model
            include_once "./models/ModelProduct.php";

            $dssp = getAllProduct();

            $sl = productQuantity()['SL'];

            $cate = showAllCate();

            $slpage = floor(productQuantity()['SL'] / 12);
            if (isset($_GET['page'])) {
                $page = (int)htmlspecialchars($_GET['page'], ENT_QUOTES);
                $dssp = getAllProduct($page * 12);
            }

            if (isset($_POST['add'])) {
                $ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                $gia = (int) htmlspecialchars($_POST['gia'], ENT_QUOTES);
                $giaGiam = (int) htmlspecialchars($_POST['giagiam'], ENT_QUOTES);
                $moTa = htmlspecialchars($_POST['mota'], ENT_QUOTES);
                $danhMuc = (int)htmlspecialchars($_POST['danhmuc'], ENT_QUOTES);
                if (isset($_FILES['anh']["error"])) {
                    $anh = $_FILES["anh"]["name"];
                    move_uploaded_file($_FILES["anh"]["tmp_name"], "public/images/" . $anh);
                    if (strlen($giaGiam) > 0) {
                        $giaGiam = (int) $giaGiam;
                    } else {
                        $giaGiam = null;
                    }
                    $check = addProduct($anh, $ten, $gia, $moTa, $danhMuc, $giaGiam);
                    if ($check) {
                        $_SESSION['mess'] = 'Đã thêm 1 sản phẩm mới';
                        header("Location: admin.php?ctrl=product&view=listproduct");
                        exit;
                    }
                }
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['index'])) {
                    $id = (int) htmlspecialchars($_GET['index'], ENT_QUOTES);
                    $tmp = getProductByID($id);
                    echo json_encode($tmp);
                    exit;
                }
            }

            if (isset($_POST['edit'])) {
                $ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                $gia = (int) htmlspecialchars($_POST['gia'], ENT_QUOTES);
                $giagiam = (int) htmlspecialchars($_POST['giagiam'], ENT_QUOTES);
                $mota = htmlspecialchars($_POST['mota'], ENT_QUOTES);
                $danhmuc = (int) htmlspecialchars($_POST['danhmuc'], ENT_QUOTES);
                $id = (int) htmlspecialchars($_POST['edit-id'], ENT_QUOTES);
                if ($giagiam === 0) {
                    $giagiam = null;
                }
                updateProduct($id, $ten, $gia, $mota, $danhmuc, $giagiam);
                if (isset($_FILES['anh']['error']) && $_FILES['anh']['error'] === 0) {
                    $anh = $_FILES["anh"]["name"];
                    move_uploaded_file($_FILES["anh"]["tmp_name"], "public/images/" . $anh);
                    updateProductImage($id, $anh);
                }
                $_SESSION['mess'] = 'Đã sửa 1 sản phẩm';
                header("Location: admin.php?ctrl=product&view=listproduct");
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['delete'])) {
                    $delete = (int)htmlspecialchars($_GET['delete'], ENT_QUOTES);
                    deleteProductByID($delete);
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewListProduct.php";
            include_once "./views/templates/admin/footer.php";
            break;
        case 'listcategory':
            // model
            include_once "./models/ModelProduct.php";

            $dsdm = getAllCategory();

            if (isset($_POST['add'])) {
                $ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                if (isset($_FILES['anh']["error"])) {
                    $anh = $_FILES["anh"]["name"];
                    move_uploaded_file($_FILES["anh"]["tmp_name"], "public/images/" . $anh);
                    $check = addCategory($ten, $anh);
                    if ($check) {
                        $_SESSION['mess'] = 'Đã thêm 1 danh mục mới';
                        header("Location: admin.php?ctrl=product&view=listcategory");
                        exit;
                    }
                }
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['index'])) {
                    $id = (int) htmlspecialchars($_GET['index'], ENT_QUOTES);
                    $tmp = getCategoryByID($id);
                    echo json_encode($tmp);
                    exit;
                }
            }

            if (isset($_POST['edit'])) {
                $id = (int) htmlspecialchars($_POST['edit-id'], ENT_QUOTES);
                $ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                updateCategory($id, $ten);
                if (isset($_FILES['anh']['error']) && $_FILES['anh']['error'] === 0) {
                    $anh = $_FILES["anh"]["name"];
                    move_uploaded_file($_FILES["anh"]["tmp_name"], "public/images/" . $anh);
                    updateCategoryImage($id, $anh);
                }
                $_SESSION['mess'] = 'Đã sửa 1 danh mục';
                header("Location: admin.php?ctrl=product&view=listcategory");
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['delete'])) {
                    $delete = (int)htmlspecialchars($_GET['delete'], ENT_QUOTES);
                    deleteCategoryByID($delete);
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewListCategory.php";
            include_once "./views/templates/admin/footer.php";
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
