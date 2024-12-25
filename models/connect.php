<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=cakeshop;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// query return csdl if 1 fetch() else > 1 fetchAll() select
function signIn($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM taikhoan WHERE '$email' = Email AND '$password' = MatKhau";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

// query no return seleect insert update , return true or false
function signUp($ten, $email, $password)
{
    global $conn;
    $sql = "INSERT INTO taikhoan (HoTen , Email , MatKhau) VALUES ('$ten' , '$email' , '$password')";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}
