<!DOCTYPE html>
<html>
<head>
	<title>Märkete vaatamine ja lisamine</title>

	<style type="text/css">
		
		form {
			display: block;
			width: 100%;
			text-align: center;
		}

		textarea {
			display: block;
			width: 50%;
			height: 300px;
			margin: 0 auto;
			margin-bottom: 20px;
		}

		h1 {
			text-align: center;
		}

	</style>
</head>
<body>


		<?php

			$mysqli = new mysqli("localhost", "root", "", "harjutused");
			mysqli_set_charset($mysqli, "utf8");

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$markmed = mysqli_real_escape_string($mysqli, $_POST['markmed']);
				$sisestamisParing = "UPDATE `markmed` SET `id`=1,`text`='$markmed'";

				mysqli_query($mysqli, $sisestamisParing);

			}

			$tekstiParing = mysqli_query($mysqli, "SELECT text FROM `markmed` WHERE id = 1");
			$text = mysqli_fetch_row($tekstiParing);

		?>

		<h1>
			Sisesta märkmed allolevasse teksti kasti ja vajuta "salvesta"
		</h1>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			
			<textarea name="markmed"><?php echo $text[0]; ?></textarea>

			<input type="submit" name="salvesta" value="salvesta">
		</form>


</body>
</html>