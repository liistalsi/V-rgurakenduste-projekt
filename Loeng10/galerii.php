<?php 
	require_once('head.html');
?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
	<?php
		for ($i=1; $i < 7; $i++) {
			echo '<img src="pildid/nameless' . $i . '.jpg" alt="nimetu ' . $i . '" />';		
		}
	?>
	</div>
</div>

<?php 
	require_once('foot.html');
?>