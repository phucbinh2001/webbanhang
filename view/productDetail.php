<?php
    if(!is_array($spct))
        echo "Sản phẩm không tồn tại";
    else {
        $name = $spct['name'];
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
                            <h1><?=$name?></h1>
                            <p>Tác giả: <span><?=$tacgia?></span></p>
                            <p>Lượt xem: <span><?=$view?></span></p>
                            <p>Đánh giá: <span><?=$vote?> sao</span></p>
                            <p>Giá sách: <span class="price"><?=$price?></span></p>
                            <button><a href="">mua sách</a></button>
                        </div>
                    </div>
                    <div class="">
                        <iframe src="binhluan.php" frameborder="0" width="100%" height="300px"></iframe>
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

        <section class="new-week">
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
        </section>
<?php
    }
?>