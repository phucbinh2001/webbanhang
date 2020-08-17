<?php
    if(!is_array($spct))
        echo "Sản phẩm không tồn tại";
    else {
        $idsp = $spct['id'];
        $namesp = $spct['name'];
        // $price = number_format($spct['price'], 0, ',', '.');
        $price = $spct['price'];
        $vote = $spct['vote'];
        $view = $spct['view'];
        $idtacgia = $spct['idtacgia'];
        $tacgia = shownametg($idtacgia);
        $tacgia = $tacgia['name'];
        $img = $pathimg.$spct['img'];
        $iddm = $spct['iddm'];
        $dmname = shownamedm($iddm);
        $dmname = $dmname['name'];
        if (is_file($img)) $img = '<img src="'.$img.'">';
        else $img = '<img src="'.$pathimg.'404.jpg">';   
?>
    <div class="content3">
            <div class="wrap-header">
                <div class="card-title">
                    <h1><?=$dmname?></h1>
                </div>
                <div class="wrap-nav">
                <?php
                    foreach ($danhmuc as $dm) {
                        $link = "index.php?act=product&idcata=".$dm['id'];
                        $name = $dm['name'];
                        echo '<li><a href="'.$link.'">'.$name.'</a></li>';
                    }
                ?>
                </div>
            </div>
            <div class="wrap-content3">
                <div class="left-wrap-cnt">
                    <div class="top-left-wr">
                        <div class="card-img">
                            <?=$img?>
                        </div>
                        <div class="txt-detail">
                            <h1><?=$namesp?></h1>
                            <p>Tác giả: <span><?=$tacgia?></span></p>
                            <p>Lượt xem: <span><?=$view?></span></p>
                            <p>Đánh giá: <span><?=$vote?> sao</span></p>
                            <p>Giá sách: <span class="price"><?=$price?>đ</span></p>
                            
                            
                            <form action="index.php?act=cart" method="post">
                                <input type="hidden" name="soluong" value="<?= $soluong ?>">
                                <input type="hidden" name="namesp" value="<?= $namesp ?>">
                                <input type="hidden" name="pricesp" value="<?= $price ?>">
                                <input type="hidden" name="idsp" value="<?= $idsp ?>">
                                <input type="hidden" name="imgsp" value='<?= $img ?>'>
                            <div class="soluong">
                                <div class="btn" id="btn_giam " onclick="giam()"> - </div>
                                <input type="number" name="soluongsp" id="soluong" value="1">
                                <div class="btn" id="btn_tang " onclick="tang()"> + </div>
                            </div>
                                <input type="submit" value="Mua ngay" name="mua" class="mua_btn">
                            </form>
                            <script>
                                btntang = document.getElementById("btn_giam");
                                btngiam = document.getElementById("btn_tang");
                                soluong = document.getElementById("soluong").value;
                                function giam() {
                                    if (soluong=="1") {
                                        alert("Còn gì đâu mà giảm")
                                    }else{
                                        soluong--
                                        document.getElementById("soluong").value = soluong;  
                                    } 
                                }

                                function tang() {
                                    soluong++;
                                    document.getElementById("soluong").value = soluong;  
                                }
                            </script>
        
                        </div>
                    </div>
                    <div class="box_comment">
                        <!-- <iframe src="binhluan.php" frameborder="0" width="100%" height="610px" ></iframe> -->
                        <h2>Bình luận</h2>   
                        <div class="content">
                            <?php
                                if(isset($_SESSION['sid'])&&($_SESSION['sid'])>0) {
                                    
                            ?>
                            <form method="POST" onsubmit="return vadilafrom()">
                                <input type="hidden" name="id" id="id" value="" placeholder="Tên">
                                <textarea name="noidung" id="noidung" cols="30" rows="5" placeholder="Thêm bình luận..."></textarea>
                                <!-- <input type="text" name="noidung" id="noidung" placeholder="Thêm bình luận..."> -->
                                <input type="submit" value="Bình luận" name="binhluan" class="btn">
                            </form>
                            <div id="err"></div>
                            <script>
                                function vadilafrom(){
                                    // $name = document.getElementById('name').value;
                                    $noidung = document.getElementById('noidung').value;
                                    if($noidung==""){
                                        document.getElementById('err').innerHTML = "* Vui lòng không bỏ trống";
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                            </script>
                            <div class="cmt_box">
                                <?php 
                                require_once "../model/connect.php";
                                require_once "../model/binhluan.php";
                                if(isset($_POST['binhluan'])){
                                    // $name = $_POST['name'];
                                    $idsp = $_GET['id'];
                                    $name = $_SESSION['suser'];
                                    $ct = $_POST['noidung'];
                                    thembl($name , $ct, $idsp);
                                }
                                    $binhluan = showbl($idsp);
                                    if(sizeof($binhluan)==0)
                                    echo '<div class="cmt">
                                        Hãy là người đầu tiên bình luận cho sách này!
                                    </div>';
                                    else{
                                        foreach ($binhluan as $bl) {
                                            $nameuser = $bl['name'];
                                            $noidung = $bl['noidung'];
                                            echo '<div class="cmt">
                                                <img src="../view/img/avatar.gif" alt="">
                                                <p class="name">'.$nameuser.'</p>
                                                <p class="noidung">'.$noidung.'</p>
                                        </div>';
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                }else{
                                    echo 'Vui lòng đăng nhập để bình luận <a href="index.php?act=user" target="_parent">đăng nhập</a>';
                                }
                            ?>
                        </div> 
                    </div>
                </div>

                <div class="right-wrap-cnt">
                    <h1>liên quan</h1>
                    <div class="list-img">
                        <div class="box-img">
                            <img src="../view/img/13.jpg" alt="">
                        </div>
                        <div class="box-img">
                            <img src="../view/img/14.jpg" alt="">
                        </div>
                        <div class="box-img">
                            <img src="../view/img/1.jpg" alt="">
                        </div>
                        <div class="box-img">
                            <img src="../view/img/2.jpg" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- <section class="new-week">
            <div class="product">
                <p>có thể bạn thích</p>
            </div>

            <div class="row">
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/1.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/2.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/3.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/4.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/5.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>
                <div class="card-book">
                    <div>
                        <a href=""><img src="../view/img/2.jpg" alt=""></a>
                        <div class="txt">
                            <p class="name"><a href="">thinh thế kiểu y</a></p>
                            <p class="author"><a href="">văn thanh</a></p>
                            <p class="view">500 lượt xem</p>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
<?php
    }
?>