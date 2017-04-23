<?php  
if (empty($_COOKIE["esimene"])) {

	setcookie("esimene", "mingi", time() + 60*10);
	echo "Kupsis loodud!";
} else {

	echo "Kupsis oli olemas, vaartus oli: ".$_COOKIE["esimene"];
}

?>