<?php
    //ADMIN edit
    function suasp($id, $name, $price, $img, $danhmuc, $tacgia) {
        if(!$img=="")
            $sql = "UPDATE sanpham SET name='$name', price='$price', img='$img', 
            iddm='$danhmuc', idtacgia='$tacgia' WHERE id=".$id;
        else
            $sql = "UPDATE sanpham SET name='$name', price='$price', 
            iddm='$danhmuc', idtacgia='$tacgia' WHERE id=".$id;
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    //ADMIN add
    function themsp($name, $price, $img, $danhmuc, $tacgia){
        $conn = connect();
        $sql = "INSERT INTO sanpham (name, price, img, iddm, idtacgia)
        VALUES ('$name', '$price', '$img', '$danhmuc', '$tacgia')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    //ADMIN delete
    function xoasp($id){
        $sql = "DELETE FROM sanpham WHERE id=".$id;
        $conn = connect();
        $conn->exec($sql);

    }

    //show chi tiet
    function showDetail($id) {
        $conn = connect();
        $sql = "SELECT * from sanpham ";
        if($id>0) $sql.="WHERE id =".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    //show sp
    function showsp($idcat) {
        $conn = connect();
        $sql = "SELECT * from sanpham where 1";
        if ($idcat > 0) {
            $sql .= " and iddm=".$idcat;
            $sql .= " order by id desc";
        }else
            $sql .= " order by id desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    //San pham hot 
    function showsphot() {
        $conn = connect();
        $sql = "SELECT * from sanpham where hot=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    //San pham hot sale
    function sphotsale() {
        $conn = connect();
        $sql = "SELECT * from sanpham order by luotmua desc limit 6";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    //Doc nhieu
    function spdocnhieu(){
        $conn = connect();
        $sql = "SELECT * from sanpham order by view desc limit 6";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    //gia re
    function spre(){
        $conn = connect();
        $sql = "SELECT * from sanpham order by price limit 6";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
?>