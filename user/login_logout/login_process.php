<?php
    include_once "../../db.php";
    session_start();

    // Run this when the user presses login button
    if (isset($_POST['login'])) {
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];

        $query = "SELECT * FROM user WHERE user_email = '$email' and user_password = '$password'";

        $result = mysqli_query($connectdb, $query);

        $data_count = mysqli_num_rows($result);

        if ($data_count > 0) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_password'] = $password;
            header("location:../dashboard.php");
        } else {
            header("location:../../common/invalid_details.php");
        }
    }
?>