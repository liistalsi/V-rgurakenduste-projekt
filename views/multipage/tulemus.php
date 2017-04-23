<?php 
	require_once('head.html');

	$pilt = null;

	if (isset($_GET['pilt'])) {
		$pilt = htmlspecialchars($_GET['pilt']);
	}
?>

<div id="wrap">


<?php
	
	if ($pilt != null) {
		
		echo 'Aitäh hääletamast, kuid pilt nr ' . $pilt . ' ei võitnud midagi!';

	} else {
		echo "Palun vali enne hääle andmist pilt, mille poolt soovid hääletada!";
	}

?>

</div>

<?php 
	require_once('foot.html');
?>