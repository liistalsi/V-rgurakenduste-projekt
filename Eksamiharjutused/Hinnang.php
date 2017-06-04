<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Hinnang</title>

	</head>

	<body>

		<form method="post" action="?">
		Hinne 1: <input type="radio" name="hinne" value="1"><br>
		Hinne 2: <input type="radio" name="hinne" value="2"><br>
		Hinne 3: <input type="radio" name="hinne" value="3"><br>
		Hinne 4: <input type="radio" name="hinne" value="4"><br>
		Hinne 5: <input type="radio" name="hinne" value="5"><br>
		<input type="submit" name="submit" value="Saada hinne">
		</form>

	<?php

		$mysqli = new mysqli("localhost", "root", "", "harjutused");
		mysqli_set_charset($mysqli, "utf8");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$u_hinne = ($_POST['hinne']);

			$hinnangulisamine = "INSERT INTO `hinnangud`(`hinne`) VALUES ('$u_hinne')";

			if (mysqli_query($mysqli, $hinnangulisamine)) {

			header("Location: Hinnang.php");

			} else {

			    echo "mingi jama on?!";
			}

		}

		$keskminehinne = mysqli_query($mysqli, "SELECT AVG(hinne) FROM `hinnangud`");

			while($row = mysqli_fetch_array($keskminehinne)) {

			echo "

			<div class='row'>
				<div class='keskminehinne'>
					Hetke keskmine hinne on: " . $row[0] . "
			</div>";

			}
	
	?>

	</body>

</html>