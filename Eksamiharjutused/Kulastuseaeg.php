<?php
	
	session_start();

?>


<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Kommentaarid</title>

	</head>

	<body>

		<form method="post" action="welcome.php">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		Comment: <textarea name="comment"></textarea>
		<input type="submit" name="submit" value="salvesta">
		</form>

	</body>

</html>