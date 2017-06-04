<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Like</title>

	</head>

	<body>

		<form method="post" action="?">
		<input type="submit" name="submit" value="! Like Me !">
		</form>

	<?php

		$mysqli = new mysqli("localhost", "root", "", "harjutused");
		mysqli_set_charset($mysqli, "utf8");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {


			$laigilisamine = "INSERT INTO `meeldimised`(`laigid`) VALUES ('like')";

			if (mysqli_query($mysqli, $laigilisamine)) {

			header("Location: Like.php");

			} else {

			    echo "mingi jama on?!";
			}

		}

			$laikideparing = mysqli_query($mysqli, "SELECT COUNT(laigid) FROM `meeldimised` WHERE 1");

			$row = mysqli_fetch_row($laikideparing);

			echo "

			<div class='row'>
				<div class='laigidkokku'>
					Hetkel on lehel laike: " . $row[0] . "
			</div>";
	
	?>

	</body>

</html>