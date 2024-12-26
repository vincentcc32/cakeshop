<?php
session_start();
include_once "./models/const.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['Quyen'] == 0) {
    if (isset($_GET['ctrl'])) {

        switch ($_GET['ctrl']) {
            case 'page':
                include_once "./controllers/ControllerPage.php";
                break;
            case 'product':
                include_once "./controllers/ControllerProduct.php";
                break;
            case 'user':
                include_once "./controllers/ControllerUser.php";
                break;
            default:
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                break;
        }
    } else {
        header('Location: index.php?ctrl=page&view=home');
    }
} else {
    include_once "./views/templates/admin/head.php";
    include_once "./views/templates/admin/header.php";
    include_once "./views/View404.php";
    include_once "./views/templates/admin/footer.php";
}
