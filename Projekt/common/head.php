<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="stiilid.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="scripts.js"></script>
	<title>Tabelivaade</title>
</head>
<body>

<?php if (isset($_SESSION['user'])): ?>
<nav>
	<ul>
		<li>
			<a href="admin.php">Koerte tabel</a>
		</li>
		<li>
			<a href="?action=lisa">Lisa koer andmebaasi</a>
		</li>
		<li class="logout">
			<a href="?action=logout">logi välja, <?php echo $_SESSION['user']; ?></a>
		</li>
	</ul>	
</nav>
<?php endif; ?>