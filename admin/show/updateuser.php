<div class="main">
    <h3>
        UPLOAD TAI KHOAN
    </h3>
    <form class="form" action="index.php?act=user_update" method="post" enctype="multipart/form-data">
    <?php
    if (isset($usct)) {
    ?>
    
    <input type="text" name="name" id="" placeholder="Nhập tên sản phẩm" value="<?= $usct[0]['name'] ?>"> <br>
    <input class="ipt-hinh" type="file" name="hinh" id=""> <br>
    <img src="<?= $usct[0]['img'] ?>" width="150px" height="150px" alt=""> <br>

    <input type="text" name="email" id="" placeholder="Nhập giá sản phẩm" value="<?= $usct[0]['email'] ?>"><br>

    <input type="text" name="pass" id="" placeholder="Nhập giá sản phẩm" value="<?= $usct[0]['pass'] ?>"><br>
       
    
    <div>Quyền hiện tại: <?php if ($usct[0]['role']==1) {
        echo 'admin';
    }else echo 'user' ;?></div>
    <label>
        <input type="radio" name="option"value="admin">admin
    </label>
    <br>
    <label>
        <input type="radio" name="option" value="user">user
    </label> <br>
    <input type="hidden" name="id" value="<?= $usct[0]['id'] ?>">
    
    <?php
    } ?>
        <input type="submit" name="capnhat" value="Cập nhật" class="them">
    </form>
    <br>
    <table>
        <tr class="thead">
            <th>STT</th>
            <th>Tên đăng nhập</th>
            <th>Hình ảnh</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Đơn vị</th>
            <th>Xóa / Sửa</th>
        </tr>
        <tbody>
            <?php
            // var_dump($kq);
            if (isset($kq) && count($kq) > 0) {
                $stt = 1;
                foreach ($kq as $tk) {
                    echo '
                            <tr>
                            <td>' . $stt . '</td>
                            <td>' . $tk['name'] . '</td>
                            <td><img src="' . $tk['img'] . '" alt="" width="100px"></td>
                            <td>' . $tk['email'] . '</td>
                            <td>' . $tk['pass'] . '</td>
                            <td>';
                    if ($tk['role'] == 1) {
                        echo 'admin';
                    } else {
                        echo 'Người dùng';
                    }
            ?>
            <?php
                    echo '
                            </td>
            <td>
            <a href="index.php?act=updateuser&id=' . $tk['id'] . '"><i class="fa-regular fa-pen-to-square"></i></a> 
            <a href="index.php?act=deleteuser&id=' . $tk['id'] . '"><i class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
            ';
                    $stt++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
<style>
    .form {
        width: 100%;
    }
    input{
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        text-align: center;
    }

    .thead {
        background-color: black;
        color: white;
    }

    .tbody {
        background-color: #ddd;
    }

    .main {
        margin-top: 50px;
    }

    select {
        width: 263px;
    }

    .them {
        background-color: black;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }
</style>