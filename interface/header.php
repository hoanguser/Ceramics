<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurPottery</title>
    <!-- thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- ................. -->
    <!-- chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!--  -->
    <link rel="shortcut icon" href="../interface/image/logo_small_link.png" type="image/x-icon">
    <link rel="stylesheet" href="../interface/css/index.css">
    <link rel="stylesheet" href="../interface/css/dangki.css">



</head>

<body>
    <header>
        <div class="header-srcoll" id="header-scroll">
            <div class="nav-header">
                <div class="logo-img">
                    <img src="../interface/image/logo-remove.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li><a class="hover-effect" href="index.php">Trang chủ</a></li>
                        <li>
                            <a class="hover-effect" href="index.php?act=sanpham">Sản phẩm</a>
                            <div class="menuc2">
                                <ul>
                                    <li><a href="#4">Sản phẩm 1</a></li>
                                    <li><a href="#4">Sản phẩm 2</a></li>
                                    <li><a href="#4">Sản phẩm 3</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="hover-effect" href="#">Giới thiệu</a></li>
                        <li><a class="hover-effect" href="#">Blog</a></li>
                        <li><a class="hover-effect" href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="icon">
                    <ul>
                        <?php
                        if (isset($_POST['sea']) && !empty($_POST['search'])) {
                            $key = $_POST['search'];
                            $kqsp = search($key);
                        }
                        ?>
                        <li class="search-hover"><a href="#2"><i class="fa-solid fa-magnifying-glass"></i></a>
                            <div class="search-box">
                                <form action="" method="post">
                                    <input type="text" name="search" id="">
                                    <input type="submit" name="sea" value="tìm kiếm">
                                </form>
                                <div class="show-sp-seach">
                                    <table>
                                        <tbody>
                                            <?php
                                            if (isset($kqsp) && count($kqsp) > 0) {
                                                foreach ($kqsp as $item) {
                                                    echo '
                                                <tr>
                                                <td>' . $item['tensp'] . '</td>
                                                <td><img src="' . $item['img'] . '" alt="" width="100px"></td>
                                                <td>' . $item['dongia'] . '</td>
                                                <td><a href="#">Xóa</a></td>
                                                </tr>
                                                ';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="user-icon"><a href="#2"><i class="fa-solid fa-user"></i></a>
                            <div class="user-login">
                                <ul>
                                    <?php
                                    if (isset($_SESSION['name']) && ($_SESSION['name']) != "") {
                                        if (isset($_SESSION['img']) && $_SESSION['img']) {
                                            if ($_SESSION['role'] == 1) {
                                                echo '<li><a class="hover-effect" href="../admin/index.php">Quản lý admin</a></li>';
                                            }
                                            echo '
                                               <li><a href="#"><img class="img-avt-login" src="' . $_SESSION['img'] . '" alt="" width="50px"></a></li>';
                                        } else {
                                            echo '
                                                <li><a href="#"><img class="img-avt-login" src="../upload/avt.png" alt="" width="50px"></a></li>';
                                        }
                                        echo '
                                           <li><a class="hover-effect" href="index.php?act=dangki">' . $_SESSION['name'] . '</a></li>
                                           <li><a class="hover-effect" href="index.php?act=thoat">Đăng xuất</a></li>';
                                    } else { ?>
                                        <li><a class="hover-effect" href="index.php?act=dangki">Đăng kí</a></li>
                                        <li><a class="hover-effect" href="index.php?act=dangnhap">Đăng nhập</a></li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                        <li class="cart-icon"><a href="index.php?act=addCart">
                                <div class="quality">
                                    <span class="quality">
                                        <?php
                                        if (isset(($_SESSION['giohang']))) {
                                            $sum = 0;
                                            foreach ($_SESSION['giohang'] as $cart) {
                                                $sum += $cart[4];
                                            }
                                            echo $sum;
                                        } else {
                                        ?>
                                            0<?php } ?>
                                    </span>
                                </div>
                                <div class="showsp-header">
                                    <table>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['giohang']) && $_SESSION['giohang'] != "") {
                                                foreach ($_SESSION['giohang'] as $item) {
                                                    $total = $item[3] * $item[4];
                                                    echo '
                                                <tr>
                                                <td><img src="' . $item[2] . '" alt="" width="40px"></td>
                                                <td>' . $item[1] . '</td>
                                                <td>' . $item[4] . '</td>
                                                <td>' . $item[3] . '</td>
                                                <td><a href="#">Xóa</a></td>
                                                </tr>
                                                ';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    if ($_SESSION['giohang'] == null) {
                                    ?>
                                        <div class="out">
                                            Bạn chưa mua hàng
                                        </div> <?php }
                                                ?>
                                </div>
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="nav-header">
                <div class="logo-img">
                    <img src="../interface/image/logo-remove.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li><a class="hover-effect" href="index.php">Trang chủ</a></li>
                        <li>
                            <a class="hover-effect" href="index.php?act=sanpham">Sản phẩm</a>
                            <div class="menuc2">
                                <ul>
                                    <li><a href="#4">Sản phẩm 1</a></li>
                                    <li><a href="#4">Sản phẩm 2</a></li>
                                    <li><a href="#4">Sản phẩm 3</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="hover-effect" href="#">Giới thiệu</a></li>
                        <li><a class="hover-effect" href="#">Blog</a></li>
                        <li><a class="hover-effect" href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="icon">
                    <ul>
                        <li><a href="#2"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                        <li class="user-icon"><a href="#2"><i class="fa-solid fa-user"></i></a>
                            <div class="user-login">
                                <ul>
                                    <?php if (isset($_SESSION['name']) && ($_SESSION['name']) != "") {
                                        echo '
                                         <li><a href="#"><img class="img-avt-login" src="' . $_SESSION['img'] . '" alt="" width="50px"></a></li>
                                         <li><a class="hover-effect" href="index.php?act=dangki">' . $_SESSION['name'] . '</a></li>
                                         <li><a class="hover-effect" href="index.php?act=thoat">Đăng xuất</a></li>';
                                    } else { ?>
                                        <li><a class="hover-effect" href="index.php?act=dangki">Đăng kí</a></li>
                                        <li><a class="hover-effect" href="index.php?act=dangnhap">Đăng nhập</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                        <li><a href="index.php?act=addCart">
                                <div class="quality">
                                    <span class="quality">
                                        <?php
                                        if (isset(($_SESSION['giohang']))) {
                                            $sum = 0;
                                            foreach ($_SESSION['giohang'] as $cart) {
                                                $sum += $cart[4];
                                            }
                                            echo $sum;
                                        };
                                        ?>
                                    </span>
                                </div>
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
</body>

</html>
<style>
    .img-avt-login {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .showsp-header {
        display: none;
        background-color: white;
        padding: 20px;
        position: absolute;
        width: 350px;
        left: -300px;
        top: 25px;
        text-align: left;
        font-size: 13px;
        box-shadow: 1px 2px 9px -3px black;
    }

    .showsp-header>a {
        text-decoration: none;
    }

    .showsp-header td {
        padding: 5px;
    }

    .cart-icon>a:hover>.showsp-header {
        display: block;
    }

    .search-hover {
        position: relative;
    }

    .search-box {
        display: none;
        text-align: center;
        position: absolute;
        left: -140px;
        box-shadow: 1px 2px 9px -3px black;
        padding: 20px;
        background-color: white;
        width: 300px;
    }

    .search-hover:hover>.search-box {
        display: block;
    }
</style>