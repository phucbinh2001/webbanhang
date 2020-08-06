<section><!--  body -->
        <div class="banner">
            <img src="../view/img/bn.jpg" alt="">
        </div>
        <div class="content">
            <div class="left-siderbar">
                <p class="h2">DANH MỤC</p>
                <?php
                    foreach ($danhmuc as $dm) {
                        $link = "index.php?act=product&idcata=".$dm['id'];
                        $name = $dm['name'];
                        echo '<li><a href="'.$link.'">'.$name.'</a></li>';
                    }
                ?>
            </div>
            <div class="right-siderbar">

                <div class="content-header">
                    <a class="title" href="">Miễn phí hot</a>

                    <!--menu content-->
                    <ul class="content-header-nav">
                        <?php
                            foreach ($danhmuc as $dm) {
                                $link = "index.php?act=product&idcata=".$dm['id'];
                                $name = $dm['name'];
                                echo '<li><a href="'.$link.'">'.$name.'</a></li>';
                            }
                        ?>
                    </ul>
                </div>

                <div class="wrap-book">
                    <?php
                        foreach ($sanphamhot as $sp) {
                            $link = "index.php?act=productDetail&id=".$sp['id'];
                            $name = $sp['name'];
                            $vote = $sp['vote'];
                            $view = $sp['view'];
                            $idtacgia = $sp['idtacgia'];
                            $tacgia = shownametg($idtacgia);
                            $tacgia = $tacgia['name'];
                            $iddm = $sp['iddm'];
                            $danhmuc = shownamedm($iddm);
                            $danhmuc = $danhmuc['name'];
                            $img = $pathimg.$sp['img'];
                            if (is_file($img)) $img = '<img src="'.$img.'">';
                            else $img = '<img src="'.$pathimg.'404.jpg">';   
                            echo '
                            <div class="box-transparent">
                                <div class="book">
                                    '.$img.'
                                    <div class="title">
                                        <p>'.$name.'</p>
                                        <p class="author">'.$tacgia.' <br><br> '.$vote.' vote <br><br> '.$danhmuc.'
                                        </p>
                                    </div>
                                    <div class="view">
                                    '.$view.' lượt xem
                                    </div>
                                    <button><a href="'.$link.'">Chi Tiết</a></button>
                                </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-----------------slogan 1---------------->
    <div class="wrap">
        <div class="left-wrap">
            <p class="txt">lịch phát hành</p>
            <p class="year"> 2020</p>
            <p class="month">tháng 6</p>
        </div>
        <div class="right-wrap">
            <div class="scrollbar" id="style">
                <div class="trans">
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                    <div class="box-calendar">
                        <div class="calendar">
                            <p class="week-day">thứ 2</p>
                            <p class="date">01/06</p>
                        </div>
                        <div class="txt-calendar">
                            <p class="name"><a href="">hành tẩu âm dương</a>
                            </p>
                            <p class="episode">tập 11</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----------------slogan 1---------------->

    <!-----------------Hot sale trong tuần---------------->
    <section class="new-week">
        <div class="product">
            <p>Hot sale</p>
        </div>

        <div class="row">
            <?php 
                foreach ($sphotsale as $sph) {
                    $link = "index.php?act=productDetail&id=".$sph['id'];
                    $name = $sph['name'];
                    $luotmua = $sph['luotmua'];
                    $idtacgia = $sp['idtacgia'];
                    $tacgia = shownametg($idtacgia);
                    $tacgia = $tacgia['name'];
                    $img = $pathimg.$sph['img'];
                    if (is_file($img)) $img = '<img src="'.$img.'">';
                    else $img = '<img src="'.$pathimg.'404.jpg">'; 
                    echo 
                    '<div class="card-book">
                        <div>
                            <a href="">'.$img.'</a>
                            <div class="txt">
                                <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                <p class="author"><a href="">'.$tacgia.'</a></p>
                                <p class="view">Đã bán '.$luotmua.'</p>
                            </div>
                        </div>
                    </div>';
                }
            ?>

        </div>
    </section>
    <!-------------------mới nhất trong tuần----------------->

    <!-----------------sách mới nhất---------------->
    <section class="new-week">
        <div class="product">
            <p>đọc nhiều nhất</p>
        </div>

        <div class="row">
            <?php 
                foreach ($spdocnhieu as $sp) {
                    $link = "index.php?act=productDetail&id=".$sp['id'];
                    $name = $sp['name'];
                    $view = $sp['view'];
                    $idtacgia = $sp['idtacgia'];
                    $tacgia = shownametg($idtacgia);
                    $tacgia = $tacgia['name'];
                    $img = $pathimg.$sp['img'];
                    if (is_file($img)) $img = '<img src="'.$img.'">';
                    else $img = '<img src="'.$pathimg.'404.jpg">'; 
                    echo 
                    '<div class="card-book">
                        <div>
                            <a href="">'.$img.'</a>
                            <div class="txt">
                                <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                <p class="author"><a href="">'.$tacgia.'</a></p>
                                <p class="view">'.$view.' lượt xem</p>
                            </div>
                        </div>
                    </div>';
                }
            ?>
            
        </div>
    </section>
    <!-------------------sách mới nhất----------------->

    <!-----------------bán chạy nhất---------------->
    <section class="new-week">
        <div class="product">
            <p>sách giá rẻ</p>
        </div>

        <div class="row">
            <?php 
                foreach ($spre as $sp) {
                    $link = "index.php?act=productDetail&id=".$sp['id'];
                    $name = $sp['name'];
                    $price = $sp['price'];
                    $idtacgia = $sp['idtacgia'];
                    $tacgia = shownametg($idtacgia);
                    $tacgia = $tacgia['name'];
                    $img = $pathimg.$sp['img'];
                        if (is_file($img)) $img = '<img src="'.$img.'">';
                        else $img = '<img src="'.$pathimg.'404.jpg">'; 
                    echo 
                    '<div class="card-book">
                        <div>
                            '.$img.'
                            <div class="txt">
                                <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                <p class="author"><a href="">'.$tacgia.'</a></p>
                                <p class="view">Giá: $'.$price.'</p>
                            </div>
                        </div>
                    </div>';
                }
            ?>
            
        </div>
    </section>