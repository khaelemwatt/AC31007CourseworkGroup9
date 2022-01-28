<?php
        include("dbconnect.php");

        $sql = "SELECT * FROM event";

        $rows = array();
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }


        echo json_encode($rows);

?>

