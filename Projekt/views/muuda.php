<?php

	if (!isset($_SESSION['user'])) {

		header("Location: ../index.php");
	}

	require 'common/connection.php';
	$nimeparing = mysqli_query($mysqli, "SELECT nimi FROM `koerad` WHERE id = '".$id."'");
	$pildiparing = mysqli_query($mysqli, "SELECT pilt FROM `koerad` WHERE id = '".$id."'");
	$koerteparing = mysqli_query($mysqli, "SELECT * FROM `koerad` WHERE id = '".$id."'");
?>

<div class="container profile edit">


	<div class="imageContainer">

		<?php
			while($row = mysqli_fetch_array($pildiparing)) {

				if ($row['pilt'] != "") {
					
					echo "<img src='" . $row['pilt'] . "' alt='Koera pilt' />";	
				} else {

					echo "🐶";
				}
				
			}

		?>

	</div>

	<div class="profileContainer">

		<div class="heading">
		
			<h2>
				
				<?php
					while($row = mysqli_fetch_array($nimeparing)) {

						echo $row['nimi'];
					}

				?>

			</h2>
			
		</div>		

		<div class="table">

			<form method="post" action="?muudakoera" enctype="multipart/form-data">
				
				<?php

					while($row = mysqli_fetch_array($koerteparing)) {

						echo "

						<input name='id' type='text' class='hidden' readonly value='" . $id . "'>

						<div class='row'>
							<div>
								Koera nimi:
							</div>
							<div>
								<input name='nimi' type='text' value='" . $row['nimi'] . "'>
							</div>
						</div>
						
						<div class='row'>
							<div>
								Koera sünnikuupäev:
							</div>
							<div>
								<input name='synnikuupaev' type='text' value='" . $row['synnikuupaev'] . "'>
							</div>
						</div>

						<div class='row'>
							<div>
								Sugu:
							</div>
							<div>
								<input name='sugu' type='text' value='" . $row['sugu'] . "'>
							</div>
						</div>

						<div class='row'>
							<div>
								Tõug:
							</div>
							<div>
								<input name='toug' type='text' value='" . $row['toug'] . "'>
							</div>
						</div>

						<div class='row'>
							<div>
								Omaniku nimi:
							</div>
							<div>
								<input name='omanik' type='text' value='" . $row['omanik'] . "'>
							</div>
						</div>

						<div class='row'>
							<div>
								Kontaktnumber:
							</div>
							<div>
								<input name='kontaktnumber' type='text' value='" . $row['kontaktnumber'] . "'>
							</div>
						</div>

						<div class='row'>
							<div>
								E-mail:
							</div>
							<div>
								<input name='email' type='text' value='" . $row['email'] . "'>
							</div>
						</div>

						<div class='row multiline'>
							<div>
								Probleemi kirjeldus:
							</div>
							<div>
								<textarea name='probleem'>" . $row['probleem'] . "</textarea>
							</div>
						</div>

						<div class='row multiline'>
							<div>
								Lahenduse märkmed:
							</div>
							<div>
								<textarea name='ravi'>" . $row['ravi'] . "</textarea>
							</div>
						</div>

						<div class='row multiline'>
							<div>
								Lisamärkmed:
							</div>
							<div>
								<textarea name='markmed'>" . $row['markmed'] . "</textarea>
							</div>
						</div>

						<div class='row'>
							<div>
								Lisa koera pilt:
							</div>
							<div>
								<input type='file' name='pilt' />
							</div>
						</div>

						";
					}
				?>

				<input type="submit" name="submit" value="Salvesta">

			</form>

		</div>
	</div>
</div>

