<?php
    session_start();

    include("../model/connect.php");
    include("../global.php");
    include_once("../model/danhmuc.php");
    include_once("../model/sanpham.php");
    include_once("../model/tacgia.php");
    include_once("../model/binhluan.php");

    // if (isset($_SESSION['sid'])&&($_SESSION['sid'])>0) {
        
    //Load data cho web o day
    $danhmuc = showdm();
    $sanpham = showsp(0);
    $sanphamhot = showsphot();
    $sphotsale = sphotsale();
    $spdocnhieu = spdocnhieu();
    $spre = spre();

    include_once("../view/header.php");
    
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'product':
                if(isset($_GET['idcata'])&&($_GET['idcata'])>0)
                    $idcat = $_GET['idcata'];
                else 
                    $idcat = 0;
                    $sanpham = showsp($idcat);
                include("../view/product.php");
                break;
            
            case 'about':
                include("../view/about.php");
                break;

            case 'contact':
                include("../view/contact.php");
                break;

            case 'news':
                include("../view/news.php");
                break;
        
            case 'productDetail':
                if (isset($_GET['id'])&&$_GET['id']>0) {
                    $spct = showDetail($_GET['id']); 
                    $binhluan = showbl();
                    include("../view/productDetail.php");
                    include("binhluan.php");
                }

                if (isset($_POST['binhluan'])&&($_POST['binhluan'])) {
                    $name = $_POST['name'];
                    $noidung = $_POST['noidung'];
                    thembl($name, $noidung);
                }

                break;

            case 'user':
                if (isset($_GET['logout'])&&($_GET['logout']==1)) {
                    unset($_SESSION['sid']);
                    unset($_SESSION['suser']);
                    header('location: index.php');
                }else
                    header('location: ../view/login/login.php');
                ;
            break;

            default:
                include("../view/home.php");
                break;
        }
    }else{
        include_once("../view/home.php");
    };
    
    
    include_once("../view/footer.php");
//  }else{
//      header('location: ../view/login/login.php');
//  }
?>