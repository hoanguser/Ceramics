
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Forgot Password UI Using CSS - @code.scientist x @codingtorque</title>
</head>

<body>
    <div class="card">
        <form action="" method="post">
            <p class="lock-icon"><i class="fas fa-lock"></i></p>
            <h2>Tạo mật khẩu</h2>
            <p>Nhập mật khẩu mới cho tài khoản</p>
            <input type="text" name="pass" class="passInput" placeholder="Cập nhập mật khẩu mới">
            <div class="err">
                <span>
                    <?php echo (isset($err['pass'])) ? $err['pass'] : '' ?>
                </span>
            </div>
            <input type="text" name="pass2" class="passInput" placeholder="Xác nhận mật khẩu">
            <div class="err">
                <span>
                    <?php echo (isset($err['pass2'])) ? $err['pass2'] : '' ?>
                </span>
            </div>
            <input type="submit" class="sub" name="sent" value="Xác nhận">
            <p>----- hoặc -----</p>
            <a class="back" href="index.php?act=dangnhap">Nhập mật khẩu để đăng nhập</a>
        </form>

    </div>
</body>

</html>
<style>
    .card {
        max-width: 30%;
        margin: 0 auto;
        text-align: center;
        background-color: black;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        border-radius: 30px;
        padding: 35px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .lock-icon {
        font-size: 38px;
        padding: 10px;
        margin: 0;
    }

    .passInput {
        min-width: 80%;
        padding: 10px;
        border: none;
        outline: none;
        margin-top: 20px;
    }

    .sub {
        padding: 10px;
        border: none;
        outline: none;
        font-weight: bold;
        text-transform: uppercase;
        background-color: black;
        color: white;
        margin-top: 20px;
    }

    .back {
        color: white;
    }
</style>