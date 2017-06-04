<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Kommentaarid</title>

	</head>

	<body>

		<?php

			$mysqli = new mysqli("localhost", "root", "", "harjutused");
			mysqli_set_charset($mysqli, "utf8");

			$kommentaarideparing = mysqli_query($mysqli, "SELECT `nimi`, `kommentaar` FROM `kommentaarid` WHERE 1");

			while($row = mysqli_fetch_array($kommentaarideparing)) {

				echo "

				<div class='row'>
					<div class='kasutajanimi'>
						" . $row['nimi'] . "
					</div>
					<div>
						" . $row['kommentaar'] . "
					</div>
				</div>";
			}
		?>

		<form method="post" action="welcome.php">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		Comment: <textarea name="comment"></textarea>
		<input type="submit" name="submit" value="salvesta">
		</form>

	</body>

</html>
