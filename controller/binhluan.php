<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bình luận</h2>   
    <div class="content">
        <?php
            session_start();
            if(isset($_SESSION['sid'])&&($_SESSION['sid'])>0) {
        ?>
        <form action="binhluan.php" method="POST">
            <input type="text" name="name" id="">
            <input type="text" name="noidung" id="">
            <input type="submit" value="Bình luận" name="binhluan">
        </form>
        <div class="cmt_box">
            <?php 
                foreach ($binhluan as $bl) {
                    $nameuser = $bl['name'];
                    $noidung = $noidung['noidung'];
                    echo $nameuser.'---'.$noidung;
                }
            ?>
        </div>
        <?php
            }else{
                echo 'Vui lòng đăng nhập để bình luận <a href="index.php?act=user">đăng nhập</a>';
            }
        ?>
    </div> 
</body>
</html>