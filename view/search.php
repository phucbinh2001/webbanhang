<div class="content3">
    <div class="wrap-header">
        <div class="card-title">
            <?php
                if (isset($_GET['idcata'])&&($_GET)>0) {
                    $dmname = shownamedm($_GET['idcata']);
                    $dmname = $dmname['name'];
                }else
                    $dmname = "SẢN PHẨM";
            ?>
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
    <div class="row-book">
    <?php
        if (count($timkiem)==0) {
            echo "Chưa có sản phẩm này";
        }else{
            foreach ($timkiem as $sp) {
                $link = "index.php?act=productDetail&id=".$sp['id'];
                $name = $sp['name'];
                $vote = $sp['vote'];
                $view = $sp['view'];
                $tacgia = $sp['idtacgia'];
                $img = $pathimg.$sp['img'];
                if (is_file($img)) $img = '<img src="'.$img.'">';
                else $img = '<img src="'.$pathimg.'404.jpg">';   
                echo '
                <div class="book">
                    '.$img.'
                    <p class="name">'.$name.'</p>
                    <p class="view">'.$view.' lượt xem</p>
                    <button><a href="'.$link.'">Đọc Sách</a></button>
                </div>';
            }
        }
    ?>
        </div>
    </div>
</div>
