<html>
<head>
	<title>Stiiligeneraator</title>

	<?php 

		session_start([
			'cookie_lifetime' => 86400,
		]);

		$text = "See siin on näite tekst.";
		$tekstivarv = "white";
		$taustavarv = "black";
		$suurus = "20";
		$piirjoonevarv = "blue";
		$piirjoonestiil = "dashed";

		if (isset($_POST['text'])) {
			$text = htmlspecialchars($_POST['text']);
			$_SESSION['text'] = $_POST['text'];
		}

		if (isset($_POST['tekstivarv'])) {
			$tekstivarv = htmlspecialchars($_POST['tekstivarv']);
			$_SESSION['tekstivarv'] = $_POST['tekstivarv'];
		}

		if (isset($_POST['taustavarv'])) {
			$taustavarv = htmlspecialchars($_POST['taustavarv']);
			$_SESSION['taustavarv'] = $_POST['taustavarv'];
		}

		if (isset($_POST['suurus'])) {
			$suurus = htmlspecialchars($_POST['suurus']);
			$_SESSION['suurus'] = $_POST['suurus'];
		}

		if (isset($_POST['piirjoonevarv'])) {
			$piirjoonevarv = htmlspecialchars($_POST['piirjoonevarv']);
			$_SESSION['piirjoonevarv'] = $_POST['piirjoonevarv'];
		}

		if (isset($_POST['piirjoonestiil'])) {
			$piirjoonestiil = htmlspecialchars($_POST['piirjoonestiil']);
			$_SESSION['piirjoonestiil'] = $_POST['piirjoonestiil'];
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
			background-color: <?php echo $_SESSION['taustavarv']; ?>;
			border-color: <?php echo $_SESSION['piirjoonevarv']; ?>;
			border-style: <?php echo $_SESSION['piirjoonestiil']; ?>;			
		}

		p {
			color: <?php echo $_SESSION['tekstivarv']; ?>;
			font-size: <?php echo $_SESSION['suurus']; ?>px;
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
			<?php 

				if (isset($_SESSION['text'])) {

					echo $_SESSION['text'];
				
				} else {
					echo $text; 
				}

			?>
		</p>
	</div>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<textarea name="text"><?php 

				if (isset($_SESSION['text'])) {

					echo $_SESSION['text'];
				
				} else {
					echo $text; 
				}

			?></textarea>

		<label>
			Vali teksti värv:
			<select name="tekstivarv">

				<?php

					$valitudVarv = "";
					$selected = "";
					$varvid = ["white", "blue", "red", "yellow", "green", "black"];
					$suurused = [10, 20, 30, 40, 50];
					$borders = ["dashed", "solid", "double", "groove", "ridge", "outset"];

					if (isset($_SESSION['tekstivarv'])) {

						$valitudVarv = $_SESSION['tekstivarv'];
					}

					for ($i = 0; $i < count($varvid); $i++) { 

						if ($valitudVarv == $varvid[$i]) {
							
							$selected = "selected";

						} else {
							$selected = "";
						}

						echo "<option " . $selected . " value=" . $varvid[$i] . ">" . $varvid[$i] . "</option>";
					}

				?>

			</select>
		</label>

		<label>
			Vali taustavärv:
			<select name="taustavarv">
				<?php

					if (isset($_SESSION['taustavarv'])) {

						$valitudVarv = $_SESSION['taustavarv'];
					}

					for ($i = 0; $i < count($varvid); $i++) { 

						if ($valitudVarv == $varvid[$i]) {
							
							$selected = "selected";

						} else {
							$selected = "";
						}

						echo "<option " . $selected . " value=" . $varvid[$i] . ">" . $varvid[$i] . "</option>";
					}

				?>

			</select>
		</label>

		<label>
			Vali teksti suurus:
			<select name="suurus">
				<?php

					if (isset($_SESSION['suurus'])) {

						$valitudSuurus = $_SESSION['suurus'];
					}

					for ($i = 0; $i < count($suurused); $i++) { 

						if ($valitudSuurus == $suurused[$i]) {
							
							$selected = "selected";

						} else {
							$selected = "";
						}

						echo "<option " . $selected . " value=" . $suurused[$i] . ">" . $suurused[$i] . " px</option>";
					}

				?>
			</select>
		</label>

		<label>
			Vali tausta piirjoone värvus:
			<select name="piirjoonevarv">
				<?php

					if (isset($_SESSION['piirjoonevarv'])) {

						$valitudVarv = $_SESSION['piirjoonevarv'];
					}

					for ($i = 0; $i < count($varvid); $i++) { 

						if ($valitudVarv == $varvid[$i]) {
							
							$selected = "selected";

						} else {
							$selected = "";
						}

						echo "<option " . $selected . " value=" . $varvid[$i] . ">" . $varvid[$i] . "</option>";
					}

				?>

			</select>
		</label>

		

		<label>
			Vali tausta piirjoone stiil:
			<select name="piirjoonestiil">

				<?php

					if (isset($_SESSION['piirjoonestiil'])) {

						$valitudStiil = $_SESSION['piirjoonestiil'];
					}

					for ($i = 0; $i < count($borders); $i++) { 

						if ($valitudStiil == $borders[$i]) {
							
							$selected = "selected";

						} else {
							$selected = "";
						}

						echo "<option " . $selected . " value=" . $borders[$i] . ">" . $borders[$i] . "</option>";
					}

				?>

			</select>
		</label>

		<input type="submit" name="submit" value="Esita" />
	</form>

</body>
</html>
