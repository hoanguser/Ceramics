<?php
function getall_dm()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM danhmuc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function delete($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM danhmuc WHERE id=$id";
    $conn->exec($sql);
}
function getonedm($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM danhmuc WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
};
function updatedm($id, $tendm)
{
    $conn = connectdb();
    $sql = "UPDATE danhmuc  SET tendm='" . $tendm . "' WHERE id=" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function themdm($tendm)
{
    $conn = connectdb();
    $sql = "INSERT INTO danhmuc (tendm)
    VALUES ('".$tendm."')";
    $conn->exec($sql);
}
