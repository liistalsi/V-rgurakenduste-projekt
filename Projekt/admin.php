<?php

	session_start();

	require 'common/connection.php';

	function upload($name){
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");

		$tmp = explode(".", $_FILES[$name]["name"]);
		$extension = end($tmp);

		if ( in_array(strtolower($_FILES[$name]["type"]), $allowedTypes)
			&& ($_FILES[$name]["size"] < 1000000)
			&& in_array(strtolower($extension), $allowedExts)) {
	    // fail õiget tüüpi ja suurusega
			if ($_FILES[$name]["error"] > 0) {
				$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
				return "";
			} else {
	      // vigu ei ole
				if (file_exists("images/koertepildid/" . $_FILES[$name]["name"])) {
	        // fail olemas ära uuesti lae, tagasta failinimi
					$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
					return "images/koertepildid/" .$_FILES[$name]["name"];
				} else {
	        // kõik ok, aseta pilt
					move_uploaded_file($_FILES[$name]["tmp_name"], "images/koertepildid/" . $_FILES[$name]["name"]);
					return "images/koertepildid/" .$_FILES[$name]["name"];
				}
			}
		} else {
			return "";
		}
	}

	if (!isset($_SESSION['user'])) {

		header("Location: index.php");

	} else {

		require 'common/head.php';

		if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["action"])) {

			if ($_GET["action"] == "muuda" && isset($_GET["id"])) {
			
				$id = $_GET["id"];

				require 'views/muuda.php';

			} else if ($_GET["action"] == "lisa") {

				require 'views/lisa.php';

			} else if ($_GET["action"] == "kustuta") {

				$id = $_GET["id"];

				$kustutamisparing = mysqli_query($mysqli, "UPDATE koerad SET kustutatud = 1 WHERE  id = '$id'");

			} else if ($_GET["action"] == "logout") {

				$_SESSION = array();
				session_destroy();

				header("Location: index.php");
			}

		} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["id"])) {

			$id = $_GET["id"];

			require 'views/profiil.php';

		} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"]) && isset($_POST["id"])) {

			$koerauuendus;
			$pilt = upload("pilt");

			$id 			= $_POST["id"];
			$nimi 			= $_POST["nimi"];
			$synnikuupaev 	= $_POST["synnikuupaev"];
			$sugu 			= $_POST["sugu"];
			$toug 			= $_POST["toug"];
			$omanik 		= $_POST["omanik"];
			$kontaktnumber	= $_POST["kontaktnumber"];
			$email			= $_POST["email"];
			$probleem 		= $_POST["probleem"];
			$ravi 			= $_POST["ravi"];
			$markmed 		= $_POST["markmed"];

			if ($pilt != "") {

				$koerauuendus = "UPDATE koerad SET omanik = '$omanik', kontaktnumber = '$kontaktnumber', email ='$email', nimi ='$nimi', synnikuupaev ='$synnikuupaev', sugu ='$sugu', toug ='$toug', probleem ='$probleem', ravi ='$ravi', markmed ='$markmed', pilt ='$pilt' WHERE  id = '$id'";

			} else {

				$koerauuendus = "UPDATE koerad SET omanik = '$omanik', kontaktnumber = '$kontaktnumber', email ='$email', nimi ='$nimi', synnikuupaev ='$synnikuupaev', sugu ='$sugu', toug ='$toug', probleem ='$probleem', ravi ='$ravi', markmed ='$markmed' WHERE id = '$id'";
			}

			if (mysqli_query($mysqli, $koerauuendus)) {
			    
			    require 'views/profiil.php';

			} else {

			    require 'views/error.php';
			}

		} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"]) && isset($_POST["lisakoer"])) {

			$pilt = upload("pilt");

			$nimi 			= $_POST["nimi"];
			$synnikuupaev 	= $_POST["synnikuupaev"];
			$sugu 			= $_POST["sugu"];
			$toug 			= $_POST["toug"];
			$omanik 		= $_POST["omanik"];
			$kontaktnumber	= $_POST["kontaktnumber"];
			$email			= $_POST["email"];
			$probleem 		= $_POST["probleem"];
			$ravi 			= $_POST["ravi"];
			$markmed 		= $_POST["markmed"];

			$koeralisamine = "INSERT INTO `koerad` (`omanik`, `kontaktnumber`, `email`, `nimi`, `synnikuupaev`, `sugu`, `toug`, `probleem`, `ravi`, `markmed`, `pilt`) VALUES
							('$omanik', '$kontaktnumber', '$email', '$nimi', '$synnikuupaev', '$sugu', '$toug', '$probleem', '$ravi', '$markmed', '$pilt')";


			if (mysqli_query($mysqli, $koeralisamine)) {

				$idparing = mysqli_query($mysqli, "SELECT id FROM koerad WHERE nimi = '$nimi'");
				$id;

				while($row = mysqli_fetch_array($idparing)) {

					$id = $row['id'];
				}

				require 'views/profiil.php';			    

			} else {

			    echo "mingi jama on?!";
			}

		} else {

			require 'views/koertetabel.php';
		}

		require 'common/foot.php';

	}

?>