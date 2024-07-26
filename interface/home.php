<?php
include "../model/xl_home.php";
if (isset($_REQUEST['page'])) {
    $offset = ($_REQUEST['page'] - 1) * 4;
    // echo $offset;
} else $offset = 0;
$kq = getall_sanpham(4, $offset);
$dm1 = getall_sanphamdm();
?>
<div class="banner" id="banner">
    <img src="../interface/image/banner.jpg" alt="">
</div>
<article>
    <div class="container">
        <div class="head-container">
            <div class="icon-ship">
                <div class="icon-son hover-effect">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="title-son">
                    <span class="topic-title">Free Shipping</span> <br>
                    <span class="line-title">Miễn phí giao hàng</span>
                </div>
            </div>
            <div class="icon-ship">
                <div class="icon-son hover-effect">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <div class="title-son">
                    <span class="topic-title">Online Support</span> <br>
                    <span class="line-title">Tư vấn nhanh chóng</span>
                </div>
            </div>
            <div class="icon-ship">
                <div class="icon-son hover-effect">
                    <i class="fa-solid fa-rotate-left"></i>
                </div>
                <div class="title-son">
                    <span class="topic-title">Money Back</span> <br>
                    <span class="line-title">Hoàn tiền phù hợp</span>
                </div>
            </div>
            <div class="icon-ship">
                <div class="icon-son hover-effect">
                    <i class="fa-solid fa-gear"></i>
                </div>
                <div class="title-son">
                    <span class="topic-title">Our Services</span> <br>
                    <span class="line-title">Hãy đến với chúng tôi</span>
                </div>
            </div>

        </div>
        <div class="title-main">
            <span class="hover-effect">Sản phẩm hot</span>
        </div>
        <div class="products">
            <?php
            // var_dump($kq);
            if (isset($kq) && count($kq) > 0) {
                $conn = connectdb();
                $i = 1;
                foreach ($kq as $item) {
                    echo '
<form action="index.php?act=addCart" method="post">
                <div class="pr1">
                    <div class="hover-effect2">
                        <img src="' . $item['img'] . '" alt="">
                        <input class="icon2 button-add" type="submit" value="Đặt hàng" name="addtoCart">
                        <input type="hidden" value="' . $item['id'] . '" name="id">
                        <input type="hidden" value="' . $item['img'] . '" name="img">
                        <input type="hidden" value="' . $item['tensp'] . '" name="tensp">
                        <input type="hidden" value="' . ($item['dongia']) . '" name="gia">
                        <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                        <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="namepr">
                        ' . $item['tensp'] . '
                        </div>
                        <div class="price">
                        ' . number_format($item['dongia']) . '
                        </div>
                        </div>
                        </div>
                        </form>
                ';
                }
            }
            ?>


        </div>
        <style>
            .page-show {

                display: flex;
                gap: 30px;
                justify-content: center;
            }

            .page-show>a {
                background-color: black;
                color: white;
                padding: 10px;
                width: 30px;
                text-decoration: none;
                margin-top: 20px;
            }

            .page-show>a:hover {
                border: 1px solid black;
                background-color: white;
                color: black;
                padding: 9px;

            }
        </style>
        <div class="page-show" style="text-align: center;">
            <?php
            $conn = connectdb();
            $rows = $conn->query("SELECT count(*) FROM sanpham")->fetchColumn();
            // echo $rows;
            $_REQUEST['page'] = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
            $total_pages = ceil($rows / 4);
            // for ($i = 1; $i <= $total_pages; $i++) {
            //     // echo "<a href='index.php?page=$i'>$i</a>";
            // }
            $str_paggi = "<ul class='pagging'>";
            if ($_REQUEST['page'] > 1) {
                $page_prev = $_REQUEST['page'] - 1;
                $str_paggi .= "<li><a href='index.php?page={$page_prev}'><</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = "";
                if ($i == $_REQUEST['page']) $active = "class='active'";
                $str_paggi .= "<li {$active}><a href='index.php?page={$i}'>{$i}</a></li>";
            }

            if ($_REQUEST['page'] < $total_pages) {
                $page_next = $_REQUEST['page'] + 1;
                $str_paggi .= "<li><a href='index.php?page={$page_next}'>></a></li>";
            }
            $str_paggi .= "</ul>";
            echo $str_paggi;
            ?>
        </div>
        <div class="title-main">
            <span class="hover-effect">Sản phẩm mới</span>
        </div>
        <div class="category-product">
            <ul class="menu-item-product" id="menu-click">
                <li class="menu-item">Tượng đá vip</li>
                <li class="menu-item">Tượng thạch đẹp</li>
                <li class="menu-item">Đồ trang trí</li>
            </ul>
            <div id="product-container">
                <div id="product1" class="product-menu active">
                    <?php
                    //  var_dump($dm1);

                    if (isset($dm1) && count($dm1) > 0) {
                        $i = 1;
                        foreach ($dm1 as $item) {
                            echo '
                <div class="pr1">
                    <div class="hover-effect2">
                        <img src="' . $item['img'] . '" alt="">
                        <span class="icon2">Đặt hàng</span>
                        <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                    </div>
                    <div class="detail">
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="namepr">
                            ' . $item['tensp'] . '
                        </div>
                        <div class="price">
                        ' . number_format($item['dongia']) . '
                        </div>
                    </div>
                </div>
                ';
                        }
                    }
                    ?>
                </div>
                <div id="product2" class="product-menu">
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                </div>
                <div id="product3" class="product-menu">
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr1.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr1.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr1.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr1.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                    <div class="pr1">
                        <div class="hover-effect2">
                            <img src="../interface/image/pr2.jpg" alt="">
                            <span class="icon2">Đặt hàng</span>
                            <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                        </div>
                        <div class="detail">
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="namepr">
                                Tượng phật đá
                            </div>
                            <div class="price">
                                $149.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-small">
        <div class="img-banner-small">
            <img src="../interface/image/banner_small.jpg" alt="">
            <div class="title-banner-small">
                <div class="big-title">
                    Giam 30%
                </div>
                <div class="second-title">
                    Gốm sứ mới nhất
                </div>
                <div class="last-title">
                    Các loại gốm sứ siêu ưu đãi cho khách hàng
                </div>
                <div class="button-banner">
                    Xem ngay
                </div>
            </div>

        </div>

    </div>
    <div class="container container-son">
        <div class="icon-important">
            <img src="../interface/image/icon-important.png" alt="">
        </div>
        <div class="title-important">
            Shetty Jamie <span>(Slither Art)</span>
            <p>
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                alteratioform, by injected humour, or randomised words which don't look even slightly There are many
                variations of passages of Lorem Ipsum available, but the majority have suffered alteratioform. but
                the majority have suffered alteratioform.
            </p>
        </div>
        <div class="title-main">
            <span class="hover-effect">Sản phẩm bán chạy</span>
        </div>
        <div class="box-3pro">
            <div class="img-box-3pr">
                <div class="cover-box"></div>
                <img src="../interface/image/box1.jpg" alt="">
                <span class="icon2" onclick="zoom()"><i class="fa-solid fa-magnifying-glass-plus"></i></span>
                <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                <div class="title-movein">
                    <div class="icon-calendar">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="date-time">Feb 28 , 2018</span>
                    </div>
                    <h4 class="topic-big">Necessitatibus Saepe Eveniet</h4>
                    <p>
                        The standard Lorem Ipsum passage, used since the 1500s"Lorem...
                    </p>
                    <div class="overlay" id="overlay" onclick="closezoom()"></div>
                    <div class="login-form" id="zoom2">
                        <img src="../interface/image/box1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="img-box-3pr">
                <div class="cover-box"></div>
                <img src="../interface/image/box1.jpg" alt="">
                <span class="icon2" onclick="zoom()"><i class="fa-solid fa-magnifying-glass-plus"></i></span>
                <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                <div class="title-movein">
                    <div class="icon-calendar">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="date-time">Feb 28 , 2018</span>
                    </div>
                    <h4 class="topic-big">Necessitatibus Saepe Eveniet</h4>
                    <p>
                        The standard Lorem Ipsum passage, used since the 1500s"Lorem...
                    </p>
                    <div class="overlay" id="overlay" onclick="closezoom()"></div>
                    <div class="login-form" id="zoom2">
                        <img src="../interface/image/box1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="img-box-3pr">
                <div class="cover-box"></div>
                <img src="../interface/image/box1.jpg" alt="">
                <span class="icon2" onclick="zoom()"><i class="fa-solid fa-magnifying-glass-plus"></i></span>
                <span class="icon3"><i class="fa-solid fa-cart-shopping"></i></span>
                <div class="title-movein">
                    <div class="icon-calendar">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="date-time">Feb 28 , 2018</span>
                    </div>
                    <h4 class="topic-big">Necessitatibus Saepe Eveniet</h4>
                    <p>
                        The standard Lorem Ipsum passage, used since the 1500s"Lorem...
                    </p>
                    <div class="overlay" id="overlay" onclick="closezoom()"></div>
                    <div class="login-form" id="zoom2">
                        <img src="../interface/image/box1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-list">
            <div class="img-icon-list">
                <img src="../interface/image/icon_container_foot.png" alt="">
            </div>
            <div class="img-icon-list">
                <img src="../interface/image/icon_container_foot.png" alt="">
            </div>
            <div class="img-icon-list">
                <img src="../interface/image/icon_container_foot.png" alt="">
            </div>
            <div class="img-icon-list">
                <img src="../interface/image/icon_container_foot.png" alt="">
            </div>
            <div class="img-icon-list">
                <img src="../interface/image/icon_container_foot.png" alt="">
            </div>
        </div>
    </div>
    <div class="click" id="click-scroll">
        <a href="#banner"><i class="fa-solid fa-chevron-up"></i></a>
    </div>
</article>
<style>
    ul.pagging {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        list-style: none;
    }

    ul.pagging li {
        float: right;
        padding: 0 2px;
    }

    ul.pagging li a {
        display: block;
        padding: 5px 10px;
        border: 1px solid #dedede;
    }

    ul.pagging li.active a {
        display: block;
        padding: 5px 10px;
        border: 1px solid #f00;
    }

    .pagging>li>a {
        background-color: black;
        color: white;
    }

    .pagging>li:hover>a {
        background-color: white;
        color: black;
    }

    li>a {
        text-decoration: none;
    }
</style>