<?php
	session_start();
	if( $_SERVER['REQUEST_METHOD']=='POST' ){

		$name = $_POST['username'];

		$_SESSION['username'] = $name;
		header("Location: chat.php");

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<div class="box">
		
		<form action="" method="POST">
			
			<input type="text" name="username" placeholder="Enter your username" />

			<input type="submit" value="CHat NOW" />

		</form>

	</div>

</body>
</html>