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
                    if (checkInvoice($id)) {
                        updateOrderStatus($id, $status);
                        if ($status === 2) {
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
