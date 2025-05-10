<?php
    include_once "../db.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Sign up Page</title>
        <!-- <link rel="stylesheet" href="../style.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../admin/login_logout/logstyle.css">
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" defer></script>
        <script src="validate.js" defer></script>
    </head>
    <body>
        <div class="bg-image"></div>
        <div class="container bg-text">
            <div class="justify-content-center text-center">
                <label style="font-size:40px; color:rgb(154, 228, 183)">User Sign-up</label>
            </div>
            <div class="row justify-content-center">
                <form action="signup.php" method="post" id="signup_form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="user_email" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="signup">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>