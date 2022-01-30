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
                <form action="#" id="login" method="POST" id="form">
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

        xml = new XMLHttpRequest();
        xml.open("POST", "https://group9agilewebapp.azurewebsites.net/login");
        xml.onreadystatechange = function(){
            if(xml.readyState == XMLHttpRequest.DONE){
                console.log(xml.responseTest);
            }
        };

        var form = document.getElementById("form");
        form.onsubmit = (e) => {
            e.preventDefault();

            var parameters = {
                "username": usernameInput.value,
                "password": passwordInput.value
            };

            console.log(parameters);

            xml.send(JSON.stringify(parameters));
            console.log("Request Sent");
        };

    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>