<?php
session_start();
include_once "./models/const.php";

if (isset($_SESSION['user']) && $_SESSION['user']['Quyen'] == 1) {
    if (isset($_GET['ctrl'])) {

        switch ($_GET['ctrl']) {
            case 'page':
                include_once "./controllers/ControllerPageAdmin.php";
                break;
            case 'product':
                include_once "./controllers/ControllerProductAdmin.php";
                break;
            case 'user':
                include_once "./controllers/ControllerUserAdmin.php";
                break;
            default:
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                break;
        }
    } else {
        header('Location: admin.php?ctrl=page&view=dashboard');
    }
} else {
    include_once "./views/templates/admin/head.php";
    include_once "./views/templates/admin/header.php";
    include_once "./views/View404.php";
    include_once "./views/templates/admin/footer.php";
}
