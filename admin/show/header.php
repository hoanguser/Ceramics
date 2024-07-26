<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="show/css.css">
    <link rel="stylesheet" href="show/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <header>
        <div class="container-heder">

            <div class="logo">
                <img src="show/img/logo.png" alt="">
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="index.php?act=danhmuc">Danh mục</a></li>
                        <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                        <li><a href="index.php?act=taikhoan">Tài khoản</a></li>
                        <li><a href="index.php?act=donhang">Đơn hàng</a></li>
                    </ul>
                </nav>
            </div>
            <div class="icon">
                <div class="show-adm">
                    <ul>
                        <?php
                        if (isset($_SESSION['name']) && ($_SESSION['name']) != "" && $_SESSION['role'] == 1) {
                            if (isset($_SESSION['img']) && $_SESSION['img']) {
                                echo '
                                <li><a href="#"><img class="img-avt-login" src="' . $_SESSION['img'] . '" alt="" width="30px"></a></li>
                                ';
                            } else {
                                echo '
                                <li><a href="#"><img class="img-avt-login" src="show/img/avt.png" alt="" width="30px"></a></li>
                                ';
                            }

                            echo '
                                               <li><a class="hover-effect" href="index.php?act=dangki">' . $_SESSION['name'] . '</a></li>
                                               <li><a class="hover-effect" href="index.php?act=thoat">Đăng xuất</a></li>';
                        } else { ?>
                            <li><a class="hover-effect" href="index.php?act=dangki">Đăng kí</a></li>
                            <li><a class="hover-effect" href="index.php?act=dangnhap">Đăng nhập</a></li>

                        <?php } ?>
                        <li><a class="hover-effect" href="../controller/index.php">Trở về user</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <style>
        header {
            box-shadow: 0px 0px 4px 0px black;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
        }

        nav ul li a {
            font-size: 18px;

        }

        .logo>img {
            width: 100%;
        }

        .container-heder {
            display: grid;
            grid-template-columns: 15% 70% 15%;
            max-width: 80%;
            margin: 0 auto;
        }

        nav>ul {
            display: flex;
            gap: 6px;
            padding: 20px;
            justify-content: center;
            border: none;
            /* border-bottom: 1px solid #000; */
        }

        .show-adm ul {
            text-align: center;
        }

        .show-adm ul li {
            list-style: none;
        }

        .show-adm ul li a {
            text-decoration: none;
            font-size: 14px;
            color: black;
        }
    </style>