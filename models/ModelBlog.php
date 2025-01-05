<?php


include_once "./models/connect.php";


function writeBlog($anhNen, $tieuDe, $noiDung, $maTK)
{
    global $conn;
    $sql = "INSERT INTO BAIVIET(AnhNen , TieuDe ,NoiDung , MaTaiKhoan) values( :AnhNen , :TieuDe , :NoiDung , :MaTaiKhoan )";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":AnhNen", $anhNen, PDO::PARAM_STR);
    $stmt->bindValue(":TieuDe", $tieuDe, PDO::PARAM_STR);
    $stmt->bindValue(":NoiDung", $noiDung, PDO::PARAM_STR);
    $stmt->bindValue(":MaTaiKhoan", $maTK, PDO::PARAM_INT);
    return $stmt->execute();
}

function getBlog()
{
    global $conn;
    $sql = "SELECT * FROM BAIVIET ORDER BY MaBaiViet DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function getBlogByID($id)
{
    global $conn;
    $sql = "SELECT * FROM BAIVIET WHERE MaBaiViet = :MaBaiViet";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaBaiViet", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function deleteBlog($id)
{
    global $conn;
    $sql = "DELETE FROM BAIVIET WHERE MaBaiViet = :MaBaiViet";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":MaBaiViet", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
