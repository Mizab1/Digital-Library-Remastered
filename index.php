<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sacred Knowledge</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <h3 style="color: white; font-size: 30px;">Sacred Knowledge</h3>
                <div class="collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="index.php" method="POST">
                                <input class="admin" type="submit" value="Administrator" name="admin">
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="hero">
        <div class="hero-head">
            <h1 class="primary-head">Knowledge at your tip!</h1>
            <p class="lead">Libraries store the energy that fuels the imagination. They open up windows to the
                world and inspire us to explore and achieve, and contribute to improving our quality of life.
            </p>
            <div class="cta-btn">
                <form class="btn-flex" action="index.php" method="POST">
                    <input class="signin-btn" type="submit" value="Sign-up" name="sign_up">
                    <input class="login-btn" type="submit" value="Log-in" name="sign_in">
                </form>
            </div>
        </div>
        <div class="primary-image">
            <img src="./asset/img/book.jpg" class="p-img" alt="library" width="600" height="400">
        </div>
    </div>
</body>

</html>
<?php
include_once "./db.php";
if (isset($_POST['admin'])) {
    $signin = $_POST['admin'];
    header("location:./admin/login_logout/login.php");
}
if (isset($_POST['sign_up'])) {
    $signup = $_POST['sign_up'];
    header("location:./user/signup.php");
}

if (isset($_POST['sign_in'])) {
    $signin = $_POST['sign_in'];
    header("location:./user/login.php");
}
?>