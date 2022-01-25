<table>
<thead>
<td>UN_Sustainable_Development_Goal</td>
<td>About_The_Goal</td>
<td>Things_To_Do</td>
<td>Examples_In_Dundee</td>
<td>Useful_Information</td>
<td>Website</td>
</thead>
<tbody>
<?php

// Include the database connection
include "db.php";
// Check that a form has been submitted
if( isset($_POST['submit']) ){
$stmt = $mysql->prepare("INSERT INTO un_goals_table (UN_Sustainable_Development_Goal, About_The_Goal, Things_To_Do, Examples_In_Dundee, Useful_Information, Website) VALUES ("DummyGoal", "This goal is a dummy", "you can do dummy things", "Dummy location in Dundee", "Dummy Information", "Dummy Website Link");
//$stmt->bindParam(":UserInput", $userinput);
//$userinput = $_POST['query'];
$stmt->execute();
$result = $stmt->fetchAll();
} else {
// Error handling

$userinput = 1;
$result = [];

}

//echo $userinput;

foreach($result as $row) {
echo "<td>".$row['UN Sustainable Development Goal']."</td>";
 echo "<td>".$row['About The Goal']."</td>";
 echo "<td>".$row['Things To Do']."</td>";
 echo "<td>".$row['Examples In Dundee']."</td>";
 echo "<td>".$row['Useful Information']."</td>";
 echo "<td>".$row['Website']."</td></tr>";
}
?>
</tbody>
</table>