<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'dashboard':
            // models
            include_once "./models/ModelProduct.php";

            $productByMonth = getProductByMonth(yearNow);
            $priceByMonth = getPriceByMonth(yearNow);
            $userRegisterByMonth = getUserRegisterByMonth(yearNow);
            $sp = getAllOrder();

            $sumPrice = getSumPrice();
            $quantityProduct = getQuantityProduct();

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['index'])) {
                    $index = (int)htmlspecialchars($_GET['index'], ENT_QUOTES);
                    $hoaDon = getOrderDetailByID($index);
                    echo json_encode($hoaDon);
                    exit;
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['action']) && isset($_GET['id']) && isset($_GET['status'])) {
                    $id = (int)htmlspecialchars($_GET['id'], ENT_QUOTES);
                    $status = (int)htmlspecialchars($_GET['status'], ENT_QUOTES);
                    $check = checkDetailInvoice($id);
                    if ($check) {
                        $tmp = checkInvoice($id);
                        if ($status === 1 || $status === 2) {
                            updateOrderStatus($id, $status);

                            if ($status === 2 || $tmp['MaXacNhanCK'] !== null) {
                                updateOrderPay($id);
                            }
                        } else {
                            updateOrderPay($id);
                        }
                        exit;
                    } else {
                        echo 'error';
                        exit;
                    }
                }
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'delete') {
                    $id = (int)htmlspecialchars($_GET['id'], ENT_QUOTES);
                    deleteOrderAdmin($id);
                    exit;
                }
            }

            // view
            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewPageDashboard.php";
            include_once "./views/templates/admin/footer.php";
            break;
        case 'writeblog':
            // model
            include_once "./models/ModelBlog.php";

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['deleteblog']) && isset($_GET['mabaiviet'])) {
                    $id = (int)htmlspecialchars($_GET['mabaiviet'], ENT_QUOTES);
                    $isDel = deleteBlog($id);
                    exit;
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['editblog']) && isset($_GET['mabaiviet'])) {
                    $id = (int)htmlspecialchars($_GET['mabaiviet'], ENT_QUOTES);
                    $blogByID = getBlogByID($id);
                    echo json_encode($blogByID);
                    exit;
                }
            }

            if (isset($_POST['gui'])) {
                $tieuDe = htmlspecialchars($_POST['tieude'], ENT_QUOTES);
                $noiDung = $_POST['blog'];
                if (isset($_FILES['anhnen']['error'])) {
                    $anhNen = $_FILES["anhnen"]["name"];
                    move_uploaded_file($_FILES["anhnen"]["tmp_name"], "public/images/" . $anhNen);
                    $check = writeBlog($anhNen, $tieuDe, $noiDung, $_SESSION['user']['MaTaiKhoan']);
                    if ($check) {
                        $_SESSION['mess'] = 'Đã thêm 1 bài viết mới';
                    } else {
                        $_SESSION['mess'] = 'Lỗi';
                    }
                    header('Location: admin.php?ctrl=page&view=writeblog');
                    exit;
                }
            }

            $blog = getBlog();


            include_once "./views/templates/admin/head.php";
            include_once "./views/templates/admin/header.php";
            include_once "./views/ViewWriteBlog.php";
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
