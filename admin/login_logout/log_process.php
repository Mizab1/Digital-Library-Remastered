<?php
    include_once "../db.php";
    session_start();

    
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        
        $result = mysqli_query($connectdb, "SELECT * FROM admin_login WHERE username='$username' AND pass='$pass'");
        
        if(mysqli_num_rows($result) == 1){
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;
            
            $_SESSION["message"] = "Success";
            $_SESSION["msg_type"] = "success";
            
            header("location: ../main_page.php");
        }else{
            $_SESSION["message"] = "Wrong Login Details";
            $_SESSION["msg_type"] = "danger";
            header("location: login.php");
        }
    }
?>