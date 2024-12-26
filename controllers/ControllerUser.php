<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'login':
            // models
            include_once "./models/ModelUser.php";

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $email = htmlspecialchars($email, ENT_QUOTES);
                $pass = htmlspecialchars($pass, ENT_QUOTES);
                $check = checkEmail($email);
                if ($check) {
                    if (password_verify($pass, $check['MatKhau'])) {
                        $_SESSION['user'] = $check;
                        if ($_SESSION['user']['Quyen']) {
                            header("Location: admin.php?ctrl=page&view=dashboard");
                        } else {
                            header("Location: index.php?ctrl=page&view=home");
                        }
                        exit;
                    } else {
                        $_SESSION['mess'] = "Đăng nhập thất bại!";
                    }
                } else {
                    $_SESSION['mess'] = "Đăng nhập thất bại!";
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewLogin.php";
            include_once "./views/templates/footer.php";
            break;
        case 'register':
            // models
            include_once "./models/ModelUser.php";
            if (isset($_POST['register'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                $ten = $_POST['ten'];

                $email = htmlspecialchars($email, ENT_QUOTES);
                $pass = htmlspecialchars($pass, ENT_QUOTES);
                $repass = htmlspecialchars($repass, ENT_QUOTES);
                $ten = htmlspecialchars($ten, ENT_QUOTES);
                if ($repass !== $pass) {
                    $_SESSION['mess'] = "Mật khẩu không trùng khớp!";
                } else {
                    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                    $check = checkEmail($email);
                    if (!$check) {
                        $tmp = register($ten, $email, $hashed_password);
                        if ($tmp) {
                            header("Location: index.php?ctrl=user&view=login");
                            exit;
                        } else {
                            $_SESSION['mess'] = "Tạo tài khoản thất bại!";
                        }
                    } else {
                        $_SESSION['mess'] = "Email đã tồn tại!";
                    }
                }
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewRegister.php";
            include_once "./views/templates/footer.php";
            break;

        case 'profile':
            // models
            include_once "./models/ModelUser.php";
            include_once "./models/ModelProduct.php";

            if (isset($_SESSION['user'])) {
                $user = getUserByID($_SESSION['user']['MaTaiKhoan']);
                if (isset($_POST['update'])) {
                    if (isset($_FILES['avt']['error']) && $_FILES['avt']['error'] === 0) {
                        $avt = $_FILES["avt"]["name"];
                        move_uploaded_file($_FILES["avt"]["tmp_name"], "public/images/" . $avt);
                        updateAvt($user['MaTaiKhoan'], $avt);
                        $_SESSION['user'] = getUserByID($user['MaTaiKhoan']);
                    }
                    $ten = $_POST['ten'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $matkhau = $_POST['matkhau'];
                    $matkhaumoi = $_POST['matkhaumoi'];
                    $xacnhanmatkhau = $_POST['xacnhanmatkhau'];
                    $ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);
                    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                    $sdt = htmlspecialchars($_POST['sdt'], ENT_QUOTES);
                    $matkhau = htmlspecialchars($_POST['matkhau'], ENT_QUOTES);
                    $matkhaumoi = htmlspecialchars($_POST['matkhaumoi'], ENT_QUOTES);
                    $xacnhanmatkhau = htmlspecialchars($_POST['xacnhanmatkhau'], ENT_QUOTES);
                    if (!empty($matkhau)) {
                        if (password_verify($matkhau, $user['MatKhau'])) {
                            $hashed_password = password_hash($matkhaumoi, PASSWORD_DEFAULT);
                            $tmp = updateProfileHasPass($user['MaTaiKhoan'], $ten, $email, $sdt, $hashed_password);
                            if ($tmp) {
                                $_SESSION['user'] = getUserByID($user['MaTaiKhoan']);
                                $_SESSION['mess']['text'] = "Cập nhật thông tin thành công!";
                                $_SESSION['mess']['type'] = "success";
                                header("Location: index.php?ctrl=user&view=profile");
                                exit;
                            } else {
                                $_SESSION['mess']['text'] = "Cập nhật thông tin thất bại!";
                                $_SESSION['mess']['type'] = "danger";
                            }
                        } else {
                            $_SESSION['mess']['text'] = "Mật khẩu cũ không đúng!";
                            $_SESSION['mess']['type'] = "danger";
                        }
                    } else {
                        $tmp = updateProfileNoPass($user['MaTaiKhoan'], $ten, $email, $sdt);
                        if ($tmp) {
                            $_SESSION['user'] = getUserByID($user['MaTaiKhoan']);
                            $_SESSION['mess']['text'] = "Cập nhật thông tin thành công!";
                            $_SESSION['mess']['type'] = "success";
                            header("Location: index.php?ctrl=user&view=profile");
                            exit;
                        } else {
                            $_SESSION['mess']['text'] = "Cập nhật thông tin thất bại!";
                            $_SESSION['mess']['type'] = "danger";
                        }
                    }
                }

                $sp = getOrdersByUserID($user['MaTaiKhoan']);

                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if (isset($_GET['sp']) and isset($_GET['sohoadon'])) {
                        $maSp = (int) $_GET['sp'];
                        $soHoaDon = (int)$_GET['sohoadon'];
                        $tam = deleteDetailOrder($maSp, $soHoaDon);
                        if ($tam) {
                            deleteOrder($user['MaTaiKhoan']);
                            echo 'success';
                            exit;
                        } else {
                            echo 'error';
                            exit;
                        }
                    }
                }
            } else {
                include_once "./views/templates/head.php";
                include_once "./views/templates/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/footer.php";
                exit;
            }

            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewProfile.php";
            include_once "./views/templates/footer.php";
            break;
        case 'logout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header("Location: index.php?ctrl=user&view=login");
            } else {
                include_once "./views/templates/head.php";
                include_once "./views/templates/header.php";
                include_once "./views/View404.php";
                include_once "./views/templates/footer.php";
                exit;
            }
            break;
        case 'forgotpassword':

            // models
            include_once "./models/phpmailer.php";
            include_once "./models/ModelUser.php";

            if (isset($_GET['action']) && $_GET['action'] === 'sendcode' && isset($_GET['email'])) {
                $email = htmlspecialchars($_GET['email'], ENT_QUOTES);
                if (checkEmail($email)) {
                    $code = rand(1000, 9999);
                    $_SESSION['code'] = $code;
                    codeForgotPassword($email, $code);
                    exit;
                }
            }

            if (isset($_POST['changepass'])) {
                $emailInput = htmlspecialchars($_POST['email'], ENT_QUOTES);
                $passInput = htmlspecialchars($_POST['pass'], ENT_QUOTES);
                $codeInput = (int) htmlspecialchars($_POST['code'], ENT_QUOTES);
                if ($codeInput === $_SESSION['code']) {
                    $check = checkEmail($emailInput);
                    if ($check) {
                        $hashed_password = password_hash($passInput, PASSWORD_DEFAULT);
                        changePass($hashed_password, $emailInput);
                        unset($_SESSION['code']);
                        header("Location: index.php?ctrl=user&view=login");
                        exit;
                    } else {
                        unset($_SESSION['code']);
                        $_SESSION['mess'] = 'Email không tồn tại!';
                        header("Location: index.php?ctrl=user&view=forgotpassword");
                        exit;
                    }
                } else {
                    $_SESSION['mess'] = 'Mã không chính xác!';
                    header("Location: index.php?ctrl=user&view=forgotpassword");
                    exit;
                }
            }


            // view
            include_once "./views/templates/head.php";
            include_once "./views/templates/header.php";
            include_once "./views/ViewForgotPassword.php";
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
