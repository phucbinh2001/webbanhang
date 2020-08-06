<?php
    //ADMIN: Them tacgia
    function themtg($name) {
        $conn = connect();
        $sql = "INSERT INTO tacgia (name)
        VALUES ('$name')";
        $conn->exec($sql);
    }

    //ADMIN: XOA
    function xoatg($id) {
        $sql = "DELETE FROM tacgia WHERE id=".$id;
        $conn = connect();
        $conn->exec($sql);
    }

    //ADMIN: SUA
    function suatg($id, $name) {
        $sql = "UPDATE tacgia SET name='$name'WHERE id=".$id;
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function shownametg($id) {
        $conn = connect();
        $sql = "SELECT * from tacgia where id=".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function showtg() {
        $conn = connect();
        $sql = "SELECT * from tacgia";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
?>