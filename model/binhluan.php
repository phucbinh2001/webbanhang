<?php
    function thembl($name, $content){
        $conn = connect();
        $sql = "INSERT INTO binhluan (name, noidung)
        VALUES ('$name', '$content')";
        $conn->exec($sql);
    }

    function showbl() {
        $conn = connect();
        $sql = "SELECT * from binhluan order by id desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
?>