<?php

include_once "./models/connect.php";

function register($ten, $email, $pass)
{
    global $conn;
    $sql = "INSERT INTO TAIKHOAN (TenTaiKhoan,Email,MatKhau,Quyen) values(:TenTaiKhoan , :Email , :MatKhau , 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenTaiKhoan", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":Email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":MatKhau", $pass, PDO::PARAM_STR);
    return $stmt->execute();
}


function checkEmail($email)
{
    global $conn;
    $sql = "SELECT * FROM TAIKHOAN WHERE Email = :Email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function getUserByID($id)
{
    global $conn;
    $sql = "SELECT * FROM TAIKHOAN WHERE MaTaiKhoan = :MaTaiKhoan";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaTaiKhoan", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function updateProfileHasPass($id, $ten, $email, $std, $matkhau)
{
    global $conn;
    $sql = "UPDATE TAIKHOAN SET TenTaiKhoan = :TenTaiKhoan , Email = :Email , SoDienThoai = :SoDienThoai , MatKhau = :MatKhau WHERE MaTaiKhoan = :MaTaiKhoan";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenTaiKhoan", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":Email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":SoDienThoai", $std, PDO::PARAM_STR);
    $stmt->bindValue(":MatKhau", $matkhau, PDO::PARAM_STR);
    $stmt->bindValue(":MaTaiKhoan", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateProfileNoPass($id, $ten, $email, $std)
{
    global $conn;
    $sql = "UPDATE TAIKHOAN SET TenTaiKhoan = :TenTaiKhoan , Email = :Email , SoDienThoai = :SoDienThoai WHERE MaTaiKhoan = :MaTaiKhoan";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":TenTaiKhoan", $ten, PDO::PARAM_STR);
    $stmt->bindValue(":Email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":SoDienThoai", $std, PDO::PARAM_STR);
    $stmt->bindValue(":MaTaiKhoan", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateAvt($id, $avt)
{
    global $conn;
    $sql = "UPDATE TAIKHOAN SET AnhDaiDien = :AnhDaiDien WHERE MaTaiKhoan = :MaTaiKhoan";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":AnhDaiDien", $avt, PDO::PARAM_STR);
    $stmt->bindValue(":MaTaiKhoan", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function changePass($pass, $email)
{
    global $conn;
    $sql = "UPDATE TAIKHOAN SET MatKhau = :MatKhau WHERE Email = :Email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MatKhau", $pass, PDO::PARAM_STR);
    $stmt->bindValue(":Email", $email, PDO::PARAM_STR);
    return $stmt->execute();
}
