<?php
    //ADMIN: Them danh muc
    function themdm($name) {
        $conn = connect();
        $sql = "INSERT INTO danhmuc (name) VALUES ('$name')";
        $conn->exec($sql);
    }

    //ADMIN: XOA
    function xoadm($id) {
        $sql = "DELETE FROM danhmuc WHERE id=".$id;
        $conn = connect();
        $conn->exec($sql);
    }

    //ADMIN: SUA
    function suadm($id, $name) {
        $sql = "UPDATE danhmuc SET name='$name'WHERE id=".$id;
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function showdm() {
        $conn = connect();
        $sql = "SELECT * from danhmuc order by sort desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function shownamedm($id) {
        $conn = connect();
        $sql = "SELECT * from danhmuc where id=".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
?>