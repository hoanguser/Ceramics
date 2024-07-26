<footer>
    <div class="sent-your-email">
        <div class="container-sent-your-mail">
            <div class="title-vn-email">
                Bạn hãy liên hệ qua email của bạn
            </div>
            <div class="inp-enter-mail">
                <input type="email" placeholder="Nhập email của bạn" class="inp-enter-mail-son">
                <input class="inp-submit" type="submit" value="GỬI EMAIL">
            </div>
        </div>
    </div>
    <div class="container-footer">
        <div class="container-container-footer">
            <div class="left-containerx2-footer">
                <div class="head-footer-logo">
                    <img src="../interface/image/logo.png" alt="">
                </div>
                <div class="head-footer-title">
                    Có rất nhiều loại gốm đẹp phù hớp với bạn! Hãy đến ngay.
                </div>
                <div class="head-footer-icon">
                    <ul>
                        <li class="facebook"><a href="#3"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li class="youtube"><a href="#3"><i class="fa-brands fa-youtube"></i></a></li>
                        <li class="google"><a href="#3"><i class="fa-brands fa-google-plus-g"></i></a></li>
                        <li class="twitch"><a href="#3"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="instagram"><a href="#3"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="center-containerx2-footer">
                <div class="title-head-containerx2">
                    Thông tin chúng tôi
                </div>
                <ul class="ul">
                    <li><a href="">Về chúng tôi</a></li>
                    <li><a href="">Thông tin giao hàng</a></li>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Điều khoản & điều kiện</a></li>
                </ul>
            </div>
            <div class="center2-containerx2-footer">
                <div class="title-head-containerx2">
                    Tiện ích bổ sung
                </div>
                <ul class="ul">
                    <li><a href="">Nhãn hiệu</a></li>
                    <li><a href="">Phiếu quà tặng</a></li>
                    <li><a href="">Liên kết</a></li>
                    <li><a href="">Đặc biệt</a></li>
                    <li><a href="">Liên hệ chúng tôi</a></li>
                </ul>
            </div>
            <div class="right-containerx2-footer">
                <div class="title-head-containerx2">
                Lưu trữ thông tin
                </div>
                <ul class="ul">
                    <li><a href="">Khách hàng<br> United States</a></li>
                    <li><a href="">123-454-5435</a></li>
                    <li><a href="">094-783-8990</a></li>
                    <li><a href="">Ceramics@GomViet.com</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="boder"></div>
    <div class="foot-footer">
        <div class="letf-foot-footer">
            Powered By OpenCart Artcraft - Arts & Craft Store © 2023
        </div>
        <div class="right-foot-footer">
            <ul>
                <li>agdsga</li>
                <li>dsfafd</li>
                <li>adfasd</li>
                <li>đàad</li>
                <li>dfafds</li>
            </ul>
        </div>
    </div>
</footer>
</body>

</html>
<script>
    window.onscroll = function() {
        scrollFunction()
    };
    var clickScroll = document.getElementById("click-scroll");
    console.log(clickScroll);

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            clickScroll.style.display = "inherit";
            document.getElementById("header-scroll").style.top = "0";
        } else {
            document.getElementById("header-scroll").style.top = "-100px";
            clickScroll.style.display = "none";

        }
    }
</script>
<script>
    var menuItems = document.getElementsByClassName("menu-item");
    var products = document.getElementsByClassName("product-menu");
    for (var i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener("click", function() {
            // Lấy chỉ số của item menu được click
            var clickedIndex = Array.prototype.indexOf.call(menuItems, this);

            // Ẩn tất cả các sản phẩm
            for (var j = 0; j < products.length; j++) {
                products[j].classList.remove("active");
            }
            products[clickedIndex].classList.add("active");
        });
    }
</script>
<script>
    function zoom() {
        var overlay = document.getElementById('overlay');
        var loginForm = document.getElementById('zoom2');
        overlay.style.display = 'block';
        loginForm.style.display = 'block';
    }

    function closezoom() {
        var overlay = document.getElementById('overlay');
        var loginForm = document.getElementById('zoom2');

        overlay.style.display = 'none';
        loginForm.style.display = 'none';
    }
</script>