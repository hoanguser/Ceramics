<?php
include '../config/config.php';
function connectdb()
{
    // $servername = "localhost";
    // $username = "root";
    // $password = "";

    try {
        $conn = new PDO("mysql:host=".SVName.";dbname=".DBName,USRname, DBpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>
