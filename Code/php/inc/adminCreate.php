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
    <h1>Create Admin Account</h1>
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
        const form = document.getElementById("login");
        button = document.getElementById("submitButton");
        usernameInput = document.getElementById("username");
        passwordInput = document.getElementById("password");

        button.addEventListener("animationend", function(){
            button.classList.remove("animate__headShake");
            button.classList.remove("btn-danger");
        });

        function accept(){
            console.log("Accept function");
        }

        function reject(){
            console.log("Reject function");
            button.classList.add("animate__headShake");
            button.classList.add("btn-danger");
        }
    </script>
    <?php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include("dbconnect.php");

        $usernameSet = isset($_POST['username']) && !empty($_POST['username']);
        $passwordSet = isset($_POST['password']) && !empty($_POST['password']);

        if($usernameSet && $passwordSet){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT `password`, `level` FROM `user` WHERE";
            $sql = sprintf("%s `username`='%s';", $sql, $username);

            $result = $db->query($sql);
            $row = $result->fetch_array();
            
            console($sql);
            console($row['password']);

            if($password == $row['password']){
                if($row['level'] == 0){
                    include(dirname('__FILE__') . "/api/allEvents");
                }else{
                    //other page
                }
                
            }else{
                console("Rejected");
                echo '<script>reject();</script>';
            }            
        }        

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>