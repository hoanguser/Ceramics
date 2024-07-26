<?php
$err = [];
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $kq = dang_nhap($_POST['name'],md5($_POST['pass']));
    if (empty($name)) {
        $err['name'] = 'Vui lòng nhập tên đăng nhập';
    }
    if (empty($pass)) {
        $err['pass'] = 'Vui lòng nhập mật khẩu';
    }
    // var_dump($kq);
    echo md5($_POST['pass']);
    if (empty($err) && $kq) {
        for ($i = 0; $i < count($kq); $i++) {
            if ($name == $kq[$i]['name'] && md5($_POST['pass']) == $kq[$i]['pass']) {
                $_SESSION['id'] = $kq[$i]['id'];
                $_SESSION['name'] = $kq[$i]['name'];
                $_SESSION['img'] = $kq[$i]['img'];
                $_SESSION['role'] = $kq[$i]['role'];
                if(isset($_SESSION['role'])&&$_SESSION['role'] == 0){
                    header('location: ../controller/index.php');
                }else{
                    header('location: ../admin/index.php');
                }
            } else {
                if ($name) {
                    $err['name'] = 'Tên đăng nhập không tồn tại!';
                } 
                if ($pass) {
                    $err['pass'] = 'Sai mật khẩu!';
                }
            }
        }
    }
}

?>
<!-- <div class="banner" id="banner">
    <img src="../interface/image/banner_small.jpg" alt="">
</div> -->
<article>
    <div class="form-signup">
        <div class="form-signup-container">
            <div class="form-signup-container-left">
                <h1>
                    Đăng nhập
                </h1>
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                </ul>
                <p>Đăng kí bằng email</p>
                <form action="" method="post">
                    <input class="input-form" type="text" name="name" placeholder="Tên đăng nhập"  
                    <?php if (isset($name) && $name) {
                        echo 'value='.$name.'';
                    } ?> />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['name'])) ? $err['name'] : '' ?>
                        </span>
                    </div>
                    <input class="input-form" type="password" name="pass" placeholder="Mật khẩu" />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['pass'])) ? $err['pass'] : '' ?>
                        </span>
                    </div>
                    <input class="button" type="submit" name="dangki" value="Đăng nhập">

                    <div class="forgot">
                        <a href="index.php?act=forgot">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
            <div class="form-signup-container-right">
                <h1>
                    Chào Mừng Bạn!
                </h1>
                <p>
                    Nhập tài khoản của bạn để tham gia vào với chúng tôi
                </p>
                <div class="no-more-account">
                    <p>Bạn chưa có tài khoản?</p>
                    <a href="index.php?act=dangnhap"><button class="ghost" id="signUp">Đăng Kí</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="click" id="click-scroll">
        <a href="#banner"><i class="fa-solid fa-chevron-up"></i></a>
    </div>
</article>
<style>
    .form-signup-container {
        max-width: 55%;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-top: 50px;
        margin-bottom: 50px;
        background-color: white;
        border-radius: 30px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    .form-signup-container-left {
        text-align: center;
        padding: 35px;
        overflow: hidden;
    }

    .form-signup-container-left>ul {
        display: flex;
        gap: 30px;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .form-signup-container-left>ul>li {
        list-style: none;
        border-radius: 30px;
        padding: 10px 16px;
        border: 1px solid #eee;
    }

    .form-signup-container-left>ul>li>a {
        color: black;
    }

    .input-form {
        outline: none;
        min-width: 85%;
        padding: 10px;
        margin-top: 15px;
        background-color: #eee;
        border: none;
    }

    .button {
        margin-top: 15px;
        padding: 10px 20px;
        border-radius: 30px;
        width: 50%;
        background-color: #FF4B2B;
        border: none;
        font-weight: bold;
        text-transform: uppercase;
    }

    .form-signup-container-right {
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        border-radius: 0px 30px 30px 0px;
        padding: 35px;
        text-align: center;
    }

    .form-signup-container-right>h1 {
        margin-top: 100px;
        padding-top: 30px;
        font-weight: bold;
        font-size: 30px;
        color: white;
    }

    .err {
        color: #FF4B2B;
        font-size: 13px;
        text-align: left;
        padding-left: 12px;
    }
</style>