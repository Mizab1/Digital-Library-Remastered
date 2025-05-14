<?php
    unset($_SESSION["username"]);
    unset($_SESSION["pass"]);
    
    header("location: ../../index.php");
?>