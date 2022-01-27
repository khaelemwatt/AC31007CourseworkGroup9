<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Hello, world!</title>
  </head>
  <?php session_start() ?>
  <body>
    <h1>Admin Login</h1>
    <div class="page-header header container">
        <div class="d-flex justify-content-center">
            <div class="mb-3">
                <form action="#" id="login" method="POST">
                    <div class="form-group">
                        <input type="username" class="form-text" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-text" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary animate__animated" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        //Get references to html elements
        const form = document.getElementById("login");
        button = document.getElementById("submitButton");
        usernameInput = document.getElementById("username");
        passwordInput = document.getElementById("password");

        //Will activate when the animation ends. This is to set it back to default
        button.addEventListener("animationend", function(){
            button.classList.remove("animate__headShake");
            button.classList.remove("btn-danger");
        });

        //If rejected, animate the button
        function reject(){
            console.log("Reject function");
            button.classList.add("animate__headShake");
            button.classList.add("btn-danger");
        }
    </script>
    <?php 
        //Set error display stuff
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //Include databse connection
        include("dbconnect.php");

        //Checks if the post values are set (i.e. have been posted) and arent empty
        $usernameSet = isset($_POST['username']) && !empty($_POST['username']);
        $passwordSet = isset($_POST['password']) && !empty($_POST['password']);

        //if both username and password are set and not empty we know the form has been submitted
        if($usernameSet && $passwordSet){

            //Store the values
            $username = $_POST['username'];
            $password = $_POST['password'];

            //Form the sql query for selecting the password for the username provided
            $sql = "SELECT `password`, `level` FROM `user` WHERE";
            $sql = sprintf("%s `username`='%s';", $sql, $username);

            //
            //NEED TO COVER CASE WHERE USERNAME TYPED IS NOT IN THE DATABASE
            //

            //Send the database our query and store the result
            $result = $db->query($sql);
            $row = $result->fetch_array();
            
            //Debug statements
            console($sql);
            console($row['password']);

            //
            //NEED TO DO OUR OWN HASHING (SHA256) FIRST BEFORE CHECKING PASSWORDS
            //
            $userPassword = hash("sha256", $row['password']);
            console($userPassword);

            //Check if the password provided matches the one in the database
            if($password == $row['password']){
                //If it matches we need to check what user we are dealing with
                if($row['level'] == 0){
                    //If user has level 0 they are super admin and can create other admins
                    //Redirect this user to the page to create admins
                    echo '<script> window.location.href = "/createAdmin" </script>';
                }else{
                    //If user has anything else (level 1) they are normal admin who can
                    //add/edit/remove events. Redirect them to some page
                    echo '<script> window.location.href = "/api/allEvents" </script>';
                }
                
            }else{
                //If password doesnt match, reject this login attempt
                console("Rejected");
                echo '<script>reject();</script>';
            }            
        }        

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>