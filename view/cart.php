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
        if(sizeof($_SESSION['cart'])==0){
            // var_dump(sizeof($_SESSION['cart']));
            echo "Giỏ hàng trống";
        }
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
                    <td class="price"'.$i.'">'.$price.'</td>
                    <td> <div class="soluong_cart">
                        <div class="btn" id="btn_giam " onclick="giam('.$i.')"> - </div>
                        <input type="number" name="soluongsp" id="soluong" class="soluong_vl" value="'.$soluong.'">
                        <div class="btn" id="btn_tang " onclick="tang('.$i.')"> + </div>
                        </div></td>
                    <td class="thanhtien"'.$i.'">'.$thanhtien.'</td>
                </tr>';
            }
        }

    ?>
    <script>
        soluong = document.getElementsByClassName('soluong_vl');
        thanhtien = document.getElementsByClassName('thanhtien');
        price = document.getElementsByClassName('price');
        function giam(i) {
            if(soluong[i].value==1)
                alert("Hết giảm nữa được rồi");
            else
                soluong[i].value --; 
            tinhtien(i);
        }

        function tang(i) {
            soluong[i].value ++;
            tinhtien(i)
        }

        function tinhtien(i) {
            thanhtien[i].innerHTML = Number(price[i].innerHTML) * soluong[i].value; 
        }

    </script>
    </table>
    <a href="#" class="btn">Đặt hàng ngay</a>
</div>
