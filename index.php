<?php 
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	$name = $_POST["name"];
 	$password = md5($_POST["password"]);
 	$query = "select * from users where user_name='$name'";
 	if (mysqli_num_rows(mysqli_query($con, $query))>0) {
 		header("Location: index.php?status=fail");
 	} else{
 		$query = "insert into users (user_name, user_password) values ('$name', '$password')";
 		mysqli_query($con, $query);
 		$_SESSION["user_name"] =$name;
 		header("Location: index.php?status=success");
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
		<?php 
			if($_SERVER["REQUEST_METHOD"]!="POST" && !isset($_GET["status"])){?>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
					<label for="name">სახელი: </label><input type="text" name="name" id="name"><br>
					<label for="password">პაროლი: </label><input type="password" name="password" id="password"><br>
					<input type="submit" value="რეგისტრაცია">
				</form>
			<?php } else if(isset($_GET["status"]) && $_GET["status"]=="fail"){ ?>
					<h1>არსებობს უკვე ეგეთი ბრად</h1>
			<?php } else if(isset($_GET["status"]) && $_GET["status"]=="success"){ ?>
					<h1>წარმატებით დარეგისტრირდით გილოცავთ.</h1>
			<?php } ?>
	</body>
</html>