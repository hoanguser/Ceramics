<?php
include "../model/xl_home.php";
$kq = getall_sanpham(4, 0);
$dm1 = getall_sanphamdm();
?>
<div class="banner" id="banner">
    <img src="../interface/image/banner.jpg" alt="">
</div>
<div class="container">
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
