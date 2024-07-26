<?php
function getall_sanpham()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanpham");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getall_sp($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function them_sanpham($iddm, $tensp, $dongia, $img)
{
    $conn = connectdb();
    $sql = "INSERT INTO sanpham (iddm, tensp, dongia, img)
    VALUES ('$iddm', '$tensp', '$dongia','$img')";
    $conn->exec($sql);
}
function deletesp($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM sanpham WHERE id=$id";
    $conn->exec($sql);
}


function updatesp($id, $tensp, $img, $dongia, $iddm)
{
    $conn = connectdb();
    if ($img == "") {
        $sql = "UPDATE sanpham  SET tensp='" . $tensp . "'  , dongia='" . $dongia . "' , iddm='" . $iddm . "'  WHERE id=" . $id;
    }else{
        $sql = "UPDATE sanpham  SET tensp='" . $tensp . "', dongia='" . $dongia . "', iddm='" . $iddm . "' , img='" . $img . "'  WHERE id=" . $id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
