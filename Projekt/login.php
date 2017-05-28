<?php

	/*
	* Kontrollime, kas kasutajaandmed on õiged ja juhatame ta õigesse kohta.
	*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$user = null;
		$pass = null;

		require 'common/connection.php';

		if(isset($_POST['user'])) {

			$user = mysqli_real_escape_string($mysqli, $_POST['user']);
		}

		if(isset($_POST['pass'])) {

			$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
		}

		$shaPass = sha1($pass);

		$kasutajaParing = mysqli_query($mysqli, "SELECT * FROM koerad_kasutajad WHERE kasutajanimi = '".$user."' AND parool = '".$shaPass."' ");
		$kasutajaLogitud = mysqli_num_rows($kasutajaParing);

		if ($kasutajaLogitud > 0) {

			session_start();
			
			$_SESSION['user'] = $user;

			header("Location: admin.php");

		} else {

			header("Location: index.php?logimiserror");
		}

	} else {

		header("Location: index.php?logimiserror");
	}

?>