<?php 
session_start();
include('db.php');

if (!isset($_SESSION["user_name"])) {
	header("Location: login.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
 	$news = $_POST["news"];
 	$name = $_SESSION["user_name"];

 	$sql="select * FROM users where user_name = '$name'";
	$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
		    while($row=mysqli_fetch_assoc($result)){
		     $user_id = $row["user_id"];
			}
		}

 	$query = "insert into news (news_text, user_id) values ('$news', $user_id);";
 	mysqli_query($con, $query);
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

			$user_id = 5;

			$result = mysql_query("select user_name FROM users WHERE user_id = '$user_id' LIMIT 1");
			$row = mysql_fetch_array($result);
			mysql_free_result($result);

			echo "The username for user_id $user_id is " . $row['user_name'];
		?>
		<br><a href="logout.php">Logout</a>
	</body>
</html>