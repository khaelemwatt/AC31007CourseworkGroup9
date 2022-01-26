<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE";
    $sql = sprintf("%s username = '".$username.'"');

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $JSONresult = json_encode($result);

    echo '<script> console.log('.$result.')';

    // if($password == $result)

?>