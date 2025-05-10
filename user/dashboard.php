<?php
$conn = mysqli_connect('localhost', 'root', '', 'library') or die(mysqli_connect_error());
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
                    <button class="logout-btn btn btn-danger" name="logout">Logout</button>
                    <input type="text" placeholder="Search.." name="search_keyword">
                    <button type="submit" class="search-btn btn-secondary btn" name="search_btn">Search</button>
                </form>
                <?php
                if (isset($_POST["logout"])) {
                    header("location: ./logout.php");
                }
                if (isset($_POST["search_keyword"])) {
                    $search_keyword = $_POST["search_keyword"];
                    $result = mysqli_query($conn, "SELECT * FROM book WHERE book_name LIKE '%$search_keyword%'");
                } else {
                    $result = mysqli_query($conn, "SELECT * FROM book");
                }
                ?>
            </div>
        </div>
        <div class="justify-content-center">
            <form action="dashboard.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>Pages</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td><?php echo $row["book_name"]; ?></td>
                        <td><?php echo $row["auth_name"]; ?></td>
                        <td><?php echo $row["pages"]; ?></td>
                        <td>
                            <?php
                                if (isset($_GET["view"])) {
                                    $id = $_GET["view"];
                                    $location_query = mysqli_query($conn, "SELECT * FROM book WHERE book_id=$id");
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