<?php
    include("dbconnect.php");

    echo '<script> console.log("Page Loaded")</script>';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE";
    $sql = sprintf("%s username = '".$username.'"');

    $stmt = $db->prepare($sql);
    $result = $db->query($stmt);
    $JSONresult = json_encode($result);

    console("Hello this is a test");
    console($JSONresult);

    echo '<script> console.log("Check")</script>';
    echo '<script> console.log('.$JSONresult.')</script>';

    // if($password == $result)

?>