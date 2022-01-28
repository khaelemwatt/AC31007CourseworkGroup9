<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>

        <u><b>Please Input the name of the event</b></u>
        <br>
        <br>
        <form class="form-inline" method="POST">
            <input class="form-control mr-sm-2" type="search" name="eventName" placeholder="" aria-label="Search">
            <br>
            <br>
            <u><b>Please Input some information about the event</b></u>
            <br>
            <br>
            <input class="form-control mr-sm-2" type="search" name="eventInfo" placeholder="" aria-label="Search">
            <br>
            <br>
                <u><b>Please Input the date of the event </b></u>
                <br>
                <br>
                <input class="form-control mr-sm-2" type="search" name="eventDate" placeholder="" aria-label="Search">
                <br>
                <br>
                <u><b>Please Input the Location of the event</b></u>
                <br>
                <br>
                <input class="form-control mr-sm-2" type="search" name="eventLocation" placeholder="" aria-label="Search">
                <br>
                <br>
                <u><b>Please select which goal this event relates too</b></u>
                <br>
                <br>
                <select name="UNGoalID">
                    <option value="" disabled>Please select...</option>
                    <option value="1">No Poverty</option>
                    <option value="2">Zero Hunger</option>
                    <option value="3">Good Health and Wellbeing</option>
                    <option value="4">Quality Education</option>
                    <option value="5">Gender Equality</option>
                    <option value="6">Clean Water and Sanitation</option>
                    <option value="7">Affordable and Clean Energy</option>
                    <option value="8">Decent Work and Economic Growth</option>
                    <option value="9">Industry, Innovation and Infrastructure</option>
                    <option value="10">Reduced Inequality</option>
                    <option value="11">Sustainable Cities and Communities</option>
                    <option value="12">Responsible Consumption and Production</option>
                    <option value="13">Climate Action</option>
                    <option value="14">Life Below Water</option>
                    <option value="15">Life on Land</option>
                    <option value="16">Peace and Justice, Strong Insitutions</option>
                    <option value="17">Partnerships to Achieve Goal</option>
                </select>
                <button class="btn btn-secondary" type="submit" name="submit">Check</button>
        </form>

        
        <?php
            
        $nameSet = isset($_POST['eventName']) && !empty($_POST['eventName']);
        $infoSet = isset($_POST['eventInfo']) && !empty($_POST['eventInfo']);
        $DateSet = isset($_POST['eventDate']) && !empty($_POST['eventDate']);
        $LocationSet = isset($_POST['eventLocation']) && !empty($_POST['eventLoaction']);
        //$goalSet = isset($_GET['UNGoalID']) && !empty($_GET['UNGoalID']);
        echo "one";
        echo "two";

        if($_POST['eventLocation'] == "test")
        {
         // Include the database connection
            include "dbconnect.php";
            // Check that a form has been submitted

            $inputEventName = $_POST['eventName'];
            $inputEventInfo = $_POST['eventInfo'];
            $inputEventDate = $_POST['eventDate'];
            $inputEventLocation = $_POST['eventLocation'];
            echo "three";
            $inputGoal = $_POST['UNGoalID'];
            
            $sql = "INSERT INTO `event` (Name, Info, Date, Location, goalID) VALUES ('";
            $sql = sprintf("'%s', '%s', %s, '%s', %s");, $sql, $inputEventName, $inputEventInfo, $inputEventDate, $inputEvenLocation, $inputGoal);
            console($sql);
            echo "four";
            $createStmt = $mysql->prepare($sql);
            echo "five";
            console($createStmt);
            $createStmt->execute();
            $result = $createStmt->fetchAll();
            if($result == false){
                echo "Event creation failed please try again";
                echo $inputEventName;
                echo $inputEventInfo;
                echo $inputEventDate;
                echo $inputEventLocation;
                echo $inputGoal;
            }else{
                $readStmt = $mysql->prepare("SELECT * 'event'");
                $readStmt->execute();
                echo $inputEventName;
                echo $inputEventInfo;
                echo $inputEventDate;
                echo $inputEventLocation;
                echo $inputGoal;
            }
            foreach($result as $row) {
                echo "<td>".$row['UN Sustainable Development Goal Event']."</td>";
                echo "<td>".$row['About the Event']."</td>";
                echo "<td>".$row['Date of the Event']."</td>";
                echo "<td>".$row['Location of the Event']."</td></tr>";
            }
        }
    ?>
    

    </main>

 </body>

  


</html>
