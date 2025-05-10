<?php

$conn = mysqli_connect('localhost', 'root', '', 'library') or die(mysqli_connect_error());

$id = 0;
$update = false;
$book_name = "";
$auth_name = "";
$pages = "";

if (isset($_POST["save"])) {
    $uniq_filename = uniqid() . uniqid();
    $location = "../files/" . $uniq_filename . ".pdf";
    $book_name = $_POST["book_name"];
    $auth_name = $_POST["auth_name"];
    $pages = $_POST["pages"];

    mysqli_query($conn, "INSERT INTO book (book_name, auth_name, pages, pdf_add) VALUES('$book_name', '$auth_name', '$pages', '$location')");
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);

    $_SESSION["message"] = "Details has been saved";
    $_SESSION["msg_type"] = "success";

    header("location: main_page.php");
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    mysqli_query($conn, "DELETE FROM book WHERE book_id=$id");

    $_SESSION["message"] = "Details has been deleted";
    $_SESSION["msg_type"] = "danger";
}

if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $update = true;
    $result = mysqli_query($conn, "SELECT * FROM book WHERE book_id=$id");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $book_name = $row["book_name"];
        $auth_name = $row["auth_name"];
        $pages = $row["pages"];
    }
}

if (isset($_GET["view"])) {
    $id = $_GET["view"];
    $location_query = mysqli_query($conn, "SELECT * FROM book WHERE book_id=$id");
    while ($row_loc = mysqli_fetch_assoc($location_query)) {
        header("location: " . $row_loc["pdf_add"]);
    }
}

// if (isset($_POST["update"])) {
//     $id = $_POST["id"];
//     $book_name = $_POST["book_name"];
//     $auth_name = $_POST["auth_name"];
//     $pages = $_POST["pages"];

//     mysqli_query($conn, "UPDATE book SET book_name='$book_name', auth_name='$auth_name', pages='$pages' WHERE id=$id");

//     $_SESSION["message"] = "Details has been updated";
//     $_SESSION["msg_type"] = "warning";

//     header("location: main_page.php");
// }