<?php
    function thembl($name, $content, $idsp){
        $conn = connect();
        $sql = "INSERT INTO binhluan (name, noidung, idsp)
        VALUES ('$name', '$content', '$idsp')";
        $conn->exec($sql);
    }

    function showbl($idsp) {
        $conn = connect();
        $sql = "SELECT * from binhluan where idsp = ".$idsp;
        $sql .= " order by id desc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
?>