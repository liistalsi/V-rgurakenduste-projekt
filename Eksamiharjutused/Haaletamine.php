<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Hääletus</title>

	</head>

	<body>

		<form method="post" action="?">
		Jah: <input type="radio" name="haal" value="Jah"><br>
		Ei: <input type="radio" name="haal" value="Ei"><br>
		<input type="submit" name="submit" value="Hääleta!">
		</form>

		<?php

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$u_haal = ($_POST['haal']);


				if (empty($_POST['haal'])) {
					die("Palun anna oma hääl!");
				}

				if ($u_haal == "Jah") {

				$fp = fopen("jahhaaled.txt", "a");
				fwrite($fp, "$u_haal,");
				fclose($fp);

				} else {

				$fp = fopen("eihaaled.txt", "a");
				fwrite($fp, "$u_haal,");
				fclose($fp);

				}			    

			}

				$fp = fopen("jahhaaled.txt", "r");
				$theData = file("jahhaaled.txt");
				$arvud = explode(",", $theData[0]);

				$jahhaaledkokku = count($arvud) -1;

				echo "Jah on hetkel hääletanud: " . $jahhaaledkokku;

				$ft = fopen("eihaaled.txt", "r");
				$eiData = file("eihaaled.txt");
				$eiarvud = explode(",", $eiData[0]);

				$eihaaledkokku = count($eiarvud) -1;

				echo "<br />";
				echo "EI on hetkel hääletanud: " . $eihaaledkokku;



		?>

	</body>

</html>