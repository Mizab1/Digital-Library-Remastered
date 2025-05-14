<?php
   $connectdb = mysqli_connect("localhost", "root", "", "library");
    session_start();

    
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        
        $result = mysqli_query($connectdb, "SELECT * FROM admin_login WHERE username='$username' AND pass='$pass'");
        
        if(mysqli_num_rows($result) == 1){
            $_SESSION["username"] = $username;
            $_SESSION["pass"] = $pass;
            
            $_SESSION["message"] = "Welcome back " . $_SESSION["username"] . "!";
            $_SESSION["msg_type"] = "success";
            
            header("location: ../main_page.php");
        }else{
            $_SESSION["message"] = "Wrong Login Details";
            $_SESSION["msg_type"] = "danger";
            header("location: login.php");
        }
    }
?>