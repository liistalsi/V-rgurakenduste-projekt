<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Kulastused</title>

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


				if (empty($ip)) {

					die("Midagi on valesti, palun lae leht uuesti!");

				} else {

				$fp = fopen("ipd.txt", "a");
				fwrite($fp, "$ip\t");
				fclose($fp);

				}			    


				$fp = fopen("ipd.txt", "r");
				$theData = file("ipd.txt");
				$arvud = explode("\t", $theData[0]);

				$kulastusedkokku = count($arvud);

				echo "Kokku lehel käidud: " . $kulastusedkokku . " korda";

		?>

	</body>

</html>