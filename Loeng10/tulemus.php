<?php 
	require_once('head.html');

	session_start([
		'cookie_lifetime' => 86400,
	]);

	$pilt = null;

	if (isset($_SESSION['vote'])) {

		$pilt = $_SESSION['vote'];

	} else if (isset($_GET['pilt'])) {

		$pilt = htmlspecialchars($_GET['pilt']);
	}

?>

<div id="wrap">


<?php
	
	if ($pilt != null && !isset($_SESSION['vote'])) {

		$_SESSION['vote'] = $pilt;
		$_SESSION['timeout'] = time();

		echo 'Aitäh hääletamast, pilt nr ' . $pilt . ' läks kirja ning saate uuesti hääletada 24h pärast!';	

	} else if ($pilt != null) {

		$sekundid = ((time() - $_SESSION['timeout']) - 86400) * -1;
		$minutid = $sekundid / 60;
		$tunnid = $minutid / 60;
		$minutidjaanud = ($sekundid - floor($tunnid) * 60 * 60) / 60;

		echo 'Tundub, et olete juba enda valiku käesoleva ööpäeva jooksul ära teinud. Eelmine kord valisite pildi nr ' . $_SESSION['vote'];
		echo "<br>";
		echo "Saate uue valiku teha " . floor($tunnid) . "h " . floor($minutidjaanud) . "m pärast";

	} else {

		echo "Palun vali enne hääle andmist pilt, mille poolt soovid hääletada!";
	}

?>

</div>

<?php 
	require_once('foot.html');
?>