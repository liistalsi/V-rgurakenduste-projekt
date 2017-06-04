<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Welcome</title>

	</head>

<body>

	<?php

		if (isset($_GET["nimi"] == "" || isset($_GET["comment"] =="" )) {

			echo "nimi ja kommentaar on kohustuslikud väljad!";
		}

		$mysqli = new mysqli("localhost", "root", "", "kommentaarid");
		mysqli_set_charset($mysqli, "utf8");

		

	?>

</body>
</html>