<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="logstyle.css">
    <title>Login</title>
</head>
<body>
    <?php require_once "log_process.php"?>
    <div class="bg-image"></div>
    <div class="container bg-text">
        <?php if(isset($_SESSION["message"])): ?>
        <div class="alert alert-<?=$_SESSION["msg_type"]?>">
            <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            ?>
        </div>
        <?php endif; ?>
        <div class="justify-content-center text-center">
            <label style="font-size:50px; color:white;">Admin Login</label>
        </div>
        <div class="row justify-content-center">
            <form action="log_process.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>