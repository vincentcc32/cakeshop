
<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'logout':
            // models
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header("Location: index.php?ctrl=user&view=login");
            } else {
                include_once "./views/templates/admin/head.php";
                include_once "./views/templates/admin/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/admin/footer.php";
                exit;
            }
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
