<?php 
    function checkpass($user, $pass) {
        $sql = "SELECT * from users where user='".$user."' and pass='".$pass."'";
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
?>