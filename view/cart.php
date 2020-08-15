<div class="cart_box">
    <h2 style="text-align: center;">Giỏ hàng của bạn </h2>
    <table class="cart" align="center">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    <?php
        if(!is_array($_SESSION['cart']))
            echo "Giỏ hàng trống";
        else{
            // var_dump($_SESSION['cart']);
            for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
                $name = $_SESSION['cart'][$i][0];
                $price = $_SESSION['cart'][$i][1];
                $img = $_SESSION['cart'][$i][2];
                $id = $_SESSION['cart'][$i][3];
                $soluong = $_SESSION['cart'][$i][4];
                $thanhtien = $soluong * $price;
                echo
                '<tr>
                    <td><input type="checkbox" name="selectbuy" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$img.'</td>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td>'.$soluong.'</td>
                    <td>'.$thanhtien.'</td>
                </tr>';
            }
        }

    ?>
    </table>
    <a href="#" class="btn">Đặt hàng ngay</a>
</div>
