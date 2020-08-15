
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        font-family: sans-serif;
        box-sizing: border-box;
    }

    .cmt_box {
        background-color:blueviolet;
    }

    .cmt {
        float: left;
        width: 100%;
    }

    .cmt img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
        margin-top: 10px;
    }

    .cmt .name {
        font-weight: 600;
    }

    #err {
        width: 100%;
        color: #d63031;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 10px;
    }


    input {
        width: 100%;

        height: 40px;
    }

    textarea {
        width: 100%;
        margin-top: 10px;
    }

    .btn {
        background-color: #1ba085;
        border: 2px solid #1ba085;
        color: #fff;
        width: 20%;
    }
</style>
<body>
    <h2>Bình luận</h2>   
    <div class="content">
        <?php
        session_start();
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
                $binhluan = showbl();
                foreach ($binhluan as $bl) {
                    $nameuser = $bl['name'];
                    $noidung = $bl['noidung'];
                    echo '<div class="cmt">
                        <img src="../view/img/avatar.gif" alt="">
                        <p class="name">'.$nameuser.'</p>
                        <p class="noidung">'.$noidung.'</p>
                </div>';
                }
            ?>
        </div>
        <?php
            }else{
                echo 'Vui lòng đăng nhập để bình luận <a href="index.php?act=user" target="_parent">đăng nhập</a>';
            }
        ?>
    </div> 
</body>
</html>