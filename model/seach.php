<?php
function search($key){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM `sanpham` WHERE `tensp` like '%$key%' or `dongia` 
    like '%$key%'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqsp = $stmt->fetchAll();
    return $kqsp;
}
?>