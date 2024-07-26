<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
                    
require 'PHP/PHPMailer.php';
require 'PHP/SMTP.php';
require 'PHP/Exception.php';
//Create an instance; passing `true` enables exceptions
$err = [];
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $kq = for_got($email);
    for ($i = 0; $i < count($kq); $i++) {
        if ($email == $kq[$i]['email']) {
            // var_dump($kq);
            header('location: index.php?act=nhapotp');
            $otpSent = generateRandomString();
            $conn = connectdb();
            $sql = "UPDATE user SET otp = ?  WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$otpSent,$email]);
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'hoang.25102k4@gmail.com';                     //SMTP username
                $mail->Password   = 'wntmcxubvqigmfga';                               //SMTP password
                $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
                $mail->Port       = 465;
                $mail->setFrom('hoang.25102k4@gmail.com', 'Hacker');
                $mail->addAddress($email);               //Name is optional
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Thu Gui OTP';
                $mail->Body    = "<h2>Thư gửi OTP</h2> <br>
                OTP của bạn là:{$otpSent}";
                $mail->AltBody = 'hello ';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    if (count($kq) < 0) {
        if ($email) {
            $err['email'] = 'Email không tồn tại';
        }
    }
    if (empty($email)) {
        $err['email'] = 'Vui lòng nhập email!';
    }
}
?>
<?php
?>
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
            <h2>Quên Mật Khẩu</h2>
            <p>Nhập email để tìm tài khoản</p>
            <input type="text" name="email" class="passInput" placeholder="Địa chỉ email của bạn">
            <input type="submit" class="sub" name="sent" value="Gửi">
            <div class="err">
                <span>
                    <?php echo (isset($err['email'])) ? $err['email'] : '' ?>
                </span>
            </div>
            <p>----- hoặc -----</p>
            <a class="back" href="index.php?act=dangnhap">Nhập mật khẩu để đăng nhập</a>
        </form>

    </div>
</body>

</html>
<style>
    .card {
        font-family: 'Poppins', sans-serif;
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
    }

    .sub {
        padding: 10px;
        border: none;
        outline: none;
        font-weight: bold;
        text-transform: uppercase;
        background-color: black;
        color: white;
    }

    .back {
        color: white;
    }
</style>