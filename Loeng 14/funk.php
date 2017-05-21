<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="root";
	$pass="root";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){

	if (isset($_SESSION['user'])) {
		
		kuva_puurid();

	} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$user = null;
		$pass = null;
		$errors = [];

		if(isset($_POST['user'])) {

			$user = mysql_real_escape_string($_POST['user']);
		}

		if(isset($_POST['pass'])) {

			$pass = mysql_real_escape_string($_POST['pass']);
		}

		$shaPass = sha1($pass);

		$kasutajaParing = mysqli_query(mysqli_connect("localhost", "root", "root", "test") , "SELECT * FROM liistalsi_kylastajad WHERE username = '".$user."' AND passw = '".$shaPass."' ");
		$kasutajaLogitud = mysqli_num_rows($kasutajaParing);
		$rolliParing = mysqli_query(mysqli_connect("localhost", "root", "root", "test") , "SELECT roll FROM liistalsi_kylastajad WHERE username = '".$user."' AND roll = 'admin'");
		$kasutajaOnAdmin = mysqli_num_rows($rolliParing);

		if ($kasutajaLogitud > 0) {
			
			$_SESSION['user'] = $user;

			if ($kasutajaOnAdmin > 0) {

				$_SESSION['roll'] = "admin";

			} else {

				$_SESSION['roll'] = "user";
			}

			kuva_puurid();

		} else {

			if ($user == null || $pass == null) {

				array_push($errors, "Kasutajanimi või parool sisestamata");

			} else {

				array_push($errors, "Kasutajanimi või parool vale");	
			}
			

			include_once('views/login.html');
		}

	} else {

		include_once('views/login.html');
	}
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	
	if (isset($_SESSION['user'])) {
		

		$puurid;	
		$puurideParing = mysqli_query(mysqli_connect("localhost", "root", "root", "test") , "SELECT DISTINCT(puur) FROM liistalsi_loomaaed");

		while($row = mysqli_fetch_array($puurideParing)) {

			$piltideParing = mysqli_query(mysqli_connect("localhost", "root", "root", "test") , "SELECT liik FROM liistalsi_loomaaed WHERE puur = $row[0]");

			while($pilt = mysqli_fetch_array($piltideParing)) {

				$puurid[$row[0]][] = $pilt[0];	
				
			}
		}

		include_once('views/puurid.html');

	} else {

		include_once('views/login.html');
	}
	
}

function lisa(){
	
	$errors = [];
	$success = "";

	$roll = $_SESSION['roll'];

	if (isset($_SESSION['user']) && $roll == "admin") {

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
			if (isset($_FILES["liik"]) && isset($_POST['nimi']) && isset($_POST['puur'])) {
				
				$liik = upload("liik");
				$nimi = mysql_real_escape_string($_POST['nimi']);
				$puur = mysql_real_escape_string($_POST['puur']);

				$connection = mysqli_connect("localhost", "root", "root", "test");

				if (!$connection) {

				    die("MySQL ühendus ebaõnnestus: " . mysqli_connect_error());
				}

				$uusLoom = "INSERT INTO liistalsi_loomaaed (`nimi`, `puur`, `liik`)
				VALUES ('".$nimi."', '".$puur."', '".$liik."')";

				if (mysqli_query($connection, $uusLoom)) {
				    
				    $success =  "Uus loom lisatud";

				} else {

				    array_push($errors, "Jama: " . $uusLoom . "<br>" . mysqli_error($connection));
				}

				mysqli_close($connection);

			} else {

				array_push($errors, "Palun veendu, et täitsid kõik väljad korrektselt");
			}

		}
		
		include_once('views/loomavorm.html');

	} else if (isset($_SESSION['user'])) {

		kuva_puurid();

	} else {

		include_once('views/login.html');
		
	}
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>