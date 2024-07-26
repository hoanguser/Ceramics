<?php
function getall_user()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getone_user($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM user WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function updateuser($id, $name, $img, $email, $pass ,$role)
{
    $conn = connectdb();
    if ($img == "") {
        $sql = "UPDATE user  SET name='" . $name . "'  , email='" . $email . "' , role='" . $role . "', pass='" . $pass . "'  WHERE id=" . $id;
    }else{
        $sql = "UPDATE user  SET name='" . $name . "', email='" . $email . "',role='" . $role . "', pass='" . $pass . "' , img='" . $img . "'  WHERE id=" . $id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function deleteuser($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM user WHERE id=$id";
    $conn->exec($sql);
}
function them_user($name, $img, $email, $pass, $role)
{
    $conn = connectdb();
    $sql = "INSERT INTO user (name, img, email, pass , role)
    VALUES ('$name', '$img', '$email','$pass','$role')";
    $conn->exec($sql);
}
?>
