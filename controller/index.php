<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
include "../model/connect.php";
include "../model/xl_form.php";
include "../model/otp.php";
include "../model/seach.php";



// ...........................................
include "../interface/header.php";
if (isset($_REQUEST['act'])) {
    switch ($_REQUEST['act']) {
        case 'sanpham':
            include "./../interface/sanpham.php";
            break;
        case 'dangki':
            include "./../interface/dangki.php";
            break;
        case 'dangnhap':
            include "./../interface/dangnhap.php";
            break;
        case 'thoat':
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            // unset($_SESSION['id']);
            header('location: index.php');
            break;
        case 'addCart':
            if (isset($_POST['addtoCart']) && ($_POST['addtoCart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                $sl = 1;
                $qli = 0;
                $i = 0;
                if ($_SESSION['giohang'] == null) {
                    $_SESSION['giohang'] = [];
                } else {
                    if ($_SESSION['giohang'] != null) {
                        foreach ($_SESSION['giohang'] as $cart) {
                            if ($cart[1] === $tensp) {
                                $slnew = $sl + $cart[4];
                                $_SESSION['giohang'][$i][4] = $slnew;
                                $qli = 1;
                                break;
                            }
                        }
                    }
                }
                // echo $sum;
                if ($qli == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl);
                    $_SESSION['giohang'][] = ($item);
                }
                // var_dump($_SESSION['giohang']);
            }
            include "./../interface/addCart.php";

            break;
        case 'forgot':
            include "./../interface/forgot.php";
            break;
        case 'nhapotp':
            $err = [];
            if (isset($_POST['otp'])) {
                $otp = $_POST['otp'];
                $kq = for_got_otp($otp);
                for ($i = 0; $i < count($kq); $i++) {
                    if ($otp == $kq[$i]['otp']) {
                        $_SESSION['otp'] = $kq[$i]['otp'];
                        $_SESSION['id'] = $kq[$i]['id'];
                        header('location: index.php?act=updatepass');
                    } else {
                        $err['otp'] = 'Vui lòng nhập otp!';
                    }
                }
                if (empty($otp)) {
                    $err['otp'] = 'Vui lòng nhập otp!';
                }
            }
            include "./../interface/nhapotp.php";
            break;
        case 'updatepass':
            $err = [];
            if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
                $id = $_SESSION['id'];
            } else {
                echo 0;
            }
            if (isset($_POST['sent'])) {
                $pass = $_POST['pass'];
                $pass2 = $_POST['pass2'];

                if (empty($pass)) {
                    $err['pass'] = 'Vui lòng nhập mật khẩu!';
                }
                if (empty($pass2)) {
                    $err['pass2'] = 'Vui lòng nhập mật khẩu!';
                }
                if ($pass != $pass2) {
                    $err['pass2'] = 'Vui lòng nhập mật lại mật khẩu!';
                }
                if (empty($err) && $pass == $pass2) {
                    $conn = connectdb();
                    $sql = "UPDATE user SET pass = ?  WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([md5($pass), $id]);
                    header('location: index.php');
                }
            }
            include "./../interface/updatepass.php";
            break;
        case 'deleteCart':
            if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            header('location: index.php');
            break;
        default:
            include "./../interface/home.php";
            break;
    }
} else {
    include "./../interface/home.php";
}
include "./../interface/footer.php";
