<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            // models
            include_once "./models/ModelProduct.php";

            $dssm = showAllCate();

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageHome.php";
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
