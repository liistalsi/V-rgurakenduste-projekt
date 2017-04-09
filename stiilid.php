<html>
<head>
	<title>Stiiligeneraator</title>

	<?php 

		$tekst = "See siin on näite tekst.";
		$tekstivarv = "white";
		$taustavarv = "black";
		$suurus = "20";
		$piirjoonevarv = "blue";
		$piirjoonestiil = "dashed";

		if (isset($_POST['tekst'])) {
			$text = htmlspecialchars($_POST['text']);
		}

		if (isset($_POST['tekstivarv'])) {
			$tekstivarv = htmlspecialchars($_POST['tekstivarv']);
		}

		if (isset($_POST['taustavarv'])) {
			$taustavarv = htmlspecialchars($_POST['taustavarv']);
		}

		if (isset($_POST['suurus'])) {
			$suurus = htmlspecialchars($_POST['suurus']);
		}

		if (isset($_POST['piirjoonevarv'])) {
			$piirjoonevarv = htmlspecialchars($_POST['piirjoonevarv']);
		}

		if (isset($_POST['piirjoonestiil'])) {
			$piirjoonestiil = htmlspecialchars($_POST['piirjoonestiil']);
		}

	?>

	<style type="text/css">

		body {
			font-size: 16px;
			font-family: Arial, Helvetica, sans-serif;
		}

		form,
		div {
			width: 800px;
			margin: 0 auto;
			padding: 20px;
		}

		label {
			width: 50%;
			float: left;
			margin-bottom: 20px;
		}

		form {
			border: solid 1px #e8e8e8;
			overflow: hidden;
		}

		textarea {
			width: 100%;
			padding: 20px;
			margin-bottom: 20px;
			text-align: center;
		}

		div	{
			height: 100px;
			text-align: center;
			margin-bottom: 20px;
			background-color: <?php echo $taustavarv; ?>;
			border-color: <?php echo $piirjoonevarv; ?>;
			border-style: <?php echo $piirjoonestiil; ?>;
		}

		p {
			color: <?php echo $tekstivarv; ?>;
			font-size: <?php echo $suurus; ?>px;
		}

		input {
			width: 100%;
			height: 40px;
		}

	</style>
</head>
<body>

	<div>
		<p>
			<?php echo $tekst; ?>
		</p>
	</div>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<textarea name="text"><?php echo $tekst ?></textarea>

		<label>
			Vali teksti värv:
			<select name="tekstivarv">
				<option selected value="white">Valge</option>
				<option value="blue">Sinine</option>
				<option value="red">Punane</option>
				<option value="yellow">Kollane</option>
				<option value="green">Roheline</option>
				<option value="black">Must</option>
			</select>
		</label>

		<label>
			Vali taustavärv:
			<select name="taustavarv">
				<option selected value="black">Must</option>
				<option value="white">Valge</option>
				<option value="blue">Sinine</option>
				<option value="red">Punane</option>
				<option value="yellow">Kollane</option>
				<option value="green">Roheline</option>
			</select>
		</label>

		<label>
			Vali teksti suurus:
			<select name="suurus">
				<option value="10">10 px</option>
				<option selected value="20">20 px</option>
				<option value="30">30 px</option>
				<option value="40">40 px</option>
				<option value="50">50 px</option>
			</select>
		</label>

		<label>
			Vali tausta piirjoone värvus:
			<select name="piirjoonevarv">
				<option value="black">Must</option>
				<option value="white">Valge</option>
				<option selected value="blue">Sinine</option>
				<option value="red">Punane</option>
				<option value="yellow">Kollane</option>
				<option value="green">Roheline</option>
			</select>
		</label>

		<label>
			Vali tausta piirjoone stiil:
			<select name="piirjoonestiil">
				<option selected value="dashed">Dashed</option>
				<option value="solid">Solid</option>
				<option value="double">Double</option>
				<option value="groove">Groove</option>
				<option value="rodge">Ridge</option>
				<option value="outset">Outset</option>
			</select>
		</label>

		<input type="submit" name="submit" value="Esita" />
	</form>

</body>
</html>
