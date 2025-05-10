<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/login_logout/logstyle.css">
    <title>User Login Page</title>
</head>
<body>
    <div class="bg-image"></div>
    <?php
    include_once "../db.php";
    session_start();
    if (isset($_SESSION['user_email']) && isset($_SESSION['user_password'])) {

        $email = $_SESSION['user_email'];
        $password = $_SESSION['user_password'];

        $query = "SELECT * FROM user WHERE user_email = '$email' and user_password = '$password'";

        $result = mysqli_query($connectdb, $query);

        $data_count = mysqli_num_rows($result);

        if ($data_count != 0) {
            header("location:./dashboard.php");
        }
        echo "welcome " . $_SESSION['user_email'];
    }
    ?>
    <div class="container bg-text">
        <div class="justify-content-center text-center">
            <label style="font-size:40px; color:rgb(154, 228, 183)">User Log-in</label>
        </div>
        <div class="row justify-content-center">
            <form action="login.php" method="POST">
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
                <?php
                if (isset($_POST['login'])) {

                    $email = $_POST['user_email'];
                    $password = $_POST['user_password'];

                    $query = "SELECT * FROM user WHERE user_email = '$email' and user_password = '$password'";

                    $result = mysqli_query($connectdb, $query);

                    $data_count = mysqli_num_rows($result);

                    if ($data_count > 0) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_password'] = $password;
                        header("location:./dashboard.php");
                    } else {
                        echo "Invalid Details";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>