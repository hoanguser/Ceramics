<?php
$err = [];
if (isset($_POST['name']) && trim($_POST['name'])) {
    $name = $_POST['name'];
    $email =$_POST['email'];
    $pass =  md5($_POST['pass']);
    $pass2 = md5($_POST['pass2']);
    $role = $_POST['role'];
    $role == 0;
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
    $kq = dang_ki_check($name, $email, $pass, $role, $img);
    // var_dump($kq);
    for ($i = 0; $i < count($kq); $i++) {
        if ($name == $kq[$i]['name']) {
            if ($name) {
                $err['name'] = 'Tên đăng nhập đã tồn tại';
            }
        }
        if ($email == $kq[$i]['email']) {
            if ($email) {
                $err['email'] = 'Email đã tồn tại';
            }
        }
    }
    if (empty($name)) {
        $err['name'] = 'Vui lòng nhập tên đăng nhập';
    }
    if (empty($email)) {
        $err['email'] = 'Vui lòng nhập email';
    }
    if (empty($pass)) {
        $err['pass'] = 'Vui lòng nhập mật khẩu';
    }
    if (empty($pass2)) {
        $err['pass2'] = 'Vui lòng xác nhập mật khẩu';
    }
    if ($pass2 != $pass) {
        $err['pass2'] = 'Vui lòng nhập lại mật khẩu';
    }
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)) {
        $err['name'] = 'Vui lòng khoong nhập kí tự';
    }
    if (strpos($name, ' ') !== false) {
        $err['name'] = 'Vui lòng khoong nhập khoảng cách';
    }
    //var_dump($err);
    if (empty($err)) {
        // $title="ĐĂNG KÍ THÀNH CÔNG";
        dang_ki($name, $email, $pass, $role, $img);
        header('location: index.php');
    }

    //die();
    // dang_ki($name, $email, $pass, $role);
}

?>
<div class="banner" id="banner">
    <img src="../interface/image/banner_small.jpg" alt="">
</div>
<article>
    <div class="form-signup">
        <div class="form-signup-container">
            <div class="form-signup-container-left">
                <h1>
                    Đăng kí
                </h1>
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                </ul>
                <p>Đăng kí bằng email</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="img">Hình đại diện</label>
                    <input type="file" name="hinh" id="">
                    <input class="input-form" type="text" name="name" placeholder="Tên đăng nhập" 
                    <?php if (isset($name) && $name) {
                        echo 'value='.$name.'';
                    } ?> 
                    />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['name'])) ? $err['name'] : '' ?>
                        </span>
                    </div>
                    <input class="input-form" type="email" name="email" placeholder="Email"
                    <?php if (isset($email) && $email) {
                        echo 'value='.$email.'';
                    } ?> 
                    />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['email'])) ? $err['email'] : '' ?>
                        </span>
                    </div>
                    <input class="input-form" type="password" name="pass" placeholder="Mật khẩu"
                    <?php if (isset($pass) && $pass) {
                        echo 'value='.$pass.'';
                    } ?> 
                    />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['pass'])) ? $err['pass'] : '' ?>
                        </span>
                    </div>
                    <input class="input-form" type="hidden" name="role">
                    <input class="input-form" type="password" name="pass2" placeholder="Xác nhận mật khẩu"
                    <?php if (isset($pass2) && $pass2) {
                        echo 'value='.$pass2.'';
                    } ?> 
                    />
                    <div class="err">
                        <span>
                            <?php echo (isset($err['pass2'])) ? $err['pass2'] : '' ?>
                        </span>
                    </div>
                    <input class="button" type="submit" name="dangki" value="Đăng kí">
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
                    <a href="index.php?act=dangnhap"><button class="ghost" id="signUp">Đăng Nhập</button></a>
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
