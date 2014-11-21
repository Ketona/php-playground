<?php 
session_start();
include('db.php');

if (!isset($_SESSION["user_name"])) {
	header("Location: login.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	$name = $_POST["name"];
 	$password = md5($_POST["password"]);
 	$query = "select * from users where user_name='$name'";
 	if (mysqli_num_rows(mysqli_query($con, $query))>0) {
 		header("Location: register.php?status=fail");
 	} else{
 		$query = "insert into users (user_name, user_password) values ('$name', '$password')";
 		mysqli_query($con, $query);
 		$_SESSION["user_name"] =$name;
 		header("Location: register.php?status=success");
 	}
} 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ნიკას რაც უნდა</title>
	</head>
	<body>
		<h1>Welcome to your profile <?php echo $_SESSION["user_name"] ?></h1>
		<br><a href="register.php">Register</a>
		<br><a href="login.php">Login</a>
		<br><a href="logout.php">Logout</a>
	</body>
</html>