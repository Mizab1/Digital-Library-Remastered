<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_style.css">
    <title>Admin Page</title>
</head>

<body>
    <?php require_once "login_logout/log_process.php" ?>
    <?php require_once "admin_process.php" ?>
    <?php if (isset($_SESSION["message"])) : ?>
        <div class="alert alert-<?= $_SESSION["msg_type"] ?>">
            <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            ?>
        </div>
    <?php endif; ?>

    <?php
        if (isset($_POST["logout"])) {
            header("location: login_logout/logout.php");
        }
    ?>
    <div class="topnav">
        <!-- <a class="active" href="#home">Logout</a> -->
        <div class="search-container">
            <form action="main_page.php" method="post">
                <button class="logout-btn btn btn-danger" name="logout" tabindex="-1">Logout</button>
                <input type="text" placeholder="Search.." name="search_keyword" id="search_keyword">
                <button type="submit" class="search-btn btn-secondary btn" name="search_btn" id="search_btn">Search</button>
            </form>
            <script src="searchHandler.js"></script>
        </div>
    </div>
    <?php
    if (isset($_POST["search_keyword"])) {
        $search_keyword = $_POST["search_keyword"];
        $search_keyword = str_replace("'", "''", $search_keyword);
        $result = mysqli_query($connectdb, "SELECT * FROM book WHERE book_name LIKE '%$search_keyword%'");
    } else {
        $result = mysqli_query($connectdb, "SELECT * FROM book");
    }
    ?>
    <div class="justify-content-center">
        <form action="admin_process.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Book Name</th>
                        <th class="text-center">Author Name</th>
                        <th class="text-center">Pages</th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td class="text-center"><?php echo $row["book_name"]; ?></td>
                    <td class="text-center"><?php echo $row["auth_name"]; ?></td>
                    <td class="text-center"><?php echo $row["pages"]; ?></td>
                    <td class="text-center">
                        <a href="main_page.php?view=<?php echo $row["book_id"]; ?>" class="btn btn-info">View</a>
                        <a href="main_page.php?delete=<?php echo $row["book_id"]; ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </form>
    </div>
    <div class="row justify-content-center">
        <form action="admin_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Book Name</label>
                <input type="text" name="book_name" class="form-control" placeholder="Enter Book Name" required>
            </div>
            <div class="form-group">
                <label>Author Name</label>
                <input type="text" name="auth_name" class="form-control" placeholder="Enter Author Name" required>
            </div>
            <div class="form-group">
                <label>Pages</label>
                <input type="number" name="pages" class="form-control" placeholder="Enter Pages" required>
            </div>
            <div class="form-group">
                <label>Upload PDF</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </div>
        </form>
    </div>
</body>

</html>