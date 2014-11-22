<?php 
session_start();
include('db.php');

if (!isset($_SESSION["user_name"])) {
	header("Location: login.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	$news = $_POST["news"];

 	/*$query = "select * from news where user_name='$name'";
 	if (mysqli_num_rows(mysqli_query($con, $query))>0) {
 		header("Location: register.php?status=fail");
 	} else{
 		$query = "insert into users (user_name, user_password) values ('$name', '$password')";
 		mysqli_query($con, $query);
 		$_SESSION["user_name"] =$name;
 		header("Location: register.php?status=success");
 	}*/
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
		<h2>You can add a news, you know</h2>
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			<textarea name="news"></textarea><br>
			<input type="submit" value="Add"><br>
		</form>
		<?php 
			$sql="select * FROM news, users where news.user_id = users.user_id ORDER BY news_id desc";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
			    while($row=mysqli_fetch_assoc($result)){
			     echo $row['user_id'].' - ' .$row['news_text'].'<br>';
				}
			}
		?>
		<br><a href="logout.php">Logout</a>
	</body>
</html>