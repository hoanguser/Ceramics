<div class="main">
    <h3>
        TÀI KHOAN
    </h3>
    <form class="form" action="index.php?act=adduser" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="" placeholder="Nhập tên">
        <input class="ipt-hinh" type="file" name="hinh" id="">
        <input type="text" name="email" id="" placeholder="Nhập email">
        <input type="text" name="pass" id="" placeholder="Nhập pass" value="">
        <label>
            <input type="radio" name="option" value="1">admin
        </label>
        <label>
            <input type="radio" name="option" value="0">user
        </label>
        <input type="submit" name="themmoi" value="Thêm mới" class="them">
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
    table {
        text-align: center;
    }
    input {
    outline: none;
    border: none;
    border: 1px solid #000;
    border-radius: 0;
    padding: 6px 8px;
}
.ipt-hinh {
    padding: 3px;
    border: 1px solid #000;
}
</style>