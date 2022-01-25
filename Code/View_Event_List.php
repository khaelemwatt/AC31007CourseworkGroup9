<?php
	ob_start();
	session_start();
?>
<html>
<body>

<h2>View Upcoming Events</h2>

<?php
    //connect to database
    include "db.php";

	$query = "SELECT * FROM Events ORDER BY Datetime";
	$stmt = $mysql->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach( $result as $row) {
		echo $row['testMaybeIDK'];
        echo '<form action="View_Event_List.php" method="post"><input type="submit" name="eventID" value="View this event"></form>';
		echo '<hr>';
	}

    if (isset($_POST['eventID'])) {
		$_SESSION['eventID'] = $_POST['eventID'];
		header("Location: ");
	}

	$mysql = null;
	
?>
</body>
</html>
