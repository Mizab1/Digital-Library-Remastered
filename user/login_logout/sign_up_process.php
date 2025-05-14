<?php
	$connectdb = mysqli_connect("localhost", "root", "", "library");
    session_start();

	if (isset($_POST['user_email'])) {
		$email = $_POST['user_email'];
		$query = "select * from user where (user_email='$email');";
		$result = mysqli_query($connectdb, $query);

		if (mysqli_num_rows($result) > 0) {
			header("location:../../common/email_error.php");
		} else {
			if (isset($_POST['signup'])) {
				$name = $_POST['user_name'];
				$email = $_POST['user_email'];
				$password = $_POST['user_password'];

				$query = "INSERT INTO user(user_name,user_email,user_password) VALUES ('$name','$email','$password')";
				$query2 = "SELECT * FROM user";

				$result = mysqli_query($connectdb, $query);
				$result = mysqli_query($connectdb, $query2);

				$data_count = mysqli_num_rows($result);

				if ($data_count > 0) {
					$_SESSION['user_name'] = $name;
					$_SESSION['user_email'] = $email;
					$_SESSION['user_password'] = $password;
					header("location:../dashboard.php");
				} else {
					echo "Please Insert Data";
				}
			}
		}
	}
?>