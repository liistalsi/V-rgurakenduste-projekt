<?php

	if (!isset($_SESSION['user'])) {

		header("Location: ../index.php");
	}

	$mysqli = new mysqli("localhost", "root", "", "koerad");
	mysqli_set_charset($mysqli, "utf8");

?>