<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Teksthinnang</title>

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

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$u_hinne = ($_POST['hinne']);


				if (empty($_POST['hinne'])) {
					die("Palun vali hinnang!");
				}

				$fp = fopen("hinnangud.txt", "a");
				fwrite($fp, "$u_hinne\t");
				fclose($fp);			    

			}

				$fp = fopen("hinnangud.txt", "r");
				$theData = file("hinnangud.txt");
				$arvud = explode("\t", $theData[0]);

				$keskminehinne = array_sum($arvud) / count($arvud);

				echo "Keskmine hinne hetkel on: " . $keskminehinne;

		?>

	</body>

</html>