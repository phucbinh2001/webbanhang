<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waka</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../view/css/style.css">
</head>

<body>
    <header>
        <div class="top-menu" id="myheader">
        <a href="index.php?act=home">   
            <div class="logo">
                <img src="../view/img/logo.png" alt="">
            </div>
        </a>
            <form>
                <input class="search" type="text" placeholder="Nhập tên sách, tuyên tập, tác giả...">
                <button class="btn">tìm kiếm</button>
            </form>
            <div class="login">
                <?php
                if (isset($_SESSION['sid'])&&($_SESSION['sid'])>0) {
                    echo '<button><a href="index.php?act=user&logout=1">Đăng xuất</a></button>';
                }else
                    echo '<button><a href="index.php?act=user">Đăng nhập</a></button>';
                ?>
            </div>
        </div>
        <div class="bot-menu">
            <li><a href="index.php?act=home">trang chủ</a></li>
            <li><a href="index.php?act=product">sản phẩm</a></li>
            <li><a href="index.php?act=about">giới thiệu</a></li>
            <li><a href="index.php?act=contact">liên hệ</a></li>
            <li><a href="index.php?act=news">tin tức</a></li>
        </div>
    </header>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myheader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>