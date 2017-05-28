<?php
  require 'common/head.php';
?>

<form method="post" action="login.php">

  <div class="container">

	<img src="http://wallpapercave.com/wp/IrMqrhR.jpg" alt="Avatar" class="avatar">

	<?php if (isset($_GET["logimiserror"])): ?>

	  <p class="error">
		Jou, su andmed ei klapi üldse. Proovi uuesti.      
	  </p>

	<?php endif; ?>

	<label><b>Username</b></label>
	<input type="text" placeholder="Enter Username" name="user" required><br/>

	<label><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="pass" required><br/>

	<button type="submit">Login</button>
  </div>
  
</form>

<?php
  require 'common/foot.php';
?>
