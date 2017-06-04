<?php

	$mysqli = new mysqli("localhost", "root", "", "harjutused");
	mysqli_set_charset($mysqli, "utf8");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$u_name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$u_comment = mysqli_real_escape_string($mysqli, $_POST['comment']);

		if (empty($u_name)) {
			die("Palun sisesta nimi!");
		}

		if (empty($u_comment)) {
			die("Kommentaari vali ei saa olla tuhi! Palun sisesta kommentaar!");
		}

		$kommentaarilisamine = "INSERT INTO `kommentaarid`(`nimi`, `kommentaar`) VALUES ('$u_name', '$u_comment')";

		if (mysqli_query($mysqli, $kommentaarilisamine)) {

			header("Location: Comments.php");			    

		} else {

		    echo "mingi jama on?!";
		}


	}



?>
