<?php
    include_once "../db.php";

    if (isset($_POST["logout"])) {
        header("location: ./login_logout/logout.php");
    }
    if (isset($_POST["search_keyword"])) {
        $search_keyword = $_POST["search_keyword"];
        $search_keyword = str_replace("'", "''", $search_keyword);
        $result = mysqli_query($connectdb, "SELECT * FROM book WHERE book_name LIKE '%$search_keyword%'");
    } else {
        $result = mysqli_query($connectdb, "SELECT * FROM book");
    }
?>

<html>
    <head>
        <title>User Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../admin/admin_style.css">
    </head>
    <body>
        <div class="topnav">
            <!-- <a class="active" href="#home">Logout</a> -->
            <div class="search-container">
                <form action="dashboard.php" method="post">
                    <button type="submit" class="search-btn btn-secondary btn" name="search_btn">Search</button>
                    <input type="text" placeholder="Search.." name="search_keyword">
                    <button class="logout-btn btn btn-danger" name="logout">Logout</button>
                </form>
            </div>
        </div>
        <div class="justify-content-center">
            <form action="dashboard.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Book Name</th>
                            <th class="text-center">Author Name</th>
                            <th class="text-center">Pages</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $row["book_name"]; ?></td>
                        <td class="text-center"><?php echo $row["auth_name"]; ?></td>
                        <td class="text-center"><?php echo $row["pages"]; ?></td>
                        <td class="text-center">
                            <?php
                                if (isset($_GET["view"])) {
                                    $id = $_GET["view"];
                                    $location_query = mysqli_query($connectdb, "SELECT * FROM book WHERE book_id=$id");
                                    while ($row_loc = mysqli_fetch_assoc($location_query)) {
                                        header("location: " . $row_loc["pdf_add"]);
                                    }
                                }
                                ?>
                            <a href="dashboard.php?view=<?php echo $row["book_id"]; ?>" class="btn btn-info">View</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </form>
        </div>
    </body>
</html>