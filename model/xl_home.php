<?php
function getall_sanpham($limit,$offs)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanpham  limit $limit offset $offs");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getall_sanphamdm()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE iddm = 49");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $dm1 = $stmt->fetchAll();
    return $dm1;
}

?>