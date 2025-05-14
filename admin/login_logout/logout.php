<?php
    unset($_SESSION["username"]);
    unset($_SESSION["pass"]);
    unset($_SESSION["email"]);
    
    session_destroy();
    
    header("location: ../../index.php");
?>