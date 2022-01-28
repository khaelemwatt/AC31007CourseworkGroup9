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
include "dbconnect.php";
// Check that a form has been submitted
if( isset($_POST['submit']) ){
$inputGoalTitle = $_POST['goalTitle'];
$inputGoalAbout = $_POST['goalAbout'];
$inputGoalToDos = $_POST['goalToDos'];
$inputGoalsInDundee = $_POST['goalsInDundee'];
$inputUsefulInformation = $_POST['usefulInformation'];
$inputWebsite = $_POST['website'];
//Need to update column names for real table
$createStmt = $mysql->prepare("INSERT INTO un_goals_table (UN_Sustainable_Development_Goal, About_The_Goal, Things_To_Do, Examples_In_Dundee, Useful_Information, Website) VALUES ($inputGoalTitle, $inputGoalAbout, $inputGoalToDos, $inputGoalsInDundee, $inputUsefulInformation, $inputWebsite");
$createStmt->execute();
$result = $stmt->fetchAll();

if($result == false){
   echo "Event creation failed please try again";
}else{
   $readStmt = $mysql->prepare("SELECT * FROM un_goals_table");
   $readStmt->execute();
}

} else {
// Error handling

$userinput = 1;
$result = [];

}


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