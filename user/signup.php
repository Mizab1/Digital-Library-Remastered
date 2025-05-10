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
<?php

if (isset($_POST['user_email'])) {

    $email = $_POST['user_email'];
    $query = "select * from user where (user_email='$email');";
    $result = mysqli_query($connectdb, $query);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        if ($email == isset($row['user_email'])) {

            echo "Email Id already taken! Please try another email address.";
        }
    } else {
        if (isset($_POST['signup'])) {

            $name = $_POST['user_name'];
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];

            $query = "INSERT INTO user(user_name,user_email,user_password) VALUES ('$name','$email','$password')";
            $query2 = "SELECT * FROM user";

            $result = mysqli_query($connectdb, $query);
            $result = mysqli_query($connectdb, $query2);

            $data_count = mysqli_num_rows($result);

            if ($data_count > 0) {
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_password'] = $password;
                header("location:./dashboard.php");
            } else {
                echo "Please Insert Data";
            }
        }
    }
}

?>