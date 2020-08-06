<?php
    include("../model/connect.php");
    include("../global.php");
    include_once("../model/danhmuc.php");
    include_once("../model/sanpham.php");
    include_once("../model/tacgia.php");

    //Load data cho web o day
    $sanphamhot = showsphot();
    $sphotsale = sphotsale();
    $spdocnhieu = spdocnhieu();
    $spre = spre();
    $showtg = showtg();

    include_once("../view/admin/header.php");
    
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'qlsp':
                # code...
                //Thêm sp
                if (isset($_POST['submit'])&&($_POST['submit'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $danhmuc = $_POST['dm'];
                    $tacgia = $_POST['tg'];
                    $img = $_FILES['img']['name'];
                    $target_file = $pathimg.basename($img);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    themsp($name, $price, $img, $danhmuc, $tacgia);
                }

                //Sửa sp
                if (isset($_GET['editid'])&&($_GET['editid'])>0) {
                    $spct = showDetail($_GET['editid']);
                }
                
                if (isset($_POST['update'])&&($_POST['update'])) {
                    $name = $_POST['name'];
                    $id = $_POST['idsp'];
                    $price = $_POST['price'];
                    $danhmuc = $_POST['dm'];
                    $tacgia = $_POST['tg'];
                    $img = $_FILES['img']['name'];
                    $target_file = $pathimg.basename($img);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
                    }
                    suasp($id, $name, $price, $img, $danhmuc, $tacgia);
                }

                //Xóa sp
                if (isset($_GET['delid'])&&($_GET['delid'])>0) {
                    xoasp($_GET['delid']);
                }

                $danhmuc = showdm();
                $sanpham = showsp(0);
                include("../view/admin/qlsp.php");
                break;

            case 'qldm':
                //Thêm dm
                if (isset($_POST['submit'])&&($_POST['submit'])) {
                    $name = $_POST['name'];
                    themdm($name);
                }

                //Xóa dm
                if (isset($_GET['iddel'])&&($_GET['iddel'])>0) {
                    xoadm($_GET['iddel']);
                }

                //Sua dm
                if (isset($_GET['idedit'])&&($_GET['idedit'])>0) {
                    $chitietdm = shownamedm($_GET['idedit']);
                }
                if (isset($_POST['edit'])&&($_POST['edit'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    suadm($id, $name);
                }

                $danhmuc = showdm();
                include("../view/admin/qldm.php");
                break;

            case 'qltg':
                //Thêm dm
                if (isset($_POST['submit'])&&($_POST['submit'])) {
                    $name = $_POST['name'];
                    themtg($name);
                }

                //Xóa dm
                if (isset($_GET['iddel'])&&($_GET['iddel'])>0) {
                    xoatg($_GET['iddel']);
                }

                //Sửa dm
                if(isset($_GET['idedit'])&&($_GET['idedit'])>0)
                    $chitiettg = shownametg($_GET['idedit']);
                if(isset($_POST['edit'])&&($_POST['edit'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    suatg($id, $name);
                }

                $tacgia = showtg();
                include("../view/admin/qltg.php");
                break;

            default:
                include("../view/admin/home.php");
                break;
        }
    }else{
        include_once("../view/admin/home.php");
    };
?>