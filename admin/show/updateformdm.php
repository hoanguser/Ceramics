<div class="main">
    <h3>
        CẬP NHẬT DANH MỤC

    </h3>
    <?php
     //echo var_dump($kqone);
    ?>
    <form action="index.php?act=updateformdm" method="post">
        <input type="text" name="tendm" id="" value="<?=$kqone[0]['tendm']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Ưu tiên</th>
            <th>Hiện thị</th>
            <th>Xóa / Sửa</th>
        </tr>
        <?php
        // var_dump($kq);
        if (isset($kq) && count($kq) > 0) {
            $i =1;
            foreach ($kq as $dm) {
                echo '
                <tr>
                <td>'.$i.'</td>
                <td>'.$dm['tendm'].'</td>
                <td>'.$dm['uutien'].'</td>
                <td>'.$dm['hienthi'].'</td>
                <td>
                    <a href="index.php?act=updateformdm&id='.$dm['id'].'">Sửa</a> |
                    <a href="index.php?act=delete&id='.$dm['id'].'">Xóa</a>
                </td>
            </tr>
                ';
              $i++;
            }
        }
        ?>
    </table>
</div>