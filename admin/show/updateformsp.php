<div class="main">
    <h3>
        UPLOAD SAN PHAM
    </h3>
    <form class="form" action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
            $iddmht = $spct[0]['iddm'];
            if (isset($dsdm)) {
                foreach ($dsdm as $dm) {
                    if ($dm['id'] == $iddmht) {
                        echo '<option value="' . $dm['id'] . '" selected>' . $dm['tendm'] . '</option>';
                    } else {
                        echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                    }
                }
            }
            ?>
        </select>
        <input type="text" name="tensp" id="" placeholder="Nhập tên sản phẩm" value="<?= $spct[0]['tensp'] ?>">
        <input class="ipt-hinh" type="file" name="hinh" id="">
        <img src="<?= $spct[0]['img'] ?>" width="100px" alt="">
        <input type="text" name="dongia" id="" placeholder="Nhập giá sản phẩm" value="<?= $spct[0]['dongia'] ?>">
        <input type="hidden" name="id" value="<?= $spct[0]['id'] ?>">
        <input type="submit" name="capnhatuser" value="Cập nhật" class="them">
    </form>
    <br>
    <table>
        <tr class="thead">
            <th>STT</th>
            <th>Tên Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Xóa / Sửa</th>
        </tr>
        <?php
        // var_dump($kq);
        if (isset($kq) && count($kq) > 0) {
            $i = 1;
            foreach ($kq as $item) {
                echo '
                <tr class="tbody">
                <td>' . $i . '</td>
                <td>' . $item['tensp'] . '</td>
                <td><img src="' . $item['img'] . '" alt="" width="100px"></td>
                <td>' . $item['dongia'] . '</td>
                <td>
                    <a href="index.php?act=updateformsp&id=' . $item['id'] . '"><i class="fa-regular fa-pen-to-square"></i></a> 
                    <a href="index.php?act=deletesp&id=' . $item['id'] . '"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
                ';
                $i++;
            }
        }
        ?>
    </table>
</div>
<style>
    .form {
        width: 100%;
        text-align: center;
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