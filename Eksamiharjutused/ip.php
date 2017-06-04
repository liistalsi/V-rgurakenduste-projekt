<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>Kulastused</title>

		<style type="text/css">
			
			div {
				border: solid 1px red;
			}

		</style>

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

		$mysqli = new mysqli("localhost", "root", "", "harjutused");
		mysqli_set_charset($mysqli, "utf8");

		$iplisamine = "INSERT INTO `ip` (`ip`) VALUES ('$ip')";

		mysqli_query($mysqli, $iplisamine);

		$ipparing = mysqli_query($mysqli, "SELECT COUNT(ip) FROM `ip` WHERE ip = '$ip'");

		$row = mysqli_fetch_row($ipparing);

		echo "

		<div class='kulastajad'>
				IP aadresse on kokku
			</div>
			<div>
				" . $row[0] . "
			</div>
		</div>";
		?>

	</body>

</html>
