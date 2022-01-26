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
    <h1>Hello, world!</h1>
    <div class="page-header header container">
        <div class="d-flex justify-content-center">
            <div class="mb-3">
                <form action="#" id="login">
                    <div class="form-group">
                        <input type="username" class="form-text" id="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-text" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php 
        // error_reporting(E_ALL);
        // include("dbconnect.php");
        // function checkDetails($db){
        //     $sql = "SELECT * USER WHERE ";
        //     $sql = sprintf("%s username = '%s'", $sql, $_COOKIE['username']);
                        
        //     $stmt = $db->prepare($sql);
        //     $stmt->execute();
        //     $result = $stmt->fetchAll();
        //     $JSONresult = json_encode($result);

        //     echo $JSONresult;
        // }

    ?>

    <script>
        const form = document.getElementById("login");
        button = document.getElementById("submitButton");
        usernameInput = document.getElementById("username");
        passwordInput = document.getElementById("password");

        // button.addEventListener("animationend", function(){
        //     button.classList.remove("animate__headShake");
        //     button.classList.remove("btn-danger");
        // });

        // function reject(){
        //     button.classList.add("animate__headShake");
        //     button.classList.add("btn-danger");
        // }

        // form.onsubmit = (e)=>{
        //     console.log("Check");
        //     document.cookie = "username=" + usernameInput.value;
        //     console.log(usernameInput.value);
        //     var user = <?php echo checkDetails($db);?>;
        //     console.log(user[0][0], user[0][1], user[0][2]);
        // }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>