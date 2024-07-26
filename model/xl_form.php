<?php
function dang_ki($name,$email,$pass,$role,$img)
{
    $conn = connectdb();
    $sql = "INSERT INTO user (name, email, pass, role, img)
    VALUES ('$name', '$email', '$pass','$role', '$img')";
    $conn->exec($sql);
}
function dang_ki_check($name,$email,$pass,$role,$img){
  $conn = connectdb();
  $stmt = $conn->prepare("SELECT * FROM user");
  // $stmt->bindParam(1,$name);
  // $stmt->bindParam(2,$pass);
//  WHERE name='.$name.' AND pass='.$pass.'
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq;
}
function dang_nhap($name,$pass){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE name=? and pass=?");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$pass);
  //  WHERE name='.$name.' AND pass='.$pass.'
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function for_got($email){
  $conn = connectdb();
  $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
  $stmt->bindParam(1,$email);
//  WHERE name='.$name.' AND pass='.$pass.'
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq;
}
function for_got_otp($otp){
  $conn = connectdb();
  $stmt = $conn->prepare("SELECT * FROM user WHERE otp=?");
  $stmt->bindParam(1,$otp);
//  WHERE name='.$name.' AND pass='.$pass.'
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq;
}