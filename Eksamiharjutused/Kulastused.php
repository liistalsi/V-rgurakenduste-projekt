<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Loendur</title>

	</head>

	<body>

		<?php

			session_start();

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];

			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}


			date_default_timezone_set('Europe/Helsinki');
			$timestamp = time();
			$date_time = date("H:i:s", $timestamp);

				if (empty($ip)) {

					die("Midagi on valesti, palun lae leht uuesti!");

				} else {

				$fp = fopen("kulastused.txt", "a");
					fwrite($fp, "$ip $date_time,");
					fclose($fp);
				}			    


				$fp = fopen("kulastused.txt", "r");
				$theData = file("kulastused.txt");
				$arvud = explode(",", $theData[0]);

				$kulastusedkokku = count($arvud);
				$viimanekylastus = explode(" ", $arvud[$kulastusedkokku - 2]);

				echo "Viimane külastus: " . $viimanekylastus[1];

				echo "<br />";
				echo "Kokku lehel käidud: " . ($kulastusedkokku - 1) . " korda";

		?>

	</body>

</html>