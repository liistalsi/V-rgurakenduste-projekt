<?php  

if (empty($_COOKIE["teine"])) {

	setcookie("teine", time(), time() + 60*1);
	echo "Kupsis loodud!".time();

} else {

	echo "Kupsis oli olemas, vaartus oli: ".$_COOKIE["teine"];
	echo "<br/>Hetke aeg on ".time();
}
$_COOKIE["esimene"]="mingi asi";

// siin saaks kasutada!


?>