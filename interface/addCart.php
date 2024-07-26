<div class="container-cart">

    <!-- <table>
        <thead>
            <th colspan="2">Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </thead> -->
    <?php
    if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
        echo '<table>
    <thead>
        <th colspan="2">Sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tổng</th>
        <th>Xóa</th>
        </thead>
    <tbody>';
        foreach ($_SESSION['giohang'] as $item) {
            $total = $item[3] * $item[4];
            echo '
        <tr>
        <td><img src="' . $item[2] . '" alt="" width="100px"></td>
        <td>' . $item[1] . '</td>
        <td>' . $item[4] . '</td>
        <td>' . $item[3] . '</td>
        <td>' . $total . '</td>
        <td><a href="#">Xóa</a></td>
        </tr>
        ';
        }

        echo '</tbody>
    </table>
    <div class="footer-cart">
        <a href="index.php?act=sanpham">Tiếp tục mua hàng</a>
        <a href="#">Thanh toán</a>
        <a href="index.php?act=deleteCart">Xóa</a>
    </div>
    ';
    
    } else {
    ?>
        <div class="no-more">
            <img src="../interface/image/br-cartno.png" alt="">
            <div class="banko">
                Bạn chưa có hàng nào
            </div>
        </div>
        <div class="footer-cart">
        <a href="index.php?act=sanpham">Tiếp tục mua hàng</a>
        </div>
    <?php } ?>
</div>
<style>
    .no-more {
        max-width: 45%;
        margin: 0 auto;
        padding: 20px;
        margin-bottom: 30px;
        text-align: center;
    }
    .no-more>img {
        width: 100%;
    }

    .container-cart {
        max-width: 50%;
        margin: 0 auto;
    }


    table {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    th {
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
    }

    .footer-cart {
        display: flex;
        margin-bottom: 20px;
        justify-content:center;
        gap: 50px;
    }

    .footer-cart>a {
        padding: 10px;
        text-decoration: none;
        color: white;
        background-color: black;
        margin-left: 10px;
    }

    .footer-cart>a:hover {
        background-color: white;
        padding: 9px;
        color: black;
        border: 1px solid black;
    }

    td {
        text-align: center;
        padding: 12px;
    }
</style>