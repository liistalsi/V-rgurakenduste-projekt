<?php 
	require_once('head.html');
?>

<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
		<?php

		for ($i=1; $i < 7; $i++) { 
			echo "<p>";
				echo '<label for="p' . $i . '">';
					echo '<img src="pildid/nameless' . $i . '.jpg" alt="nimetu ' . $i . '" height="100" />';
				echo '</label>';
				echo '<input type="radio" value="' . $i . '" id="p' . $i . '" name="pilt"/>';
			echo "</p>";			
			}
		?>
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>

<?php 
	require_once('foot.html');

?>