<?php 
    function checkpass($user, $pass) {
        $sql = "SELECT * from users where user='".$user."' and pass='".$pass."'";
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function checkuser($user) {
        $sql = "SELECT * from users where user='".$user."'";
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function addUser($user, $pass, $mail) {
        $conn = connect();
        $sql = "INSERT INTO users (user, pass, mail)
        VALUES ('$user', '$pass', '$mail')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>