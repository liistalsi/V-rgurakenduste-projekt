<?php
session_start();
$kaubad = array("kampsun", "müts", "püksid", "saapad");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ostukorv</title>
	</head>

	<body>
		<?php foreach($_SESSION["korv"] as $id=>$kogus):?>
			<p><?php echo $kaubad[$id]; ?> <?php echo $kogus; ?>tk.</p>
		<?php endforeach; ?>
		<p>mine vaata <a href="Loeng10 Pood.php">poodi</a></p>		
	</body>
</html>