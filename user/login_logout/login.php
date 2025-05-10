<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../admin/login_logout/logstyle.css">

    <title>User Login Page</title>
</head>
<body>
    <div class="bg-image"></div>
    <div class="container bg-text">
        <div class="justify-content-center text-center">
            <label style="font-size:40px; color:rgb(154, 228, 183)">User Log-in</label>
        </div>
        <div class="row justify-content-center">
            <form action="login_process.php" method="POST" id="login_form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="user_email" class="form-control" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="user_password" class="form-control" placeholder="Enter Your Password" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" name="login">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>