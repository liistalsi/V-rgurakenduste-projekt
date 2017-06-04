<?php

	//"Loo lihtne lehekülg märkmete tegemiseks. Igal kasutajal on oma isiklikud märkmed.",

	if (!isset($_COOKIE['markmed'])) {

		setcookie(
			"markmed",
			"Kirjuta siia märkmeid",
			time() + (10 * 365 * 24 * 60 * 60)
		);
	} 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		setcookie(
			"markmed",
			 $_POST['markmed'],
			time() + (10 * 365 * 24 * 60 * 60)
		);
	}
?>

<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8" />
		<title>IPd</title>

		<style type="text/css">
			
			div {
				border: solid 1px red;
			}

			textarea {
				width: 500px;
				height: 300px;
				margin: 0 auto;
			}

		</style>

	</head>

	<body>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			
			<textarea name="markmed"><?php echo $_COOKIE["markmed"]; ?></textarea>

			<input type="submit" name="salvesta" value="salvesta">
		</form>

	</body>

</html>
