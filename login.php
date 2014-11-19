<?php 
session_start();
include('db.php');
if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	$name = $_POST["name"];
 	$password = md5($_POST["password"]);
 	$query = "select * from users where user_name='$name' and user_password='$password'";
 	if (mysqli_num_rows(mysqli_query($con, $query))>0) {
 		$_SESSION["user_name"]=$name;
 		header("Location: profile.php");
 	} else{
 		header("Location: login.php?status=fail");
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
		<?php if($_SERVER["REQUEST_METHOD"]!="POST" && !isset($_GET["status"])){?>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
					<label for="name">სახელი: </label><input type="text" name="name" id="name"><br>
					<label for="password">პაროლი: </label><input type="password" name="password" id="password"><br>
					<input type="submit" value="დალოგინება">
				</form>
			<?php } else if(isset($_GET["status"]) && $_GET["status"]=="fail"){ ?>
					<h1>ვერ დალოგინდი</h1>
			<?php }?>
	</body>
</html>