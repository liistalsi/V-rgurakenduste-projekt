<!DOCTYPE html>
<html>
<head>
	<title>Kellaajad</title>
</head>
<body>

<div>
	<strong>
		Kellaaeg serveris:

		<span class="serveriAeg">
			<?php
			date_default_timezone_set('Europe/Helsinki');

			$timestamp = time();
			$date_time = date("H:i:s", $timestamp);
			echo " $date_time";

			?>
		</span>
	</strong>

	<br />

	<strong>
		
	Kellaaeg kasutaja browseri järgi: <span class="kasutajaKellaaeg"></span>
	</strong>

	<p class="staatus"></p>

</div>

	<script type="text/javascript">

	function gotTime() {

		var today = new Date();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = time;

		return dateTime;
	}

	function kontrolliKellaaegadeVastavust(serveriAeg, kasutajaAeg) {

		if (serveriAeg == kasutajaAeg) {

			return true;

		} else {

			return false;
		}
	}

	var serveriAeg = document.querySelector('.serveriAeg').innerHTML.trim();

	if (kontrolliKellaaegadeVastavust(serveriAeg, gotTime())) {

		document.querySelector('.staatus').innerHTML = "Kasutaja ja serveri ajad on samad! Woohooo!";

	} else {

		console.log('ajad ei ole samad');
		console.log(serveriAeg, gotTime());
	}

	document.querySelector('.kasutajaKellaaeg').innerHTML = gotTime();

	</script>
</body>
</html>


