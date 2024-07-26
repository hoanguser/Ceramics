<?php
session_start();
ob_start();
include "../model/connect.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/user.php";


connectdb();
include "show/header.php";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'danhmuc':
            $kq = getall_dm();
            include "show/danhmuc.php";
            break;
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi']) && $_POST['tendm'] != "") {
                $tendm = $_POST['tendm'];
                themdm($tendm);
                $_POST['tendm'] == "";
            }
            $kq = getall_dm();
            include "show/danhmuc.php";
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete($id);
            }
            $kq = getall_dm();
            include "show/danhmuc.php";
            break;
        case 'updateformdm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kqone = getonedm($id);
                // delete($id);
                $kq = getall_dm();
                include "show/updateformdm.php";
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $tendm = $_POST['tendm'];
                updatedm($id, $tendm);
                // delete($id);
                $kq = getall_dm();
                include "show/danhmuc.php";
            }
            break;
            // ------------------------------------------------------------

        case 'sanpham':
            $dsdm = getall_dm();
            $kq = getall_sanpham();
            include "show/sanpham.php";
            break;
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $dongia = $_POST['dongia'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img = $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                them_sanpham($iddm, $tensp, $dongia, $img);
                $iddm == "";
                $tensp == "";
                $dongia == "";
                $kq = getall_sanpham();
            }
            $kq = getall_sanpham();
            include "show/sanpham.php";
            break;
        case 'updateformsp':
            $dsdm = getall_dm();
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $spct = getall_sp($_GET['id']);
            }
            $kq = getall_sanpham();
            include "show/updateformsp.php";
            break;
        case 'sanpham_update':
            $dsdm = getall_dm();
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $dongia = $_POST['dongia'];
                $id = $_POST['id'];
                if ($_FILES["hinh"]["tmp_name"] != "") {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $uploadOk = 0;
                    }
                    if ($uploadOk = 1) {
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    }
                } else {
                    $img = "";
                }
                updatesp($id, $tensp, $img, $dongia, $iddm);
            }
            $kq = getall_sanpham();
            include "show/sanpham.php";
            break;

        case 'deletesp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deletesp($id);
            }
            $kq = getall_sanpham();
            include "show/sanpham.php";
            break;


            // ------------------------------------------------------------
        case 'taikhoan':
            $kq = getall_user();
            include "show/taikhoan.php";
            break;
        case 'updateuser':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $usct = getone_user($_GET['id']);
                // var_dump($usct);
            }
            $kq = getall_user();
        case 'user_update':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $quyen = $_POST['option'];
                if ($quyen == 'admin') {
                    $role = 1;
                } else {
                    $role = 0;
                }
                $id = $_POST['id'];
                if ($_FILES["hinh"]["tmp_name"] != "") {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $uploadOk = 0;
                    }
                    if ($uploadOk = 1) {
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    }
                } else {
                    $img = "";
                }
                updateuser($id, $name, $img, $email, md5($pass), $role);
                // updatesp($id, $tensp, $img, $dongia, $iddm);
            }
            $kq = getall_user();
            include "show/updateuser.php";
            break;
        case 'deleteuser':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deleteuser($id);
            }
            $kq = getall_user();
            include "show/taikhoan.php";
            break;
        case 'adduser':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $quyen = $_POST['option'];
                if (!isset($_POST['option'])) {
                    $quyen=0;
                }
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img = $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                them_user($name, $img , $email, md5($pass), $quyen);
                $kq = getall_user();
            }
            $kq = getall_user();
            include "show/taikhoan.php";
            break;
        case 'donhang':
            include "show/donhang.php";
            break;
        default:
            include "show/home.php";
            break;
    }
} else {
    include "show/home.php";
};

include "show/footer.php";
