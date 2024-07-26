<div class="main">
    <h3>
        DANH MỤC

    </h3>
    <form action="index.php?act=adddm" method="post">
        <input type="text" name="tendm" id="">
        <input type="submit" name="themmoi" value="Thêm mới">
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
                    <a href="index.php?act=updateformdm&id='.$dm['id'].'"><i class="fa-regular fa-pen-to-square"></i></a> 
                    <a href="index.php?act=delete&id='.$dm['id'].'"><i class="fa-regular fa-trash-can"></i></a>
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
    table{
        width: 100%;
        text-align: center;
    }
</style>