<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            // models
            include_once "./models/ModelProduct.php";

            $dssm = showAllCate();

            if (isset($_SESSION['user'])) {
                $_SESSION['cart'] = getProductCartByID($_SESSION['user']['MaTaiKhoan']);
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageHome.php";
            include_once "./views/templates/footer.php";
            break;
        case 'story':
            // models

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageStory.php";
            include_once "./views/templates/footer.php";
            break;
        case 'contact':
            // models
            include_once "./models/ModelProduct.php";
            include_once "./models/phpmailer.php";

            if (isset($_POST['contactbtn'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $mess = $_POST['message'];
                $content = "Name: " . $name . "<br>Email: " . $email . "<br>Content: " . $mess;
                contactToEmail($content);
                header("Location: index.php?ctrl=page&view=contact");
                exit;
            }


            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewPageContact.php";
            include_once "./views/templates/footer.php";
            break;
        default:
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/View404.php";
            include_once "./views/templates/footer.php";
            break;
    }
} else {
    include_once "./views/templates/head.php";
    include_once "./views/templates/header.php";
    include_once "./views/View404.php";
    include_once "./views/templates/footer.php";
}
