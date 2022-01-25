<?php
	ob_start();
	session_start();
?>
<html>
<body>

<h2>Event details:</h2>

<?php
    //connect to database
    include "db.php";

	$query = "SELECT * FROM Events WHERE eventID='.$_SESSION['eventID'].'";
	$stmt = $mysql->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach( $result as $row) {
		echo $row['testMaybeIDK'];
		if (isset($_SESSION['email'])){
			echo '<form action="View_Event.php" method="post"><input type="submit" name="eventID" value="Edit this event"></form>';
		}
	}

    if (isset($_POST['eventID'])) {
		$_SESSION['eventID'] = $_POST['eventID'];
		header("Location: ");
	}

	$mysql = null;
	
?>
</body>
</html>
