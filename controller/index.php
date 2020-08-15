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
                if(isset($_GET['idcata'])&&($_GET['idcata'])>0) {
                    $idcat = $_GET['idcata'];
                    // else
                    // $idcat = 0;
                    $sanpham = showsp($idcat);}
                // }else if (isset($_GET['keyword'])&&($_GET['keyword'])>0) {
                //     $keyw = $_GET['key'];
                //     $sanpham = search($keyw);
                // }
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
                    include("../view/productDetail.php");
                    // include("binhluan.php");
                }

                break;

            case 'user':
                if (isset($_GET['logout'])&&($_GET['logout']==1)) {
                    unset($_SESSION['sid']);
                    unset($_SESSION['suser']);
                    header('location: ../view/login/login.php');
                
                }else
                    header('location: ../view/login/login.php');
                ;
            break;

            case 'search':
                if (isset($_POST['search'])&&($_POST['search'])) {
                    
                    if(isset($_POST['key'])) 
                        $key=$_POST['key'];
                        $timkiem=search($key);
                    include("../view/search.php");
                }
            break;

            case 'cart':
                if (isset($_POST['mua'])&&($_POST['mua'])) {
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    } else {
                        $vitri = -1;
                        $id = $_POST['idsp'];   
                        for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
                            if($id==$_SESSION['cart'][$i][3]) 
                                $vitri = $i;
                                $name = $_POST['namesp'];
                                $soluong = 1;
                                $price = $_POST['pricesp'];
                                $img = $_POST['imgsp'];              
                                $item = [$name, $price, $img, $id, $soluong];                           
                        }
                        if($vitri > -1) {
                            $_SESSION['cart'][$vitri][4] += $soluong;
                        }else{
                            $_SESSION['cart'][] = $item;
                        }
                    }
                }
                include("../view/cart.php");
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